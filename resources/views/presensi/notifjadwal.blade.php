@extends('layouts.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Notifikasi</div>
    <div class="right"></div>
</div>
@endsection
@section('content')
@if($status->status == "h")
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col ">
            <div class="alert alert-warning">
                <p>
                    Anda Sudah Melakukan Absen Datang dan Pulang
                </p>
            </div>
        </div>
    </div>
</div>
@elseif($status->status == "i")
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col ">
            <div class="alert alert-warning">
                <p>
                    Hari ini, Anda Melakukan Pengajuan Izin tidak Sekolah
                </p>
            </div>
        </div>
    </div>
</div>
@elseif($status->status == "s")
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col ">
            <div class="alert alert-warning">
                <p>
                    Hari ini, Anda Melakukan Pengajuan Sakit
                </p>
            </div>
        </div>
    </div>
</div>
@elseif($status->status == "d")
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col ">
            <div class="alert alert-warning">
                <p>
                    Hari ini, Anda Melakukan Pengajuan Dispensasi Sekolah
                </p>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col ">
            <div class="alert alert-warning">
                <p>
                    Maaf, Tidak ada jadwal absen pada hari ini, <br> Cek Jadwal atau Hubungi TIM IT
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

