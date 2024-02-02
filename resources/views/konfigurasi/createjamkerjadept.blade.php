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
            SET JAM SEKOLAH PER KELAS
          </h2>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="page-body">
    <div class="container-xl">
        <form action="/konfigurasi/jamkerjadept/store" method="POST">
            @csrf
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select name="kode_cabang" id="kode_cabang" class="form-select" required>
                                                        <option value="">Pilih Cabang</option>
                                                        @foreach ($cabang as $d)
                                                            <option value="{{$d->kode_cabang}}">{{strtoupper($d->nama_cabang)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <select name="kode_dept" id="kode_dept" class="form-select" required>
                                                        <option value="">Pilih Kelas</option>
                                                        @foreach ($departemen as $d)
                                                            <option value="{{$d->kode_dept}}">{{strtoupper($d->nama_dept)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 border">
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
                                                    <tr>
                                                        <td>Minggu
                                                            <input type="hidden" name="hari[]" value="Minggu">
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
        </form>
    </div>
</div>
@endsection
