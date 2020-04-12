/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
import swal from 'sweetalert2'
import * as VeeValidate from 'vee-validate';
import Chart from 'chart.js';
import { Bar } from 'vue-chartjs'
import Gate from "./Gate"
import DatatableFactory from 'vuejs-datatable';
import DataTable from 'laravel-vue-datatable';
import Vuex from 'vuex'

Vue.use(Vuex)


Vue.use(DataTable);
Vue.prototype.$gate = new Gate(window.user);


window.bar = Bar;
window.chart = Chart;
Vue.use(VeeValidate)
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

const swalWithBootstrapButtons = swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success ml-2',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})


window.swalWithBootstrapButtons = swalWithBootstrapButtons;
window.toast = toast;
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
const options = {
  color: '#bffaf3',
  failedColor: '#874b4b',
  thickness: '5px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 200
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}

Vue.use(VueProgressBar, options)



let routes = [
    { path: '/dasbor', component:require('./components/Backend/dasbor.vue').default },
    { path: '/lembaga', component:require('./components/Backend/lembaga.vue').default },
    { path: '/pengguna', component: require('./components/Backend/pengguna.vue').default },
    { path: '/provinsi', component: require('./components/Backend/Data/provinsi.vue').default },
    { path: '/kota', component: require('./components/Backend/Data/kota.vue').default },
    { path: '/indikator', component: require('./components/Backend/Data/indikator.vue').default },
    { path: '/pilar', component: require('./components/Backend/Data/pilar.vue').default },
    { path: '/konten', component: require('./components/Backend/konten.vue').default },
    { path: '/developer', component: require('./components/Backend/developer.vue').default },
    { path: '/profil', component: require('./components/Backend/profil.vue').default},
    { path: '/pengisian', component: require('./components/Backend/Kusioner/kusioner.vue').default},
    { path: '/pertanyaan', component: require('./components/Backend/Data/pertanyaan.vue').default },
    { path: '*', component: require('./components/Backend/tidakada.vue').default }
]


const router = new VueRouter({
    mode: 'history',
   routes // short for `routes: routes`
})

//Laravel Passport Frontend
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
  'tidak-ada',
  require('./components/Backend/tidakada.vue').default
);

Vue.component('pagination', require('laravel-vue-pagination'));
// Vue.filter('upText', function(text){
//   return text.charAt(0).toUpperCase() + text.slice(1);
// });
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('frontend', require('./components/Frontend/frontend.vue').default);
Vue.component('navbar', require('./components/Frontend/navbar.vue').default);
Vue.component('pdpt', require('./components/Backend/pdpt.vue').default);
Vue.component('profil', require('./components/Backend/profil.vue').default);
Vue.component('indi', require('./components/Backend/Data/indi.vue').default);
Vue.component('profil-lembaga', require('./components/Backend/profil_lembaga.vue').default);
Vue.component('user', require('./components/Backend/pengguna.vue').default );
Vue.component('provinsi', require('./components/Backend/Data/option.vue').default );
Vue.component('nomor1', require('./components/Backend/Kusioner/1.vue').default );
Vue.component('nomor2', require('./components/Backend/Kusioner/2.vue').default );
Vue.component('nomor3', require('./components/Backend/Kusioner/3.vue').default );

window.Fire = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
