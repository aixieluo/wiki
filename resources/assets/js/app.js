
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('attributes', require('./components/Attributes.vue'));
Vue.component('equipment', require('./components/Equipment.vue'));
Vue.component('tactic', require('./components/Tactic.vue'));
Vue.component('skill', require('./components/Skill.vue'));
Vue.component('technology', require('./components/Technology.vue'));

const app = new Vue({
    el: '#app',
});

