<template>
    <div>
        <section class="bg-charcoal-gray wow fadeIn padding-15px-tb">
            <div class="container" id="app">
                <div class="row wow fadeInLeft">
                    <div class="col-md-12">
                        <div class="col-md-6 col-sm-8 col-xs-12 text-center center-col margin-80px-bottom  sm-margin-50px-bottom xs-margin-30px-bottom">
                            <span class="text-extra-large display-block alt-font text-white margin-10px-bottom font-weight-600">Админпанель</span>
                            <p class="width-70 sm-width-80 xs-width-100 center-col">Страница {{ page }}</p>
                        </div>
                        <div class="margin-15px-bottom">
                            <router-link :to="{ name: 'adminUsers' }" class="btn btn-deep-pink">Редактировать пользователей</router-link>
                        </div>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    export default {
        data: function () {
            return { }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
            page() {
                return this.$route.path.substr(1).toUpperCase().substr(0, 1) + this.$route.path.substr(2);
            }
        },
        methods: {

        },

    }
</script>