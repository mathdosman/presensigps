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
            DATA SISWA
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
                    <div class="container mt-3 ms-2">
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahkaryawan">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /><path d="M15 12h-6" /><path d="M12 9v6" /></svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col">
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
                        <form action="/karyawan" method="get">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <input type="text" value="{{Request('nama_karyawan')}}" class="form-control form-control-rounded" placeholder="Nama Siswa" name="nama_karyawan" id="nama_karyawan">
                                            <span class="input-icon-addon">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                                            </span>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name="kode_dept" id="kode_dept" class="form-select">
                                            <option value="" hidden>--Kelas--</option>
                                            @foreach ($departemen as $d)
                                                <option {{Request('kode_dept')==$d->kode_dept ? 'selected' : ''}} value="{{$d->kode_dept}}">{{$d->nama_dept}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                            Search
                                        </button>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <a href="/karyawan" class="btn btn-secondary flex">Reset</a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive mt-3">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>No. Hp</th>
                                        <th>Foto</th>
                                        <th>Kelas</th>
                                        <th>Cabang</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $d)
                                    @php
                                        $path = Storage::url('uploads/karyawan/'.$d->foto);
                                    @endphp
                                        <tr class="text-center">
                                            <td>{{$loop->iteration + $karyawan->firstItem() -1}}</td>
                                            <td>{{$d->nik}}</td>
                                            <td class="text-start !important">{{$d->nama_lengkap}}</td>
                                            <td>{{$d->jabatan}}</td>
                                            <td>{{$d->no_hp}}</td>
                                            <td>
                                                @if ($d->foto == null)
                                                    <img src="{{asset('assets/img/no_foto1.jpg')}}" class="avatar" alt="foto-x">
                                                    @else
                                                    <img src="{{url($path)}}" class="avatar" alt="foto">
                                                @endif
                                            </td>
                                            <td>{{$d->nama_dept}}</td>
                                            <td>{{strtoupper($d->kode_cabang)}}</td>
                                            <td class="text-center">
                                                    <div class="dropdown">
                                                      <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                                      <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a href="#" class="edit dropdown-item" nik="{{$d->nik}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
                                                            Edit
                                                        </a>
                                                        <a href="/konfigurasi/{{$d->nik}}/setjamkerja" class="dropdown-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                                                            Setting
                                                        </a>
                                                        <a href="/karyawan/{{Crypt::encrypt($d->nik)}}/resetpassword" class="dropdown-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                                                            Reset Password
                                                        </a>
                                                        <form action="/karyawan/{{$d->nik}}/delete" method="POST">
                                                            @csrf
                                                            <a class="delete-confirm dropdown-item">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                </svg> Delete
                                                            </a>
                                                            </form>
                                                      </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$karyawan->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Siswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="text" value="" class="form-control" name="nik" id="nik" maxlength="10" placeholder="NISN">
                      </div>
                </div>
                <div class="row">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="text" value="" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Siswa">
                      </div>
                </div>

                <div class="row">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="text" value="" class="form-control" name="no_hp" id="no_hp" placeholder="No. Hp">
                      </div>
                </div>

                <div class="row">
                    <div class="input-icon mb-3">
                        <select name="jabatan" id="jabatan" class="form-select">
                            <option value="" hidden>Status</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Guru">Guru</option>
                        </select>
                      </div>
                </div>
                <div class="row">
                    <div class="input-icon mb-3">
                        <select name="kode_dept" id="kode_dept" class="form-select">
                            <option value="" hidden>Kelas</option>
                            @foreach ($departemen as $d)
                            <option value="{{ $d->kode_dept }}" >{{strtoupper($d->nama_dept)}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class="row">
                    <div class="input-icon mb-3">
                        <select name="kode_cabang" id="kode_cabang" class="form-select">
                            <option value="" hidden>Cabang</option>
                            @foreach ($cabang as $d)
                            <option value="{{ $d->kode_cabang }}" >{{strtoupper($d->nama_cabang)}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>

                <div class="mb-3">
                <div class="form-label">Tambahkan Foto Profil</div>
                <input type="file" class="form-control" name="foto" id="foto">
                </div>

                <div class="modal-footer form-group">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="" class="btn btn-primary" >Save changes</button>
                </div>
            </form>
        </div>


      </div>
    </div>
  </div>

  {{-- MODAL EDIT --}}
  <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Siswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">

        </div>
      </div>
    </div>
  </div>
@endsection

@push('myscript')
    <script>
        $(function(){
            $("#nik").mask('0000000000');
            $("#no_hp").mask('0000000000000');


            $("#btnTambahkaryawan").click(function(){
                $("#modal-inputkaryawan").modal("show");
            });

            $(".edit").click(function(){
                var nik = $(this).attr('nik');
                $.ajax({
                    type: 'POST',
                    url: '/karyawan/edit',
                    cache: false,
                    data:{
                        _token: "{{ csrf_token();}}",
                        nik: nik
                    },
                    success:function(respond){
                        $("#loadeditform").html(respond);
                    }
                });
                $("#modal-editkaryawan").modal("show");
            });

            $(".delete-confirm").click(function(e){
                var form = $(this).closest('form');
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
                    form.submit();
                    Swal.fire({
                    title: "Terhapus!",
                    text: "Data telah terhapus.",
                    icon: "success"
                    });
                }
                });
            });

            $("#frmKaryawan").submit(function(){
                var nik = $("#nik").val();
                var nama_lengkap = $("#nama_lengkap").val();
                var no_hp = $("#no_hp").val();
                var jabatan = $("#jabatan").val();
                var kode_dept = $("frmKaryawan").find("#kode_dept").val();
                if(nik==""){
                    Swal.fire({
                    icon: "warning",
                    title: "NISN harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(nama_lengkap ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Nama Siswa harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }
                if(no_hp ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "No Hp harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(jabatan ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Status harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(kode_dept ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Kelas harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

            });
        });
    </script>
@endpush
