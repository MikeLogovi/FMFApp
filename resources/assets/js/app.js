
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.jQuery=require('jquery')
window.$=require('jquery')

import jQuery from 'jquery'
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
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'mdbvue/build/css/mdb.css';
import VueProgressBar from 'vue-progressbar'
import 'viewerjs/dist/viewer.css'
import Viewer from 'v-viewer'
import {store} from './store/store'
window.getFileExtension=function(file){
    var name=file.split('.')
    if(name.length===1||(name[0]==''&& name.length==2)){
      return ''
    }
    else{
      return name[1];
    }
}
window.custom_upload=async function(el,ObjectName,ObjectFile,ObjectExtensions,ObjectFormFile){
    ObjectName=el.target.files[0].name
    ObjectFile= ObjectName
    var extension=getFileExtension(ObjectFile).toLowerCase()
    var result=[];
    if(ObjectExtensions.indexOf(extension)!=-1){
       
        var fileReader = new FileReader()
        fileReader.readAsDataURL(el.target.files[0])
        new Promise(()=>{
            
            fileReader.onload=(e)=>{
                result[2]=e.target.result
            }
        }).then((result)=>{
            result[0]=false
            result[1]=ObjectName
            console.log(result)
            return result;
        })
        
        
            
            /* if(ObjectExtensions===this.extensionsForImage){
            this.disabled=false
            }*/
           
      
                
     
        
        
    }
    else{
        result[0]=true
        return result
     }
    
}
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
    height:'500px'
})

Vue.use(Viewer)
Vue.use(BootstrapVue)
Vue.use(Vuetify)
Vue.use(VueRouter)

Vue.component(HasError.name,HasError)
Vue.component(AlertError.name,AlertError)
Vue.component(AlertSuccess.name,AlertSuccess)
Vue.filter('myDate',function(date){
   return moment(date).format("dddd, MMMM Do YYYY, h:mm:ss a");
})
Vue.filter('now',function(date){
   
    return moment(date).fromNow();
 })
Vue.filter('month',function(date){
    return moment(date).format("MMM");
 })
Vue.filter('day',function(date){
    return moment(date).format("D");
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
   
    {path:'/welcome',component:require('./components/frontend/HomePage.vue'),alias:'/'},
    {path: '/galleries',component:require('./components/frontend/Gallery2.vue')},
    {path: '/videos',component:require('./components/frontend/Video.vue')},
    {path: '/login',component:require('./components/frontend/Login.vue')},
    {path:'/post/:id',component:require('./components/frontend/MyBlog.vue')},
     //Administration   
    {path: '/administration', component:require('./components/Administration.vue'),meta:{requiresAuth:true},
     children:[
        {path:'/',component:require('./components/Dashboard.vue'),alias:'/dashboard', meta:{requiresAuth:true}},
        {path:'/settings',component:require('./components/Settings.vue'),meta:{requiresAuth:true}},
        {path:'/gallery',component:require('./components/Gallery.vue'),meta:{requiresAuth:true}},
        {path:'/images_categories',component:require('./components/ImageCategory.vue'),meta:{requiresAuth:true}},
        {path:'/video',component:require('./components/Video.vue'),meta:{requiresAuth:true}},
        {path:'/videos_categories',component:require('./components/VideoCategory.vue'),meta:{requiresAuth:true}},
        {path:'/portfolio',component:require('./components/Portfolio.vue'),meta:{requiresAuth:true}},
        {path:'/profile',component:require('./components/Profile.vue'),meta:{requiresAuth:true}},
        {path:'/events',component:require('./components/Event.vue'),meta:{requiresAuth:true}},
        {path:'/contact',component:require('./components/Contact.vue'),meta:{requiresAuth:true}},
        {path:'/about',component:require('./components/About.vue'),meta:{requiresAuth:true}},
        {path:'/comments',component:require('./components/Comment.vue'),meta:{requiresAuth:true}},
        {path:'/posts',component:require('./components/Post.vue'),meta:{requiresAuth:true}},
     ]
    
    },
    

];
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!store.getters.loggedIn) {
        next({
          path: '/login',
        })
      } else {
        next()
      }
    } else {
      next() // make sure to always call next()!
    }
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
    require('./components/passport/PersonalAccessTokens.vue')
);




Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('side-nav', require('./components/SideNav.vue'));
Vue.component('foot',require('./components/Foot.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));
const app = new Vue({
    store:store,  
    mode:history,
    el: '#app',
    router
});

