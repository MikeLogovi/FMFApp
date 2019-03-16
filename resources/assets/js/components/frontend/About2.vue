<template>
<div id='about'>
  <div class='wrapper'>
    <h1 class='about__head'>About us</h1>
    
    <v-timeline>
    <v-timeline-item
      v-for="item in items"
      :key="item.name"
      color="red lighten-2"
      large
    >
      
      <v-card class="elevation-2">
        <v-card-title class="headline about__title">{{item.name}}</v-card-title>
        <v-card-text v-html="item.content" class='about__content'>
        </v-card-text>
      </v-card>
    </v-timeline-item>
  </v-timeline>
</div>
</div>
</template>
<script>

   export default{
      name:"about",
      components:{} ,
      data(){
          return{
              items:[
                  {name:'Our story',
                  content:"Every company has a story to tell. Our story began early in the year 2016 as young Africans students who had a different point of view of our continent Africa. We realized that the perception of Africa to the world was entirely wrong and that its beauty was no where near to this image. We as young Africans knew we had a role to play in changing this perception and showing Africa’s true beauty, so we created our Media company FMF (Focused MindedFolks) because we beleive that young Africans deserve to know Africa’s true unique identity.<br/><br/>FMF is a media company, estalished in Nigeria in 2016 to mobilise resourses and skill in media to promote African youth empowerment ,inovation and and large scale developement in Africa."},
                  {name:'Our services',content:"At FMF, you’ll find a talented team of professionals ready to take on what you need,whether it’s a project or a simplse service,our team is ready deliver a thoughtful well executed job.<br/>These are the core services we provide:<br/><ul> <li>Photography and Videography</li><li>Cinematography</li><li>Event Coverage</li><li>Branding & Reblanding</li></ul><br/>Other services such as Graphic design, Makeup, African Catering, African fashin design are availaible with our team"}
              ]
          }
      }
   }
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Righteous');
@import url('https://fonts.googleapis.com/css?family=Carter+One');
@import url('https://fonts.googleapis.com/css?family=Carter+One|Nanum+Myeongjo');
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,600');
.wrapper{
    margin-left:1.5em;
    margin-right:1.5em;
}
.about__head{
    margin-left:12em ;
    color:#D34639;
    font-size:45px;
}
@media (max-width: 575px) {
   .about__head{
    margin-left:3.5em ;
    color:#D34639;
    font-size:45px;
}
}

@media (min-width:576px) and (max-width:768px){
   .about__head{
    margin-left:5em ;
    color:#D34639;
    font-size:45px;
}
}

@media (min-width:768px) and (max-width:991px) {
   .about__head{
    margin-left:8em ;
    color:#D34639;
    font-size:45px;
}
}

@media (min-width:992px) and (max-width: 1200px) {
   .about__head{
    margin-left:15em ;
    color:#D34639;
    font-size:45px;
}
}
.about__title{
   font-family: 'Righteous', cursive;
   
   font-weight:bold; 
   font-size:35px;
   color:#FF5252;
}
.about__content{
    /*font-family: 'Nanum Myeongjo', serif;*/
    font-family: 'Montserrat', sans-serif;
    font-size:14px;
    
}
#about{
    background-color:rgba(219,219,219,0.5);
    margin-top:1.5em;
}
</style>