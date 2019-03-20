<template>
<div>
  <top-bar></top-bar>
  <gallery :images="videos" :index="index" @close="index = null"></gallery>
   <v-layout>
    <v-flex lg12 sm12>
      <v-card>
        <v-toolbar class='white--text' dark light id='toolbar'>
         
          <v-card-title class='video_card_title' offset-lg2>VIDEOS</v-card-title>
          <v-spacer></v-spacer>
              <v-toolbar
              dense
              dark
    
          >
      <v-text-field
        hide-details
        prepend-icon="search"
        single-line
        v-model="query"
        @keyup="search"
      ></v-text-field>

    </v-toolbar>
        </v-toolbar>
      
       
        <div style="margin-top:0.75em">
          <v-flex v-for="(item, key) in items.data" :key="key">
        
          <div class="row mList" :id="key" >
              <div class="col-lg-4 col-lg-offset-2 ">
                   <div class='card__video'>
                      <video width="200" height="170" controls class='video'>
                            <source :src="item.source" type="video/mp4">
                            <source :src="item.source" type="video/ogg">
                        </video>  
                
                       
                  </div>
              </div>
             <div class="col-lg-4 ">
                 <div class='description'>
                     <span class='title'>{{item.name}}</span><br/>
                     <p class='heading'>Added {{item.created_at|now}}</p>
                     <p class='subtitle'><span v-html="item.description"></span></p>
                     <button   @click="index = key" class='popup btn btn-success'>Wath video</button>
                 </div>
            </div>
             
          </div>
            <hr/>
        
        
         </v-flex>
           
                 <pagination :data="items" @pagination-change-page="paginate">
                    <span slot="prev-nav">&lt;</span>
                    <span slot="next-nav">&gt;</span>
                  </pagination>
               
        </div>  
      </v-card>
    </v-flex>
  </v-layout>
  <new-footer></new-footer>
</div>
</template>

<script>
import TopBar from './TopBar'
import NewFooter from './NewFooter'
 import VueGallery from 'vue-gallery';
 export default {
   components:{TopBar,NewFooter, 'gallery': VueGallery},


    data () {
      return {
        query:'',
        play:false,
        now:moment().fromNow(),
        items: {},
        videos:['/videos/4.mp4'],
        index: null
      }
    },
    mounted(){
        	this.loadVideos()
          Echo.channel('my-channel').listen('VideoEvent',(e)=>{
            this.loadVideos()
            console.log('my website loged')
          })
        
    },
    methods:{
        paginate(page = 1) {
  axios.get('api/video?page=' + page)
            .then(response => {
              this.items = response.data;
            });
        },
         loadVideos(){
            axios.get('api/video').then(({data})=>{
                       
                        this.items=data 
            })
         },
          openModal () {
            console.log(this.$refs.modal)
          },
          search(){
            setTimeout(()=>{
                 axios.get('/videos/search?query='+this.query).then(({data})=>{
                    
                     this.items=data
                     
                  })
            },500)
             
          }
                 
          
            
          
    }
   
  }
</script>

<style>
#toolbar{
  background-color: #E74C3C;
}
.card__video{
    margin-left:5em;
  
}
.card__video__title{
    margin-left:5em;
}
.card__content{
    height:150px;
}

.mList:hover{
    opacity:0.7;
    background-color:#E0E0E0;

}
.description{
    margin-left:1.5em;
    margin-top:1.5em;
}
.video_card_title{
  font-size:18px;
  font-weight: bold;
  color:#fff;

}
@media only screen and (min-width: 20px) and (max-width: 767px) {
  .description{
    margin-left:4.8em;
    margin-top:2.5em;
}
}
</style>
