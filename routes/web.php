<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinabsenController;
use App\Http\Controllers\IzinsakitController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\IzindispenController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\LaporanKelasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['guest:karyawan'])->group(function(){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/storage-link',function(){
        $targetFolder = storage_path('app/public');
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
        symlink($targetFolder,$linkFolder);
    });

    Route::post('/proseslogin',[AuthController::class, 'proseslogin']);
});

Route::middleware(['guest:user'])->group(function(){
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin',[AuthController::class, 'prosesloginadmin']);
});


Route::middleware(['auth:karyawan'])->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/proseslogout',[AuthController::class, 'proseslogout']);

    //presensi
    Route::get('/presensi/create',[PresensiController::class, 'create']);
    Route::post('/presensi/store',[PresensiController::class, 'store']);

    //EditProfile
    Route::get('/editprofile',[PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nik}/updateprofile',[PresensiController::class, 'updateprofile']);

    //Histori
    Route::get('/presensi/histori', [PresensiController::class, 'histori']);
    Route::post('/gethistori', [PresensiController::class, 'gethistori']);

    //Izin
    Route::get('/presensi/izin', [PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
    Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);
    Route::post('/presensi/cekpengajuanizin', [PresensiController::class, 'cekpengajuanizin']);

        //Izizn Absen
    Route::get('/izinabsen', [IzinabsenController::class,'create']);
    Route::post('/izinabsen/store', [IzinabsenController::class,'store']);
    Route::get('/izinabsen/{kode_izin}/edit', [IzinabsenController::class,'edit']);
    Route::post('/izinabsen/{kode_izin}/update', [IzinabsenController::class,'update']);

    //Izin Sakit
    Route::get('/izinsakit', [IzinsakitController::class,'create']);
    Route::post('/izinsakit/store', [IzinsakitController::class,'store']);
    Route::get('/izinsakit/{kode_izin}/edit', [IzinsakitController::class,'edit']);
    Route::post('/izinsakit/{kode_izin}/update', [IzinsakitController::class,'update']);

    //Izin Dispen
    Route::get('/izindispen', [IzindispenController::class,'create']);
    Route::post('/izindispen/store', [IzindispenController::class,'store']);
    Route::get('/izindispen/{kode_izin}/edit', [IzindispenController::class,'edit']);
    Route::post('/izindispen/{kode_izin}/update', [IzindispenController::class,'update']);

    Route::get('/izin/{kode_izin}/showact', [PresensiController::class,'showact']);
    Route::get('/izin/{kode_izin}/delete', [PresensiController::class,'deleteizin']);

    //Laporan Kelas
    Route::get('/laporankelas', [LaporanKelasController::class,'laporankelas']);
    Route::get('/lihatlaporankelas', [LaporanKelasController::class,'lihatlaporankelas']);
    Route::post('/storelaporan', [LaporanKelasController::class,'storelaporan']);


});

Route::middleware(['auth:user'])->group(function(){
    Route::get('/proseslogoutadmin',[AuthController::class, 'proseslogoutadmin']);
    Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);

    Route::get('/karyawan',[KaryawanController::class, 'index']);
    Route::post('/karyawan/store',[KaryawanController::class, 'store']);
    Route::post('/karyawan/edit',[KaryawanController::class, 'edit']);
    Route::post('/karyawan/{nik}/update',[KaryawanController::class, 'update']);
    Route::post('/karyawan/{nik}/delete',[KaryawanController::class, 'delete']);
    Route::get('/karyawan/{nik}/resetpassword',[KaryawanController::class, 'resetpassword']);

    //Departemen
    Route::get('/departemen', [DepartemenController::class, 'index']);
    Route::post('/departemen/store', [DepartemenController::class, 'store']);
    Route::post('/departemen/edit', [DepartemenController::class, 'edit']);
    Route::post('/departemen/{kode_dept}/update', [DepartemenController::class, 'update']);
    Route::post('/departemen/{kode_dept}/delete', [DepartemenController::class, 'delete']);

    //Presensi
    Route::get('/presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getpresensi', [PresensiController::class, 'getpresensi']);
    Route::post('/tampilkanpeta', [PresensiController::class, 'tampilkanpeta']);
    Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
    Route::post('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/rekap', [PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit', [PresensiController::class, 'izinsakit']);
    Route::post('/presensi/approveizinsakit', [PresensiController::class, 'approveizinsakit']);
    Route::get('/presensi/{kode_izin}/batalkanizinsakit', [PresensiController::class, 'batalkanizinsakit']);

    //Cabang
    Route::get('/cabang',[CabangController::class, 'index']);
    Route::post('/cabang/store',[CabangController::class, 'store']);
    Route::post('/cabang/edit', [CabangController::class, 'edit']);
    Route::post('/cabang/update', [CabangController::class, 'update']);
    Route::post('/cabang/{kode_cabang}/delete', [CabangController::class, 'delete']);



    //konfigurasi
    Route::get('/konfigurasi/lokasikantor',[KonfigurasiController::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasikantor',[KonfigurasiController::class, 'updatelokasikantor']);

    //jam kerja
    Route::get('/konfigurasi/jamkerja',[KonfigurasiController::class, 'jamkerja']);
    Route::post('/konfigurasi/storejamkerja',[KonfigurasiController::class, 'storejamkerja']);
    Route::post('/konfigurasi/edit',[KonfigurasiController::class, 'edit']);
    Route::post('/konfigurasi/update',[KonfigurasiController::class, 'update']);
    Route::post('/konfigurasi/{kode_jam_kerja}/delete', [KonfigurasiController::class, 'delete']);

    Route::get('/konfigurasi/{nik}/setjamkerja', [KonfigurasiController::class, 'setjamkerja']);
    Route::post('/konfigurasi/storesetjamkerja', [KonfigurasiController::class, 'storesetjamkerja']);
    Route::post('/konfigurasi/updatesetjamkerja', [KonfigurasiController::class, 'updatesetjamkerja']);


    Route::get('konfigurasi/jamkerjadept', [KonfigurasiController::class, 'jamkerjadept']);
    Route::get('konfigurasi/jamkerjadept/create', [KonfigurasiController::class, 'createjamkerjadept']);
    Route::post('konfigurasi/jamkerjadept/store', [KonfigurasiController::class, 'storejamkerjadept']);
    Route::get('/konfigurasi/jamkerjadept/{kode_jk_dept}/edit', [KonfigurasiController::class, 'editjamkerjadept']);
    Route::post('/konfigurasi/jamkerjadept/{kode_jk_dept}/update', [KonfigurasiController::class, 'updatejamkerjadept']);
    Route::get('/konfigurasi/jamkerjadept/{kode_jk_dept}/delete',[KonfigurasiController::class, 'deletejamkerjadept']);


});

