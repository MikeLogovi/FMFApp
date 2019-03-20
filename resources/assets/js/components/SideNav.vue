<template>
<div>
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">

            <router-link to="/dashboard" class="nav-link">
                <i style='color:blue' class="fas fa-tachometer-alt"></i>              
                <p>Dashboard</p>
            </router-link>
          </li>
         
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style='color:#6200EA' class="fas fa-video"></i>
              <p>
                VIDEOS
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/video" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Current video</p>
                 </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/videos_categories" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Current categories</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style='color:cyan' class="fas fa-camera-retro"></i>
              <p>
               GALLERY
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/gallery" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Current pictures</p>
                </router-link>
              </li>
             
              <li class="nav-item">
                <router-link to='/images_categories' class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Current categories</p>
                </router-link>
              </li>
              
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <router-link to="/events" class="nav-link">
              <i style='color:#6200EA' class="fas fa-video"></i>
              <p>
                EVENTS
              </p>
            </router-link>
           
          </li>
           <li class="nav-item has-treeview">
            <router-link to="/posts" class="nav-link">
              <i style='color:#6200EA' class="fas fa-video"></i>
              <p>
                BLOG
              </p>
            </router-link>
           
          </li>
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style='color:#6200EA' class="fas fa-video"></i>
              <p>
                BLOGS
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/video" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Current video</p>
                 </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/videos_categories" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Current categories</p>
                </router-link>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style='color:#1B5E20' class="fas fa-user"></i>
              <p>
                PROFILE
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>See profile</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Edit profile</p>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item">

            <router-link to="/about" class="nav-link">
                <i style='color:blue' class="fas fa-tachometer-alt"></i>              
                <p>About</p>
            </router-link>
          </li>
           <li class="nav-item">

            <router-link to="/comments" class="nav-link">
                <i style='color:blue' class="fas fa-tachometer-alt"></i>              
                <p>Comments</p>
            </router-link>
          </li>
            <li class="nav-item">

            <router-link to="/contact" class="nav-link">
                <i style='color:blue' class="fas fa-tachometer-alt"></i>              
                <p>Contact</p>
            </router-link>
          </li>
           <li class="nav-item has-treeview">
            <router-link to="/settings" class="nav-link">
              <i style='color:orange' class="fas fa-cog"></i>
              <p>
                SETTINGS
              </p>
            </router-link>
            
          </li>
         
           <li class="nav-item">

            <router-link to="/" class="nav-link">
            <i style='color:red' class="fas fa-sign-out-alt"></i>                
            <p>Logout</p>
            </router-link>
          </li>
          
        </ul>
      </nav>
</div>
</template>

<script>
import AddRessource from './AddRessource'
import ImageCategoryForm from './ImageCategoryForm'
    export default{
       name:'side-nav',
       components:{AddRessource,ImageCategoryForm},
       data(){
           return {

           }
       },
      
    }
</script>