<template>
 <section class="colorlib-blog" id='blog' v-if="posts[0]">
  <container>
    <h2 class="section-heading text-danger h1-responsive font-weight-bold text-center my-5" >RECENT POSTS</h2>
    <p class="text-center w-responsive mx-auto mb-5" style="font-style:italic">Our company also try it best to publish many blogs and here are some article we try to publish and show you this evening.We hope you will appreciate them.</p>
   <div v-for="(item,key) in posts" :key="key">
     <div v-if="key%2==0">
    <row>
      <div class="col-lg-5">
        <v-hover>
              <v-card slot-scope="{ hover }" :class="`elevation-${hover ? 12 : 2}`"  class="mx-auto" width="344">
                <v-img :aspect-ratio="16/9" :src="item.attached_image"></v-img>
              </v-card>
        </v-hover>
      </div>
      <div class="col-lg-7">
        <h3 class="font-weight-bold mb-3 p-0 red-text titleit">
          <strong>{{item.title}}</strong>
        </h3>
        <p>{{item.description}}</p>
        <p>by
          <a>
            <strong>{{item.author}}</strong>
          </a>, {{item.written_at}}</p>
        <router-link :to="`/post/${item.id}`"><btn color="danger" size="md" class="waves-light ">Read more</btn></router-link>
      </div>
    </row>
    <hr class="my-5" />
     </div>
     <div v-else>
    <row>
      <div class='col-lg-7'>
      
        <h3 class="font-weight-bold mb-3 p-0 red-text titleit">
          <strong>{{item.title}}</strong>
        </h3>
        <p>{{item.description}}</p>
        <p>by
          <a>
            <strong>{{item.author}}</strong>
          </a>, {{item.written_at}}</p>
        <btn color="danger" size="md" class="mb-lg-0 mb-4 waves-light">Read more</btn>
      </div>
      <div class="col-lg-5">
        <v-hover>
              <v-card slot-scope="{ hover }" :class="`elevation-${hover ? 12 : 2}`"  class="mx-auto" width="344">
                <v-img :aspect-ratio="16/9" :src="item.attached_image"></v-img>
              </v-card>
        </v-hover>
      </div>
    </row>
    <hr class="my-5" />
    </div>
  </div>
  </container>
</section>
</template>

<script>
import { Container, Row, Card, CardBody, mdbMask, mdbIcon,  Btn } from 'mdbvue';
import {mapState} from 'vuex'
export default {
  name: 'BlogPage',
  components: {
    Container,
    Row,
    
    Card,
    CardBody,
    mdbMask,
    mdbIcon,
    
    Btn
  },
  
	   mounted(){
			this.loadPosts()
			Echo.channel('my-channel').listen('PostEvent',(e)=>{
				 this.loadPosts()
				
			})
     },
     computed:{
       ...mapState([
         'posts'
       ])
     },
	   methods:{
		   loadPosts(){
         this.$store.dispatch('loadPosts')
			   
		   }
	   }
};
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Raleway:700&subset=latin-ext');
.colorlib-blog{
  padding: 2em 0;
  clear: both;
   background-color:#FFB779
}

  .article-entry .blog-img {
  height: 250px;
  display: block;
  position: relative; }
  .article-entry .blog-img .meta {
    line-height: 1.4;
    text-transform: uppercase;
    position: absolute;
    bottom: -49px;
    left: 1em;
    text-align: center; }
    .article-entry .blog-img .meta span {
      display: block;
      color: #000;
      font-weight: 700; }
    .article-entry .blog-img .meta .day {
      font-size: 24px;
      position: relative;
      padding: 5px 10px;
      color: #fff;
      background: #E74C3C; }
    .article-entry .blog-img .meta .month {
      font-size: 14px;
      font-weight: 400;
      padding: 5px 10px;
      color: #333333;
      background: #fff; }
  @media screen and (max-width: 768px) {
    .article-entry .blog-img {
      height: 400px; } }
  @media screen and (max-width: 480px) {
    .article-entry .blog-img {
      height: 270px; } }

.article-entry .desc {
  padding: 2.5em 1.5em;
  margin-bottom: 20px;
  position: relative; }
  .article-entry .desc h2 {
    font-size: 22px; }
   
  .article-entry .desc .admin {
    margin-bottom: 20px; }
    .article-entry .desc .admin span:last-child {
      color: #000; }
.blog-img{
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  position: relative;
}
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 25px;
  font-family: 'Raleway', sans-serif;
}
.titleit{
   font-family: 'Raleway', sans-serif;
}
</style>