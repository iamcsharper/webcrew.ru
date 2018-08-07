@extends('layouts.app')

@section('content')
    <section class="bg-white wow fadeIn padding-65px-tb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col last-paragraph-no-margin margin-50px-bottom  sm-margin-50px-bottom xs-margin-30px-bottomm">
                    <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Подберите себе учителя из списка</span>
                </div>
                <div class="col-md-12" id="app">
                    <teacher-table></teacher-table>
                </div>
            </div>
        </div>
    </section>
    @role('student')
    <section class="bg-charcoal-gray wow fadeIn padding-65px-tb">
        <div class="container">
            <div class="row wow fadeInLeft">
                <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col margin-80px-bottom  sm-margin-50px-bottom xs-margin-30px-bottom">
                    <span class="text-extra-large display-block alt-font text-white margin-10px-bottom font-weight-600">Посмотрите демонстрационный стрим</span>
                    <p class="width-70 sm-width-80 xs-width-100 center-col">В этом блоке вы будете видеть наши
                        регулярные стримы</p>
                </div>

                <div class="col-md-12">
                    <div id="app">
                        <video-stream
                                url="http://localhost:8000/live/test2.flv?uid={{ auth()->id() }}&token={{ auth()->user()->getRememberToken() }}"
                                poster="http://static.smartisanos.cn/pr/img/video/video_03_cc87ce5bdb.jpg"></video-stream>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endrole
@endsection

@section('libs')
    <script src="https://cdn.bootcss.com/flv.js/1.4.0/flv.min.js"></script>
@endsection
