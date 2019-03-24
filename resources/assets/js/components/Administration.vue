<template>
  <v-app id="inspire">
    <vue-progress-bar></vue-progress-bar>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      app
    >
      <v-list dense>
                  <v-list-tile avatar tag="div">
                  <v-list-tile-avatar>
                    <img :src="user.picture">
                  </v-list-tile-avatar>

                  <v-list-tile-content>
                    <v-list-tile-title>{{user.name}}</v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
        <v-divider light></v-divider>
              <router-link to="/dashboard">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>dashboard</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>DASHBOARD</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>

              <v-list-group
                  prepend-icon="fas fa-video"
                  value="true"
                >
                  
                    <v-list-tile>
                      <v-list-tile-title>VIDEOS</v-list-tile-title>
                    </v-list-tile>
                 
                    <v-list-group
                      no-action
                      sub-group
                      value="true"
                    >
                  
                      <v-list-tile>
                        <router-link to="/video">
                        <v-list-tile-title v-text="`CURRENT VIDEOS`"></v-list-tile-title>
                        </router-link>
                      </v-list-tile>
                  
                      <v-list-tile>
                        <router-link to="/videos_categories">
                        <v-list-tile-title v-text="`CURRENT VIDEOS CATEGORIES`"></v-list-tile-title>
                        </router-link>
                      </v-list-tile>
                </v-list-group>
             </v-list-group>
              <v-list-group
                  prepend-icon="fas fa-image"
                  value="true"
                >
                  
                    <v-list-tile>
                      <v-list-tile-title>IMAGES</v-list-tile-title>
                    </v-list-tile>
                 
                    <v-list-group
                      no-action
                      sub-group
                      value="true"
                    >
                  
                      <v-list-tile>
                        <router-link to="/gallery">
                        <v-list-tile-title v-text="`CURRENT IMAGES`"></v-list-tile-title>
                        </router-link>
                      </v-list-tile>
                  
                      <v-list-tile>
                        <router-link to="/images_categories">
                        <v-list-tile-title v-text="`CURRENT IMAGES CATEGORIES`"></v-list-tile-title>
                        </router-link>
                      </v-list-tile>
                </v-list-group>
             </v-list-group>
               <router-link to="/events">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>far fa-calendar-alt</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>EVENTS</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
               <router-link to="/posts">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>far fa-newspaper</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>POSTS</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
              <router-link to="/about">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>fas fa-history</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>ABOUT</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
               <router-link to="/comments">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>fas fa-comment</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>COMMENTS</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
               <router-link to="/contact">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>fas fa-id-card</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>CONTACT</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
                <router-link to="/settings">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>fas fa-cog</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>SETTINGS</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
               <router-link to="/profile">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon>fas fa-user</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>PROFILE</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
              <router-link  to="#" >
              <v-list-tile v-if="loggedIn" @click.prevent="logout">
                <v-list-tile-action>
                  <v-icon>fas fa-sign-out-alt</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>LOGOUT</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              </router-link>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>ADMINISTRATION</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <router-view></router-view>
   </v-content>
    <v-footer color="indigo" app>
      <span class="white--text">&copy;{{website.name}}- {{(new Date).getFullYear()}}</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
      drawer: null,
      user:'',
      website:'',
      
    }),
    props: {
      source: String
    },
    mounted(){
      
      this.loadUser()
      this.loadWebsite()
      Events.$on('userUpdated',()=>{
         this.loadUser()
      })
       
      Events.$on('WebsiteStateUpdated',()=>{
        this.loadWebsite()
      })
    },
    computed:{
      loggedIn(){
          return this.$store.getters.loggedIn
      }
    },
    methods:{
     
      loadUser(){
            this.$store.dispatch('loadUser').then(()=>{
                 this.user=this.$store.state.user
            })
      },
      loadWebsite(){
           this.$store.dispatch('loadWebsite').then(()=>{
           this.website=this.$store.state.website
           }) 
      },
      logout(){
        this.$store.dispatch('destroyedToken').then(()=>{
           this.$router.push('/')
        })
      }
    }
  }
</script>