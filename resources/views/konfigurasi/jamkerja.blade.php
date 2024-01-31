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
                    <div class="container mt-3 ms-2">
                        <div class="row">
                            <div class="col-11">
                                <a href="#" class="btn btn-primary" id="btnjamkerja">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /><path d="M15 12h-6" /><path d="M12 9v6" /></svg>
                                    Tambah Data
                                </a>
                            </div>
                            <div class="col-1 text-end">
                                <a href="/konfigurasi/jamkerja" class="btn btn-secondary">Reset</a>
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

                        </div>

                        <div class="table-responsive table-bordered mt-3">
                            <table class="table card-table table-vcenter table-hover text-nowrap datatable">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode JAM</th>
                                        <th>Nama JAM</th>
                                        <th>AWAL JAM MASUK</th>
                                        <th>JAM MASUK</th>
                                        <th>AKHIR JAM MASUK</th>
                                        <th>JAM PULANG</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($jam_kerja as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d->kode_jam_kerja}}</td>
                                            <td>{{$d->nama_jam_kerja}}</td>
                                            <td>{{$d->awal_jam_masuk}}</td>
                                            <td>{{$d->jam_masuk}}</td>
                                            <td>{{$d->akhir_jam_masuk}}</td>
                                            <td>{{$d->jam_pulang}}</td>
                                            <td class="text-center">
                                                <span class="dropdown">
                                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                                  <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a href="#" class="edit dropdown-item" kode_jam_kerja="{{$d->kode_jam_kerja}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
                                                        Edit
                                                    </a>
                                                    <form action="/konfigurasi/{{$d->kode_jam_kerja}}/delete" method="POST">
                                                        @csrf
                                                        <a class="delete-confirm dropdown-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash me-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg> Delete
                                                        </a>
                                                        </form>
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
</div>

<div class="modal modal-blur fade" id="modal-inputjamkerja" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">TAMBAH SET JAM SEKOLAH</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="/konfigurasi/storejamkerja" method="POST" id="frmJK">
                @csrf
                <div class="row">
                    <label>KODE JAM SEKOLAH</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="text" value="" class="form-control text-uppercase" name="kode_jam_kerja" id="kode_jam_kerja" placeholder="KODE JAM">
                      </div>
                </div>
                <div class="row">
                    <label>NAMA JAM SEKOLAH</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="text" value="" class="form-control text-uppercase" name="nama_jam_kerja" id="nama_jam_kerja" placeholder="NAMA JAM">
                      </div>
                </div>
                <div class="row">
                    <label>AWAL JAM MASUK</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="time" value="" class="form-control text-uppercase" name="awal_jam_masuk" id="awal_jam_masuk" placeholder="AWAL MASUK">
                      </div>
                </div>
                <div class="row">
                    <label>JAM MASUK SEKOLAH</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="time" value="" class="form-control text-uppercase" name="jam_masuk" id="jam_masuk" placeholder="JAM MASUK">
                      </div>
                </div>
                <div class="row">
                    <label>AKHIR JAM MASUK SEKOLAH</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="time" value="" class="form-control text-uppercase" name="akhir_jam_masuk" id="akhir_jam_masuk" placeholder="AKHIR JAM MASUK">
                      </div>
                </div>
                <div class="row">
                    <label>JAM PULANG SEKOLAH</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        <input type="time" value="" class="form-control text-uppercase" name="jam_pulang" id="jam_pulang" placeholder="JAM PULANG">
                      </div>
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
  <div class="modal modal-blur fade" id="modal-editjamkerja" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">EDIT JAM SEKOLAH</h5>
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
            $("#btnjamkerja").click(function(){
                $("#modal-inputjamkerja").modal("show");
            });

            $(".edit").click(function(){
                var kode_jam_kerja = $(this).attr('kode_jam_kerja');
                $.ajax({
                    type: 'POST',
                    url: '/konfigurasi/edit',
                    cache: false,
                    data:{
                        _token: "{{ csrf_token();}}",
                        kode_jam_kerja: kode_jam_kerja
                    },
                    success:function(respond){
                        $("#loadeditform").html(respond);
                    }
                });
                $("#modal-editjamkerja").modal("show");
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

            $("#frmJK").submit(function(){
                var kode_jam_kerja = $("#kode_jam_kerja").val();
                var nama_jam_kerja = $("#nama_jam_kerja").val();
                var awal_jam_masuk = $("#awal_jam_masuk").val();
                var jam_masuk = $("#jam_masuk").val();
                var akhir_jam_masuk = $("#akhir_jam_masuk").val();
                var jam_pulang = $("#jam_pulang").val();

                if(kode_jam_kerja ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Kode jam sekolah harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(nama_jam_kerja ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Nama jam sekolah harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(awal_jam_masuk ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Awal jam masuk sekolah harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(jam_masuk ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Jam masuk harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }
                if(akhir_jam_masuk ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Akhir jam masuk sekolah harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }
                if(jam_pulang ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Jam pulang harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

            });
        });
    </script>
@endpush


