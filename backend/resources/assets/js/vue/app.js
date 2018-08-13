import Vue from 'vue'
import store from './store'
import {sync} from 'vuex-router-sync';
import router from './router'
import App from './components/App'
import vueMoment from 'vue-moment'
import moment from "moment";

require('moment/locale/ru')

Vue.use(vueMoment, {
    moment
});

sync(store, router);

export default new Vue({
    store,

    router,

    render: h => h(App),
});