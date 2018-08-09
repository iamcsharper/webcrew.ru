<template>
    <div>
        <section class="bg-white wow fadeIn padding-65px-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col last-paragraph-no-margin margin-50px-bottom  sm-margin-50px-bottom xs-margin-30px-bottomm">
                        <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Подберите себе учителя из списка</span>
                    </div>
                    <div class="col-md-12">
                        <aside class="col-md-3 col-sm-12 col-xs-12">
                            <div class="display-inline-block width-100 margin-25px-bottom xs-margin-25px-bottom">
                                <form>
                                    <div class="position-relative">
                                        <input type="text"
                                               class="bg-transparent text-small no-margin border-color-extra-light-gray medium-input pull-left"
                                               placeholder="Имя учителя">
                                        <button type="submit"
                                                class="bg-transparent  btn position-absolute right-0 top-1"><i
                                                class="fas fa-search no-margin-left"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="margin-45px-bottom xs-margin-25px-bottom">
                                <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
                                    <span>Categories</span></div>
                                <ul class="list-style-6 margin-50px-bottom text-small">
                                    <li><a href="#">Arts and Entertainment</a><span>12</span></li>
                                    <li><a href="#">Blog</a><span>05</span></li>
                                    <li><a href="#">Blog Full width</a><span>08</span></li>
                                    <li><a href="#">Blog Grid</a><span>10</span></li>
                                    <li><a href="#">Branding</a><span>21</span></li>
                                    <li><a href="#">Design Tutorials</a><span>09</span></li>
                                    <li><a href="#">Designing</a><span>07</span></li>
                                    <li><a href="#">Feature</a><span>06</span></li>
                                    <li><a href="#">Home Blog</a><span>10</span></li>
                                    <li><a href="#">Onepage Fashion</a><span>11</span></li>
                                    <li><a href="#">Sample</a><span>06</span></li>
                                </ul>
                            </div>
                            <div class="margin-45px-bottom xs-margin-25px-bottom">
                                <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
                                    <span>tags cloud</span></div>
                                <div class="tag-cloud">
                                    <a href="#">ADVERTISEMENT</a>
                                    <a href="#">ARTISTRY</a>
                                    <a href="#">BLOG</a>
                                    <a href="#">CONCEPTUAL</a>
                                    <a href="#">DESIGN</a>
                                    <a href="#">FASHION</a>
                                    <a href="#">INSPIRATION</a>
                                    <a href="#">SMART</a>
                                    <a href="#">QUOTES</a>
                                    <a href="#">UNIQUE</a>
                                    <a href="#">CONCEPTS</a>
                                </div>
                            </div>
                        </aside>
                        <transition name="fade">
                            <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar pull-right sm-margin-60px-bottom xs-margin-40px-bottom no-padding"
                                  v-if="mounted">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="clearfix margin-20px-bottom">
                                            <ul class="portfolio-grid work-3col hover-option4 gutter-medium">
                                                <!--<li class="grid-sizer"></li>-->
                                                <li class="grid-item fadeInUp" v-for="teacher in teachers">
                                                    <a :href="`/profile/${teacher.id}`">
                                                        <figure>
                                                            <div class="portfolio-img bg-extra-dark-gray"><img
                                                                    :src="teacher.promo_img"
                                                                    alt=""
                                                                    class="project-img-gallery"/>
                                                            </div>
                                                            <figcaption>
                                                                <div class="portfolio-hover-main text-center">
                                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                                        <div class="portfolio-hover-content position-relative">
                                                                            <i class="ti-zoom-in text-white fa-2x"></i>
                                                                            <span class="display-block text-small alt-font text-uppercase text-light-gray">{{ teacher.promo_desc
                                                                                }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </figcaption>
                                                            <span class="teacher_name">{{ teacher.name }}</span>
                                                        </figure>
                                                    </a>
                                                </li>
                                                <infinite-loading @infinite="append" spinner="waveDots"
                                                                  ref="infiniteLoading">
                                    <span slot="no-more">
                                      Больше никого нет :(
                                    </span>
                                                    <span slot="no-results">
                                      Больше никого нет :(
                                    </span>
                                                </infinite-loading>
                                            </ul>
                                        </div>


                                        <router-link
                                                :to="{ name: 'profile' }"
                                                class="btn btn-block btn-danger">
                                            Мой профиль
                                        </router-link>
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