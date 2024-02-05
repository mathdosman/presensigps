<?php
function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ":" . round($sisamenit2);
        }
?>
@foreach ($presensi as $d)
@php
    $foto_in = Storage::url('uploads/absensi/'.$d->foto_in);
    $foto_out = Storage::url('uploads/absensi/'.$d->foto_out);
@endphp
@if ($d->status == "h")
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$d->nik}}</td>
    <td>{{$d->nama_lengkap}}</td>
    <td>{{$d->nama_dept}}</td>
    <td class="fw-bold">{{$d->status == "h" ? "Hadir" : ''}}</td>
    <td>{{$d->nama_jam_kerja}}</td>
    <td>{{$d->jam_in}}</td>
    <td>
        <img src="{{url($foto_in)}}" alt="foto_in" class="avatar">
    </td>
    <td>{!!$d->jam_out == null ? '<span class="badge bg-danger">Belum Absen</span>' :$d->jam_out!!}</td>
    <td>
        @if ($d->foto_out == null)
        <img src="{{asset('assets/img/no_foto1.jpg')}}" alt="foto_out" class="avatar">
        @else
        <img src="{{url($foto_out)}}" alt="foto_in" class="avatar">
        @endif
    </td>
    <td>
        @if ($d->jam_in > $d->jam_masuk)
        @php
            $jamterlambat = selisih($d->jam_masuk,$d->jam_in);
        @endphp
        <span class="badge bg-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 13v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v7a1 1 0 0 0 1 1h3a4 4 0 0 1 4 4v1a2 2 0 0 0 4 0v-5h3a2 2 0 0 0 2 -2l-1 -5a2 3 0 0 0 -2 -2h-7a3 3 0 0 0 -3 3" /></svg> {{$jamterlambat}}</span>
        @else
        <span class="badge bg-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" /></svg></span>
        @endif
        </td>
        <td>
            <a href="#" class="btn btn-primary btn-sm rounded tampilkanpeta" id="{{$d->id}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>Maps</a>
        </td>
</tr>
@else
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$d->nik}}</td>
    <td>{{$d->nama_lengkap}}</td>
    <td>{{$d->nama_dept}}</td>
    <td>
        @if ($d->status == "s")
            <span class="text-warning">Sakit</span>
        @elseif ($d->status == "i")
            <span class="text-primary">Izin</span>
        @elseif ($d->status == "d")
            <span class="text-success">Dispen</span>
        @endif
    </td>
    <td colspan="7" class="text-start" style="background-color:azure"><b>Keterangan :</b> {{$d->keterangan}}</td>
</tr>
@endif

@endforeach


<script>
    $(function(){
        $(".tampilkanpeta").click(function(e){
            var id = $(this).attr("id");
            $.ajax({
                type:'POST',
                url:'/tampilkanpeta',
                data:{
                    _token:"{{csrf_token()}}",
                    id:id
                },
                cache: false,
                success: function(respond){
                    $("#loadmaps").html(respond);
                }
            });
            $("#modal-tampilkanpeta").modal("show");
        });
    });
</script>

