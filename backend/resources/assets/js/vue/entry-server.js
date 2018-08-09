/* global context, dispatch */

import app from './app';
import renderVueComponentToString from 'vue-server-renderer/basic';

app.$router.push(context.url);

app.$store.commit('setUser', { user: context.user });

renderVueComponentToString(app, (err, html) => {
    if (err) {
        throw new Error(err);
    }
    dispatch(html);
});
