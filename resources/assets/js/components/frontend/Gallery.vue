

<template>
<div>
     <nav-bar></nav-bar>
      <div id='gal'>
          <v-layout>
    <v-flex xs12 sm12 >
      <v-card>
        <v-card-title id='card__title' class="blue white--text">GALLERY</v-card-title>
        <v-container grid-list-sm fluid>
          <v-layout row wrap>
            <v-flex
              v-for="n in 6"
              :key="n"
              xs6
              sm4
              d-flex
            >
              <v-card flat tile class="d-flex img___card" >
               <a :href="`/img/img${n}.jpg`" class='pop' > 
               <v-img
                  :src="`/img/img${n}.jpg`"
                  :lazy-src="`/img/img${n}.jpg`"
                  aspect-ratio="1"
                  class="picture grey lighten-2"
                >
                
                  <v-layout
                    slot="placeholder"
                    fill-height
                    align-center
                    justify-center
                    ma-0
                  >
                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                  </v-layout>
                </v-img></a>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
    </v-flex>
  </v-layout>

 
  <!--<light-box></light-box>!-->
</div>
<footer-bar></footer-bar>
</div>
</template>

<script>
import NavBar from './NavBar'
import FooterBar from './FooterBar'
import jQuery from 'jquery'
export default {
    name:'gallery',
    components:{NavBar,FooterBar},
    mounted(){
      this.$nextTick(()=>{
       
         $('.pop').magnificPopup({
            type: 'image',
             gallery: {
              enabled: true
            },
             mainClass: 'mfp-with-zoom'
      });
    })}
}
      
  
</script>

<style scoped>
#gal{
    margin:0 auto;
    text-align:center
}
.picture{
  transition:transform 0.3s
}
.img___card:hover{
transform:scale(1.05);
}
.picture :hover{
    transform:scale(1.5);
    background-color:rgba(0,0,0,0.5);
}
#card__title{
  font-family:"Helvetica";
  font-weight: bold;
  color:darkorange;
}
</style>


