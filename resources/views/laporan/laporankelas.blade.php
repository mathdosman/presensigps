@extends('layouts.presensi')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<!-- app header -->
<div class="appHeader text-light" style="background-color: #26a29a">
    <div class="left">
        <a href="javascript::" class="headerButton goBack">
        <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Laporan Kelas</div>
    <div class="right"></div>
</div>
<!-- appheader -->
@endsection

@section('content')
<div class="row" style="margin-top: 4rem">
    <div class="col">
        <form method="POST" action="/storelaporan" id="frmlaporan" >
            @csrf
            <div class="form-group border mt-3">
                <select name="jam_pelajaran" id="jam_pelajaran" class="form-control selectmaterialize">
                    <option value="" hidden>Jam Pelajaran</option>
                    <option value="1">ke-1</option>
                    <option value="2">ke-2</option>
                    <option value="3">ke-3</option>
                    <option value="4">ke-4</option>
                    <option value="5">ke-5</option>
                    <option value="6">ke-6</option>
                    <option value="7">ke-7</option>
                    <option value="8">ke-8</option>
                </select>
                <select name="mata_pelajaran" id="mata_pelajaran" class="form-control selectmaterialize">
                    <option value="">Mata Pelajaran</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Biologi">Biologi</option>
                </select>
                <select name="nama_guru" id="nama_guru" class="form-control selectmaterialize">
                    <option value="">Nama Guru</option>
                    <option value="I Putu Darma Putra, S.Pd">I Putu Darma Putra, S.Pd</option>
                    <option value="Ni Kadek Divya Widarma">Ni Kadek Divya Widarma</option>
                </select>
                <select name="status_kehadiran" id="status_kehadiran" class="form-control selectmaterialize">
                    <option value="" hidden>Status</option>
                    <option value="0">Hadir</option>
                    <option value="1">Tidak Hadir Dengan Tugas</option>
                    <option value="2">Tidak Hadir Tanpa Tugas</option>
                    <option value="3">Tidak Ada Keterangan</option>
                </select>
                <input type="text" id="keterangan_kelas" name="keterangan_kelas" class="form-control" placeholder="Catatan Singkat" autocomplete="off">
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
$(document).ready(function() {

    $("#frmlaporan").submit(function(){
        var jam_pelajaran = $("#jam_pelajaran").val();
        var mata_pelajaran = $("#mata_pelajaran").val();
        var nama_guru = $("#nama_guru").val();
        var status_kehadiran = $("#status_kehadiran").val();
        var keterangan_kelas = $("#keterangan_kelas").val();
        if(jam_pelajaran ==""){
            Swal.fire({
                    title: "Oops !!",
                    text: 'Jam Pelajaran Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }else if(mata_pelajaran=="") {
            Swal.fire({
                    title: "Oops !!",
                    text: 'Mata Pelajaran Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }else if(nama_guru=="") {
            Swal.fire({
                    title: "Oops !!",
                    text: 'Nama Guru Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }else if(status_kehadiran=="") {
            Swal.fire({
                    title: "Oops !!",
                    text: 'Status Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }else if(keterangan_kelas=="") {
            Swal.fire({
                    title: "Oops !!",
                    text: 'Catatan Singkat Harus Diisi',
                    icon: "warning"
                    });
            return false;
        }
    });
});


</script>
@endpush
