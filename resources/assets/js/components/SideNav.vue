<template>
<div>
   <v-navigation-drawer
    stateless
    value="true"
    v-model="drawer"
  >
    <v-list>
      <v-list-tile>
        <v-list-tile-action>
          <v-icon>home</v-icon>
        </v-list-tile-action>
        <v-list-tile-title>Home</v-list-tile-title>
      </v-list-tile>

      <v-list-group
        prepend-icon="account_circle"
        value="true"
      >
        <template v-slot:activator>
          <v-list-tile>
            <v-list-tile-title>Users</v-list-tile-title>
          </v-list-tile>
        </template>
        <v-list-group
          no-action
          sub-group
          value="true"
        >
          <template v-slot:activator>
            <v-list-tile>
              <v-list-tile-title>Admin</v-list-tile-title>
            </v-list-tile>
          </template>

          <v-list-tile
            v-for="(admin, i) in admins"
            :key="i"
            @click=""
          >
            <v-list-tile-title v-text="admin[0]"></v-list-tile-title>
            <v-list-tile-action>
              <v-icon v-text="admin[1]"></v-icon>
            </v-list-tile-action>
          </v-list-tile>
        </v-list-group>

        <v-list-group
          sub-group
          no-action
        >
          <template v-slot:activator>
            <v-list-tile>
              <v-list-tile-title>Actions</v-list-tile-title>
            </v-list-tile>
          </template>
          <v-list-tile
            v-for="(crud, i) in cruds"
            :key="i"
            @click=""
          >
            <v-list-tile-title v-text="crud[0]"></v-list-tile-title>
            <v-list-tile-action>
              <v-icon v-text="crud[1]"></v-icon>
            </v-list-tile-action>
          </v-list-tile>
        </v-list-group>
      </v-list-group>
    </v-list>
  </v-navigation-drawer>




<!--
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
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
          <li class="nav-item has-treeview">
            <router-link to="/profile" class="nav-link">
              <i style='color:#1B5E20' class="fas fa-user"></i>
              <p>
                PROFILE
                <i class="fa fa-angle-left right"></i>
              </p>
            </router-link>
          
          </li>
           <li class="nav-item">
           <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
           <i style='color:red' class="fas fa-sign-out-alt"></i> 
               <p>
                   Logout
               </p>
           </a>
           
            <form id="logout-form" action="logout" method="POST" style="display: none;">
               
            </form>
           </li>
          
        </ul>
      </nav>
      -->
</div>
</template>

<script>

    export default{
       name:'side-nav',
       components:{},
       data(){
           return {
                items:{},
                 drawer:true,
                 admins: [
                    ['Management', 'people_outline'],
                    ['Settings', 'settings']
                  ],
                  cruds: [
                    ['Create', 'add'],
                    ['Read', 'insert_drive_file'],
                    ['Update', 'update'],
                    ['Delete', 'delete']
                  ]
           }
       },
       mounted(){
          Events.$on('drawer',()=>{
              this.drawer=!this.drawer
          })
       },
       methods:{
         logout(){
           
         },
         admin(){}
       }
      
    }
</script>