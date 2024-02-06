@extends('layouts.presensi')
@section('content')

    <div class="section" id="user-section">
        <div id="user-detail">
            <div class="avatar">
                @if (!empty(Auth::guard('karyawan')->user()->foto))
                    @php
                        $path = Storage::url('uploads/karyawan/'.Auth::guard('karyawan')->user()->foto);
                    @endphp
                    <img src="{{url($path)}}" alt="foto" class="imaged w64">
                    @else
                    <img src="{{asset('assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="imaged w64 rounded">
                @endif
            </div>
            <div id="user-info">
                <h3 id="user-name">{{Auth::guard('karyawan')->user()->nama_lengkap}}</h3>
                <span class="text-uppercase" id="user-role">{{Auth::guard('karyawan')->user()->jabatan}} &thinsp; {{$coba->nama_dept}} &thinsp; ({{Auth::guard('karyawan')->user()->kode_cabang}}) </span>
            </div>
        </div>
        <a href="/proseslogout">
            <img src="{{ asset('assets/img/logodosman1.png') }}" alt="" class="imaged w32" style="position: absolute; top:7px; right:7px;">
        </a>
    </div>

    {{-- <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/editprofile" class="green" style="font-size: 40px;">
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Profil</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/izin" class="danger" style="font-size: 40px;">
                                <ion-icon name="calendar-number"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Izin</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/histori" class="warning" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Histori</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="" class="orange" style="font-size: 40px;">
                                <ion-icon name="location"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            Lokasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">
                <div class="col-6">
                    <div class="card gradasigreen" style="height: 110px">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($presensihariini !== null && $presensihariini->status == "h")
                                    @php
                                        $path = Storage::url('uploads/absensi/'.$presensihariini->foto_in);
                                    @endphp
                                    <img src="{{url($path)}}" alt="image" class="img-fluid rounded">
                                    @else
                                    <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail" style="margin-left: 5px;">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span style="font-size: 0.8rem">{{$presensihariini !== null ? $presensihariini->jam_in : "Belum Absen"}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gradasired" style="height: 110px">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($presensihariini !== null && $presensihariini->jam_out !== null)
                                    @php
                                        $path = Storage::url('uploads/absensi/'.$presensihariini->foto_out);
                                    @endphp
                                    <img src="{{url($path)}}" alt="image" class="img-fluid rounded">
                                    @else
                                    <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail" style="margin-left: 5px;">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span style="font-size: 0.8rem">{{$presensihariini !== null && $presensihariini->jam_out !== null ? $presensihariini->jam_out : "Belum Absen"}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="rekappresensi">
            <h4>Rekap Presensi {{ $namabulan[$bulanini] }} {{ $tahunini }}</h4>
            <div class="row" >
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-body" style="padding:12px 10px !important">
                        <span class="badge bg-danger" style="position: absolute; top:2px; right:5px; font-size:0.6rem; z-index:999">{{$rekappresensi->jmlhadir}}</span>
                        <ion-icon name="accessibility-outline" style="font-size:1.3rem" class="text-primary"></ion-icon>
                        <br>
                        <span style="font-size:0.9rem; font-weight:700">Hadir</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-body" style="padding:12px 10px !important">
                        <span class="badge bg-danger" style="position: absolute; top:2px; right:5px; font-size:0.6rem; z-index:999">{{$rekapizin->jmlizin !== null ? $rekapizin->jmlizin : 0}}</span>
                        <ion-icon name="document-text-outline" style="font-size:1.3rem" class="text-warning"></ion-icon>
                        <br>
                        <span style="font-size:0.9rem; font-weight:700">Izin</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-body" style="padding:12px 10px !important">
                        <span class="badge bg-danger" style="position: absolute; top:2px; right:5px; font-size:0.6rem; z-index:999">{{$rekapizin->jmlsakit !== null ? $rekapizin->jmlsakit : 0}}</span>
                        <ion-icon name="medkit-outline" style="font-size:1.3rem" class="text-success"></ion-icon>
                        <br>
                        <span style="font-size:0.9rem; font-weight:700">Sakit</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-body" style="padding:12px 10px !important">
                        <span class="badge bg-danger" style="position: absolute; top:2px; right:5px; font-size:0.6rem; z-index:999">{{$rekappresensi->jmlterlambat !== null ? $rekappresensi->jmlterlambat : 0}}</span>
                        <ion-icon name="alarm-outline" style="font-size:1.3rem" class="text-danger"></ion-icon>
                        <br>
                        <span style="font-size:0.9rem; font-weight:700">Dispen</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-1">
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-body" style="padding:12px 10px !important">
                        <span class="badge bg-danger" style="position: absolute; top:2px; right:5px; font-size:0.6rem; z-index:999">{{$rekappresensi->jmlterlambat !== null ? $rekappresensi->jmlterlambat : 0}}</span>
                        <ion-icon name="alarm-outline" style="font-size:1.3rem" class="text-danger"></ion-icon>
                        <br>
                        <span style="font-size:0.9rem; font-weight:700">Telat</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-body" style="padding:12px 10px !important">
                        <span class="badge bg-danger" style="position: absolute; top:2px; right:5px; font-size:0.6rem; z-index:999">{{$rekappresensi->jmlterlambat !== null ? $rekappresensi->jmlterlambat : 0}}</span>
                        <ion-icon name="alarm-outline" style="font-size:1.3rem" class="text-danger"></ion-icon>
                        <br>
                        <span style="font-size:0.9rem; font-weight:700">Alpha</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="presencetab mt-2">
            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            Bulan Ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                            Leaderboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-2" style="margin-bottom:100px;">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <style>
                        .historicontent{
                            display: flex;
                        }
                        .datapresensi{
                            margin-left: 10px;
                        }
                        .cards{
                            border: 1px solid rgba(11, 185, 19, 0.582);
                        }
                    </style>
                    @foreach ($historibulanini as $d)
                    <div class="card historicard mb-1 cards">
                        <div class="card-body">
                            <div class="historicontent">
                                <div class="iconpresensi text-center">
                                    @if($d->status == "h")
                                    <ion-icon name="finger-print-outline" style="font-size: 48px " class="text-success"></ion-icon>
                                    @elseif($d->status == "s")
                                    <ion-icon name="medkit-outline" style="font-size: 48px " class="text-warning"></ion-icon> <br> <span>Sakit</span>
                                    @elseif($d->status == "i")
                                    <ion-icon name="receipt-outline" style="font-size: 48px " class="text-primary"></ion-icon> <br> <span>Izin</span>
                                    @elseif($d->status == "d")
                                    <ion-icon name="newspaper-outline" style="font-size: 48px " class="text-success"></ion-icon> <br> <span>Dispen</span>
                                    @endif
                                </div>
                                <div class="datapresensi">
                                    <h3 style="line-height: 3px">{{$d->nama_jam_kerja}}</h3>
                                    @php
                                       $tgl_indo = tgl_indo(date($d->tgl_presensi));
                                    @endphp
                                    <h4 style="margin: 0px !important">{{$tgl_indo}}</h4>

                                    @if($d->status == "h")
                                    <span>
                                        {!! $d->jam_in != null ? date("H:i",strtotime($d->jam_in)): '<span class="text-danger">Belum Absen</span>' !!}
                                    </span>
                                    <span>
                                        {!! $d->jam_out != null ? " - " .date("H:i",strtotime($d->jam_out)): '<span class="text-danger">- Belum Absen</span>' !!}
                                    </span>
                                    @elseif($d->status == "s")
                                    <span class="text-warning">{{$d->kode_izin}}</span> <br>
                                    <span>{{$d->keterangan}}</span>
                                    @elseif($d->status == "i")
                                    <span class="text-primary">{{$d->kode_izin}}</span> <br>
                                    <span>{{$d->keterangan}}</span>
                                    @elseif($d->status == "d")
                                    <span class="text-success">{{$d->kode_izin}}</span> <br>
                                    <span>{{$d->keterangan}}</span>
                                    @endif

                                    <div id="keterangan">
                                        @php
                                            $jam_in = date("H:i",strtotime($d->jam_in));
                                            $jam_masuk = date("H:i",strtotime($d->jam_masuk));

                                            $jadwal_jam_masuk = $d->tgl_presensi." ".$jam_masuk;
                                            $jam_presensi = $d->tgl_presensi." ".$jam_in;
                                        @endphp
                                        @if($d->status == "h")
                                            @if ($jam_in > $jam_masuk)
                                            @php
                                            $lambat = hitungjamterlambat($jadwal_jam_masuk, $jam_presensi);
                                            @endphp
                                            <span class="text-danger">Terlambat {{$lambat}}</span>
                                            @else
                                            <span class="text-success">Tepat Waktu</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <ul class="listview image-listview">
                        @foreach ($leaderboard as $p)
                        <li>
                            <div class="item">
                                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        {{$p->nama_lengkap}} <br>
                                        {{$p->jabatan}}
                                    </div>
                                    <span class="text-light badge {{$p->jam_in < $p->jam_masuk ? 'bg-success' : 'bg-danger'}}">{{$p->jam_in}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </div>
    </div>


@endsection
