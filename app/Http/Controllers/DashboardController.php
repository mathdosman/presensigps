<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $tgl1 = date('1-m-Y');
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
        ->selectRaw('
        SUM(IF(status="h",1,0)) as jmlhadir,
        SUM(IF(status="i",1,0)) as jmlizin,
        SUM(IF(status="d",1,0)) as jmldispen,
        SUM(IF(status="s",1,0)) as jmlsakit,
        SUM(IF(jam_in > jam_masuk,1,0))as jmlterlambat
        ')
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

        ////////////////////////////////
        // $dari = $tahunini."-".$bulanini."-01";
        // $i = 1;
        // while(strtotime($dari)<=strtotime($hariini)){
        //     $rangetanggal[] = $dari;
        //     $i++;
        //     $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari)));
        // }
        // $jmlhari = count($rangetanggal);
        // $h = "h";

        // $datang = DB::table('presensi')->where('nik', $nik)->where('status',$h)->count();
        // $datangx = DB::table('presensi')->where('nik', $nik)->where('tgl_presensi',$hariini)->count();

        // dd($datangx);

        // $alpha = $jmlhari - $datang;

        $coba = DB::table('karyawan')
        ->join('departemen','karyawan.kode_dept','=','departemen.kode_dept')
        -> where('nik', $nik)
        ->first();


        return view('dashboard.dashboard',compact('presensihariini','historibulanini','namabulan','bulanini','tahunini','rekappresensi','leaderboard','coba'));
    }

    public function dashboardadmin()
    {
        $hariini = date('Y-m-d');
        $bulanini = date("m")*1;
        $tahunini = date("Y");



        $totalsiswa = DB::table('karyawan')->selectRaw('COUNT(nik) as totals')
        ->where('jabatan','siswa')
        ->first();

        $rekappresensi = DB::table('presensi')
        ->selectRaw('
        SUM(IF(status="h",1,0)) as jmlhadir,
        SUM(IF(status="i",1,0)) as jmlizin,
        SUM(IF(status="d",1,0)) as jmldispen,
        SUM(IF(status="s",1,0)) as jmlsakit,
        SUM(IF(jam_in > jam_masuk,1,0))as jmlterlambat
        ')
        ->leftjoin('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
        -> whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
        -> whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        -> first();

        $rekappresensix = DB::table('presensi')
        ->selectRaw('
        SUM(IF(status="h",1,0)) as jmlhadir,
        SUM(IF(status="i",1,0)) as jmlizin,
        SUM(IF(status="d",1,0)) as jmldispen,
        SUM(IF(status="s",1,0)) as jmlsakit,
        SUM(IF(jam_in > jam_masuk,1,0))as jmlterlambat
        ')
        ->leftjoin('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
        ->where('tgl_presensi', $hariini)
        -> first();


        return view('dashboard.dashboardadmin', compact('rekappresensi','totalsiswa','rekappresensix'));
    }

}
