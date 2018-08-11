<template>
    <div>
        <section class="bg-white wow fadeIn padding-65px-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center center-col last-paragraph-no-margin margin-50px-bottom  sm-margin-50px-bottom xs-margin-30px-bottomm">
                        <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Подберите себе учителя из списка</span>
                    </div>
                    <aside class="col-md-3 col-sm-12 col-xs-12">
                        <div class="display-inline-block width-100 margin-25px-bottom xs-margin-25px-bottom">
                            <form>
                                <div class="position-relative">
                                    <input type="text"
                                           class="bg-transparent text-small no-margin border-color-extra-light-gray medium-input pull-left"
                                           placeholder="Учитель или предмет">
                                    <button type="submit"
                                            class="bg-transparent  btn position-absolute right-0 top-1"><i
                                            class="fas fa-search no-margin-left"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
                                <span>Предметы</span></div>
                            <ul class="list-style-6 margin-50px-bottom text-small">
                                <li><a href="#">#ЕГЭ математика (1 часть)</a><span>12</span></li>
                                <li><a href="#">#ЕГЭ математика (13-17)</a><span>05</span></li>
                                <li><a href="#">#ЕГЭ русский язык (сочинение)</a><span>08</span></li>
                                <li><a href="#">#ОГЭ математика</a><span>10</span></li>
                                <li><a href="#">и тд</a><span>06</span></li>
                            </ul>
                        </div>
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
                                <span>По тегам</span></div>
                            <div class="tag-cloud">
                                <a href="#">#ЕГЭ</a>
                                <a href="#">#ОГЭ</a>
                                <a href="#">#МАТЕМАТИКА</a>
                                <a href="#">#ПАРАМЕТР</a>
                                <a href="#">#СОЧИНЕНИЕ</a>
                                <a href="#">#БИОЛОГИЯ</a>
                                <a href="#">#ХИМИЯ</a>
                                <a href="#">#ФИЗИКА</a>
                                <a href="#">#АСТРОНОМИЯ</a>
                            </div>
                        </div>
                    </aside>
                    <transition name="fade">
                        <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar pull-right sm-margin-60px-bottom xs-margin-40px-bottom no-padding"
                              v-if="mounted">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="margin-20px-bottom">
                                        <!--<ul class="portfolio-grid work-3col hover-option4 gutter-medium">-->
                                            <!--&lt;!&ndash;<li class="grid-sizer"></li>&ndash;&gt;-->
                                            <!--<li class="grid-item fadeInUp" v-for="teacher in teachers">-->
                                                <!--<a :href="`/profile/${teacher.id}`">-->
                                                    <!--<figure>-->
                                                        <!--<div class="portfolio-img bg-extra-dark-gray"><img-->
                                                                <!--:src="teacher.promo_img"-->
                                                                <!--alt=""-->
                                                                <!--class="project-img-gallery"/>-->
                                                        <!--</div>-->
                                                        <!--<figcaption>-->
                                                            <!--<div class="portfolio-hover-main text-center">-->
                                                                <!--<div class="portfolio-hover-box vertical-align-middle">-->
                                                                    <!--<div class="portfolio-hover-content position-relative">-->
                                                                        <!--<i class="ti-zoom-in text-white fa-2x"></i>-->
                                                                        <!--<span class="display-block text-small alt-font text-uppercase text-light-gray">{{ teacher.promo_desc-->
                                                                            <!--}}</span>-->
                                                                    <!--</div>-->
                                                                <!--</div>-->
                                                            <!--</div>-->
                                                        <!--</figcaption>-->
                                                        <!--<span class="teacher_name">{{ teacher.name }}</span>-->
                                                    <!--</figure>-->
                                                <!--</a>-->
                                            <!--</li>-->
                                        <!--</ul>-->
                                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content margin-30px-bottom xs-margin-30px-bottom xs-text-center">
                                            <div class="blog-text border-all display-inline-block width-100 padding-30px-all xs-padding-20px-all no-padding-bottom">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="images/trushin.jpg" alt="" class="img margin-15px-bottom" style="width:100%">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="content">
                                                            <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font"><span>на сайте с</span> <span class="text-dark-blue">30 Января 2017</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="text-medium-gray">учитель</span> <span class="text-dark-blue">математики</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="text-orange">групповые занятия</span></div>
                                                            <p class="text-extra-dark-gray alt-font text-large font-weight-600 margin-15px-bottom display-block">190 ₽<small>/место</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="no-margin">Я готов отсосать вам хуй за несчастные 190 р, пожалуйста ну дайте уж их мне! Вы думаете мне что-то платят на этом ебучем webcrew? Да нихуя!!! Задержки по выплатам, это просто очередная финансовая пирамида, мавроди сука отдыхает! Да я любого в  <span class="label-success text-white">тру</span>ху порву</p>
                                                    </div>
                                                </div>
                                                <div class="equalize xs-equalize-auto author border-top border-color-extra-light-gray display-table width-100">
                                                    <div class="name col-md-4 col-sm-4 padding-15px-all" style="height: 60px;">
                                                        <div class="display-table text-center width-100 height-100">
                                                            <div class="display-table-cell vertical-align-middle">
                                                                <img src="images/avtar-04.jpg" alt="" class="border-radius-100 width-30px" data-no-retina="">
                                                                <span class="text-medium-gray text-extra-small alt-font padding-10px-left">Борис <span class="label-success text-white">Тру</span>шин</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name col-md-4 col-sm-4 border-lr padding-15px-all border-color-extra-light-gray xs-no-border" style="height: 60px;">
                                                        <div class="display-table text-center  width-100 height-100">
                                                            <div class="display-table-cell vertical-align-middle">
                                                                <a href="#" class="text-extra-small alt-font text-medium-gray text-uppercase margin-lr-auto display-table"><i class="far fa-heart margin-5px-right text-small"></i>5 like(s)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name col-md-4 col-sm-4 padding-15px-all" style="height: 60px;">
                                                        <div class="display-table text-center width-100 height-100">
                                                            <div class="display-table-cell vertical-align-middle">
                                                                <a href="#" class="text-extra-small alt-font text-medium-gray text-uppercase margin-lr-auto display-table"><i class="far fa-comment margin-5px-right text-small"></i>3 Comment(s)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content margin-30px-bottom xs-margin-30px-bottom xs-text-center">
                                            <div class="blog-text border-all display-inline-block width-100 padding-30px-all xs-padding-20px-all no-padding-bottom">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="images/trushin.jpg" alt="" class="img margin-15px-bottom" style="width:100%">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="content">
                                                            <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font"><span>на сайте с</span> <span class="text-dark-blue">30 Января 2017</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="text-medium-gray">учитель</span> <span class="text-dark-blue">математики</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="text-orange">групповые занятия</span></div>
                                                            <p class="text-extra-dark-gray alt-font text-large font-weight-600 margin-15px-bottom display-block">190 ₽<small>/место</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="no-margin">Я готов отсосать вам хуй за несчастные 190 р, пожалуйста ну дайте уж их мне! Вы думаете мне что-то платят на этом ебучем webcrew? Да нихуя!!! Задержки по выплатам, это просто очередная финансовая пирамида, мавроди сука отдыхает</p>
                                                    </div>
                                                </div>
                                                <div class="equalize xs-equalize-auto author border-top border-color-extra-light-gray display-table width-100">
                                                    <div class="name col-md-4 col-sm-4 padding-15px-all" style="height: 60px;">
                                                        <div class="display-table text-center width-100 height-100">
                                                            <div class="display-table-cell vertical-align-middle">
                                                                <img src="images/avtar-04.jpg" alt="" class="border-radius-100 width-30px" data-no-retina="">
                                                                <span class="text-medium-gray text-extra-small alt-font padding-10px-left">Борис Трушин</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name col-md-4 col-sm-4 border-lr padding-15px-all border-color-extra-light-gray xs-no-border" style="height: 60px;">
                                                        <div class="display-table text-center  width-100 height-100">
                                                            <div class="display-table-cell vertical-align-middle">
                                                                <a href="#" class="text-extra-small alt-font text-medium-gray text-uppercase margin-lr-auto display-table"><i class="far fa-heart margin-5px-right text-small"></i>5 like(s)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name col-md-4 col-sm-4 padding-15px-all" style="height: 60px;">
                                                        <div class="display-table text-center width-100 height-100">
                                                            <div class="display-table-cell vertical-align-middle">
                                                                <a href="#" class="text-extra-small alt-font text-medium-gray text-uppercase margin-lr-auto display-table"><i class="far fa-comment margin-5px-right text-small"></i>3 Comment(s)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <infinite-loading @infinite="append" spinner="waveDots"
                                                          ref="infiniteLoading">
                                    <span slot="no-more">
                                      Больше никого нет :(
                                    </span>
                                            <span slot="no-results">
                                      Больше никого нет :(
                                    </span>
                                        </infinite-loading>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-large btn-black" v-show="distance < 0"
                                            @click="manualLoad">
                            <span v-if="!busy">
                            Загрузить ещё
                            </span>
                                        <span v-if="busy">
                            ...
                            </span>
                                    </button>
                                </div>
                            </div>
                        </main>
                    </transition>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    import InfiniteLoading from 'vue-infinite-loading';
    import axios from 'axios'

    export default {
        components: {
            InfiniteLoading,
        },
        data() {
            return {
                teachers: [],
                busy: false,
                mounted: false,
                distance: -Infinity,
            }
        },
        methods: {
            update () {
                this.mounted = false;

                this.busy = true;
                axios.get('/home/getTeachers/0/9').then((response) => {
                    this.teachers = response.data.teachers;
                    this.busy = false;

                    this.mounted = true;
                });
            },
            append ($state) {
                this.busy = true;

                let url = `/home/getTeachers/${this.teachers.length}/3`;

                axios.get(url).then((response) => {
                    this.busy = false;
                    $state.loaded();

                    if (response.data.teachers.length) {
                        this.teachers = response.data.teachers.concat(this.teachers);
                    } else {
                        $state.complete();
                    }
                });
            },
            manualLoad(event) {
                event.target.blur();
                this.busy = true;

                this.distance = 100;
                this.$nextTick(() => {
                    this.$refs.infiniteLoading.attemptLoad();
                });
            },
        },
        created() {
            this.update();
        },
    }
</script>