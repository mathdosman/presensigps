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
    <div class="pageTitle">Data Izin</div>
    <div class="right"></div>
</div>
<form action="/presensi/izin" method="GET" id="frmdataizin">
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <select name="bulan" id="bulan" class="form-control selectmaterialize">
                        <option value="">Bulan</option>
                        @for ($i=1 ; $i<=12; $i++)
                            <option {{Request('bulan') == $i ? 'selected' : ''}} value="{{$i}}">{{$namabulan[$i]}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <select name="tahun" id="tahun" class="form-control selectmaterialize">
                        <option value="">Tahun</option>
                        @php
                            $tahun_awal = 2023;
                            $tahun_sekarang = date("Y");
                            for($t = $tahun_awal; $t<=$tahun_sekarang; $t++){
                                if(Request('tahun') == $t){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }
                                echo "<option $selected value='$t'>$t</option>";}
                        @endphp
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary w-100 mb-1">Cari</button>
            </div>
        </div>
    </div>
</form>
<!-- * App Header -->
</div>
@endsection
@section('content')

<div class="container " style="position: fixed; width:100%; margin: auto; overflow-y:scroll; height:430px">
    <div class="row"  >
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
            <style>
                .historicontent{
                    display: flex;
                }
                .datapresensi{
                    margin-left: 12px;
                }
                .card{
                    border: 1px solid rgb(111, 51, 223);
                }
            </style>
            @foreach ($dataizin as $d)
            @php
            $tgl_indo_dari = tgl_indo(date($d->tgl_izin_dari));
            $tgl_indo_sampai = tgl_indo(date($d->tgl_izin_sampai));

            if($d->status == "i"){
                $status = "Izin";
            } else if($d->status == "s"){
                $status = "Sakit";
            } else if($d->status == "d"){
                $status = "Dispen";
            } else{
                $status = "Tidak Ditemukan";
            }

            @endphp
        <div class="card mb-1 card_izin" kode_izin="{{$d->kode_izin}}" status_approved="{{$d->status_approved}}" data-toggle="modal" data-target="#actionSheetIconed">
            <div class="card-body">
                <div class="historicontent">
                    <div class="iconpresensi text-center mb-3">
                        @if($d->status == "i")
                        <ion-icon name="receipt-outline" style="font-size: 32px " class="text-primary"></ion-icon> <br>
                        @elseif ($d->status == "s")
                        <ion-icon name="medkit-outline" style="font-size: 32px " class="text-warning"></ion-icon> <br>
                        @elseif ($d->status == "d")
                        <ion-icon name="newspaper-outline" style="font-size: 32px " class="text-success"></ion-icon> <br>
                        @endif
                        {{$status}} <br> {{hitunghari($d->tgl_izin_dari,$d->tgl_izin_sampai)}} hari
                    </div>
                    <div class="datapresensi mt-2">
                        <div class="in">
                            @if($tgl_indo_dari == $tgl_indo_sampai)
                            <div>{{$tgl_indo_dari}}<br>
                            </div>
                            @else
                            <div>{{$tgl_indo_dari}} s/d {{$tgl_indo_sampai}} <br>
                            </div>
                            @endif
                            <small class="text-muted ">{{$d->keterangan}}</small> <br>
                            @if(!empty($d->doc_sid))

                            <a target="_blank" href="{{asset('storage/uploads/sid/'.$d->doc_sid)}}" id="kakul" style="color: blue;"><ion-icon name="attach-outline"></ion-icon>Lihat SID</a>
                            @endif

                        </div>
                        <div class="status">
                            @if ($d->status_approved == 0)
                                <span class="badge bg-warning">Pending</span>
                                @elseif ($d->status_approved == 1)
                                <span class="badge bg-success">Disetujui</span>
                                @elseif ($d->status_approved == 2)
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        </div>
    </div>
</div>


<div class="fab-button animate bottom-right dropdown" style="margin-bottom:70px">
    <a href="#" class="fab bg-primary" data-toggle="dropdown">
        <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
    </a>
    <div class="dropdown-menu">
    <a class="dropdown-item bg-primary" href="/izinabsen">
        <ion-icon name="receipt-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon> <p class="text-primary">Izin Absen</p>
    </a>
    <a class="dropdown-item bg-primary" href="/izinsakit">
        <ion-icon name="medkit-outline" role="img" class="md hydrated" aria-label="videocam outline"></ion-icon> <p class="text-warning">Sakit</p>
    </a>
    <a class="dropdown-item bg-primary" href="/izindispen">
        <ion-icon name="newspaper-outline" role="img" class="md hydrated" aria-label="videocam outline"></ion-icon> <p class="text-success">Dispen</p>
    </a>
    </div>
</div>

<div class="modal fade action-sheet" id="actionSheetIconed" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aksi</h5>
            </div>
            <div class="modal-body" id="showact">

            </div>
        </div>
    </div>
</div>

<div class="modal fade dialogbox" id="deleteConfirm" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin Dihapus ?</h5>
            </div>
            <div class="modal-body">
                Data Pengajuan Izin Akan dihapus
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batalkan</a>
                    <a href="" class="btn btn-text-primary" id="hapuspengajuan">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('myscript')
    <script>
        $(function(){
            $(".card_izin").click(function(e){
                var kode_izin = $(this).attr("kode_izin");
                var status_approved = $(this).attr("status_approved");

                if(status_approved == 1)
                {
                    Swal.fire({
                            title: "Oops !!",
                            text: 'Pengajuan tidak dapat diperbaiki',
                            });
                    return false;
                }else{
                    $("#showact").load('/izin/'+kode_izin+'/showact');
                }
            });


            $("#frmdataizin").submit(function(){
                var bulan = $("#bulan").val();
                var tahun = $("#tahun").val();
                if(bulan =="" && tahun !==""){
                    Swal.fire({
                            title: "Oops !!",
                            text: 'Bulan  Harus Dipilih',
                            icon: "warning"
                            });
                    return false;
                }else if(bulan !=="" && tahun =="") {
                    Swal.fire({
                            title: "Oops !!",
                            text: 'Tahun Harus Dipilih',
                            icon: "warning"
                            });
                    return false;
                }
            });
        });
    </script>
@endpush
