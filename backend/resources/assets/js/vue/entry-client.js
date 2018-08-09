require('./bootstrap');

import app from './app';

window.Vue = app;

app.$store.commit('setUser', window.Laravel.user);

app.$mount('#app');