<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- Mirrored from lmpixels.com/demo/procard/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2019 07:43:17 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KTA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Sistem KTA Semarang" />
    <meta name="keywords" content="KTA,RPP,GURU,SEMARANG" />
    <meta name="author" content="cv ardata" />
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('procard/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('procard/css/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('procard/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('procard/css/transition-animations.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('procard/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('procard/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('procard/css/main-green.css') }}" type="text/css">

    <!-- This styles needs for demo -->
    <link rel="stylesheet" href="{{ asset('procard/preview/lmpixels-demo-panel.css') }}" type="text/css">
    <!-- /This styles needs for demo -->

    <script src="{{ asset('procard/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('procard/js/modernizr.custom.js') }}"></script>
  </head>

  <body class="material-template">

    <!-- Loading animation -->
    <div class="preloader">
      <div class="preloader-animation">
        <div class="preloader-spinner">
        </div>
      </div>
    </div>
    <!-- /Loading animation -->

    <div id="app">
      <div id="page" class="page">
      <!-- Header -->
      <header id="site_header" class="header mobile-menu-hide">
        <div class="header-content">
          <div class="site-title-block mobile-hidden">
            <div class="site-title">Sistem <span>KTA</span></div>
          </div>

          <!-- Navigation -->
          <div class="site-nav">
            <!-- Main menu -->
            <ul id="nav" class="site-main-menu">
              <li>
                <a class="pt-trigger" href="#home">Home</a><!-- href value = data-id without # of .pt-page. -->
              </li>
              <li>
                <a href="#discuss">Ruang Diskusi</a>
              </li>
              <li>
                <a href="#contribution">Papan Kontribution</a>
              </li>
              <li>
                <a href="#information">Papan Informasi</a>
              </li>

              <li>
                <a href="#event">Jadwal Acara</a>
              </li>
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
            <!-- /Main menu -->
          </div>
          <!-- Navigation -->
        </div>
      </header>
      <!-- /Header -->

      <!-- Mobile Header -->
      <div class="mobile-header mobile-visible">
        <div class="mobile-logo-container">
          <div class="mobile-site-title">Sistem KTA</div>
        </div>

        <a class="menu-toggle mobile-visible">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <!-- /Mobile Header -->
      <home-component></home-component>
      </div>
    </div>

    <footer>
      <div class="copyrights">© 2017 All rights reserved. Material template by LMPixels</div>
    </footer>

    <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
    <script type="text/javascript" src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/pages-switcher.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/validator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/jquery.shuffle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/jquery.hoverdir.js') }}"></script>
    <script type="text/javascript" src="{{ asset('procard/js/main.js') }}"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-6345030598186823",
        enable_page_level_ads: true
      });
    </script>

  </body>

<!-- Mirrored from lmpixels.com/demo/procard/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2019 07:44:02 GMT -->
</html>
