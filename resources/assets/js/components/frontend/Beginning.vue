<template>
<div class="wellcome-area peach-gradient">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div >
              <div >
                <h1 style="color:white" class="display-1 text-uppercase h1-responsive font-weight-bold text-center my-5">{{item.quote}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default{
      name:'beginning',
      components:{},
      data(){
          return{
               item:{
                 
               }
          }
      },
      mounted(){
        this.loadWebsiteParams()
        Echo.channel('my-channel').listen('WebsiteStateChanged',(e)=>{
          this.loadWebsiteParams()
          console.log('my website loged again')
        })
	   },
	   methods:{
		   loadWebsiteParams(){
			   axios.get('api/website').then(({data})=>{
                    this.item=data 
			   })
		   }
	   }
  }
</script>
<style scoped>
.wellcome-area {
  background: #EEE ;
  background-size: cover;
  background-position: center top;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.well-bg {
  position: relative;
}

.wellcome-text {
  margin: 70px 0;
  padding: 30px 40px;
}

.well-text>h2 {
  color: #CE1B28;
  font-size: 44px;
  font-weight: 500;
  line-height: 50px;
  font-family:'Droid serif'
}

.well-text p {
  font-size: 18px;
  font-style: italic;
  color: #fff;
}

.wellcome-text .section-headline p {
  margin-bottom: 0;
}

</style>