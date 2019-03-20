<template>
<div>
  <top-bar></top-bar>
  <section class="my-5">

  <!-- Grid row -->
  <v-layout>
  

    <!-- Grid column -->
    <v-flex sm8 offset-sm2>

      <!-- Card -->
       <v-hover>
    <v-card
      slot-scope="{ hover }"
      :class="`elevation-${hover ? 12 : 2}`"
      class="mx-auto"
      
    >
      <v-img
        :aspect-ratio="16/9"
        :src="item.attached_image"
      ></v-img>
        <div class="card-body card-body-cascade text-center">

          <!-- Title -->
          <h2 class="font-weight-bold"><a>{{item.title}}</a></h2>
          <!-- Data -->
          <p>Written by <a><strong>{{item.author}}</strong></a>, {{item.written_at}}</p>
          <!-- Social shares -->
          <div class="row">
            <!-- Facebook -->
            <v-flex sm8 offset-sm2>
            <a v-if="item.attached_link" class="btn btn-primary" :href="item.attached_link" target="_blank">
              <i class="fas fa-link"></i>
              <span class="clearfix d-none d-md-inline-block">Go to here</span>
            </a>
           
            <a v-if="item.attached_file" class="btn btn-info" :href="`/download_post_file/${item.id}`">
              <i class="fas fa-book"></i>
              <span class="clearfix d-none d-md-inline-block">Download post document</span>
            </a>
           </v-flex>
          </div>
        </div>
     
    </v-card>
  </v-hover>
  
      <v-flex sm8 offset-sm2>
      <div class="mt-5">
              <p>{{item.description}}</p>
      </div>
      </v-flex>

    </v-flex>
    <!-- Grid column -->
  <!-- Grid row -->

  
  <!-- Grid row -->

  <hr class="mb-5 mt-4">
 </v-layout>
</section>
<new-footer></new-footer> 
</div>
<!-- Section: Blog v.4 -->
</template>
<script>
import NewFooter from './NewFooter'
import TopBar from './TopBar'
export default{
   name:'my-blog',
   components:{NewFooter,TopBar},
   data(){
       return{
            item:{},
       }
   },
   mounted(){
     this.loadPostInformations()
     	Echo.channel('my-channel').listen('PostEvent',(e)=>{
				 this.loadPostInformations()
				
			})
   },
   methods:{
     loadPostInformations(){
       axios.get(' api/post/'+this.$route.params.id).then(({data})=>{
              this.item=data
       })
     }
   }
}
</script>
<style scoped>
</style>