<template>
    <div class="slider-typography">
        <div class="slider-text-middle-main">
            <div class="slider-text-middle">
                <form method="POST" action="/login" @submit.prevent="authenticate($event)">
                    <div class="col-md-6 center-col">
                        <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all" v-if="!done">
                            <div class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">
                                Вход

                            </div>

                            <transition name="fade">
                                <div class="alert alert-danger border-none box-shadow"
                                     v-if="errors && errors.length">
                                    <h4 class="alert-heading">Произошли ошибки:</h4>
                                    <ul>
                                        <li v-for="error in errors">{{ error }}</li>
                                    </ul>
                                </div>
                            </transition>

                            <div id="success-contact-form-3" class="no-margin-lr"></div>
                            <input placeholder="E-mail\номер" v-model="auth.identity" type="text"
                                   class="input-bg" name="identity" required autofocus>
                            <input placeholder="Пароль" v-model="auth.password" type="password"
                                   class="input-bg" name="password"
                                   required>

                            <div class="form-check row">
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                           v-model="auth.remember">
                                    <label class="form-check-label" for="remember"> Запомнить меня </label>
                                </div>
                                <div class="col-md-6">
                                    <a class="text-dark-gray text-small" href="/password/reset">
                                        <!--TODO: password reset vue-->
                                        Забыли пароль?
                                    </a>
                                </div>
                            </div>
                            <div class="btn-group border-radius-4 overflow-hidden btn-group-justified">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-medium border-radius-4 btn-dark-gray">вход</button>
                                </div>
                                <router-link to="/register" class="btn btn-medium btn-light-gray">
                                    регистрация
                                </router-link>
                            </div>
                        </div>
                        <div class="modal-dialog modal-confirm" v-if="done">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="icon-box">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <button type="button" class="close">&times;</button>
                                </div>
                                <div class="modal-body text-center">
                                    <h4>Отлично!</h4>
                                    <p>Вход выполнен, ожидайте</p>
                                    <a class="btn btn-success" href="/"><span>Выполнить переход</span> <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                errors: [],
                auth: {
                    identity: null,
                    password: null,
                    remember: true,
                },
                done: false,
            }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
        },
        methods: {
            authenticate(evt) {
                this.errors = [];

                if (!this.auth.identity) {
                    this.errors.push('Поле \'логин\' не может быть пустым.')
                }

                if (!this.auth.password) {
                    this.errors.push('Поле \'пароль\' не может быть пустым.')
                }

                axios.post(evt.target.action, this.auth)
                    .then((response) => {
                        if (!response.data.success) {
                            console.log(response.data);

                            if (response.data.csrf_token) {
                                axios.defaults.headers.common = {
                                    'X-CSRF-TOKEN': response.data.csrf_token,
                                };
                            }

                            this.errors = response.data.errors;
                        } else {
                            this.done = true;
                            window.location.href = '/';
                        }
                    });
            }
        },
    }
</script>