import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/views/Home.vue';
import Login from './components/views/Login.vue';
import Edit from './components/views/Edit.vue';
Vue.use(VueRouter);

export const routes = [

    {
        name: 'home',
        path: '/',
        component: Home,
        meta: {title: 'Главная'}
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {title: 'Войдите'}
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit,
        meta: {title: 'Edit1'}
    },

];



export default routes;
