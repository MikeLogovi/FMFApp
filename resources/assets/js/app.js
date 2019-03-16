
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.jQuery=require('jquery')
window.$=require('jquery')
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import Swal from 'sweetalert2'
import 'vuetify/dist/vuetify.min.css'
import {Form,HasError,AlertError,AlertSuccess} from 'vform'
import moment from 'moment'
import 'admin-lte/dist/js/adminlte.js'
import 'admin-lte/dist/css/adminlte.min.css'
import 'video.js/dist/video-js.min.css'
import 'magnific-popup/dist/jquery.magnific-popup.js'
import 'magnific-popup/dist/magnific-popup.css'
import 'mdbvue/build/css/mdb.css';
import VueProgressBar from 'vue-progressbar'
import 'slick-carousel';


const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
window.Toast=Toast;
Vue.use(VueProgressBar,{
    color:'rgb(149,255,199)',
    failedColor:'red',
    height:'3px'
})
Vue.use(Vuetify)
Vue.use(VueRouter)

Vue.component(HasError.name,HasError)
Vue.component(AlertError.name,AlertError)
Vue.component(AlertSuccess.name,AlertSuccess)
Vue.filter('myDate',function(date){
   return moment(date).format("dddd, MMMM Do YYYY, h:mm:ss a");
})
Vue.filter('capitalizeIt',function(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
})
Vue.filter('yearDate',function(date){
     var tab=date.split('-');
     return tab[0];
})
global.moment=require('moment')
window.Form=Form
window.Events=new Vue();
window.Swal=Swal
const routes=[
    {path:'/',component:require('./components/frontend/HomePage.vue')},
    {path: '/galleries',component:require('./components/frontend/Gallery2.vue')},
    {path: '/videos',component:require('./components/frontend/Video.vue')},
    {path: '/connexion',component:require('./components/frontend/HomePage.vue')},
     
    {
        path: '/administration', component:require('./components/Administration.vue'),
    },
            {path:'/dashboard',component:require('./components/Dashboard.vue')},
            {path:'/gallery',component:require('./components/Gallery.vue')},
            {path:'/images_categories',component:require('./components/ImageCategory.vue')},
            {path:'/video',component:require('./components/Video.vue')},
            {path:'/videos_categories',component:require('./components/VideoCategory.vue')},
            {path:'/portfolio',component:require('./components/Portfolio.vue')},
            {path:'/portfolio/1',component:require('./components/ExampleComponent.vue')},
           // {path:'/contact',component:require('./components/Contact.vue')},
            {path:'/events',component:require('./components/Event.vue')},
            {path:'/contact',component:require('./components/Contact.vue')},
            {path:'/about',component:require('./components/About.vue')},
            {path:'/comments',component:require('./components/Comment.vue')},
            {path:'/settings',component:require('./components/Settings.vue')},
        
    
    

];
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    routes
});
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('side-nav', require('./components/SideNav.vue'));
Vue.component('foot',require('./components/Foot.vue'));
const app = new Vue({
    
mode:history,
    el: '#app',
    router
});
