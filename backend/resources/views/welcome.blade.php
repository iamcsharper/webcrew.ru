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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
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
<!-- start header -->
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-default bootsnav navbar-top white-link header-dark bg-transparent nav-box-width padding-four-lr">
        <div class="container nav-header-container"> <!-- container-fluid-->
            <div class="row">
                <!-- start logo -->
                <div class="col-lg-2 col-md-2 col-xs-5">
                    <a href="#home" title="WebCrew" class="logo"><img src="{{ asset('images/logo.png') }}"
                                                                      data-rjs="images/logo@2x.png" class="logo-dark"
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
                        <ul class="nav navbar-nav navbar-center alt-font text-normal">
                            <!-- start menu item -->
                            <li class="active"><a href="#online" class="inner-link">Онлайн</a></li>
                            <!-- end menu item -->
                            <!-- start menu item -->
                            <li><a href="#webinar" class="inner-link">Вебинары</a></li>
                            <!-- end menu item -->
                            <!-- start menu item -->
                            <li><a href="#students" class="inner-link">Ученику</a></li>
                            <!-- end menu item -->
                            <!-- start menu item -->
                            <li><a href="#forTeachers" class="inner-link">Учителю</a></li>
                            <!-- end menu item -->
                            <!-- start menu item -->
                            <li><a href="#benefits" class="inner-link">Преимущества</a></li>
                            <!-- end menu item -->
                            @if (Route::has('login'))
                                @auth
                                <li><a href="{{ url('/home') }}"><i class="ti-arrow-up"></i> На сайт</a></li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
                @if (Route::has('login'))
                    @auth
                @else
                    <div class="col-lg-2 col-md-2 col-xs-5 sm-width-auto text-right sm-no-padding-left">
                        <a href="{{ route('register') }}"
                           class="btn btn-very-small btn-rounded btn-white box-shadow-dark">регистрация<i
                                    class="fas fa-user"></i></a>
                    </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
    <!-- end navigation -->
</header>
<!-- end header -->
<!-- start hero section -->
<section id="home" class="no-padding parallax full-height md-position-relative wow fadeIn"
         data-stellar-background-ratio="0.5"
         style="background-color:#000614;background-image:url('{{ asset('images/pofo-demo-parallax.jpg') }}');">
        <!-- <div class="opacity-medium bg-extra-dark-gray display-none md-display-block"></div>-->
    <div class="opacity-medium bg-black"></div>
    <div class="container position-relative full-screen">
        <div class="slider-typography">
            <div class="slider-text-middle-main xs-padding-15px-lr">
                <div class="slider-text-middle alt-font text-white">
                    <div class="col-md-6 col-sm-7 col-xs-12 padding-30px-right">
                        <div class="text-white-transparent margin-15px-bottom text-leftside-line text-medium-gray">Для
                            вас подобраны онлайн репетиторы, готовые курсы и вебинары – и всё это в одном месте.
                        </div>
                        <h1 class="font-weight-500 margin-40px-bottom demo-heading">Это ваша возможность обучаться<br>не
                            выходя из дома</h1>
                        <a class="btn btn-small btn-rounded btn-transparent-deep-pink inner-link" href="#online">узнать
                            подробнее<i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end info section -->
