<template>
<div>
 <v-layout>
  <carousel :interval="8000" showControls showIndicators >
    <carousel-item v-for='(item,key) in items' :key='key' class="h1-responsive font-weight-bold text-center my-5" img :src="item.source" mask="black-slight" :alt="`Slider ${key}`"  >
      <carousel-caption :title="item.title" style='font-family:Helvetica' :text="item.subtitle"></carousel-caption>
    </carousel-item>
  </carousel>
  </v-layout>
</div>
</template>

<script>
import { Carousel, CarouselItem, CarouselCaption } from 'mdbvue';

export default {
  name: 'CarouselPage',
  components: {
    Carousel,
    CarouselItem,
    CarouselCaption
  },

};
</script>