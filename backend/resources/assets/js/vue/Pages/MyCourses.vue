<template>
    <div>
        <section class="bg-white padding-65px-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center center-col last-paragraph-no-margin margin-50px-bottom  sm-margin-50px-bottom xs-margin-30px-bottomm">
                        <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Курсы, на которые вы подписаны</span>
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
                                                                <span>{{ educationalClass.price }} ₽</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span
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
                                            <span slot="no-more">Это все курсы.</span>
                                            <span slot="no-results">Это все курсы. </span>
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
    </div>
</template>
<script>
    import axios from 'axios'
    import InfiniteLoading from 'vue-infinite-loading'

    export default {
        components: {
            InfiniteLoading,
        },
        data() {
            return {
                classes: [],
                busy: false,
                mounted: false,
                distance: -Infinity,
            }
        },
        methods: {
            update () {
                this.mounted = false;

                this.busy = true;
                axios.get('/api/home.getMyClasses/0/9').then((response) => {
                    this.classes = response.data.classes;
                    this.busy = false;

                    this.mounted = true;
                });
            },
            append ($state) {
                this.busy = true;

                let url = `/api/home.getMyClasses/${this.classes.length}/3`;

                axios.get(url).then((response) => {
                    this.busy = false;
                    $state.loaded();

                    if (response.data.classes.length) {
                        this.classes = response.data.classes.concat(this.classes);
                    } else {
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
        created() {
            this.update();
        },
    }
</script>