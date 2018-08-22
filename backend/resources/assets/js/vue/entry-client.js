require('./bootstrap');

import createApp from './app';

const { app } = createApp(window.Laravel.user);

window.Vue = app;

app.$store.commit('setUser', window.Laravel.user);

app.$mount('#app');