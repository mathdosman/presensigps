@if ($histori->isEmpty())
    <div class="alert alert-warning">
        <p>Data tidak ditemukan</p>
    </div>
@endif
@foreach ($histori as $d)
<ul class="listview image-listview">
    <li>
        <div class="item">
            @php
            $path = Storage::url('uploads/absensi/'.$d->foto_in);
            @endphp
                <img src="{{url($path)}}" alt="image" class="image">
            <div class="in">
                <div>{{date("d-m-Y",strtotime($d->tgl_presensi))}}</div>
                <span class="badge {{ $d->jam_in < "07:30" ? "bg-success" : "bg-danger"}}">{{$d->jam_in}}</span>
                <span class="badge {{$d->jam_out !==null ? "bg-success" : "bg-danger"}}">{{$d->jam_out !==null ? $d->jam_out : "Belum Absen" }}</span>
            </div>
        </div>
    </li>
</ul>
@endforeach
