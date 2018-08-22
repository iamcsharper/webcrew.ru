<template>
    <div>
        <section class="bg-white padding-65px-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center center-col last-paragraph-no-margin margin-50px-bottom  sm-margin-50px-bottom xs-margin-30px-bottomm">
                        <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Редактируйте курсы</span>
                    </div>
                    <transition name="fade">
                        <main class="col-md-12 col-sm-12 col-xs-12 left-sidebar pull-right sm-margin-60px-bottom xs-margin-40px-bottom"
                              v-if="mounted">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="margin-20px-bottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content margin-30px-bottom xs-margin-30px-bottom xs-text-center" v-for="educationalClass in classes">
                                            <div class="blog-text border-all display-inline-block width-100 padding-30px-all padding-20px-tb xs-padding-20px-tb xs-padding-20px-all">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row equalize text-left">
                                                            <h6 class="col-md-6 col-sm-12 font-weight-600 text-extra-dark-gray no-margin">
                                                                {{ educationalClass.name }}</h6>
                                                            <p class="col-md-6 col-sm-12  text-medium-gray no-margin line-height-200 sm-text-left lg-text-right">
                                                                <span>{{ educationalClass.price }} ₽<small>/место</small></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span
                                                                    class="text-success"
                                                                    v-if="educationalClass.max_places>1">групповые занятия</span><span
                                                                    class="text-light-orange"
                                                                    v-else>репетиторство</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <infinite-loading @infinite="append" spinner="waveDots"
                                                          ref="infiniteLoading">
                                            <span slot="no-more">Это все курсы. Хотите создать новый?</span>
                                            <span slot="no-results">Это все курсы. Хотите создать новый?</span>
                                        </infinite-loading>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-large btn-black" v-show="distance < 0"
                                            @click="manualLoad">
                            <span v-if="!busy">
                            Загрузить ещё
                            </span>
                                        <span v-if="busy">Загрузка...</span>
                                    </button>
                                </div>
                            </div>
                        </main>
                    </transition>
                </div>
            </div>
        </section>
        <transition name="fade">
            <page-loader v-if="!mounted"></page-loader>
        </transition>
    </div>
</template>
<script>
    import InfiniteLoading from 'vue-infinite-loading'
    import pageLoader from '../components/Pageloader'

    export default {
        components: {
            InfiniteLoading, pageLoader
        },
        data() {
            return {
                busy: false,
                mounted: false,
                distance: -Infinity,
            }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
            classes() {
                return this.$store.state.getClassesData;
            }
        },
        methods: {
            update () {
                this.mounted = false;
                this.busy = true;

                this.$store.dispatch('getMyJobClasses', {
                    query: {
                        skip: 0,
                        limit: 2,
                    },
                })
                    .then(() => {
                        this.busy = false;
                        this.mounted = true;
                    });
            },
            append ($state) {
                this.busy = true;

                this.$store.dispatch('getMyJobClasses', {
                    query: {
                        skip: this.classes.length,
                        take: 3,
                    },
                    concat: true,
                })
                    .then((classes) => {
                        this.busy = false;

                        $state.loaded();

                        if (!classes.length) {
                            $state.complete();
                        }
                    });
            },
            manualLoad(event) {
                event.target.blur();

                this.distance = 100;
                this.$nextTick(() => {
                    this.$refs.infiniteLoading.attemptLoad();
                });

                setTimeout(() => {
                    this.busy = false;
                }, 2000);
            },
        },
        mounted() {
            this.update();
        },
    }
</script>