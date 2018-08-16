/* global context, dispatch */

import appSettings from './app';
import addMiddleware from './addMiddleware';
import renderVueComponentToString from 'vue-server-renderer/basic';

appSettings.store.commit('setUser', context.user);

addMiddleware(appSettings);

const app = new appSettings.Vue(appSettings);

app.$router.push(context.url);

renderVueComponentToString(app, (err, html) => {
    if (err) {
        throw new Error(err);
    }
    dispatch(html);
});
