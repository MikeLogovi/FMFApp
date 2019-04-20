<template>
<div class="wellcome-area degrade">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div >
              <div >
                <h1 style="color:white" class="h1-responsive text-center text-uppercase quote" v-if="website">{{website.quote}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import {mapState} from 'vuex'
  export default{
      name:'beginning',
      components:{},
     
      computed:{
       ...mapState([
         'website'
       ])
      },
  }
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Raleway:500');
.wellcome-area {
  background-size: cover;
  background-position: center top;
  background-repeat: no-repeat;
  background-attachment: fixed;
  
}
/*#F99100*/
.degrade{
  background:-webkit-linear-gradient(left,#F7F200,#F85700,#F40000);
  background:-moz-linear-gradient(right,#F7F200,#F85700,#F40000);
  background:-o-linear-gradient(right,#F7F200,#F85700,#F40000);
  background:linear-gradient(to right,#F7F200,#F85700,#F40000);

}
.quote{
  font-family:'Raleway',serif;
  font-weight: bold;
}
.well-bg {
  position: relative;
}


</style>