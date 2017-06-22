/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require('./config/common')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('dancerType', require('./views/Dashboard/DancerType.vue'));

import VueRouter from 'vue-router'
import routes from './routes'
import store from './vuex/dashboard/store'
import httpPlugin from './plugins/http/index'
import vueImgInputer from 'vue-img-inputer'
// import iView from 'iview'

import App from './App.vue'

Vue.use(VueRouter)
Vue.use(httpPlugin)
// Vue.use(iView)

window.toastr = require('toastr/build/toastr.min.js');
window.innerHeight = 800;

window.toastr.options = {
    positionClass: "toast-top-right",
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
};

Vue.component(
    'vue-head',
    require('./components/dashboard/Head.vue')
)

Vue.component(
    'vue-table',
    require('./components/dashboard/Table.vue')
)

Vue.component(
    'vue-table-pagination',
    require('./components/dashboard/TablePagination.vue')
)

Vue.component(
    'vue-form',
    require('./components/dashboard/Form.vue')
)

Vue.component(
    'vue-img-inputer',
    vueImgInputer
)

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    linkActiveClass: 'active',
    routes: routes
})

// router.beforeEach((to, from, next) => {
//     iView.LoadingBar.start();
//     next();
// });
//
// router.afterEach((to, from, next) => {
//     iView.LoadingBar.finish();
// });

new Vue(Vue.util.extend({router, store}, App)).$mount('#app')

