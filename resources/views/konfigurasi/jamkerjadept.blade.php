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
            <div class="col-8">
                <div class="card">
                    <div class="container mt-3 ms-2">
                        <div class="row">
                            <div class="col-10">
                                <a href="/konfigurasi/jamkerjadept/create" class="btn btn-primary" id="btnjamkerja">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /><path d="M15 12h-6" /><path d="M12 9v6" /></svg>
                                    Tambah Data
                                </a>
                            </div>
                            <div class="col-1 text-end">
                                <a href="/konfigurasi/jamkerjadept" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-8">
                            @php
                                $messagesuccess=Session::get('success');
                                $messageerror=Session::get('warning');
                            @endphp
                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{$messagesuccess}}
                                </div>
                            @endif
                            @if(Session::get('warning'))
                                <div class="alert alert-danger">
                                    {{$messageerror}}
                                </div>
                            @endif
                        </div>

                        </div>
                                <div class="table-bordered">
                                    <table class="table card-table table-vcenter table-hover text-nowrap datatable">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Cabang</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($jamkerjadept as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{strtoupper($d->kode_jk_dept)}}</td>
                                                    <td>{{strtoupper($d->nama_cabang)}}</td>
                                                    <td>{{strtoupper($d->nama_dept)}}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                          <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                                          <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a href="/konfigurasi/jamkerjadept/{{$d->kode_jk_dept}}/edit" class="edit dropdown-item">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
                                                                Edit
                                                            </a>

                                                                <a href="/konfigurasi/jamkerjadept/{{$d->kode_jk_dept}}/delete" class="delete-confirm dropdown-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    </svg> Delete
                                                                </a>
                                                          </div>
                                                        </div>
                                                </td>
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

@endsection

@push('myscript')
    <script>
        $(function(){

            $(".delete-confirm").click(function(e){
                var url = $(this).attr('href');
                e.preventDefault();
                Swal.fire({
                title: "Anda yakin?",
                text: "Data akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus data!"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                    Swal.fire({
                    title: "Terhapus!",
                    text: "Data telah terhapus.",
                    icon: "success"
                    });
                }
                });
            });
        });
    </script>
@endpush
