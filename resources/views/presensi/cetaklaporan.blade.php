<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }
#title{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 18px;
    font-weight: bold;
  }
  .tabeldatasiswa {
    margin-top:40px;
  }
  .tabelpresensi{
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}
.tabelpresensi  tr th{
      border:1px solid #0c0c0c;
      text-align: center;
    paddings: 8px;
    background-color: #d6d3d3
  }
.tabelpresensi  tr td{
    border:1px solid #0c0c0c;
    paddings: 5px;
    font-size: 12px;
    text-align: center;
  }
  .avatar{
    width: 40px;
    height: 45px;
  }

</style>

</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
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
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">
<table style="width: 100%">
    <tr>
        <td style="width: 30px">
            <img src="{{asset('assets/img/logodosman.png')}}" width="100" height="100" alt="" class="ms-3">
        </td>
        <td style="text-align: center">
                <span style="font-size: 2rem"> <b> SMA Negeri 1 Gianyar</span> </b> <br>
                <span style="margin-top:2px">Jln. Ratna, Tegal Tugu Gianyar, Telp: (0361) 943034</span> <br>
                <small>Website:https//sman1-gianyar.sch.id, email:sman1.gianyar1963@gmail.com</small>
        </td>
    </tr>
</table>
<hr color="red">
<div class="row">
    <div class="col-12 text-center">
        <span style="font-size: 1.3rem"><b> Laporan Absensi Siswa <br> Periode {{$namabulan[$bulan]}} {{$tahun}} </b></span>
    </div>
</div>

<table class="tabeldatasiswa" style="padding: 1rem">
    <tr>
        <td rowspan="6">
            @php
                $path = Storage::url('uploads/karyawan/'.$karyawan->foto);
            @endphp
            @if ($karyawan->foto != null)
            <img src="{{url($path)}}" width="80" height="100" class="border border-1 border-dark rounded ms-2" alt="">&emsp;&emsp;
            @else
            <img src="/tabler/static/no_foto.jpg" alt="xxxx" width="80" height="100" class="border border-1 border-dark rounded ms-2">&emsp;&emsp;
            @endif
        </td>
    </tr>

    <tr>
        <td class="fw-bold">NISN </td>
        <td>:&emsp;</td>
        <td>{{$karyawan ->nik}}</td>
    </tr>
    <tr>
        <td class="fw-bold">Nama Siswa &ensp;</td>
        <td>:</td>
        <td>{{$karyawan ->nama_lengkap}}</td>
    </tr>
    <tr>
        <td class="fw-bold">Kelas</td>
        <td>:</td>
        <td>{{$karyawan ->kode_dept}}</td>
    </tr>
    <tr>
        <td class="fw-bold">No. Hp</td>
        <td>:</td>
        <td>{{$karyawan ->no_hp}}</td>
    </tr>
</table>

<table class="tabelpresensi"  >
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Foto</th>
    <th>Jam Pulang</th>
    <th>Foto</th>
    <th>Keterangan <br>(jam:menit)</th>
</tr>
<tr>
@foreach ($presensi as $d)
@php
$path_in = Storage::url('uploads/absensi/'.$d -> foto_in);
$path_out = Storage::url('uploads/absensi/'.$d -> foto_out);
$jamterlambat = selisih('07:30:00',$d->jam_in);
@endphp
<td>{{$loop ->iteration}}</td>
<td>{{date("d-m-Y",strtotime($d->tgl_presensi))}}</td>
<td>{{$d -> jam_in}}</td>
<td>
    <img src="{{url($path_in)}}" alt="" class="avatar">
</td>
<td>{!!$d -> jam_out !== null ? $d -> jam_out: '<span style="color:red">Belum Absen</span>'!!}</td>
<td>
    @if ($d->foto_out != null)
    <img src="{{url($path_out)}}" alt="" class="avatar">
    @else
    <img src="{{asset('assets/img/no_foto1.jpg')}}" class="avatar" alt="xxxx">
    @endif
</td>
<td>
    @if ($d->jam_in >"07:30")
    <b class="fw-bold text-danger">Terlambat ({{$jamterlambat}})</b>
    @else
    <b class="fw-bold text-success">Tepat Waktu</b>
    @endif
</td>
</tr>
@endforeach
</table>
<table width="100%" style="margin-top: 80px" >
    <tr>
        <td style="text-align: left">
            <span style="margin-left: 500px;">Gianyar, {{date('d-m-Y')}}</span>
            <br>
            <br>
            <br>
            <br>
           <u style="margin-left: 500px"> I Putu Darma Putra, S.Pd </u> <br>
           <i style="margin-left: 500px"><b>Guru Piket</b></i>
        </td>
    </tr>
</table>

  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
