<template>
  <div v-if="sliders[0]" id="slider">
    <b-carousel
      id="carousel1"
      style="text-shadow: 1px 1px 2px #333; margin-top:0"
      controls
      indicators
      background="#ababab"
      :interval="4000"
      img-width="1024"
      img-height="480"
      v-model="slide"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
      class="h1-responsive font-weight-bold text-center"
    >

      <b-carousel-slide  v-for="(item,key) in sliders" :key="key" :img-src='item.source'  >
        <h1>{{item.title}}</h1>
        <p>
         {{item.subtitle}}
        </p>
      </b-carousel-slide>
    </b-carousel>

  </div>
</template>

<script>
import { mapState } from 'vuex';
  export default {
       data(){
           return{
               slide: 0,
               sliding: null,
              
           }
	      },
	   mounted(){
			this.loadSliders()
			Echo.channel('my-channel').listen('SliderEvent',(e)=>{
				 this.loadSliders()
				 
			})
     },
     computed:{
       ...mapState([
         'sliders'
       ])
     },
	   methods:{
		   loadSliders(){
         this.$store.dispatch('loadSlidersVue')
		   },
        onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
	   }
   
    
  }
</script>