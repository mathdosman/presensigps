@if ($histori->isEmpty())
    <div class="alert alert-warning">
        <p>Data tidak ditemukan</p>
    </div>
@endif
<style>
    .historicontent{
        display: flex;
    }
    .datapresensi{
        margin-left: 10px;
    }
    .card{
        border: 1px solid rgb(236, 139, 27);
    }
</style>
@foreach ($histori as $d)
<div class="card historicard mb-1">
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
