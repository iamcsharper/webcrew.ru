<template>
    <div>
        <section class="bg-white padding-40px-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center center-col last-paragraph-no-margin margin-30px-bottom sm-margin-30px-bottom xs-margin-20px-bottomm">
                        <span class="text-extra-large display-block alt-font text-extra-dark-gray margin-10px-bottom font-weight-600">Профиль</span>
                        <p class="width-70 sm-width-80 xs-width-100 center-col">Так сейчас выглядит ваш профиль, <b>{{ user.name }}</b></p>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Property</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in user">
                                    <td>{{ key }}</td>
                                    <td>
                                        <span>{{ value }}</span>
                                        <table class="table" v-if="Array.isArray(value)" v-for="obj in value">
                                            <thead>
                                            <tr>
                                                <th>Property</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(v,k) in obj">
                                                    <td>{{ k }}</td>
                                                    <td>{{ v }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <router-link
                                :to="{ name: 'home' }"
                                class="btn btn-block btn-danger">
                            ← <span class="underline">Back</span>
                        </router-link>
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