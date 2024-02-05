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
            MONITORING
          </h2>
        </div>

      </div>
    </div>
  </div>

@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
       <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                            </span>
                            <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" placeholder="Tanggal Presensi" value="{{date('Y-m-d')}}">
                          </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Jam Sekolah</th>
                                    <th>Jam Masuk</th>
                                    <th>Foto</th>
                                    <th>Jam Pulang</th>
                                    <th>Foto</th>
                                    <th>Keterangan <br> (jam:menit)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="loadpresensi" class="text-center justify-content-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
       </div>
    </div>
</div>
 {{-- MODAL EDIT --}}
 <div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lokasi Presensi User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadmaps">

        </div>
      </div>
    </div>
  </div>
@endsection
@push('myscript')
<script>
    $(function () {
    $("#tanggal").datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
    });


    function loadpresensi(){
            var tanggal = $("#tanggal").val();
            $.ajax({
                type:'POST',
                url:'/getpresensi',
                data:{
                    _token:"{{csrf_token()}}",
                    tanggal: tanggal
                },
                cache:false,
                success:function(respond){
                    $("#loadpresensi").html(respond);
                }
            });
        }

        $("#tanggal").change(function(e){
            loadpresensi();
        });

        loadpresensi();

    });


</script>
@endpush
