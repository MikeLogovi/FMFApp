<style scoped>
/*@import url("/vendor/fontawesome-free/css/all.css");*/
</style>
<template>
  <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="text-uppercase text-danger h1-responsive font-weight-bold text-center my-5">Services</h2>
            <h3 class="section-subheading text-muted">At FMF, you’ll find a talented team of professionals ready to take on what you need,whether it’s a project or a simplse service,
                      our team is ready deliver a thoughtful well
                  executed job.<br/>
                 These are the core services we provide:</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4" v-for="(item,key) in items" :key="key">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-danger"></i>
              <i :class="`${item.icon} fa-stack-1x fa-inverse`"></i>
            </span>
            <h4 class="service-heading">{{item.name}}</h4> 
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
                       name:'Photography and videography',
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

section {
  padding: 5px 0;
}
#services{
    background-color:rgba(245,245,245,0.5);
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
.service-heading {
  margin: 5px 0;
  text-transform: none;
}
.service__behind{
    margin-top:1.5em
}
</style>