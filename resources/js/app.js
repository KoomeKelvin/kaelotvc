/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import axios from 'axios';
import _ from 'lodash';
require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('CheckMarks', require('./components/CheckMarks.vue').default);
Vue.component('Slug', require('./components/Slug.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
require('./managesidebar');
$(document).ready(function() {
    $('#discussionbody').summernote({
        placeholder: 'Please read the system analysis and design notes i have attached here ',
        tabsize: 2,
        height: 400,                 
        width: 762,             
        maxHeight: null, 
    });
      $('#posts_description').summernote({
        tabsize: 2,
        height: 300,                 
        width: 662,             
        maxHeight: null, 
    });
       $('#posts_title').summernote({
        tabsize: 2,
        height: 50,                 
        width: 662,             
        maxHeight: null, 
    });
    
  });