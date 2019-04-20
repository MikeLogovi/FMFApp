<template>
 <section id="about" style="z-index:-1;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-head text-danger h1-responsive font-weight-bold text-center my-5">OUR STORY</h2>
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li v-if="key%2==0"   v-for="(item,key) in histories" :key="key">
                <div class="timeline-image" style='background-color:#FF8100'>
                   <img class="rounded-circle img-fluid" style='width:100%;height:100%'  :src="item.source" alt="" v-if="item.source">
                   <h2 class="circle_titleit ctitle" v-else-if="item.circle_title" style="color:black;">{{item.circle_title}}</h2>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 v-if="item.period">{{item.period|yearDate}}</h4>
                    <h4 class="subhead text-danger ok">{{item.title}}</h4>
                  </div>
                  <div class="timeline-body history">
                    <p><strong>{{item.history}}</strong></p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted" v-else>
                <div class="timeline-image" style='background-color:#FF8100'>
                  <img class="rounded-circle img-fluid" style='width:100%;height:100%'  :src="item.source" alt="" v-if="item.source">
                   <h2 style="color:black;" class="circle_titleit ctitle" v-else-if="item.circle_title" >{{item.circle_title}}</h2>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>{{item.period|yearDate}}</h4>
                    <h4 class="ok subhead text-danger">{{item.title}}</h4>
                  </div>
                  <div class="timeline-body history" >
                    <p><strong>{{item.history}}</strong></p>
                  </div>
                </div>
              </li> 
              <li class="timeline-inverted" >
                <div class="timeline-image " style='background-color:#E74C3C'>
                  <h4 class="circle_titleit circle_quote" style="color:white;" v-if="website.about_quote">{{website.about_quote}}</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import {mapState} from 'vuex'
  export default{
     name:'about',
     components:{},
     data(){
       return{
         items:{

         }
       }
     },
      mounted(){
			this.loadHistories()
			Echo.channel('my-channel').listen('AboutEvent',(e)=>{
				 this.loadHistories()
				 
			})
     },
     computed:{
         ...mapState([
           'website',
           'histories'
         ])
     },
	   methods:{
		   loadHistories(){
         this.$store.dispatch('loadHistoriesVue')
		   }
	   }
  }
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Raleway:500');
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
.section-head{
  font-family:'Roboto Slab',serif;
  font-weight:bold;
}
.section-head:after{
	position:absolute;
	text-align: center;
    content: "";
    width: 10%;
    height: 2px;
    bottom:35px;
    left:45%;
    background: #FF3547;
     

}
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 15px;
}
.circle_titleit{
  font-family:'Roboto Slab',serif;
  font-weight:400;
  
}
.ctitle{
  font-size:25px;
}
.history{
  font-family:'Raleway',serif;
  font-size:22px;
}
.timeline {
  position: relative;
  padding: 0;
  list-style: none;
}

.timeline:before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 40px;
  width: 2px;
  margin-left: -1.5px;
  content: '';
  background-color: #e9ecef;
}

.timeline > li {
  position: relative;
  min-height: 50px;
  margin-bottom: 50px;
}

.timeline > li:after, .timeline > li:before {
  display: table;
  content: ' ';
}

.timeline > li:after {
  clear: both;
}

.timeline > li .timeline-panel {
  position: relative;
  float: right;
  width: 100%;
  padding: 10px 20px 0 100px;
  text-align: left;
}

.timeline > li .timeline-panel:before {
  right: auto;
  left: -15px;
  border-right-width: 15px;
  border-left-width: 0;
}

.timeline > li .timeline-panel:after {
  right: auto;
  left: -14px;
  border-right-width: 14px;
  border-left-width: 0;
}

.timeline > li .timeline-image {
  position: absolute;
  z-index: 100;
  left: 0;
  width: 80px;
  height: 80px;
  margin-left: 0;
  text-align: center;
  color: black;
  border: 7px solid #e9ecef;
  border-radius: 100%;
  background-color: #fed136;
}

.timeline > li .timeline-image h4 {
  font-size:10px;
  padding-right:6px;
  padding-left:6px;
  line-height: 14px;
  margin: 20% auto;
}
.timeline > li .timeline-image h2 {
  font-size:14px;
  line-height: 14px;
  margin: 30% auto;
}

.timeline > li.timeline-inverted > .timeline-panel {
  float: right;
  padding:10px 20px 0 100px;
  text-align: left;
}

.timeline > li.timeline-inverted > .timeline-panel:before {
  right: auto;
  left: -15px;
  border-right-width: 15px;
  border-left-width: 0;
}

.timeline > li.timeline-inverted > .timeline-panel:after {
  right: auto;
  left: -14px;
  border-right-width: 14px;
  border-left-width: 0;
}

.timeline > li:last-child {
  margin-bottom: 0;
}

.timeline .timeline-heading h4 {
  margin-top: 0;
  color: inherit;
  font-size:25px;
}

.timeline .timeline-heading h4.subhead {
  font-size:15px;
  font-family:'Raleway',serif;
  font-weight:bold;
  
}

.timeline .timeline-body > ul,
.timeline .timeline-body > p {
  margin-bottom: 0;
}

@media (min-width: 768px) {
  .timeline .timeline-heading h4.subhead{
    font-size:40px;
  }
  .timeline:before {
    left: 50%;
  }
  .timeline > li {
    min-height: 100px;
    margin-bottom: 100px;
  }
  .timeline > li .timeline-panel {
    float: left;
    width: 41%;
    padding: 5px 20px 20px 30px;
    text-align: right;
  }
  .timeline > li .timeline-image {
    left: 50%;
    width: 100px;
    height: 100px;
    margin-left: -50px;
  }
  .timeline > li .timeline-image h4 {
    font-size: 13px;
    line-height: 18px;
    margin-top: 16px;
    padding-right:10px;
    padding-left:10px;
    
  }
   .timeline > li .timeline-image h2 {
    margin: 35% auto;
    font-size: 16px;
    line-height: 18px;
    
  }
  .timeline > li.timeline-inverted > .timeline-panel {
    float: right;
    padding: 5px 30px 20px 20px;
    text-align: left;
  }
  
}

@media (min-width: 992px) {
  .timeline .timeline-heading h4.subhead{
    font-size:45px;
  }
  .timeline > li {
    min-height: 150px;
  }
  .timeline > li .timeline-panel {
    padding: 25px 20px 20px;
  }
  .timeline > li .timeline-image {
    width: 150px;
    height: 150px;
    margin-left: -75px;
  }
  .timeline > li .timeline-image h4 {
    font-size: 14px;
    line-height: 26px;
    margin:30% auto;
  }
  .timeline > li .timeline-image h2 {
    font-size: 25px;
    line-height: 26px;
    margin:35% auto;
  }
  .timeline > li.timeline-inverted > .timeline-panel {
    padding: 25px 20px 20px;
  }
  
}

@media (min-width: 1200px) {
  .timeline .timeline-heading h4.subhead{
    font-size:45px;
  }
  .timeline > li {
    min-height: 170px;
  }
  .timeline > li .timeline-panel {
    padding: 25px 20px 20px 100px;
  }
  .timeline > li .timeline-image {
    width: 170px;
    height: 170px;
    margin-left: -85px;
  }
  .timeline > li .timeline-image h4 {
    margin-top: 40px;
    font-size:16px;
  }
  .timeline > li .timeline-image h2 {
    margin:35% auto;
  }
  .timeline > li.timeline-inverted > .timeline-panel {
    padding: 25px 100px 20px 20px;
  }
  .ctitle{
    font-size:25px;
  }
}

</style>