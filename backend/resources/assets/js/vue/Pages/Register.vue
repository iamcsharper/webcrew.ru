<template>
    <div class="slider-typography">
        <div class="slider-text-middle-main">
            <div class="slider-text-middle">
                <form method="POST" action="/register" @submit.prevent="performRegister($event)">
                    <div class="col-md-6 center-col">
                        <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all" v-if="!done">
                            <p class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">
                                Регистрация аккаунта
                            </p>

                            <div id="success-contact-form-3" class="no-margin-lr"></div>
                            <p class="no-margin-bottom text-black">Кто вы?</p>
                            <div class="btn-group btn-group-toggle border-radius-6 custom-chooser">
                                <label class="btn btn-dark-gray" for="student"
                                       :class="{active: register.account_type === 'student'}">
                                    <input type="radio" name="account_type" id="student" value="student"
                                           autocomplete="off" v-model="register.account_type"> Ученик
                                </label>
                                <label class="btn btn-dark-gray" for="teacher"
                                       :class="{active: register.account_type === 'teacher'}"
                                       style="border-left: 1px white!important;">
                                    <input type="radio" name="account_type" id="teacher" value="teacher"
                                           autocomplete="off" v-model="register.account_type"> Учитель
                                </label>
                            </div>

                            <transition name="bounce">
                                <div v-if="errors.account_type" style="margin-top: -5px">
                                    <p class="text-danger no-margin" v-for="error in errors.account_type">{{ error
                                        }}</p>
                                </div>
                            </transition>

                            <input placeholder="Имя" id="name" type="text" ref="name"
                                   class="input-bg" name="name" v-model="register.name" required autofocus>

                            <transition name="bounce">
                                <div v-if="errors.name" style="margin-top: -5px">
                                    <p class="text-danger no-margin" v-for="error in errors.name">{{ error }}</p>
                                </div>
                            </transition>

                            <input placeholder="E-mail" type="email" ref="email"
                                   class="input-bg" name="email" v-model="register.email" required>

                            <transition name="bounce">
                                <div v-if="errors.email" style="margin-top: -5px">
                                    <p class="text-danger no-margin" v-for="error in errors.email">{{ error }}</p>
                                </div>
                            </transition>

                            <input placeholder="Пароль" id="password" type="password" ref="password"
                                   class="input-bg"
                                   name="password" autocomplete="off" v-model="register.password" required>
                            <transition name="bounce">
                                <div v-if="errors.password" style="margin-top: -5px">
                                    <p class="text-danger no-margin" v-for="error in errors.password">{{ error }}</p>
                                </div>
                            </transition>

                            <input id="password-confirm" placeholder="Повторите пароль" type="password" class="input-bg"
                                   name="password_confirmation" ref="password_confirmation" autocomplete="off"
                                   v-model="register.password_confirmation" required>
                            <transition name="bounce">
                                <div v-if="errors.password_confirmation" style="margin-top: -5px">
                                    <p class="text-danger no-margin" v-for="error in errors.password_confirmation">
                                        {{ error }}</p>
                                </div>
                            </transition>

                            <button type="submit"
                                    class="btn btn-medium border-radius-4 btn-block btn-dark-gray">зарегистрироваться


                            </button>

                            <router-link to="/login" class="btn btn-medium border-radius-4 btn-block btn-light-gray">
                                у меня уже есть аккаунт


                            </router-link>
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
                errors: {},
                register: {
                    account_type: null,
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
                code: null,
                done: false,
                confirmed: false,
            }
        },
        beforeMount() {
            Object.keys(this.register).map((el) => {
                this.$set(this.errors, el);
            });
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
        },
        watch: {
            register: {
                handler() {
                    this.validate();
                },
                deep: true,
            },
            code() {
                this.checkEmail();
            }
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
            validate () {
                if (!this.register.account_type || !this.register.account_type.length) {
                    this.errors['account_type'] = ['Выберите тип аккаунта'];
                } else {
                    delete this.errors['account_type'];
                }
                if (!this.register.name || !this.register.name.length) {
                    this.errors['name'] = ['Поле \'имя\' не может быть пустым.'];
                } else {
                    delete this.errors['name'];
                }
                if (!this.register.email || !this.register.email.length) {
                    this.errors['email'] = ['Поле \'почта\' не может быть пустым.'];
                } else {
                    delete this.errors['email'];
                }
                if (!this.register.password || !this.register.password.length) {
                    this.errors['password'] = ['Поле \'пароль\' не может быть пустым.'];
                } else {
                    delete this.errors['password'];
                }
                if (this.register.password !== this.register.password_confirmation) {
                    this.errors['password_confirmation'] = ['Пароли не совпадают.'];
                } else {
                    delete this.errors['password_confirmation'];
                }

                return Object.keys(this.errors).length === 0;
            },
            performRegister(evt) {
                if (this.validate()) {
                    this.errors = [];

                    axios.post(evt.target.action, this.register)
                        .then((response) => {
                            const result = response.data;

                            if (!result.success) {
                                this.errors = result.errors;
                            } else {
                                console.log(result.user);

                                this.$store.commit('setUser', result.user);

                                this.$router.replace({ name: 'verify' })
                            }
                        });
                }
            }
        },
    }
</script>