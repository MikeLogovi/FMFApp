<template>
 <section class="colorlib-blog" id='blog' v-if="posts[0]">
  <div class="container">
   
    <h2 id="here" class="section-heading text-danger h1-responsive font-weight-bold text-center my-5" >RECENT POSTS</h2>
   
    <p class="text-center w-responsive mx-auto mb-5" style="font-style:italic">Our company also try it best to publish many blogs and here are some article we try to publish and show you this evening.We hope you will appreciate them.</p>
   <div v-for="(item,key) in posts" :key="key">
     <div v-if="key%2==0">
                <div class="row">
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
                    <router-link :to="`/post/${item.id}`"><button class="btn btn-danger mb-lg-0 mb-4 waves-light" size="md">Read more</button></router-link>
                  </div>
                </div>
                <hr class="my-5" />
    </div>
     <div v-else>
          <div class="row">
            <div class='col-lg-7'>
            
              <h3 class="font-weight-bold mb-3 p-0 red-text titleit">
                <strong>{{item.title}}</strong>
              </h3>
              <p>{{item.description}}</p>
              <p>by
                <a>
                  <strong>{{item.author}}</strong>
                </a>, {{item.written_at}}</p>
              <router-link :to="`/post/${item.id}`"><button class="btn btn-danger mb-lg-0 mb-4 waves-light" size="md">Read more</button></router-link>
            </div>
            <div class="col-lg-5">
              <v-hover>
                    <v-card slot-scope="{ hover }" :class="`elevation-${hover ? 12 : 2}`"  class="mx-auto" width="344">
                      <v-img :aspect-ratio="16/9" :src="item.attached_image"></v-img>
                    </v-card>
              </v-hover>
            </div>
          </div>
          <hr class="my-5" />
     </div>
  </div>
  </div>
</section>
</template>

<script>
import {mapState} from 'vuex'
export default {
  name: 'BlogPage',
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
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 25px;
  font-family: 'Raleway', sans-serif; 
  position:relative;
}
#here:after{
	position:absolute;
	text-align: center;
  content: "";
  width: 10%;
  height: 2px;
  bottom:-5px;
  left:45%;
  background: #FF3547;
}
.titleit{
   font-family: 'Raleway', sans-serif;
}
</style>