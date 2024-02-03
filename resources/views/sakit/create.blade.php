@extends('layouts.presensi')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal{
        max-height: 460px !important;
    }

    #keterangan{
        height: 5rem !important;
    }
</style>
<!-- app header -->
<div class="appHeader text-light" style="background-color: #26a29a">
    <div class="left">
        <a href="javascript::" class="headerButton goBack">
        <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Form Sakit</div>
    <div class="right"></div>
</div>
<!-- appheader -->
@endsection

@section('content')
<div class="row" style="margin-top: 4rem">
    <div class="col">
        <form method="POST" action="/izinsakit/store" id="frmIzin" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <input type="text" id="tgl_izin_dari" name="tgl_izin_dari" class="form-control datepicker" placeholder="Dari" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" id="tgl_izin_sampai" name="tgl_izin_sampai" class="form-control datepicker" placeholder="Sampai" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" id="jml_hari" name="jml_hari" class="form-control" placeholder="Jumlah Hari" autocomplete="off" readonly>
        </div>

        <div class="custom-file-upload border border-dark" id="fileUpload1" style="height: 100px !important">
            <input type="file" name="sid" id="fileuploadInput" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
            aria-label="cloud upload outline"></ion-icon>
                        <i>Tap to Upload SID</i>
                    </strong>
                </span>
            </label>
        </div>

        <div class="form-group border mt-3">
            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>
        <div class="form-group">
            <button class="btn btn-block">Kirim</button>
        </div>
        </form>
    </div>
</div>
@endsection

@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();

$(document).ready(function() {
    $(".datepicker").datepicker({
    format: "yyyy-mm-dd"
    });



    function loadjumlahhari() {
    var dari = $("#tgl_izin_dari").val();
    var sampai = $("#tgl_izin_sampai").val();
    var date1 = new Date(dari);
    var date2 = new Date(sampai);
    // To calculate the time difference of two dates
    var Difference_In_Time = date2.getTime() - date1.getTime();
    // To calculate the no. of days between two dates
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

    if(dari == "" || sampai == ""){
        var jmlhari = 0;
    }else{
        var jmlhari = Difference_In_Days + 1;
        $("#jml_hari").val(jmlhari + " Hari");
    }
    //To display the final no. of days (result)
    }
    $("#tgl_izin_dari, #tgl_izin_sampai").change(function(e) {
    loadjumlahhari();
    });



    // $("#tgl_izin").change(function(e){
    //     var tgl_izin = $(this).val();
    //     $.ajax({
    //         type: 'POST',
    //         url:'/presensi/cekpengajuanizin',
    //         data:{
    //             _token:"{{csrf_token()}}",
    //             tgl_izin: tgl_izin
    //         },
    //         cache:false ,
    //         success:function(respond){
    //             if(respond==1){
    //                 Swal.fire({
    //                 title: "Oops !!",
    //                 text: 'Anda Sudah Mengajukan Izin/Sakit pada Tanggal tersebut!',
    //                 icon: "warning"
    //                 }).then((result)=>{
    //                     $("#tgl_izin").val("");
    //                 });
    //             }
    //         }
    //     });
    // });

    $("#frmIzin").submit(function(){
        var tgl_izin_dari = $("#tgl_izin_dari").val();
        var tgl_izin_sampai = $("#tgl_izin_sampai").val();
        var keterangan = $("#keterangan").val();
        if(tgl_izin_dari =="" || tgl_izin_sampai ==""){
            Swal.fire({
                    title: "Oops !!",
                    text: 'Tanggal  Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }else if(keterangan=="") {
            Swal.fire({
                    title: "Oops !!",
                    text: 'Keterangan Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }
    });
});


</script>
@endpush
