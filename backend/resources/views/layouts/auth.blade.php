<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- title -->
    <title>WebCrew</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="WebCrew">
    <!-- description -->
    <meta name="description" content="Лучшая вебинар-платформа для учителей и учеников">
    <!-- keywords -->
    <meta name="keywords"
          content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- animation -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <!-- et line icon -->
    <link rel="stylesheet" href="{{ asset('css/et-line-icons.css') }}"/>
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <!-- themify icon -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- swiper carousel -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <!-- justified gallery  -->
    <link rel="stylesheet" href="{{ asset('css/justified-gallery.min.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}"/>
    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css') }}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/navigation.css') }}">
    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('css/bootsnav.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"/>
    <!--[if IE]>
    <script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
</head>
<body>
<div id="app">
    <!-- start header -->
    <header>
        <!-- start navigation -->
        <nav class="navbar navbar-default bootsnav navbar-top white-link header-dark bg-transparent nav-box-width padding-four-lr">
            <div class="container nav-header-container"> <!-- container-fluid-->
                <div class="row">
                    <!-- start logo -->
                    <div class="col-lg-2 col-md-2 col-xs-5">
                        <a href="#home" title="WebCrew" class="logo"><img src="{{ asset('images/logo.png') }}"
                                                                          data-rjs="images/logo@2x.png"
                                                                          class="logo-dark"
                                                                          alt="Pofo"><img
                                    src="{{ asset('images/logo-white.png') }}" data-rjs="images/logo-white@2x.png"
                                    alt="Pofo" class="logo-light default"></a>
                    </div>
                    <!-- end logo -->
                    <div class="col-lg-8 col-md-8 col-xs-2 accordion-menu">
                        <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse"
                                data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse no-padding-right" id="navbar-collapse-toggle-1">
                            <ul class="nav navbar-nav navbar-right alt-font text-normal">
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                                @else
                                    <li class="dropdown simple-dropdown">
                                        <a href="javascript:void(0);" v-pre="">{{ Auth::user()->name }}</a>
                                        <i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown"
                                           aria-hidden="true"></i>
                                        <!-- start sub menu -->
                                        <ul class="dropdown-menu animated fadeInDown" role="menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">@csrf</form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endguest
                            </ul>
                        </div>
                    </div>
                    @if (!Route::has('login'))
                        <div class="col-lg-2 col-md-2 col-xs-5 sm-width-auto text-right sm-no-padding-left">
                            <a href="{{ route('register') }}"
                               class="btn btn-very-small btn-rounded btn-white box-shadow-dark">регистрация<i
                                        class="fas fa-user"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <!-- end navigation -->
    </header>
    <section class="wow fadeIn bg-extra-dark-gray mobile-height parallax md-position-relative no-padding"
             style="visibility: visible; animation-name: fadeIn; background: none 50% 50%,linear-gradient(rgba(14, 33, 61, 0.77),rgba(18,191,203,0.69)) 50% 50%,radial-gradient(circle at 55% 84%,#2d9cc5,#2f33a4);">
        <div class="opacity-medium bg-extra-dark-gray display-none md-display-block"></div>
        <div class="container position-relative full-screen">
            @yield('content')
        </div>
    </section>
    <!-- end footer -->
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
    <!-- end scroll to top  -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/skrollr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/smooth-scroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
    <!-- menu navigation -->
    <script type="text/javascript" src="{{ asset('js/bootsnav.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.nav.js') }}"></script>
    <!-- animation -->
    <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
    <!-- page scroll -->
    <script type="text/javascript" src="{{ asset('js/page-scroll.js') }}"></script>
    <!-- swiper carousel -->
    <script type="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
    <!-- counter -->
    <script type="text/javascript" src="{{ asset('js/jquery.count-to.js') }}"></script>
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('js/jquery.stellar.js') }}"></script>
    <!-- magnific popup -->
    <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- portfolio with shorting tab -->
    <script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- pull menu -->
    <script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hamburger-menu.js') }}"></script>
    <!-- counter  -->
    <script type="text/javascript" src="{{ asset('js/counter.js') }}"></script>
    <!-- fit video  -->
    <script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
    <!-- equalize -->
    <script type="text/javascript" src="{{ asset('js/equalize.min.js') }}"></script>
    <!-- skill bars  -->
    <script type="text/javascript" src="{{ asset('js/skill.bars.jquery.js') }}"></script>
    <!-- justified gallery  -->
    <script type="text/javascript" src="{{ asset('js/justified-gallery.min.js') }}"></script>
    <!--pie chart-->
    <script type="text/javascript" src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
    <!-- instagram -->
    <script type="text/javascript" src="{{ asset('js/instafeed.min.js') }}"></script>
    <!-- retina -->
    <script type="text/javascript" src="{{ asset('js/retina.min.js') }}"></script>
    <!-- revolution -->
    <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
@yield('libs')
<!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
    <!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
    <!-- setting -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @yield('extra-scripts')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => auth()->user(),
        ]) !!}
    </script>
</div>
</body>
</html>

