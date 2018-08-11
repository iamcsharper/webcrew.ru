<template>
    <div class="slider-typography">
        <div class="slider-text-middle-main">
            <div class="slider-text-middle">
                <div class="col-md-6 center-col">
                    <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all">
                        <p class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">
                            Регистрация  &mdash; Подтверждение
                        </p>

                        <transition name="fade">
                            <div class="alert alert-danger border-none box-shadow"
                                 v-if="errors.length">
                                <h4 class="alert-heading">Произошли ошибки:</h4>
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                        </transition>

                        <transition name="fade">
                            <div v-if="!confirmed">
                                <h6>Регистрация почти завершена. Введите код{{ email }}</h6>
                                <hr>
                                <p class="text-dark-gray text-center">Вставьте код в это поле:</p>
                                <input type="text" class="input-bg" v-model="code"/>
                            </div>
                            <div v-if="confirmed">
                                <h6>Аккаунт активирован! Ожидайте перезагрузки...</h6>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                errors: {},
                code: null,
                confirmed: false,
            }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
            email() {
                const val = this.$store.getters.user && this.$store.getters.user.email ? this.$store.getters.user.email : null;
                return val ? ' из почты ' + val.split('@')[1] : '.';
            }
        },
        watch: {
            code() {
                this.checkEmail();
            },
        },
        created() {
            if (this.$route.params.code)
                this.code = this.$route.params.code;
        },
        mounted() {
        },
        methods: {
            checkEmail() {
                axios.post('/register/verify/' + this.code)
                    .then((response) => {
                        const result = response.data;

                        if (result.success) {
                            this.confirmed = true;
                            this.$store.commit('setUser', result.user);

                            window.location.href = '/';
                        } else {
                            this.errors = result.errors;
                        }
                    });
            },
        },
    }
</script>