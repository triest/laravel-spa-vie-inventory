import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/views/Home.vue';

Vue.use(VueRouter);

export const routes = [

    {
        name: 'home',
        path: '/',
        component: Home,
        meta: {title: 'Главная'}
    },

];



export default routes;
