import Vue from 'vue'
import VueRouter from 'vue-router'
const home = () => import('../components/App.vue')

Vue.use(VueRouter);
export default new VueRouter({
    mode: 'history',
    scrollBehavior: (to, from, savedPosition) => ({ y: 0 }),
    routes: [
        {
            path: '/',
            component: home,
            name: 'home',
        },
        {
            path: '/cadastro',
            component: home,
            name: 'home',
        },
    ],
});