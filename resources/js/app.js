/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// cretueusebiu/vform (Package)
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// Gate To Type User
import Gate from "./Gate.js";
Vue.prototype.$gate = new Gate(window.user);


// Moment (Package)
import moment from 'moment';

//  hilongjw / vue-progressbar (Package)
import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '3px',
    transition: {
        speed: '0.02s',
        opacity: '0.6s',
        termination: 400
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};
Vue.use(VueProgressBar, options);


// SweetAlert2 (Package)
import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
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
window.Toast = Toast;

// Vue Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import routes    from './vueRouter';

const router = new VueRouter({
    mode: 'history',
    routes
});

// relaode
window.Fire = new Vue();

// vue2Dropzone (Package)
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
window.Vue = require('vue');

// Vue2Editor (Package)
import Vue2Editor from "vue2-editor";
Vue.use(Vue2Editor);

// Vue Filter (Validation)
Vue.filter('upText' ,function(text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
}); // Text Upper Cases

Vue.filter('myDate', function(created) {
    return moment(created).format('MMMM Do YYYY, h:mm:ss a');
}); // Date Time Moment

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


// Passport Package

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
    'not-found',
    require('./components/NotFound.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: {
        vueDropzone: vue2Dropzone
    },
});
