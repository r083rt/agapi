<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('iofrm2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('iofrm2/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('iofrm2/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('iofrm2/css/iofrm-theme1.css')}}">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <!-- <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="{{asset('iofrm2/images/logo-light.svg')}}" alt="">
                </div>
            </a> -->
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                        @yield('content')
                    <!-- <div class="form-items">
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <div class="page-links">
                            <a href="login1.html" class="active">Login</a><a href="register1.html">Register</a>
                        </div>
                        <form>
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget1.html">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('iofrm2/js/jquery.min.js')}}"></script>
<script src="{{asset('iofrm2/js/popper.min.js')}}"></script>
<script src="{{asset('iofrm2/js/bootstrap.min.js')}}"></script>
<script src="{{asset('iofrm2/js/main.js')}}"></script>
</body>
</html>