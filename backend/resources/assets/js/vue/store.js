import Vue from 'vue';
import Vuex, {Store} from 'vuex';
import * as types from './mutation-types'
import HomeController from './api/HomeController'

Vue.use(Vuex);

export default new Store({
    state: {
        user: {},
        role: 'guest',
    },

    getters: {
        user: (state) => state.user,
        role: (state) => state.role,
        userId: state => state.user ? state.user.id : undefined,
    },

    mutations: {
        setUser(state, user) {
            state.user = user;
            if (user && user.roles && user.roles[0]) {
                state.role = user.roles[0].name;
            }
        },

        // GET_CLASSES
        [types.GET_CLASSES.SUCCESS] (state, info) {
            state[types.GET_CLASSES.loadingKey] = false;
            Vue.set(state, [types.GET_CLASSES.stateKey], info);
        },

        [types.GET_CLASSES.FAILURE] (state, errors) {
            state[types.GET_CLASSES.loadingKey] = false;
            Vue.set(state, [types.GET_CLASSES.errorsKey], errors);
        },

        [types.GET_CLASSES.PENDING] (state) {
            Vue.set(state, types.GET_CLASSES.loadingKey, true);
        },
    },

    actions: {
        getClasses(store, params) {
            params.store = store;
            params.mutationTypes = types.GET_CLASSES;
            return HomeController.getClasses(params);
        },
        getMyClasses(store, params) {
            params.store = store;
            params.mutationTypes = types.GET_CLASSES;
            return HomeController.getMyClasses(params);
        },
        getMyJobClasses(store, params) {
            params.store = store;
            params.mutationTypes = types.GET_CLASSES;
            return HomeController.getMyJobClasses(params);
        },
    }
});
