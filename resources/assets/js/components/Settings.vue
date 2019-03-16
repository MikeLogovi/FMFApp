<template>
  <div>
    <navigation nav-title="Settings" nav-action="#"></navigation>
    <v-layout>
    <v-flex xs12>
      <v-card>
       
        <v-card-title primary-title>
          <div>
            <h1 class="mb-0 text-primary">SETTINGS</h1>
           </div>
        </v-card-title>
        <!--WEBSITE STATE-->
        <website-state></website-state>
        <hr/>
        <social-media></social-media>
        <hr/>
        <slider></slider>
        <hr/>
        <footer-form></footer-form>
      </v-card>
    </v-flex>
  </v-layout>
</div>
</template>
<script>
 function getFileExtension(file){
        var name=file.split('.')
        if(name.length===1||(name[0]==''&& name.length==2)){
          return ''
        }
        else{
          return name[1];
        }
  }

import Navigation from './Navigation'
import WebsiteState from './WebsiteState'
import SocialMedia from './SocialMedia'
import Slider from './Slider'
import FooterForm from './FooterForm'
export default{
    name:'settings',
    components:{Navigation,WebsiteState,SocialMedia,Slider,FooterForm},
    data(){
       return{
          
       }
    },
   
}
</script>
<style scoped>
</style>
