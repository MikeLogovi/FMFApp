
<template>
  <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-head text-uppercase text-danger h1-responsive font-weight-bold text-center my-5">Services</h2>
            <h3 class="section-subheading text-muted">FMF is a media company established in Nigeria in 2016 to mobilise resources and skill in media to promote African youth empowerment,inovation and large scale development in Africa.<br/>
                 These are the core services we provide:</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4" v-for="(item,key) in items" :key="key">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-danger"></i>
              <i :class="`${item.icon} fa-stack-1x fa-inverse`"></i>
            </span>
            <h4 class="service-heading"><strong>{{item.name}}</strong></h4> 
          </div>
        </div>
          <div class="row service__behind" >
          <div class="col-lg-12 text-center">
            <h3 class="section-subheading text-muted">Other services such as Graphic design, Make up, African Catering, African fashin design are availaible with our team</h3>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
   export default{
       name:'service',
       components:{},
       data(){
           return{
               items:[
                   {
                       name:'Photography & videography',
                       icon:'fas fa-camera-retro'
                   },
                   {
                       name:'Cinematography',
                       icon:'fas fa-video'
                   },
                   {
                       name:'Event Coverage',
                       icon:'far fa-calendar-check'
                   },
                   {
                       name:'Event Plannig',
                       icon:'far fa-calendar-alt'
                   },
                   {
                       name:'Branding & Reblanding',
                       icon:'fas fa-shopping-cart'
                   },
               ]
           }
       }
   }
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Raleway:500');
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:700');
section {
  padding: 5px 0;
}
#services{
       background-color:#FFB779
}
.section-head{
  font-family: 'Roboto Slab', serif;
  font-weight:bold;
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
  font-family: 'Raleway', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
.service-heading {
  margin: 5px 0;
  text-transform: none;
  font-family:'Raleway',sans-serif
}
.service__behind{
    margin-top:1.5em
}
</style>