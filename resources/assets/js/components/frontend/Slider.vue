<template>
  <carousel :interval="8000" showControls showIndicators>
    <carousel-item  style='font-family:Helvetica' img src="/slide/img/slide1.jpg" mask="black-slight" alt="First slide">
      <carousel-caption title="Slide 1" style='font-family:Helvetica' text="First text"></carousel-caption>
    </carousel-item>
    <carousel-item img src="/slide/img/slide2.jpg" mask="black-slight" alt="Second slide">
      <carousel-caption title="Slide 2" text="Second text"></carousel-caption>
    </carousel-item>
    <carousel-item img src="/slide/img/slide3.jpg" mask="black-slight" alt="Third slide">
      <carousel-caption title="Slide 3" text="Third text"></carousel-caption>
    </carousel-item>
  </carousel>
</template>

<script>
import { Carousel, CarouselItem, CarouselCaption } from 'mdbvue';

export default {
  name: 'CarouselPage',
  components: {
    Carousel,
    CarouselItem,
    CarouselCaption
  }
};
</script>