import Vue from 'vue';
import Vuex, { Store } from 'vuex';

Vue.use(Vuex);

export default new Store({
    state: {
        user: {},
        role: 'guest'
    },

    getters: {
        user: (state) => state.user,
        userId: state => state.user ? state.user.id : undefined,
    },

    mutations: {
        setUser(state, user) {
            state.user = user;
            if (user && user.roles) {
                state.role = user.roles[0].name;
            }
        },
    },
});
