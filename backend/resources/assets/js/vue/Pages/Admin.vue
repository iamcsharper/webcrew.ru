<template>
    <div>
        <section class="bg-white padding-65px-tb" style="min-height: 900px">
            <div class="container tab-style2">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center center-col last-paragraph-no-margin margin-50px-bottom  sm-margin-50px-bottom xs-margin-30px-bottomm">
                        <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Админпанель</span>
                        <p class="width-70 sm-width-80 xs-width-100 center-col">Страница {{ page }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs alt-font text-uppercase text-small display-inherit text-center font-weight-600">
                            <li class=""><router-link :to="{ name: 'adminUsers' }">Редактировать пользователей</router-link></li>
                            <li class=""><router-link :to="{ name: 'adminStats' }">Статистика</router-link></li>
                            <li class=""><router-link :to="{ name: 'adminUsers' }">блабла</router-link></li>
                            <li class=""><router-link :to="{ name: 'adminUsers' }">бла</router-link></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <transition name="bounce">
                            <router-view></router-view>
                        </transition>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
            page() {
                return this.$route.path.substr(1).toUpperCase().substr(0, 1) + this.$route.path.substr(2);
            }
        },
        methods: {},
        mounted() {
            if (this.$route.path === '/admin') {
                this.$router.push({
                    name: 'adminUsers',
                });
            }
        }
    }
</script>