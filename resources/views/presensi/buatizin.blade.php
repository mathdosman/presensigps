@extends('layouts.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="/presensi/izin" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Form Izin</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection
@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col">
        <form action="/presensi/storeizin" method="POST" id="frmIzin">
            @csrf
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="form-group">
                        <input type="date" name="tgl_izin" class="form-control tanggal" id="tgl_izin" value="" autocomplete="off">
                        {{-- {{date('Y-m-d')}} --}}
                    </div>
                </div>
                <div class="col-11">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>Status</option>
                            <option value="i">Izin</option>
                            <option value="s">Sakit</option>
                        </select>
                    </div>
                </div>
                <div class="col-11">
                    <div class="form-group">
                        <textarea name="keterangan" id="keterangan" rows="6" class="form-control" placeholder="Keterangan"></textarea>
                    </div>
                </div>
                <div class="col-11">
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('myscript')
    <script>
            $("#frmIzin").submit(function(){
                var tgl_izin = $("#tgl_izin").val();
                var status = $("#status").val();
                var keterangan = $("#keterangan").val();
                if(tgl_izin == ""){
                    Swal.fire({
                    title: 'Oops!',
                    text: 'Tanggal harus diisi!',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                    });
                    return false;
                } else if(status == ""){
                    Swal.fire({
                    title: 'Oops!',
                    text: 'Status harus diisi!',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                    });
                    return false;
                }else if(keterangan == ""){
                    Swal.fire({
                    title: 'Oops!',
                    text: 'Keterangan harus diisi!',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                    });
                    return false;
                }
            });
    </script>

    <script>
        $(function () {
        // $(".tanggal").datepicker({
        //       autoclose: true,
        //       todayHighlight: true,
        //       format: 'yyyy-mm-dd'
        // }).datepicker('update', new Date());


        $("#tgl_izin").change(function(e){
            var tgl_izin = $(this).val();

            $.ajax({
                type:'POST',
                url:'/presensi/cekpengajuanizin',
                data:{
                    _token:"{{csrf_token()}}",
                    tgl_izin: tgl_izin
                },
                cache: false,
                success:function(respond){
                    if(respond == 1){
                        Swal.fire({
                        title: 'Oops!',
                        text: 'Pengajuan Izin/Sakit sudah dilakukan pada tanggal tersebut!',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                        }).then((result)=>{
                            $("#tgl_izin").val("");
                        });
                    }
                }
            });

        });



      });

    </script>
@endpush

