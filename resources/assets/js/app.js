
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//Vue.component('index', require('./components/Index.vue'));
import index from './components/Index.vue';
let router = new VueRouter({
    hashbang: false,
    history: true,
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            components:{
                default:index,
                menu:menu
            }
        },
        {
            path: '/post',
            name: 'postIndex',
            components:{
                default:postIndex,
                menu:menu
            }
        }
    ]
})

window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (error.response) {
            console.log(error.response.data);
        }
        return Promise.reject(error)
    }
);
const app = new Vue({
    el: '#wrapper',
    router
});
