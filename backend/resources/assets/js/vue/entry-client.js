require('./bootstrap');

import appSettings from './app';
import addMiddleware from './addMiddleware';

appSettings.store.commit('setUser', window.Laravel.user);

addMiddleware(appSettings);

const app = new appSettings.Vue(appSettings);

window.Vue = app;

app.$store.commit('setUser', window.Laravel.user);

app.$mount('#app');