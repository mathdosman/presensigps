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
            KONFIGURASI LOKASI
          </h2>
        </div>

      </div>
    </div>
  </div>

@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="col-6">
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
            <div class="card">
                <div class="card-body">
                    <div class="row">

                    <form action="/konfigurasi/updatelokasikantor" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0" /><path d="M12 2l0 2" /><path d="M12 20l0 2" /><path d="M20 12l2 0" /><path d="M2 12l2 0" /></svg>
                                </span>
                                <input type="text" value="{{$lok_kantor->lokasi_kantor}}" class="form-control" name="lokasi_kantor" id="lokasi_kantor" placeholder="Lokasi Sekolah">
                              </div>
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-dot" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /></svg>
                                </span>
                                <input type="text" value="{{$lok_kantor->radius}}" class="form-control" name="radius" id="radius" placeholder="Radius">
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                                        Simpan</button>
                                </div>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>

@endsection
