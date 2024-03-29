<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Legal landscape</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: legal landscape }

#title{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 18px;
    font-weight: bold;
  }

  .avatar{
    width: 40px;
    height: 45px;
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
  body.legal.landscape .sheet {
    width: 357mm;
    height: auto !important;
}

</style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="legal landscape">
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
        <span style="font-size: 1.3rem"><b> Rekap Absensi Siswa <br> Periode {{$namabulan[$bulan]}} {{$tahun}} </b></span>
    </div>
</div>
<table class="tabelpresensi" style="font-size: 10px">
    <tr>
        <th rowspan="2">NISN</th>
        <th rowspan="2">Kelas</th>
        <th rowspan="2">Nama Siswa</th>
        <th colspan="{{$jmlhari}}">Bulan {{$namabulan[$bulan]}} {{$tahun}}</th>
        <th rowspan="2">Total <br> Hadir</th>
        <th rowspan="2">S</th>
        <th rowspan="2">I</th>
        <th rowspan="2">A</th>
        <th rowspan="2">D</th>
        <th rowspan="2">Telat</th>
    </tr>
    <tr>
        @foreach ($rangetanggal as $d)
            <th>{{date("d",strtotime($d))}}</th>
        @endforeach
    </tr>
    <tr>
        @foreach ($rekap as $r)
        <tr>
            <td>{{$r->nik}}</td>
            <td>{{$r->kode_dept}}</td>
            <td class="text-start">{{$r->nama_lengkap}}</td>
                <?php
                    $jml_hadir = 0;
                    $jml_izin = 0;
                    $jml_sakit = 0;
                    $jml_dispen = 0;
                    $jml_alpha = 0;
                    for($i=1; $i<=$jmlhari ; $i++){
                        $tgl = "tgl_".$i;
                        $datapresensi = explode("|",$r->$tgl);
                        if ($r->$tgl !== NULL){
                            $status = $datapresensi[2];
                        } else {
                            $status = "";
                        }

                        if($status == "h"){
                            $jml_hadir += 1;
                        }
                        if($status == "i"){
                            $jml_izin += 1;
                        }
                        if($status == "s"){
                            $jml_sakit += 1;
                        }
                        if($status == "d"){
                            $jml_dispen += 1;
                        }
                        if(empty($status)){
                            $jml_alpha += 1;
                        }
                ?>
                <td>
                    {{$status}}
                </td>
                <?php
                    }
                ?>

            <td>{{ !empty($jml_hadir) ? $jml_hadir : ""}}</td>
            <td>{{ !empty($jml_sakit) ? $jml_sakit : ""}}</td>
            <td>{{ !empty($jml_izin) ? $jml_izin : ""}}</td>
            <td>{{ !empty($jml_alpha) ? $jml_alpha : ""}}</td>
            <td>{{ !empty($jml_dispen) ? $jml_dispen : ""}}</td>
            <td></td>
        </tr>
    @endforeach
    </tr>
</table>


<table width="100%" style="margin-top: 40px" >
    <tr>
        <td style="text-align: left">
            <span style="margin-left: 1000px;">Gianyar, {{date('d-m-Y')}}</span>
            <br>
            <br>
            <br>
            <br>
           <u style="margin-left: 1000px"> I Putu Darma Putra, S.Pd </u> <br>
           <i style="margin-left: 1000px"><b>Guru Piket</b></i>
        </td>
    </tr>
</table>


  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
