import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeStudent from './pages/HomeStudent';
import MyCourses from './pages/MyCourses';

import HomeTeacher from './pages/HomeTeacher';

import Profile from './pages/Profile';
import Login from './pages/Login';
import Register from './pages/Register';
import RegisterVerify from './pages/RegisterVerify';

import Admin from './pages/Admin';
import AdminUsers from './pages/AdminUsers';
import AdminStats from './pages/AdminStats';

Vue.use(VueRouter);

const routes = [
    {
        path: '/home',
        name: 'home',
        component: HomeStudent,

    },
    {
        path: '/courses',
        name: 'homeTeacher',
        component: HomeTeacher,
        meta: {
            roles: ['teacher'],
            redirect: 'studentCourses',
        },
    },
    {
        path: '/courses',
        name: 'studentCourses',
        component: MyCourses,
        meta: {
            roles: ['student'],
            redirect: 'homeTeacher',
        },
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
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
            },
            {
                path: 'stats',
                component: AdminStats,
                name: 'adminStats'
            }
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;