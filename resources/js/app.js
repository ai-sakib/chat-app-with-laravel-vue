require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

window.Fire = new Vue();

import Gate from './gate'
Vue.prototype.$gate = new Gate(window.user)

//Vuex
import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from './stores'
const store = new Vuex.Store(
	storeData
)

//V-Form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


//SweetAlert
import Swal from 'sweetalert2'
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
})

window.Toast = Toast;

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

window.swalWithBootstrapButtons = swalWithBootstrapButtons;

//Progress-Bar
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '10px'
})
import {filter} from './filters';

import {routes} from './routes';

const router = new VueRouter({
	mode: 'history',
	routes,
	base: '/pro-chat'
})

//Laravel Vue Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

//Passport Components
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


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component(
    'error401',
    require('./components/Error401.vue').default
);

const app = new Vue({
    el: '#app',
    router,
    store,
    data:{
      keyword: '',
    },
    methods:{
      search: _.debounce(()=>{
        Fire.$emit('searching');
      }, 700)
    }
});
