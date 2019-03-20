<template>
  <section  id="portfolio">
      <div class="container">
       
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="text-uppercase text-danger h1-responsive font-weight-bold text-center my-5">Portfolio</h2>
          </div>
        </div>
         <div class='row text-center'>
           <div class='btnRow'>
                <button @click="loadRandomImages" class='btn red lighten-1'>Random events</button>
                <button @click="loadSpecificImages(category.id)" v-for="(category,key) in categories" :key="key" class='btn red lighten-1'>{{category.name}}</button>
           </div>
        </div>
        <div>
        <div class="row" v-viewer="{movable: false}">
         
              <div v-for="(item,key) in items" :key="key" class="col-md-4 col-sm-6 portfolio-item" >
                <a class="pop portfolio-link"  :href="item.source">
                  <div class="portfolio-hover">
                    
                  </div>
                  <img class="img-fluid" :src="item.source" alt="">
                </a>
              </div>
         
        </div>
        </div>
         <div class='row text-center'>
           <div class='btnRow'>
             
                  <router-link to='/galleries'  id='more'><button class='btn red lighten-1'>Load more</button></router-link>
            
         </div>
        </div>
      </div>
    </section>

</template>
<script>
   export default{
      name:'portfolio',
      components:{},
     data(){
       
        return{
           items:{},
           categories:{},
           isRandomButton:true,
        }
	   },
	   mounted(){
       this.$nextTick(()=>{
          $('.pop').magnificPopup({
                    type: 'image',
                    gallery: {
                      enabled: true
                    },
                    mainClass: 'mfp-with-zoom'
              });
          })
			this.loadRandomImages()
      this.loadCategories()
			Echo.channel('my-channel').listen('ImageEvent',(e)=>{
				 if(this.isRandomButton==true){
               this.loadRandomImages()
         }
         
			})
	   },
	   methods:{
		   loadRandomImages(){
         
			   axios.get('/portfolio/random').then(({data})=>{
                    this.items=data
                    this.isRandomButton=true 
			   })
         
		   },
       loadCategories(){
          axios.get('api/imageCategory').then(({data})=>{
                    this.categories=data.data
                    console.log('My data'+data)
			   })
       },
        show () {
          const viewer = this.$el.querySelector('.images').$viewer
          viewer.show()
        },
       loadSpecificImages(id){
           axios.get('/portfolio/'+id).then(({data})=>{
                    this.items=data
                    this.isRandomButton=false 
			   })
       }
	   }
   }
</script>
<style scoped>
.btnRow{
  margin:0 auto;
  margin-bottom:1.5em;
 
}
#portfolio{
   background-color:rgba(250,250,250,0.5);
}


  #portfolio .portfolio-item {
  right: 0;
  margin: 0 0 15px;
}
#more{
  font-size:18px;
}

#portfolio .portfolio-item .portfolio-link {
  position: relative;
  display: block;
  max-width: 400px;
  max-height:300px;
  margin: 0 auto;
  cursor: pointer;
}

#portfolio .portfolio-item .portfolio-link .portfolio-hover {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-transition: all ease 0.5s;
  transition: all ease 0.5s;
  opacity: 0;
  background: rgba(231,95,60,0.5);
}

#portfolio .portfolio-item .portfolio-link .portfolio-hover:hover {
  opacity: 1;
}

#portfolio .portfolio-item .portfolio-link .portfolio-hover .portfolio-hover-content {
  font-size: 20px;
  position: absolute;
  top: 50%;
  width: 100%;
  height: 20px;
  margin-top: -12px;
  text-align: center;
  color: white;
}

#portfolio .portfolio-item .portfolio-link .portfolio-hover .portfolio-hover-content i {
  margin-top: -12px;
}

#portfolio .portfolio-item .portfolio-link .portfolio-hover .portfolio-hover-content h3,
#portfolio .portfolio-item .portfolio-link .portfolio-hover .portfolio-hover-content h4 {
  margin: 0;
}

#portfolio .portfolio-item .portfolio-caption {
  max-width: 400px;
  margin: 0 auto;
  padding: 25px;
  text-align: center;
  background-color: #fff;
}

#portfolio .portfolio-item .portfolio-caption h4 {
  margin: 0;
  text-transform: none;
}

#portfolio .portfolio-item .portfolio-caption p {
  font-size: 16px;
  font-style: italic;
  margin: 0;
  font-family: 'Droid Serif', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 15px;
  color:#E74C3C;
}

#portfolio * {
  z-index: 2;
}

@media (min-width: 767px) {
  #portfolio .portfolio-item {
    margin: 0 0 30px;
  }
}

.portfolio-modal {
  padding-right: 0px !important;
}

.portfolio-modal .modal-dialog {
  margin: 1rem;
  max-width: 100vw;
}

.portfolio-modal .modal-content {
  padding: 100px 0;
  text-align: center;
}

.portfolio-modal .modal-content h2 {
  font-size: 3em;
  margin-bottom: 15px;
 
}

.portfolio-modal .modal-content p {
  margin-bottom: 30px;
}

.portfolio-modal .modal-content p.item-intro {
  font-size: 16px;
  font-style: italic;
  margin: 20px 0 30px;
  font-family: 'Droid Serif', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}

.portfolio-modal .modal-content ul.list-inline {
  margin-top: 0;
  margin-bottom: 30px;
}

.portfolio-modal .modal-content img {
  margin-bottom: 30px;
}

.portfolio-modal .modal-content button {
  cursor: pointer;
}

.portfolio-modal .close-modal {
  position: absolute;
  top: 25px;
  right: 25px;
  width: 75px;
  height: 75px;
  cursor: pointer;
  background-color: transparent;
}

.portfolio-modal .close-modal:hover {
  opacity: 0.3;
}

.portfolio-modal .close-modal .lr {
  /* Safari and Chrome */
  z-index: 1051;
  width: 1px;
  height: 75px;
  margin-left: 35px;
  /* IE 9 */
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  background-color: #E74C3C;
}

.portfolio-modal .close-modal .lr .rl {
  /* Safari and Chrome */
  z-index: 1052;
  width: 1px;
  height: 75px;
  /* IE 9 */
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
  background-color: #E74C3C;
}
.img-fluid{
 width:400px;
 height:300px;
}
</style>