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
            DASHBOARD
          </h2>
        </div>

      </div>
    </div>
  </div>
@endsection
@section('content')
@php
$tgl_indo = tgl_indo(date('Y-m-d'));
@endphp
<div class="page-body">
    <div class="container-xl">

        <div class="border p-2 rounded-2">
            <div class="row">
                <div class="col">
                    <h2>TOTAL BULAN {{strtoupper(date('m')*1)}}</h2>
                </div>
            </div>
            <div class="row justify-content-center mb-1">
                <div class="col-md-6 col-xl-4">
                    <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="text-white avatar" style="background-color:blue;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                              </span>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                {{$totalsiswa->totals}}
                              </div>
                              <div class="text-muted">
                                Jumlah Siswa
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="bg-info text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fingerprint" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" /><path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" /><path d="M12 11v2a14 14 0 0 0 2.5 8" /><path d="M8 15a18 18 0 0 0 1.8 6" /><path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" /></svg>
                              </span>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                {{$rekappresensi->jmlhadir == null ? 0 : $rekappresensi->jmlhadir}}
                              </div>
                              <div class="text-muted">
                                Siswa Hadir
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="bg-primary text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                              </span>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                {{$rekappresensi->jmlizin == null ? 0 : $rekappresensi->jmlizin}}
                              </div>
                              <div class="text-muted">
                                Siswa Izin
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="bg-warning text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-first-aid-kit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 8v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M4 8m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M10 14h4" /><path d="M12 12v4" /></svg>
                              </span>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                {{$rekappresensi->jmlsakit == null ? 0 : $rekappresensi->jmlsakit}}
                              </div>
                              <div class="text-muted">
                                Siswa Sakit
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="bg-success text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 4v3m-4 -3v6m8 -6v6" /><path d="M12 18.5l-3 1.5l.5 -3.5l-2 -2l3 -.5l1.5 -3l1.5 3l3 .5l-2 2l.5 3.5z" /></svg>
                              </span>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                {{$rekappresensi->jmldispen == null ? 0 : $rekappresensi->jmldispen}}
                              </div>
                              <div class="text-muted">
                                Siswa Dispen
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="bg-danger text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.926 13.15a9 9 0 1 0 -7.835 7.784" /><path d="M12 7v5l2 2" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
                              </span>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                {{$rekappresensi->jmlterlambat == null ? 0 : $rekappresensi->jmlterlambat}}
                              </div>
                              <div class="text-muted">
                                Siswa Terlambat
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
{{-- PERBULAN --}}

        {{-- ccccccccccccccc --}}
{{-- PERHARI --}}
<div class="border p-2 mt-5 rounded-2">
    <div class="row ">

        <div class="col">
            <h2>TOTAL HARI INI, {{strtoupper($tgl_indo)}}</h2>
        </div>
    </div>
    <div class="row justify-content-center mb-1">
        <div class="col-md-6 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="text-white avatar" style="background-color:blue;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$totalsiswa->totals}}
                      </div>
                      <div class="text-muted">
                        Jumlah Siswa
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-info text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fingerprint" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" /><path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" /><path d="M12 11v2a14 14 0 0 0 2.5 8" /><path d="M8 15a18 18 0 0 0 1.8 6" /><path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$rekappresensix->jmlhadir == null ? 0 : $rekappresensix->jmlhadir}}
                      </div>
                      <div class="text-muted">
                        Siswa Hadir
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$rekappresensix->jmlizin == null ? 0 : $rekappresensix->jmlizin}}
                      </div>
                      <div class="text-muted">
                        Siswa Izin
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-md-6 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-warning text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-first-aid-kit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 8v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M4 8m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M10 14h4" /><path d="M12 12v4" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$rekappresensix->jmlsakit == null ? 0 : $rekappresensix->jmlsakit}}
                      </div>
                      <div class="text-muted">
                        Siswa Sakit
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-success text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 4v3m-4 -3v6m8 -6v6" /><path d="M12 18.5l-3 1.5l.5 -3.5l-2 -2l3 -.5l1.5 -3l1.5 3l3 .5l-2 2l.5 3.5z" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$rekappresensix->jmldispen == null ? 0 : $rekappresensix->jmldispen}}
                      </div>
                      <div class="text-muted">
                        Siswa Dispen
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-danger text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.926 13.15a9 9 0 1 0 -7.835 7.784" /><path d="M12 7v5l2 2" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$rekappresensix->jmlterlambat == null ? 0 : $rekappresensix->jmlterlambat}}
                      </div>
                      <div class="text-muted">
                        Siswa Terlambat
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    {{-- xxxx --}}
</div>
@endsection
