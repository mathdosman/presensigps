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

<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col ">
            <div class="alert alert-warning">
                <p>
                    Maaf, Tidak ada jadwal absen pada hari ini, <br> Silahkan hubungi TIM IT
                </p>
            </div>
        </div>
    </div>
</div>


@endsection