<!-- start webinar section-->
<section id="online" class="no-padding parallax full-height md-position-relative wow fadeIn"
         data-stellar-background-ratio="0"
         style="background-image:url('{{ asset('images/webinar-background.jpg') }}');">
    <div class="opacity-medium bg-black"></div>
    <div class="container position-relative full-screen">
        <div class="slider-typography">
            <div class="slider-text-middle-main xs-padding-15px-lr">
                <div class="slider-text-middle alt-font text-white">
                    <div class="col-md-6 col-col-sm-7 col-xs-12 padding-30px-right text-center">
                        <img src="{{ asset('images/pupil.png') }}" class="img-responsive"
                             style="max-width:20%;margin: 0 auto 15px;"/>
                    </div>
                    <div class="col-md-6 col-sm-7 col-xs-12 padding-30px-left">
                        <div class="text-white-transparent margin-15px-bottom text-leftside-line text-medium-gray">В
                            наши дни онлайн обучение практичнее посещения репетитора
                        </div>
                        <h1 class="font-weight-500 margin-15px-bottom demo-heading">Онлайн-обучение</h1>
                        <div class="text-white-transparent margin-40px-bottom text-light-gray">Подготовка к ЕГЭ, ОГЭ,
                            олимпиадам и любым экзаменам осуществляется в любом месте и в любое время.<br>Вы сможете
                            подобрать себе удобный график.
                        </div>
                        <a class="btn btn-small btn-rounded btn-deep-pink inner-link" href="#webinar">узнать подробнее<i
                                    class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end webinar section -->
<section id="webinar" class="half-section wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col last-paragraph-no-margin margin-30px-bottom">
                <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Узнайте, что такое вебинар</span>
                <p class="width-75 md-width-90 xs-width-100 center-col">Занятия проходят на нашем сайте в режиме
                    реального времени</p>
            </div>
            <div class="hidden-sm-down col-lg-12 text-center display-table sm-margin-50px-bottom xs-margin-30px-bottom center-col wow fadeIn"
                 style="visibility: visible; animation-name: fadeIn;">
                <div class="display-table-cell vertical-align-middle overflow-hidden position-relative">
                    <div class="opacity-medium bg-extra-dark-gray"></div>
                    <img src="{{ asset('images/trushin.jpg') }}" class="width-100" alt="" data-no-retina="">
                    <div class="absolute-middle-center text-center">
                        <span class="text-medium-gray text-extra-small letter-spacing-1 alt-font text-uppercase margin-20px-bottom display-block">посмотрите видео</span>
                        <h5 class="alt-font text-white width-70 sm-width-100 center-col">Как сегодня готовятся к
                            экзаменам</h5>
                        <div class="btn-group">
                            <a href="https://player.vimeo.com/video/75976293"
                               class="popup-vimeo btn btn-medium btn-deep-pink text-medium btn-rounded">смотреть
                                <i class="fab fa-youtube icon-very-small" aria-hidden="true"></i></a>
                            <a href="#benefits" class="inner-link btn btn-medium btn-transparent-deep-pink text-medium btn-rounded">далее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="parallax wow fadeIn hidden-md-up" data-stellar-background-ratio="0.1"
         style="background-image:url({{ asset('images/trushin.jpg') }});">
    <div class="opacity-medium bg-black"></div>
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-6 col-md-6 text-center center-col">
                <a href="https://player.vimeo.com/video/75976293" class="popup-vimeo"><img
                            src="{{ asset('images/icon-play.png') }}"
                            class="width-30" alt=""></a>
                <h5 class="alt-font text-white">Как сегодня готовятся к экзаменам</h5>
            </div>
        </div>
    </div>
</section>
<!-- end menu slider -->
<!-- start creative blog -->
<section id="students" class="bg-charcoal-gray wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col margin-80px-bottom  sm-margin-50px-bottom xs-margin-30px-bottom">
                <span class="text-extra-large display-block alt-font text-white margin-10px-bottom font-weight-600">Что хорошего в учебе на WebCrew?</span>
                <p class="width-70 sm-width-80 xs-width-100 center-col">Ознакомьтесь с возможностями</p>
            </div>
        </div>
    </div>
    <div class="containe-fluid padding-15px-lr">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center wow fadeIn">
                <img src="{{ asset('images/pofo-creativeblog-style.png') }}" alt=""/>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center margin-80px-top sm-margin-50px-top xs-margin-30px-top wow fadeIn">
                <a href="http://www.themezaa.com/html/pofo/home-blog-personal.html" target="_blank"
                   class="btn btn-large btn-rounded btn-deep-pink">Explore Blog Styles</a>
            </div>
        </div>
    </div>
