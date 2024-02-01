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
                <span class="text-uppercase" id="user-role">{{Auth::guard('karyawan')->user()->jabatan}} &thinsp; {{$departemen->nama_dept}} &thinsp; ({{Auth::guard('karyawan')->user()->kode_cabang}}) </span>
            </div>
        </div>
        <a href="/proseslogout">
            <img src="{{ asset('assets/img/logodosman1.png') }}" alt="" class="imaged w32" style="position: absolute; top:7px; right:7px;">
        </a>
    </div>

    <div class="section" id="menu-section">
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
    </div>
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">
                <div class="col-6">
                    <div class="card gradasigreen" style="height: 110px">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($presensihariini !== null)
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
                        <span style="font-size:0.9rem; font-weight:700">Telat</span>
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
                    <ul class="listview image-listview">
                        @foreach ($historibulanini as $d)
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="ribbon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>{{date("d-m-Y",strtotime($d->tgl_presensi))}}</div>
                                    <span class="badge badge-success">{{$d->jam_in}}</span>
                                    <span class="badge badge-danger">{{$presensihariini !== null && $d->jam_out !==null ? $d->jam_out : "Belum Absen" }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
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
                                    <span class="text-light badge {{$p->jam_in < "07:30" ? 'bg-success' : 'bg-danger'}}">{{$p->jam_in}}</span>
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
