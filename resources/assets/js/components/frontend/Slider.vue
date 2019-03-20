<template>
  <div >
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

      <b-carousel-slide  v-for="(item,key) in items" :key="key" :img-src='item.source'  >
        <h1>{{item.title}}</h1>
        <p>
         {{item.subtitle}}
        </p>
      </b-carousel-slide>
    </b-carousel>

  </div>
</template>

<script>
  export default {
       data(){
           return{
               slide: 0,
               sliding: null,
               items:{

               }
           }
	      },
	   mounted(){
			this.loadSliders()
			Echo.channel('my-channel').listen('SliderEvent',(e)=>{
				 this.loadSliders()
				 console.log('my website loged')
			})
	   },
	   methods:{
		   loadSliders(){
			   axios.get('api/slider').then(({data})=>{
                    this.items=data.data 
			   })
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