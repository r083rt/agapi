<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/iofrm-theme21.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
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
                <div class="form-content" id="app">
                    <div class="form-items">
                        <h3>Daftar Kartu Tanda Anggota</h3>
                        <p>Daftarkan diri anda untuk mendapatkan fitur-fitur guru</p>
                        <form method="POST" action="{{ route('register') }}" id="loginform" ref="loginform" @submit="onSubmit">
                            @csrf
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Ulangi Password" required>
                            <div class="form-button">
                                <v-btn :loading="loading" :disabled="loading" id="submit" type="submit" class="ibtn">Daftar</v-btn>
                            </div>
                        </form>
                        <div class="page-links">
                            <a href="{{ route('login') }}">Masuk ke Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('iofrm/js/jquery.min.js') }}"></script>
<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script src="{{ asset('iofrm/js/popper.min.js') }}"></script>
<script src="{{ asset('iofrm/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('iofrm/js/main.js') }}"></script>
<script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                loading: false
            },
            mounted(){

            },
            methods:{
                onSubmit: function(){
                    this.loading = true
                }
            }
        })
    </script>
</body>

</html>
