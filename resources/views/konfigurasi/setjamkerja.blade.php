@extends('layouts.admin.tabler')
@section('header')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            SMA Negeri 1 Gianyar
          </div>
          <h2 class="page-title">
            SET JAM SEKOLAH
          </h2>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="page-body">
    <div class="container-xl">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if(Session::get('warning'))
                            <div class="alert alert-warning">
                                {{ Session::get('warning') }}
                            </div>
                            @endif
                                    </div>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>NISN</th>
                                        <td>:</td>
                                        <td>{{$karyawan->nik}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>:</td>
                                        <td>{{$karyawan->nama_lengkap}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 border">
                                        <form action="/konfigurasi/storesetjamkerja" method="POST">
                                            @csrf
                                            <input type="hidden" name="nik" value="{{$karyawan->nik}}">
                                            <table class="table">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Hari</th>
                                                        <th>Sekolah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Senin
                                                            <input type="hidden" name="hari[]" value="Senin">
                                                        </td>
                                                        <td>
                                                            <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                                <option value="" hidden>Pilih Jam Sekolah</option>
                                                                @foreach ($jamkerja as $d)
                                                                <option class="text-uppercase" value="{{$d->kode_jam_kerja}}">{{strtoupper($d->nama_jam_kerja)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Selasa
                                                            <input type="hidden" name="hari[]" value="Selasa">
                                                        </td>
                                                        <td>
                                                            <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                                <option value="" hidden>Pilih Jam Sekolah</option>
                                                                @foreach ($jamkerja as $d)
                                                                <option class="text-uppercase" value="{{$d->kode_jam_kerja}}">{{strtoupper($d->nama_jam_kerja)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rabu
                                                            <input type="hidden" name="hari[]" value="Rabu">
                                                        </td>
                                                        <td>
                                                            <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                                <option value="" hidden>Pilih Jam Sekolah</option>
                                                                @foreach ($jamkerja as $d)
                                                                <option class="text-uppercase" value="{{$d->kode_jam_kerja}}">{{strtoupper($d->nama_jam_kerja)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kamis
                                                            <input type="hidden" name="hari[]" value="Kamis">
                                                        </td>
                                                        <td>
                                                            <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                                <option value="" hidden>Pilih Jam Sekolah</option>
                                                                @foreach ($jamkerja as $d)
                                                                <option class="text-uppercase" value="{{$d->kode_jam_kerja}}">{{strtoupper($d->nama_jam_kerja)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumat
                                                            <input type="hidden" name="hari[]" value="Jumat">
                                                        </td>
                                                        <td>
                                                            <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                                <option value="" hidden>Pilih Jam Sekolah</option>
                                                                @foreach ($jamkerja as $d)
                                                                <option class="text-uppercase" value="{{$d->kode_jam_kerja}}">{{strtoupper($d->nama_jam_kerja)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sabtu
                                                            <input type="hidden" name="hari[]" value="Sabtu">
                                                        </td>
                                                        <td>
                                                            <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                                <option value="" hidden>Pilih Jam Sekolah</option>
                                                                @foreach ($jamkerja as $d)
                                                                <option class="text-uppercase" value="{{$d->kode_jam_kerja}}">{{strtoupper($d->nama_jam_kerja)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                    <div class="col-6 border">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">MASTER JAM SEKOLAH</th>
                                                </tr>
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Awal Masuk</th>
                                                    <th>Bel Masuk</th>
                                                    <th>Akhir Masuk</th>
                                                    <th>Bel Pulang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jamkerja as $d)
                                                <tr>
                                                    <th>{{$d->kode_jam_kerja}}</th>
                                                    <td>{{strtoupper($d->nama_jam_kerja)}}</td>
                                                    <td>{{$d->awal_jam_masuk}}</td>
                                                    <td>{{$d->jam_masuk}}</td>
                                                    <td>{{$d->akhir_jam_masuk}}</td>
                                                    <td>{{$d->jam_pulang}}</td>
                                                </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
</div>
@endsection
