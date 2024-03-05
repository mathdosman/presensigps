@extends('layouts.presensi')
@section('header')
<div class="">
    <!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    @php
        $tgl_laporan = tgl_indo(date($tgl_laporan));
    @endphp
    <div class="pageTitle text-center">Lihat Laporan Kelas <br> {{$tgl_laporan}} </div>
    <div class="right"></div>
</div>
<!-- * App Header -->
</div>
@endsection
@section('content')

<div class="container" style="margin-top: 70px; margin-bottom:70px">
    <div class="row" >
        <div class="col">
            @php
                $messagesuccess=Session::get('success');
                $messageerror=Session::get('error');
            @endphp
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{$messagesuccess}}
                </div>
            @endif
            @if(Session::get('error'))
                <div class="alert alert-danger">
                    {{$messageerror}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach ($kehadiran as $d)
            <div class="card mb-1" data-toggle="modal" data-target="#actionSheetIconed">
                <div class="card-body">
                    <div class="historicontent">
                        <div class="iconpresensi text-center mb-1">
                            Jam ke-{{$d->jam_pelajaran}} <br>
                        </div>
                        <div class="datapresensi">
                            <div class="in">
                                Mata Pelajaran : {{$d->mata_pelajaran}} <br>
                                Nama Guru : {{$d->nama_guru}} <br>
                                @if ($d->status_kehadiran == 0)
                                Status : <span class="text-success">Hadir</span>
                                @elseif ($d->status_kehadiran == 1)
                                Status : <span class="text-info">Tidak Hadir Dengan Tugas</span>
                                @elseif ($d->status_kehadiran == 2)
                                Status : <span class="text-warning">Tidak Hadir Tanpa Tugas</span>
                                @else
                                Status : <span class="text-danger">Tanpa Keterangan</span>

                                @endif
                                <br>
                                Catatan : {{$d->keterangan_kelas}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@if(Auth::guard('karyawan')->user()->role == 1)
    <div class="fab-button animate bottom-right dropdown" style="margin-bottom:55px">
        <a href="#" class="fab bg-primary" data-toggle="dropdown">
            <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item bg-primary" href="/laporankelas">
            <ion-icon name="receipt-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon> <p class="text-primary">Buat Laporan</p>
        </a>
        </div>
    </div>
@endif
@endsection

@push('myscript')
    <script>

    </script>
@endpush
