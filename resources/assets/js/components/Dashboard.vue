<template>
  <div>
     <navigation nav-title="Dashboard"></navigation>
  <div class="container-fluid">
       
        <div class="row">
          <div class="col-lg-3 col-6" v-if="dashboard.histories">
        
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{dashboard.histories}}</h3>

                <p>Histories</p>
              </div>
              <div class="icon">
                <i class="fas fa-history"></i>
              </div>
              <router-link to="/about" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
         
          <div class="col-lg-3 col-6" v-if="dashboard.comments">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{dashboard.comments}}</h3>

                <p>Comments added</p>
              </div>
              <div class="icon">
                <i class="fas fa-comment"></i>
              </div>
              <router-link to="/comments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          
          <div class="col-lg-3 col-6" v-if="dashboard.events">
  
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{dashboard.events}}</h3>

                <p>Events registered</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <router-link to="/events" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
         
          <div class="col-lg-3 col-6" v-if="dashboard.images">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{dashboard.images}}</h3>

                <p>Images uploaded</p>
              </div>
              <div class="icon">
                <i class="fas fa-image"></i>
              </div>
              <router-link to="/gallery" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          
           <div class="col-lg-3 col-6" v-if="dashboard.videos">
  
            <div class="small-box" style="background-color:#AB47BC">
              <div class="inner">
                <h3>{{dashboard.videos}}</h3>

                <p>Videos uploaded</p>
              </div>
              <div class="icon">
                <i class="fas fa-video"></i>
              </div>
              <router-link to="/video" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>

           <div class="col-lg-3 col-6" v-if="dashboard.posts">
            
            <div class="small-box " style="background-color:#C2185B">
              <div class="inner">
                <h3>{{dashboard.posts}}</h3>

                <p>Posts published</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <router-link to="/posts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
      
          <div class="col-lg-3 col-6" v-if="dashboard.sliders">
            
            <div class="small-box" style="background-color:#651FFF">
              <div class="inner">
                <h3>{{dashboard.sliders}}</h3>

                <p>Sliders added</p>
              </div>
              <div class="icon">
                <i class="fas fa-sliders-h"></i>
              </div>
              <router-link  to="/settings" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          
          <div class="col-lg-3 col-6" v-if="dashboard.socialites">
            
            <div class="small-box" style="background-color:#004D40">
              <div class="inner">
                <h3>{{dashboard.socialites}}</h3>

                <p>Socials media</p>
              </div>
              <div class="icon">
                <i class="fab fa-facebook"></i>
              </div>
              <router-link to="/settings" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
        </div>
    
      </div>
    </div>
</template>
<script>
import Navigation from './Navigation'
   export default{
       name:'dashboard',
       components:{Navigation},
       data(){
           return{
             dashboard:{
               histories:null,
               comments:null,
               events:null,
               images:null,
               videos:null,
               posts:null,
               sliders:null,
               socialites:null
             }
           }
       },
       mounted(){
          this.loadHistories()
          Events.$on('HistoryCreated',()=>{
               this.loadHistories()
          })
          Events.$on('HistoryCreated',()=>{
               this.loadHistories()
          })
          this.loadComments()
          Events.$on('CommentCreated',()=>{
                this.loadComments()
          })
          this.loadEvents()
          Events.$on('EventCreated',()=>{
                this.loadEvents()
          })
          this.loadImages()
          Events.$on('EventCreated',()=>{
              this.loadImages()
          })
          this.loadVideos()
          Events.$on('VideoCreated',()=>{
             this.loadVideos()
          })
          this.loadPosts();
          Events.$on('PostCreated',()=>{
                  this.loadPosts();
          })
          this.loadSliders()
          Events.$on('SliderCreated',()=>{
              this.loadSliders()
          })
          this.loadSocialMedia()
          Events.$on('SocialMediaCreated',()=>{
              this.loadSocialMedia()
          })
       },
       methods:{
         loadHistories(){
             axios.get('api/about').then(({data})=>{
                     this.dashboard.histories=data.count
             })
          },
          loadComments(){
             axios.get('api/comment').then(({data})=>{
                    this.dashboard.comments=data.count
             })
          },
           loadEvents(){
              axios.get('api/event').then(({data})=>{
                  this.dashboard.events=data.count
             })
          },
           loadImages(){
            axios.get('api/image').then(({data})=>{
                this.dashboard.images=data.count
             
            })
         },
          loadVideos(){
              axios.get('api/video').then(({data})=>{
                  this.dashboard.videos=data.count
              }) 
             
          },
           loadPosts(){
              axios.get('api/post').then(({data})=>{
                  this.dashboard.posts=data.count
                  
              })
            
          },
          loadSliders(){
            axios.get('api/slider').then(({data})=>{
             this.dashboard.sliders=data.count
            })
          },
           loadSocialMedia(){
            axios.get('api/socialite').then(({data})=>{
             this.dashboard.socialites=data.count
            })
         }, 
       }
   }
</script>