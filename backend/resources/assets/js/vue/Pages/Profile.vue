<template>
    <div>
        <section class="bg-charcoal-gray wow fadeIn padding-65px-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6 col-sm-8 col-xs-12 center-col margin-80px-bottom  sm-margin-50px-bottom xs-margin-30px-bottom">
                            <div class="text-center">
                                <span class="text-extra-large display-block alt-font text-white margin-10px-bottom font-weight-600">Профиль</span>
                                <p class="width-70 sm-width-80 xs-width-100 center-col">
                                    Так сейчас выглядит ваш профиль, <b>{{ user.name }}</b></p>
                            </div>
                            <pre>
                                {{ user }}
                            </pre>

                            <router-link
                                    :to="{ name: 'home' }"
                                    class="btn btn-block btn-danger">
                                ← <span class="underline">Back</span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {
        data() {
            return {}
        },
        computed: {
            user() {
                return this.$store.getters.user;
            }
        },
        methods: {
            debug (obj) {
                console.log(obj);
            },
        },
        created() {
        },
    }
</script>