</section>
<!-- end creative blog -->
<!-- start magic box section -->
<section id="forTeachers" class="parallax wow fadeIn no-padding" data-stellar-background-ratio="0"
         style="background-image: url({{ asset('images/online_teacher.jpg') }});">
    <div class="opacity-medium bg-black"></div>
    <div class="container position-relative full-screen">
        <div class="slider-typography">
            <div class="slider-text-middle-main xs-padding-15px-lr">
                <div class="slider-text-middle alt-font text-white">
                    <div class="col-md-6 col-sm-7 col-xs-12 padding-30px-right">
                        <div class="text-white-transparent margin-15px-bottom text-leftside-line text-light-gray">Стать
                            веб-репетитором очень просто.
                        </div>
                        <h1 class="font-weight-500 margin-40px-bottom demo-heading text-white">Все, что нужно <br>&mdash;
                            веб-камера</h1>
                        <a class="btn btn-small btn-rounded btn-transparent-deep-pink inner-link" href="#online">начать
                            зарабатывать<i class="ti-arrow-right"></i></a>
                    </div>
                    <div class="col-md-6 col-sm-7 col-xs-12 padding-30px-right">
                        <div class="text-white-transparent margin-15px-bottom margin-40px-top text-medium-gray">
                            Мы предоставляем собственное <br>записывающее программное обеспечение для комфорта и производительности
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end magic box section -->
<!-- start layout section -->
<section id="benefits" class="bg-charcoal-gray wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom">
                <span class="text-extra-large display-block alt-font text-white margin-10px-bottom">Преимущества работы с нами</span>
                <p class="width-65 sm-width-85 xs-width-100 center-col">Как для учеников, так и для учителей</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center no-padding">
                <div class="feature-box feature-box-17 equalize xs-equalize-auto">
                    <!-- start feature item -->
                    <div class="col-md-3 col-sm-6 col-xs-12 sm-margin-30px-bottom xs-margin-20px-bottom wow fadeInLeft last-paragraph-no-margin">
                        <div class="box bg-extra-dark-gray text-extra-dark-gray text-white-hover">
                            <div class="content">
                                <figure>
                                    <i class="ti-face-smile icon-extra-medium text-deep-pink margin-20px-bottom"></i>
                                    <span class="text-large text-capitalize alt-font display-block margin-10px-bottom text-white"> {{ ucfirst($registers) }} человек</span>
                                    <div class="details">
                                        <p class="width-65 sm-width-90 center-col text-white">Уже зарегистрировались и
                                            ждут тебя</p>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- end feature item -->
                    <!-- start feature item -->
                    <div class="col-md-3 col-sm-6 col-xs-12 sm-margin-30px-bottom xs-margin-20px-bottom wow fadeInLeft last-paragraph-no-margin">
                        <div class="box bg-extra-dark-gray text-extra-dark-gray text-white-hover">
                            <div class="content">
                                <figure>
                                    <i class="ti-control-shuffle icon-extra-medium text-deep-pink margin-20px-bottom"></i>
                                    <i class="ti-time icon-extra-medium text-deep-pink margin-20px-bottom"></i>
                                    <span class="text-large text-capitalize alt-font display-block margin-10px-bottom text-white">Гибкие графики</span>
                                    <div class="details">
                                        <p class="width-65 sm-width-90 center-col text-white">Работайте с кем угодно,
                                            смотрите кого интересно</p>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- end feature item -->
                    <!-- start feature item -->
                    <div class="col-md-3 col-sm-6 col-xs-12 xs-margin-20px-bottom wow fadeInLeft last-paragraph-no-margin">
                        <div class="box bg-extra-dark-gray text-extra-dark-gray text-white-hover">
                            <div class="content">
                                <figure>
                                    <i class="ti-gift icon-extra-medium text-deep-pink margin-20px-bottom"></i>
                                    <span class="text-large text-capitalize alt-font display-block margin-10px-bottom text-white">Регулярные акции</span>
                                    <div class="details">
                                        <p class="width-65 sm-width-90 center-col text-white">Для тех, кто жаждет знать
                                            больше</p>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- end feature item -->
                    <!-- start feature item -->
                    <div class="col-md-3 col-sm-6 col-xs-12 xs-margin-20px-bottom wow fadeInLeft last-paragraph-no-margin">
                        <div class="box bg-extra-dark-gray text-extra-dark-gray text-white-hover">
                            <div class="content">
                                <figure>
                                    <i class="ti-control-play icon-extra-medium text-deep-pink margin-20px-bottom"></i>
                                    <span class="text-large text-capitalize alt-font display-block margin-10px-bottom text-white">Удобное приложение</span>
                                    <div class="details">
                                        <p class="width-65 sm-width-90 center-col text-white">Чтобы вы всегда оставались
                                            на связи</p>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- end feature item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end layout section -->
