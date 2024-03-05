<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanKelasController extends Controller
{
    public function laporankelas(){

        return view('laporan.laporankelas');
    }

    public function lihatlaporankelas(){
        $nik = Auth :: guard('karyawan')->user()->nik;
        $tgl_laporan = date("Y-m-d");
        $kehadiran = DB::table('laporan_kelas')
        ->where('nik',$nik)
        ->where('tgl_laporan',$tgl_laporan)
        ->get();

        return view('laporan.lihatlaporankelas', compact('kehadiran','tgl_laporan'));
    }

    public function storelaporan(Request $request){
        $nik = Auth :: guard('karyawan')->user()->nik;
        $kode_dept = Auth::guard('karyawan')->user()->kode_dept;
        $jam_pelajaran = $request->jam_pelajaran;
        $mata_pelajaran = $request->mata_pelajaran;
        $nama_guru = $request->nama_guru;
        $status_kehadiran = $request->status_kehadiran;
        $keterangan_kelas = $request->keterangan_kelas;
        $tgl_laporan = date("Y-m-d");
        $tahun = date("Y");
        $bulan = date("m");
        $hari = date("d");

        $kode_laporan = $nik.$tahun.$bulan.$hari."-".$jam_pelajaran;

        $ceklaporan = DB::table('laporan_kelas')
        ->where('nik', $nik)
        ->where('jam_pelajaran',$jam_pelajaran)
        ->where('tgl_laporan',$tgl_laporan)
        ->count();

        if($ceklaporan > 0){
            return redirect('/lihatlaporankelas')->with(['error'=>'Jam Pelajaran ke-'.$jam_pelajaran.' Sudah di Input']);
        } else{
            $data = [
                'kode_laporan' => $kode_laporan,
                'nik' => $nik,
                'kode_dept' => $kode_dept,
                'tgl_laporan' =>$tgl_laporan,
                'jam_pelajaran' => $jam_pelajaran,
                'mata_pelajaran' => $mata_pelajaran,
                'nama_guru' => $nama_guru,
                'status_kehadiran' => $status_kehadiran,
                'keterangan_kelas' =>$keterangan_kelas
            ];

                $simpan = DB::table('laporan_kelas')->insert($data);
                if($simpan){
                    return redirect('/lihatlaporankelas')->with(['success'=>'Data Berhasil disimpan']);
                }else{
                    return redirect('/lihatlaporankelas')->with(['error'=>'Data Gagal disimpan']);
                }
        }
    }
}
