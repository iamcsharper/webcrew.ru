<template>
    <div>
        <section class="bg-white padding-65px-tb">
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
                                           class="bg-transparent text-small no-margin border-color-gray medium-input pull-left"
                                           placeholder="Учитель или предмет">
                                    <button type="submit"
                                            class="bg-transparent  btn position-absolute right-0 top-1"><i
                                            class="fas fa-search no-margin-left"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                            <label for="sortable_field">Сортировка</label>
                            <select v-model="sort" id="sortable_field">
                                <option v-for="sortable in sortables" v-bind:value="sortable.value">
                                    {{ sortable.text }}

                                </option>
                            </select>
                            <button class="btn btn-primary" @click="ascDesc">
                                <transition name="fade">
                                    <span v-if="this.order==='asc'"><i class="fas fa-long-arrow-alt-up"></i> по возрастанию</span>
                                    <span v-else><i class="fas fa-long-arrow-alt-down"></i> по убыванию</span>
                                </transition>
                            </button>
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
                    <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar pull-right sm-margin-60px-bottom xs-margin-40px-bottom no-padding" style="min-height:300px">
                        <transition name="fade">
                            <div class="row" v-if="mounted">
                                <div class="col-md-12">
                                    <div class="margin-20px-bottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content margin-30px-bottom xs-margin-30px-bottom xs-text-center"
                                             v-for="educationalClass in classes">
                                            <div class="blog-text border-all display-inline-block width-100 padding-30px-all xs-padding-20px-all no-padding-bottom"
                                                 :class="{'subscribed-course': educationalClass.students_count}">
                                                <div class="course-header">
                                                    <h6 class="font-weight-600 text-extra-dark-gray">
                                                        {{ educationalClass.name }}</h6>
                                                </div>
                                                <div class="course-content">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="images/trushin.jpg" alt=""
                                                                 class="img margin-5px-bottom" style="width:100%">
                                                            <p class="text-dark-gray text-medium font-weight-600 margin-15px-bottom">
                                                                {{ educationalClass.teacher.name }}</p>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="content">
                                                                <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font">
                                                                    <span>на сайте с</span> <span
                                                                        class="text-dark-blue">{{ educationalClass.created_at | moment("Do MMMM YYYY")
                                                                    }}</span>
                                                                    &nbsp&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                                    <span class="text-medium-gray">спец.</span> <span
                                                                        class="text-dark-blue">математика</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                                    <span class="text-success"
                                                                          v-if="educationalClass.max_places>1">групповые занятия</span>
                                                                    <span class="text-light-orange"
                                                                          v-else>репетиторство</span>
                                                                </div>
                                                                <p class="text-extra-dark-gray alt-font text-large font-weight-600 no-margin-bottom display-block">
                                                                    {{ educationalClass.price }} ₽


                                                                    <small>/место</small>
                                                                </p>
                                                                <p class="text-extra-dark-gray alt-font text-medium font-weight-400 no-margin-bottom display-block"
                                                                   v-if="educationalClass.max_places > 1">
                                                                    Осталось свободных мест:
                                                                </p>
                                                                <p class="text-extra-dark-gray alt-font text-medium margin-15px-bottom font-weight-600"
                                                                   v-if="educationalClass.max_places > 1">
                                                                    {{ (educationalClass.max_places - educationalClass.students.length)
                                                                    }} / {{ educationalClass.max_places }}</p>
                                                                <p class="text-extra-dark-gray alt-font text-medium font-weight-400 margin-15px-bottom display-block"
                                                                   v-else>
                                                                    Репетитор свободен.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="no-margin">
                                                                {{educationalClass.teacher.promo_desc}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="equalize xs-equalize-auto author border-top border-color-extra-light-gray display-table width-100">
                                                        <div class="name col-md-4 col-sm-4 padding-15px-all"
                                                             style="height: 60px;">
                                                            <div class="display-table text-center width-100 height-100">
                                                                <div class="display-table-cell vertical-align-middle">
                                                                    <span class="text-medium-gray text-extra-small alt-font padding-10px-left"
                                                                          v-for="tag in educationalClass.tags">
                                                                       #{{ tag.name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="name col-md-4 col-sm-4 padding-15px-all border-color-extra-light-gray xs-no-border"
                                                             style="height: 60px;">
                                                            <div class="display-table text-center  width-100 height-100">
                                                                <div class="display-table-cell vertical-align-middle">
                                                                    <p class="text-extra-small alt-font text-medium-gray text-uppercase no-margin-tb margin-lr-auto display-table">
                                                                        рейтинг
                                                                        <i class="fas fa-star margin-5px-right text-small rating-on"
                                                                           v-for="index in educationalClass.rating"></i>
                                                                        <i class="far fa-star margin-5px-right text-small rating-off"
                                                                           v-for="index     in (5-educationalClass.rating)"></i>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="name col-md-4 col-sm-4 padding-15px-all"
                                                             style="height: 60px;">
                                                            <div class="display-table text-center width-100 height-100">
                                                                <div class="display-table-cell vertical-align-middle">
                                                                    <a class="text-extra-small alt-font text-medium-gray text-uppercase margin-lr-auto display-table"><i
                                                                            class="far fa-comment margin-5px-right text-small"></i>3 Comment(s)</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row margin-30px-bottom xs-margin-5px-bottom" v-if="['student', 'admin'].includes(role)">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-block btn-transparent-extra-medium-gray"
                                                                    v-if="educationalClass.students_count">
                                                                расписание

                                                            </button>
                                                            <button class="btn btn-block btn-transparent-medium-gray"
                                                                    v-if="!educationalClass.students_count"
                                                                    @click="showSubscribe(educationalClass)">
                                                                подписаться

                                                            </button>
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
                        </transition>
					
                    </main>
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
    import subscribeModal from '../components/SubscribeModal';
    import pageLoader from '../components/Pageloader';
    import successModal from '../components/SuccessModal';

    export default {
        components: {
            InfiniteLoading,
            pageLoader,
        },
        data() {
            return {
               // classes: [],
                busy: false,
                mounted: false,
                distance: -Infinity,
                sort: 'rating',
                order: 'desc',
                sortables: [
                    {value: 'rating', text: 'Рейтинг'},
                    {value: 'created_at', text: 'Дата создания'},
                    {value: 'price', text: 'Цена'},
                    {value: 'max_places', text: 'Кол-во мест'},
                ]
            }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
            role() {
                return this.$store.getters.role;
            },
            classes() {
                return this.$store.state.getClassesData;
            }
        },
        watch: {
            sort: function () {
                this.update();
            }
        },
        methods: {
            ascDesc(event) {
                event.target.blur();

                if (this.order === 'desc')
                    this.order = 'asc';
                else
                    this.order = 'desc';

                this.update();
            },
            showSubscribe(course) {
                const $body = $('html');

                this.$modal.show(subscribeModal, {
                    course,
                    onYes: (event, close) => {
                        event.target.blur();

                        close();

                        this.$modal.show(successModal, {
                            message: 'Вы успешно приобрели курс<br><b>"' + course.name + '"</b>',
                            button: 'к расписанию',
                            then: (event, close) => {
                                close();
                            }
                        }, null, {
                            'before-open': () => $body.toggleClass('modal-open'),
                            'closed': () => $body.toggleClass('modal-open')
                        });
                    },
                    onNo: (event, close) => {
                        event.target.blur();

                        close();
                    }
                }, null, {
                    'before-open': () => $body.toggleClass('modal-open'),
                    'closed': () => $body.toggleClass('modal-open')
                });
            },
            update () {
                this.mounted = false;
                this.busy = true;

                this.$store.dispatch('getClasses', {
                    query: {
                        skip: 0,
                        limit: 2,
                        sort: this.sort,
                        order: this.order,
                    },
                })
                    .then(() => {
                        this.busy = false;
                        this.mounted = true;
                    });
            },
            append ($state) {
                this.busy = true;

                this.$store.dispatch('getClasses', {
                    query: {
                        skip: this.classes.length,
                        take: 3,
                        sort: this.sort,
                        order: this.order,
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
                this.busy = true;

                this.distance = 100;
                this.$nextTick(() => {
                    this.$refs.infiniteLoading.attemptLoad();
                });
            },
        },
        mounted() {
			this.update();
        },
    }
</script>