<!-- start layout section -->
<section id="features" class="bg-light-gray wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col margin-60px-bottom sm-margin-30px-bottom">
                <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Посмотрите наши вебинары</span>
                <p class="width-75 sm-width-90 xs-width-100 center-col">Прямо сейчас, бесплатно и без регистрации</p>
            </div>
        </div>
    </div>
    <div class="containe-fluid">
        <div class="row">
            <div class="swiper-presentation black-move overflow-hidden xs-position-relative">
                <div class="swiper-wrapper">
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-01.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-01.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-02.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-02.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-03.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-03.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-04.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-04.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-05.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-05.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-06.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-06.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-07.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-07.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                    <!-- start slider item -->
                    <div class="swiper-slide col-md-4 col-sm-6 col-xs-12 padding-10px-all">
                        <a href="http://www.themezaa.com/html/pofo/single-project-page-08.html" target="_blank"><img
                                    src="{{ asset('images/pofo-portfolio-layout-img-08.jpg') }}"
                                    class="width-100 box-shadow-large" alt=""/></a>
                    </div>
                    <!-- end slider item -->
                </div>
                <div class="swiper-button-next swiper-button-black-highlight display-none xs-display-block"></div>
                <div class="swiper-button-prev swiper-button-black-highlight display-none xs-display-block"></div>
            </div>
        </div>
        <!--end .row-->
    </div>
    <!-- end .container-fluid -->
</section>
<!-- end layout section -->
<!-- start purchase section -->

<section class="bg-charcoal-gray wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 center-col display-table extra-small-screen text-center col-md-8 xs-padding-15px-lr">
                <div class="display-table-cell vertical-align-middle">
                    @guest
                    <h6 class="margin-20px-bottom font-weight-300">Вы на верном пути</h6>
                    <h2 class="text-white letter-spacing-minus-1 margin-45px-bottom xs-margin-25px-bottom alt-font font-weight-600">
                        Регистрируйтесь прямо сейчас</h2>
                    <a href="{{ route('register') }}"
                       class="btn btn-deep-pink btn-large btn-rounded">зарегистрироваться</a>
                    @else
                    <h6 class="margin-20px-bottom font-weight-300">Спасибо, что остаетесь с нами</h6>
					@endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end purchase section -->

<!-- start footer -->
<footer class="wow fadeIn">
    <div class="padding-50px-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row">
                <!-- start logo -->
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <a href="http://www.themezaa.com/" target="_blank"><img class="footer-logo"
                                                                            src="{{ asset('images/themezaa.png') }}"
                                                                            data-rjs="{{ asset('images/themezaa@2x.png') }}"
                                                                            alt="Pofo"></a>
                </div>
                <!-- end logo -->
            </div>
        </div>
    </div>
</footer>
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
</body>
</html>

