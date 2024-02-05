
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Admin - e-Absen Dosman</title>
    <!-- CSS files -->
    <link href="{{asset('tabler/dist/css/tabler.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{asset('tabler/dist/js/demo-theme.min.js?1684106062')}}"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="/" class="navbar-brand navbar-brand-autodark"><img src="{{asset('assets/img/logodosman1.png')}}" height="36" alt="">DOSMAN</a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Login Admin e-Absensi</h2>
                    @php
                    $messagewarning = Session::get('warning');
                    @endphp
                    @if (Session::get('warning'))
                    <div class="alert alert-danger">
                        {{$messagewarning}}
                    </div>
                    @endif
                  <form action="/prosesloginadmin" method="post" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" placeholder="your@email.com">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                        Password
                        {{-- <span class="form-label-description">
                          <a href="./forgot-password.html">I forgot password</a>
                        </span> --}}
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" class="form-control"  placeholder="Your password" name="password"  autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                      </label>
                    </div>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="hr-text p-3">I Putu Darma Putra</div>
              </div>

            </div>
          </div>


          <div class="col-lg d-none d-lg-block">
            <img src="{{asset('assets/img/logodosman1.png')}}" height="300" class="d-block mx-auto" alt="">
            <div class="col text-center mt-3"><span style="font-size: 2rem">SMA NEGERI 1 GIANYAR</span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{asset('tabler/dist/js/tabler.min.js?1684106062')}}" defer></script>
    <script src="{{asset('tabler/dist/js/demo.min.js?1684106062')}}" defer></script>
  </body>
</html>
