import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeStudent from './pages/HomeStudent';
import Profile from './pages/Profile';
import Login from './pages/Login';
import Register from './pages/Register';
import RegisterVerify from './pages/RegisterVerify';
import Admin from './pages/Admin';
import AdminUsers from './pages/AdminUsers';


Vue.use(VueRouter);

const routes = [
    {
        path: '/home',
        name: 'home',
        component: HomeStudent
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile, //store.getters.getRole() === 'student' TODO: for student and teacher
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
    },
    {
        path: '/register/verify/:code?',
        component: RegisterVerify,
        name: 'verify'
    },
    {
        path: '/admin',
        name: 'admin',
        component: Admin,
        children: [
            {
                path: 'users',
                component: AdminUsers,
                name: 'adminUsers'
            }
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;