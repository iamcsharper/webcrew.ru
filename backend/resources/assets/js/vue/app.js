import Vue from 'vue'
import store from './store'
import {sync} from 'vuex-router-sync';
import router from './router'
import App from './components/App'
import vueMoment from 'vue-moment'
import moment from "moment";
import VModal from 'vue-js-modal/dist/ssr.index'

require('moment/locale/ru');

Vue.use(vueMoment, {
    moment
});

Vue.use(VModal, {
    dynamic: true,
    scrollable: true,
});

sync(store, router);

export default function createApp(user) {
    store.commit('setUser', user);

    router.beforeEach((to, from, next) => {
        if (to.matched.some(record => record.meta.roles)) {
            if (to.meta.roles.includes(store.state.role)) {
                next();
            } else {
                next({
                    name: to.meta.redirect
                });
            }
        } else {
            next();
        }
    });

    const app = new Vue({
        store,
        router,
        render: h => h(App),
    });

    return { app, store, router };
};