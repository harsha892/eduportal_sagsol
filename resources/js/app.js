
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import Vuex from 'vuex'
import 'es6-promise/auto'
import VueSession from 'vue-session'
import VeeValidate from 'vee-validate';
import VueSwal from 'vue-swal'
import store from '../store'
import moment from "moment";
import vSelect from 'vue-select'
import VuePlyr from 'vue-plyr'
import 'vue-plyr/dist/vue-plyr.css'

const dependencies = [Vuex, VueSession, VeeValidate, VueSwal, moment, vSelect, VuePlyr];
dependencies.forEach(element => {
    Vue.use(element);
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.filter('dateFormat', function (value) {
    return moment(value).format(
        "DD/MM/YYYY"
    );
})
Vue.filter('fromNow', function (value) {
    return moment(value).fromNow();
})
Vue.component('main-component', require('../vue/App.vue').default);
import router from './approutes'
export const serverBus = new Vue();

new Vue({
    el: '#mainApp',
    router,
    store
});
