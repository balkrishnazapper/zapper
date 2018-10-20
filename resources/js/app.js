
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';

/**
 * Vue code to use global event listner
 */

window.Fire = new Vue();

import { Form, HasError, AlertError } from 'vform'


// ES6 Modules or TypeScript
import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

window.Form = Form;
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Vue Js for progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(0, 255, 0)',
  failedColor: 'red',
  height: '10px'
})
const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue') },
    { path: '/developer', component: require('./components/Developer.vue') },
    { path: '/profile', component: require('./components/Profile.vue') },
    { path: '/users', component: require('./components/Users.vue') },
    { path: '/contact', component: require('./components/Contact.vue') },
    { path: '/addContact', component: require('./components/Addcontact.vue') },
  ]

  const router = new VueRouter({
    routes // short for `routes: routes`
  })

  //Vue Filters
  Vue.filter('upText',function(text){
      return text.charAt(0).toUpperCase() + text.slice(1);
  });

  //filter for date
  Vue.filter('myDate',function(created){
    return moment(created).format('MMM Do YYYY');
  })

  Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue'),
   'my-form', { template: '#debitdetails'}
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/Dashboard.vue'));
Vue.component('example-component', require('./components/Profile.vue'));
Vue.component('example-component', require('./components/Users.vue'));
Vue.component('example-component', require('./components/Contact.vue'));

const app = new Vue({
    el: '#app',
    router
    
});


