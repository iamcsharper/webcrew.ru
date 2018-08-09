import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeStudent from './pages/HomeStudent';
import Profile from './pages/Profile';

Vue.use(VueRouter);

const routes = [
    {
        path: '/home',
        name: 'home',
        component: HomeStudent, //store.getters.getRole() === 'student'
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile, //store.getters.getRole() === 'student'
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;