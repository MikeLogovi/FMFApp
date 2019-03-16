<template>
<div>
<v-toolbar id='header'  clipped-right color='#fff' fixed >
   <router-link to='/'> <v-toolbar-title id='logo'>F M F
      </v-toolbar-title></router-link>
    <v-spacer></v-spacer>
    <div light :class="toolItemClass" id='navid'>
      <router-link to='/' ><v-btn flat >Welcome</v-btn></router-link>
      <router-link to='/' class='text-danger'><v-btn flat>Portfolio</v-btn></router-link>
      <router-link to='/galleries' class='text-danger'><v-btn flat>Galleries</v-btn></router-link>
      <router-link to='/videos' class='text-danger'><v-btn flat>videos</v-btn></router-link>
      <router-link to='/about' class='text-danger'><v-btn flat>About</v-btn></router-link>
      <router-link to='/contact' class='text-danger'><v-btn flat>Contact</v-btn></router-link>
    </div>
</v-toolbar>
<div :style="style">
 <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
      
    >
      <v-list class="pt-0" dense>
        <v-divider></v-divider>

        <v-list-tile
          v-for="item in items"
          :key="item.title"
          @click="ok"
        >
        
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title ><router-link :to='item.link' class='text-danger'>{{ item.title }}</router-link></v-list-tile-title>
          </v-list-tile-content>
        
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
</div>
</div>
</template>   

<script>
export default {
   name:'nav-bar',
   props:['isImageComponent'],
   
   data () {
      return {
        style:{},
        drawer: false,
       toolClass:'',
       toolItemClass:'',
        items: [
          { title: '', icon: '',link:'' },
          { title: '        ', icon: '   ',link:'    ' },
          { title: 'WELCOME', icon: 'home',link:'/' },
          { title: 'PORTFOLIO', icon: 'work',link:'/portfolio' },
          { title: 'GALLERIES', icon: 'photo_album',link:'/galleries' },
          { title: 'VIDEOS', icon: 'videocam',link:'/videos' },
          { title: 'ABOUT', icon: 'description',link:'/about' },
          { title: 'CONTACT', icon: 'contact_phone',link:'/contact' },

        ]
      }
   },
   mounted(){
    if(this.isImageComponent){
      this.toolClass=''
      this.$nextTick(()=>{
        $('#navid').hide()
      })
      
    }
    else{
       this.toolClass='hidden-md-and-up'
       this.toolItemClass='hidden-sm-and-down'
    }
   },
   methods:{
     ok(){

     },
     draw(){
       this.drawer=!this.drawer
       if(this.drawer==true){
           this.style={zindex:10000000000000000000000000000000}
       }
       else{
         this.style={zindex:-100}
       }
     }
   }
}
</script>

<style>
#header {
  padding: 10px;
  height: 84px;
  margin-right:1.5em;
  transition: all 0.5s;
  z-index: 997;
  background: #fff;
  box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.06);
}

#header #logo h3 {
  font-size: 30px;
  margin-left: 1.25em;
  padding: 0;
  line-height: 1;
  font-family: "Montserrat", sans-serif;
  font-weight: bold;
}

#header #logo {
  color: #1A237E;
  line-height: 1;
  display: inline-block;
  font-weight:bold;
  font-family:Arial;
  transition:transform 0.3s;
  margin-top:5px;
}
#header #logo:hover{
  transform:scale(1.2);
}

#header #logo h3 a span {
  color: #50d8af;
}
#header #navig{
    margin-right:1.5em;
}

</style>

