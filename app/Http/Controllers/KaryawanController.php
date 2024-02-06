<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class KaryawanController extends Controller
{
    public function index(Request $request){


        $query = Karyawan::query();
        $query->select('karyawan.*','nama_dept');
        $query->join('departemen','karyawan.kode_dept','=','departemen.kode_dept');
        if(!empty($request->nama_karyawan)){
            $query->where('nama_lengkap','like','%'.$request->nama_karyawan.'%');
        }
        if(!empty($request->kode_dept)){
            $query->where('karyawan.kode_dept',$request->kode_dept);
        }
        $karyawan = $query->orderBy('nama_lengkap')->paginate(50);

        $departemen=DB::table('departemen')->get();
        $cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
        return view('karyawan.index',compact('karyawan','departemen','cabang'));
    }

    public function store(Request $request)
    {
        $nik = $request->nik;
        $nama_lengkap = $request->nama_lengkap;
        $no_hp = $request->no_hp;
        $jabatan = $request->jabatan;
        $kode_dept = $request->kode_dept;
        $password = Hash::make('123456');
        $kode_cabang = $request->kode_cabang;
        if($request->hasFile('foto')){
            $foto = $nik.".".$request->file('foto')->getClientOriginalExtension();
        }else{
            $foto = null;
        }

        try {
            $data = [
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'foto' => $foto,
                'password' => $password,
                'kode_cabang' => $kode_cabang
            ];

            $simpan = DB::table('karyawan')->insert($data);

            if($simpan){
                if($request->hasFile('foto')){
                    $folderPath = "public/uploads/karyawan/";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }

                return Redirect::back()->with(['success'=>'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            if($e->getCode() == 23000){
                $message = "Data dengan NISN ".$nik."Sudah Ada";
            }else{
                $message = " Hubungi Tim IT";
            }
            return Redirect::back()->with(['warning'=>'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
        $nik = $request->nik;
        $departemen=DB::table('departemen')->get();
        $cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
        $karyawan = DB::table('karyawan')->where('nik', $nik)->first();
        return view('karyawan.edit',compact('departemen','karyawan','cabang'));
    }

    public function update($nik, Request $request){
        $nik = $request->nik;
        $nama_lengkap = $request->nama_lengkap;
        $no_hp = $request->no_hp;
        $jabatan = $request->jabatan;
        $kode_dept = $request->kode_dept;
        $password = $request->old_password;
        $kode_cabang = $request->kode_cabang;
        $old_foto = $request->old_foto;
        if($request->hasFile('foto')){
            $foto = $nik.".".$request->file('foto')->getClientOriginalExtension();
        }else{
            $foto = $old_foto;
        }

        try {
            $data = [
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'foto' => $foto,
                'password' => $password,
                'kode_cabang' => $kode_cabang
            ];

            $update = DB::table('karyawan')->where('nik', $nik)->update($data);

            if($update){
                if($request->hasFile('foto')){
                    $folderPath = "public/uploads/karyawan/";
                    $folderPathOld = "public/uploads/karyawan/".$old_foto;
                    Storage::delete($folderPathOld);
                    $request->file('foto')->storeAs($folderPath, $foto);
                }

                return Redirect::back()->with(['success'=>'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning'=>'Data Gagal Disimpan']);
        }

    }

    public function delete($nik){
        $delete = DB::table('karyawan')->where('nik',$nik)->delete();
        if($delete){
            return Redirect::back()->with(['success'=>'Data Berhasil di Hapus']);
        } else {
            return Redirect::back()->with(['warning'=>'Data Gagal di Hapus']);
        }
    }
    public function resetpassword($nik){
        $nik = Crypt::decrypt($nik);
        $password = Hash::make('123456');

        $reset = DB::table('karyawan')->where('nik',$nik)->update([
            'password' => $password
        ]);
        if($reset){
            return Redirect::back()->with(['success'=>'Data Berhasil di Reset']);
        } else {
            return Redirect::back()->with(['warning'=>'Data Gagal di Reset']);
        }

    }
}
