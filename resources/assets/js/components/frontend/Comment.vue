<template>
<section id="team" v-if="comments[0]">
   <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="text-danger h1-responsive font-weight-bold text-center my-5">WHAT PEOPLE THINK ABOUT US</h2>
            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4" v-for="(item,key) in comments" :key="key">
            <div class="team-member">
              <img class="mx-auto rounded-circle" :src="item.avatar" alt="">
              <h4>{{item.fullName}}</h4>
              <p class="text-muted">{{item.comment}}</p>
              
            </div>
          </div>
        </div>
 </div>
</section>
</template>
<script>
   import {mapState} from 'vuex'
   export default{
       name:'comment',
       mounted(){
        this.loadComments()
        Echo.channel('my-channel').listen('CommentEvent',(e)=>{
          this.loadComments()
        })
     },
     computed:{
        ...mapState([
          'comments'
        ])
     },
	   methods:{
		   loadComments(){
         this.$store.dispatch('loadCommentsVue')
		   }
	   }
 }
</script>
<style scoped>
#team{
  background-color:rgba(253,253,253,0.5);
}
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 15px;
}

section h3.section-subheading {
  font-size: 16px;
  font-weight: 400;
  font-style: italic;
  margin-bottom: 75px;
  text-transform: none;
  font-family: 'Droid Serif', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
.team-member {
  margin-bottom: 50px;
  text-align: center;
}

.team-member img {
  width: 225px;
  height: 225px;
  border: 7px solid #fff;
}

.team-member h4 {
  margin-top: 25px;
  margin-bottom: 0;
  text-transform: none;
}

.team-member p {
  margin-top: 0;
}
ul.social-buttons {
  margin-bottom: 0;
}

ul.social-buttons li a {
  font-size: 20px;
  line-height: 50px;
  display: block;
  width: 50px;
  height: 50px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  color: white;
  border-radius: 100%;
  outline: none;
  background-color: #212529;
}

ul.social-buttons li a:active, ul.social-buttons li a:focus, ul.social-buttons li a:hover {
  background-color: #fed136;
}
</style>