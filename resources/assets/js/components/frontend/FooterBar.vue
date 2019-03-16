<template>

  <v-footer
    dark
    height="auto"
    id='foot'
    
  >
    <v-card
      class="flex grey darken-3 lighten-1 white--text text-xs-center"
      flat
      tile
      text-xs-center
    >
      <v-card-title  class="  grey darken-3 lighten-1 white--text text-xs-center justify-center">
        <strong class="sub">Follow me on my social network!</strong>
      </v-card-title>
      <div id='social'>
      <v-card-text>
          <v-btn
          v-for="(icon,index) in icons"
          :key="index"
          class="mx-3"
          dark
          icon
        >
          <v-icon  class='icons' :style='icon.color'>{{ icon.name }}</v-icon>
        </v-btn>
      </v-card-text>
      </div>

      <v-card-actions class="grey darken-3 justify-center ">
        &copy;{{new Date().getFullYear()}}— <strong>Chuck's</strong>
      </v-card-actions>
    </v-card>
  </v-footer>
</template>

<script>
  export default {
     name:'footer-bar',
    data: () => ({
      icons: [
        {
          name:'fa fa-facebook',
          color:{backgroundColor:'#4267B2'}
        },
        {
          name:'fa fa-twitter',
          color:{backgroundColor:'#1C9DEC'}
        },
        {
          name:'fa fa-google-plus',
          color:{backgroundColor:'#E53935'}
        },
        {
          name:'fa fa-linkedin',
          color:{backgroundColor:'#006699'}
        },
        {
          name:'fa fa-instagram',
          color:{backgroundColor:'#553C7B'}
        },
        
        
      ],
      rows:[
       
         {
          title:"INFORMATION",
          children:["Tel:00000000","E-mail:chuks@chuks.com","working place:Ben Aknou"]
        
        },
        {
          title:"INFORMATION",
          children:["Tel:00000000","E-mail:chuks@chuks.com","working place:Ben Aknou"]
        },
        {
          title:"INFORMATION",
          children:["Tel:00000000","E-mail:chuks@chuks.com","working place:Ben Aknou"]
        },
        {
          title:"INFORMATION",
          children:["Tel:00000000","E-mail:chuks@chuks.com","working place:Ben Aknou"]
        },
      
         
      ]
    })
  }
</script>

<style>
#social{
  margin-bottom:1em;
}
.sub{
  font-size:25px;
}
.icons :hover{
  width:100px;
  height:100px;
  transform:translateY(50px);
  background-color:rgba(3,122,152,1);

}
.icons{
   width:1000px;
   height:35px;
   border-radius:50% ;
   transition:transform 0.3s;
}

</style>
