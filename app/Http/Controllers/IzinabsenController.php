<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IzinabsenController extends Controller
{
    public function create()
    {
        return view('izin.create');
    }
    public function store(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $sid = $request->sid;
        $tgl_izin_dari = $request->tgl_izin_dari;
        $tgl_izin_sampai = $request->tgl_izin_sampai;
        $status = "i";
        $keterangan = $request->keterangan;

        $bulan = date("m",strtotime($tgl_izin_dari));
        $tahun = date("Y",strtotime($tgl_izin_dari));
        $thn = substr($tahun,2,2);

        $lastizin = DB::table('pengajuan_izin')
        ->whereRaw('MONTH(tgl_izin_dari)="'.$bulan.'"')
        ->whereRaw('YEAR(tgl_izin_dari)="'.$tahun.'"')
        ->orderBy('kode_izin','desc')
        ->first();

        $lastkodeizin = $lastizin !== null ? $lastizin->kode_izin : "";
        $format = "I".$bulan.$thn;
        $kode_izin = buatkode($lastkodeizin,$format,4);

        if ($request->hasFile('sid')) {
            $sid = $kode_izin . "." . $request->file('sid')->getClientOriginalExtension();
        }else{
            $sid = null;
        }
        $data =[
            'kode_izin' => $kode_izin,
            'nik' => $nik,
            'tgl_izin_dari' => $tgl_izin_dari,
            'tgl_izin_sampai' => $tgl_izin_sampai,
            'status' => $status,
            'doc_sid' => $sid,
            'keterangan' => $keterangan
        ];

        $tgl_d = tgl_indo($tgl_izin_dari);
        $tgl_s = tgl_indo($tgl_izin_sampai);

        $cekpresensi = DB::table('presensi')
        ->where('nik', $nik)
        ->whereBetween('tgl_presensi',[$tgl_izin_dari,$tgl_izin_sampai])
        ->count();

        $cekpengajuan = DB::table('pengajuan_izin')
        ->where('nik', $nik)
        ->whereRaw('"'.$tgl_izin_dari.'" BETWEEN tgl_izin_dari AND tgl_izin_sampai')
        ->count();


        if($cekpengajuan > 0 ){
            if($tgl_izin_dari == $tgl_izin_sampai){
                return redirect('/presensi/izin')->with(['error'=>'Pengajuan izin GAGAL, karena pada tanggal '.$tgl_d .' sudah terdapat data pengajuan izin lainnya.']);
            }else{
                return redirect('/presensi/izin')->with(['error'=>'Pengajuan izin GAGAL, karena pada tanggal '.$tgl_d .' s/d '. $tgl_s.' sudah terdapat data pengajuan izin lainnya.']);
            }
        } else if($cekpresensi > 0)
        {
            if($tgl_izin_dari == $tgl_izin_sampai){
                return redirect('/presensi/izin')->with(['error'=>'Pengajuan izin GAGAL, karena pada tanggal '.$tgl_d.' sudah terdapat data absen atau pengajuan izin lainnya telah disetujui.']);
            }else{
                return redirect('/presensi/izin')->with(['error'=>'Pengajuan izin GAGAL, karena pada tanggal '.$tgl_d .' s/d '. $tgl_s.' sudah terdapat data absen atau pengajuan izin lainnya telah disetujui.']);
            }
        }

        $simpan = DB::table('pengajuan_izin')->insert($data);

        if($simpan){
            if ($request->hasFile('sid')) {
                $sid = $kode_izin . "." . $request->file('sid')->getClientOriginalExtension();
                $folderPath = "public/uploads/sid/";
                $request->file('sid')->storeAs($folderPath, $sid);
              }
            return redirect('/presensi/izin')->with(['success'=>'Data Berhasil disimpan']);
        }else{
            return redirect('/presensi/izin')->with(['error'=>'Data Gagal disimpan']);
        }

    }
    public function edit($kode_izin)
    {
        $dataizin = DB::table('pengajuan_izin')
        ->where('kode_izin', $kode_izin)->first();
        return view('izin.edit', compact('dataizin'));
    }

    public function update($kode_izin, Request $request)
    {

        $sid = $request->sid;
        $tgl_izin_dari = $request->tgl_izin_dari;
        $tgl_izin_sampai = $request->tgl_izin_sampai;
        $keterangan = $request->keterangan;
        $docsid = DB::table('pengajuan_izin')->where('kode_izin', $kode_izin)->first();
        if ($request->hasFile('sid')) {
            $sid = $kode_izin . "." . $request->file('sid')->getClientOriginalExtension();
        }else{
            $sid = $docsid->doc_sid;
        }
        $data =[
            'tgl_izin_dari' => $tgl_izin_dari,
            'tgl_izin_sampai' => $tgl_izin_sampai,
            'doc_sid' => $sid,
            'keterangan' => $keterangan
        ];
        try {
            DB::table('pengajuan_izin')->where('kode_izin', $kode_izin)->update($data);
                if ($request->hasFile('sid')) {
                    $sid = $kode_izin . "." . $request->file('sid')->getClientOriginalExtension();
                    $folderPath = "public/uploads/sid/";
                    $request->file('sid')->storeAs($folderPath, $sid);
                  }
            return redirect('/presensi/izin')->with(['success'=>'Data Berhasil di Update']);
        } catch (\Exception $e) {
            return redirect('/presensi/izin')->with(['error'=>'Data Gagal di Update']);
        }
    }
}

