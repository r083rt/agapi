<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register21.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 05:14:11 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/iofrm-theme21.css') }}">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    {{-- <img class="logo-size" src="{{ asset('iofrm/images/logo-light.svg') }}" alt=""> --}}
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('iofrm/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Verifikasi Alamat email Anda</h3>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Link Verifikasi sudah dikirimkan ke email anda.
                            </div>
                        @endif

                        Sebelum melanjutkan, tolong periksa verifikasi email Anda
                        Jika tidak mendapatkan email, <a href="{{ route('verification.resend') }}">minta kembali request aktivasi</a>
                        atau <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">tekan disini untuk logout.</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('iofrm/js/jquery.min.js') }}"></script>
<script src="{{ asset('iofrm/js/popper.min.js') }}"></script>
<script src="{{ asset('iofrm/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('iofrm/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register21.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 05:14:11 GMT -->
</html>
