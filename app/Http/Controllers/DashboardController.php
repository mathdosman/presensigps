<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $bulanini = date("m")*1;
        $tahunini = date("Y");
        $nik = Auth::guard('karyawan')->user()->nik;
        $kode_dept = Auth::guard('karyawan')->user()->kode_dept;
        $presensihariini = DB::table('presensi')->where('nik', $nik)->where('tgl_presensi', $hariini)->first();

        $historibulanini = DB::table('presensi')
        ->select('presensi.*','keterangan','jam_kerja.*')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensi.kode_izin','=','pengajuan_izin.kode_izin')
        ->where('presensi.nik',$nik)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->orderBy('tgl_presensi','desc')
        ->get();


        $rekappresensi = DB::table('presensi')
        ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > jam_masuk,1,0))as jmlterlambat')
        ->leftjoin('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
        -> where('nik', $nik)
        -> whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
        -> whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        -> first();

        $leaderboard = DB::table('presensi')
        ->join('karyawan','presensi.nik','=','karyawan.nik')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
        ->where('tgl_presensi',$hariini)
        ->orderBy('jam_in','desc')
        ->get();
        $namabulan =["","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $rekapizin = DB::table('pengajuan_izin')
        ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit ')
        -> where('nik', $nik)
        -> whereRaw('MONTH(tgl_izin_dari)="'.$bulanini.'"')
        -> whereRaw('YEAR(tgl_izin_dari)="'.$tahunini.'"')
        -> where('status_approved',1)
        -> first();

        $coba = DB::table('karyawan')
        ->join('departemen','karyawan.kode_dept','=','departemen.kode_dept')
        -> where('nik', $nik)
        ->first();


        return view('dashboard.dashboard',compact('presensihariini','historibulanini','namabulan','bulanini','tahunini','rekappresensi','leaderboard','rekapizin','coba'));
    }

    public function dashboardadmin()
    {
        $hariini = date('Y-m-d');



        $totalsiswa = DB::table('karyawan')->selectRaw('COUNT(nik) as totals')
        ->where('jabatan','siswa')
        ->first();

        $rekappresensi = DB::table('presensi')
        ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > jam_masuk,1,0))as jmlterlambat')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
        ->where('tgl_presensi', $hariini)
        -> first();

        $rekapizin = DB::table('pengajuan_izin')
        ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit ')
        -> where('tgl_izin_dari', $hariini)
        -> where('status_approved',1)
        -> first();

        return view('dashboard.dashboardadmin', compact('rekappresensi','rekapizin','totalsiswa'));
    }
}
