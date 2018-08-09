import Vue from 'vue';
import uniq from 'lodash/uniq';
import Vuex, { Store } from 'vuex';

Vue.use(Vuex);

export default new Store({
    state: {
        user: {},
    },

    getters: {
        user: state => state.user,
        userId: state => state.user ? state.user.id : undefined,
        role: state => state.user ? state.user.roles[0].name : undefined,
    },

    mutations: {
        setUser(state, user) {
            state.user = user;
        },
    },
});
