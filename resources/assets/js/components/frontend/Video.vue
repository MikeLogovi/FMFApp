<template>
<div>
  <top-bar></top-bar>
   <v-layout>
    <v-flex xs12 sm12>
      <v-card>
        <v-toolbar class='white--text' dark id='toolbar'>
         
          <v-card-title class='video_card_title' offset-xs2>VIDEOS</v-card-title>
          <v-spacer></v-spacer>
          <v-btn>
            <v-icon>search</v-icon>
          </v-btn>
        </v-toolbar>
      
       
        
          <v-flex v-for="(item, index) in items" :key="index">
        
          <div class="row mList" :id="index">
              <div class="col-xs-4 col-xs-offset-2 ">
                   <div class='card__video'>
                        <video width="200" height="150" controls class='video'>
                            <source src="/videos/4.mp4" type="video/mp4">
                            <source src="/videos/4.mp4" type="video/ogg">
                        </video> 
                  </div>
              </div>
             <div class="col-xs-4 ">
                 <div class='description'>
                     <span class='title'>{{item.title}}</span><br/>
                     <p class='heading'>Added at {{now}}</p>
                     <p class='subtitle'><span v-html="item.subtitle"></span></p>
                     <a href='/videos/4.mp4' class='popup btn btn-success'>Wath video</a>
                 </div>
            </div>
             
          </div>
            <hr/>
        
        
         </v-flex>
          
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
        play:false,
        now:moment().fromNow(),
        items: [

          {
            avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
            title: "Chuk's style",
            subtitle: "<span class='text--primary'>Chuk</span> &mdash; is the boss person I have ever seen!!"
          },
           {
            avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
            title: "Chuk's style",
            subtitle: "<span class='text--primary'>Chuk</span> &mdash; is the boss person I have ever seen!!"
          },
           {
            avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
            title: "Chuk's style",
            subtitle: "<span class='text--primary'>Chuk</span> &mdash; is the boss person I have ever seen!!"
          },
         
          {
            avatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
            title: 'Thanks',
            subtitle: "<span class='text--primary'>Mike Logovi</span> &mdash;Thanks Chuks for his confidence."
          }
        ]
      }
    },
    mounted(){
        let that=this;
        this.$nextTick(_=>{
            console.log('ok');
            $(document).ready(function() {
                console.log('coucou');
                $('.popup').magnificPopup({
                    type:'iframe',
            
                    showCloseBtn:false,
                    removalDelay: 300,
                   

                    
                });
                 console.log('cou');
            });

            /* $('.mList').on('click',function(e){
                let id=this.id;
                if(that.play==false){
                   $('.video')[id].play();
                   
                }
                else{
                   $('.video')[id].pause(); 
                }
                that.play=!that.play;
             });*/
        });
        
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
