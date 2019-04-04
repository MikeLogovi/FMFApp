<template>
<div>
  <top-bar></top-bar>
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
                    <div v-if="item.source">
                         <video 
                         controls
                         preload="auto"
                         class="my-videos"
                         data-setup='{}' width="200" height="200" >
                            <source :src="item.source" type="video/mp4">
                            <source :src="item.source" type="video/ogg">
                        </video>
                       <modal style="z-index:10000000000" :name="`modal${item.id}`" heigth="auto">
                         <div   class="embed-responsive embed-responsive-16by9">
                            <video autoplay class=" embed-responsive-item" 
                                controls
                                preload="auto"
            
                                data-setup='{}' >
                            <source :src="item.source" type="video/mp4">
                            <source :src="item.source" type="video/ogg">
                        </video>
                        </div>
                       </modal>
       
                       
                     
                     </div>
                     <div v-else-if="item.link">
                       <iframe width="200" height="200" :src="`${item.link}?autoplay=0`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <modal style="z-index:10000000000" :name="`modal${item.id}`"  height="auto">
                          <div class="embed-responsive embed-responsive-16by9">
                            <iframe  class="embed-responsive-item"  :src="`${item.link}`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div>
                       </modal>
                       
                     </div>
                  </div>
              </div>
             <div class="col-lg-4 ">
                 <div class='description' ref="description">
                     <span class='title'>{{item.name}}</span><br/>
                     <p class='heading'>Added {{item.created_at|now}}</p>
                     <p class='subtitle'><span v-html="item.description"></span></p>
                     <button   @click="show('modal'+item.id)" class='btn btn-success'>Wath video</button>
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


 export default {
   components:{TopBar,NewFooter},


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
          })
        
    },
    methods:{
        paginate(page = 1) {
        axios.get('api/video?page=' + page)
            .then(response => {
              this.items = response.data.paginate;
            });
        },
         loadVideos(){
            axios.get('api/video').then(({data})=>{
                  this.items=data.paginate
            })
         },
         show(modal) {
             this.$modal.show(modal);
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

/*.mList:hover{
    opacity:0.7;
    background-color:#E0E0E0;
    z-index:-2;
}*/
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
