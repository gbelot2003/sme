/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('front-component', require('./components/Front.vue'));
Vue.component('display', require('./components/Display.vue'));


Vue.filter('formatDate', function(value){
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
});

const app = new Vue({
    el: '#app'

});