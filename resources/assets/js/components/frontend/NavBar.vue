
<template>
<div>

    <nav class="navbar navbar-expand-lg navbar-light ftco_navbar  ftco-navbar-light" id='thisNav' >
	    <div class="container">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
         <a href="#" class="navbar-brand"><img style="width: 65px; height: 25px;" :src="website.logo"></a>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto" >

            <li class="nav-item"><v-btn flat class='router' @click='scrolling("#about")'><v-icon>description</v-icon>About</v-btn></li>
           <li class="nav-item"><v-btn flat class='router' @click='scrolling("#services")'><v-icon>home</v-icon>Services</v-btn></li>
	          <li class="nav-item"><v-btn flat  class='router' @click='scrolling("#portfolio")'><v-icon>work</v-icon>Portfolio</v-btn></li>
            <li class="nav-item"><v-btn flat class='router' @click='scrolling("#myContact")'><v-icon>contact_phone</v-icon>Contact</v-btn></li>        
    
            <li class="nav-item"> <router-link to='/galleries' ><v-btn flat class='router'><v-icon>photo_album</v-icon>Galleries</v-btn></router-link></li>
	          <li class="nav-item"><router-link to='/videos'><v-btn flat  class='router'><v-icon>videocam</v-icon>videos</v-btn></router-link></li>
            <v-spacer></v-spacer>
             <btn-group>
                <btn color="danger" @click='scrolling("#events")'>Events</btn>
                <btn color="danger" @click='scrolling("#blog")'>Blog</btn>
            </btn-group>
          </ul>
	      </div>
	    </div>
	  </nav>


</div>

</template>   

<script>
import {BtnGroup,Btn} from 'mdbvue'
import {mapState} from 'vuex'
export default {
   name:'nav-bar',
   props:['isHomeComponent'],
   components:{BtnGroup ,Btn},
   data () {
      return {
        item:"",
      }
   },
   mounted(){
     
   },
   computed:{
       ...mapState([
         'website'
       ])
   },
   created(){
   
   this.$nextTick(_=>{
        $('#thisNav').css('display','none')
        this.init()
   })
   },
   methods:{
   
   init(){
        this.$nextTick(_=>{
              	$(window).on('scroll',function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar');
					//sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
          $('#thisNav').css('display','block')
					navbar.addClass('scrolled');
           $('.router').addClass('text-danger')
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
          $('#thisNav').css('display','none')
					navbar.removeClass('scrolled sleep');
             $('.router').removeClass('text-danger')			
        }
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
          $('#thisNav').css('display','block')
					navbar.addClass('awake');
          $('.router').addClass('text-danger')		
				}
				
			/*	if(sd.length > 0) {
					sd.addClass('sleep');
				}*/
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
          $('#thisNav').css('display','none')
					navbar.removeClass('awake');
					navbar.addClass('sleep');
          $('.router').removeClass('text-danger')	
      	}
			/*	if(sd.length > 0) {
					sd.removeClass('sleep');
				}*/
			}
		});
        })
    },
     ok(){

     },
     scrolling(comp){
       this.$nextTick(_=>{
         $('html,body').animate({scrollTop: $(comp).offset().top-125}, 'slow'      );
       })
     },
    
    
    
    
   }
}
</script>

<style>
.navbar {
 position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 0 1rem; }
  .navbar > .container,
  .navbar > .container-fluid {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between; }
.navbar.router{
  color:black;
}
.navbar-brand {
  display: inline-block;
  
  margin-right: 1em;
  font-size: 1.25rem;
  line-height: inherit;
  white-space: nowrap; }
  .navbar-brand:hover, .navbar-brand:focus {
    text-decoration: none; }

.navbar-nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none; }
  .navbar-nav .nav-link {
    padding-right: 0;
    padding-left: 0; }
  .navbar-nav .dropdown-menu {
    position: static;
    float: none; }

.navbar-text {
  display: inline-block;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem; }

.navbar-collapse {
  -ms-flex-preferred-size: 100%;
  flex-basis: 100%;
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center; }

.navbar-toggler {
  padding:0.1rem 0.1rem;
  font-size: 1.25rem;
  line-height: 1;
  background-color: transparent;
  border: 1px solid transparent;
  border-radius: 0.25rem; }
  .navbar-toggler:hover, .navbar-toggler:focus {
    text-decoration: none; }
  .navbar-toggler:not(:disabled):not(.disabled) {
    cursor: pointer; }

.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  content: "";
  background: no-repeat center center;
  background-size: 100% 100%; }

@media (max-width: 575.98px) {
  .navbar-expand-sm > .container,
  .navbar-expand-sm > .container-fluid {
    padding-right: 0;
    padding-left: 0; } }

@media (min-width: 576px) {
  .navbar-expand-sm {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start; }
    .navbar-expand-sm .navbar-nav {
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -ms-flex-direction: row;
      flex-direction: row; }
      .navbar-expand-sm .navbar-nav .dropdown-menu {
        position: absolute; }
      .navbar-expand-sm .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem; }
    .navbar-expand-sm > .container,
    .navbar-expand-sm > .container-fluid {
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap; }
    .navbar-expand-sm .navbar-collapse {
      display: -webkit-box !important;
      display: -ms-flexbox !important;
      display: flex !important;
      -ms-flex-preferred-size: auto;
      flex-basis: auto; }
    .navbar-expand-sm .navbar-toggler {
      display: none; } }

@media (max-width: 767.98px) {
  .navbar-expand-md > .container,
  .navbar-expand-md > .container-fluid {
    padding-right: 0;
    padding-left: 0; } }

@media (min-width: 768px) {
  .navbar-expand-md {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start; }
    .navbar-expand-md .navbar-nav {
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -ms-flex-direction: row;
      flex-direction: row; }
      .navbar-expand-md .navbar-nav .dropdown-menu {
        position: absolute; }
      .navbar-expand-md .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem; }
    .navbar-expand-md > .container,
    .navbar-expand-md > .container-fluid {
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap; }
    .navbar-expand-md .navbar-collapse {
      display: -webkit-box !important;
      display: -ms-flexbox !important;
      display: flex !important;
      -ms-flex-preferred-size: auto;
      flex-basis: auto; }
    .navbar-expand-md .navbar-toggler {
      display: none; } }

@media (max-width: 991.98px) {
  .navbar-expand-lg > .container,
  .navbar-expand-lg > .container-fluid {
    padding-right: 0;
    padding-left: 0; } }

@media (min-width: 992px) {
  .navbar-expand-lg {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start; }
    .navbar-expand-lg .navbar-nav {
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -ms-flex-direction: row;
      flex-direction: row; }
      .navbar-expand-lg .navbar-nav .dropdown-menu {
        position: absolute; }
      .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem; }
    .navbar-expand-lg > .container,
    .navbar-expand-lg > .container-fluid {
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap; }
    .navbar-expand-lg .navbar-collapse {
      display: -webkit-box !important;
      display: -ms-flexbox !important;
      display: flex !important;
      -ms-flex-preferred-size: auto;
      flex-basis: auto; }
    .navbar-expand-lg .navbar-toggler {
      display: none; } }

@media (max-width: 1199.98px) {
  .navbar-expand-xl > .container,
  .navbar-expand-xl > .container-fluid {
    padding-right: 0;
    padding-left: 0; } }

@media (min-width: 1200px) {
  .navbar-expand-xl {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start; }
    .navbar-expand-xl .navbar-nav {
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -ms-flex-direction: row;
      flex-direction: row; }
      .navbar-expand-xl .navbar-nav .dropdown-menu {
        position: absolute; }
      .navbar-expand-xl .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem; }
    .navbar-expand-xl > .container,
    .navbar-expand-xl > .container-fluid {
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap; }
    .navbar-expand-xl .navbar-collapse {
      display: -webkit-box !important;
      display: -ms-flexbox !important;
      display: flex !important;
      -ms-flex-preferred-size: auto;
      flex-basis: auto; }
    .navbar-expand-xl .navbar-toggler {
      display: none; } }

.navbar-expand {
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -ms-flex-flow: row nowrap;
  flex-flow: row nowrap;
  -webkit-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start; }
  .navbar-expand > .container,
  .navbar-expand > .container-fluid {
    padding-right: 0;
    padding-left: 0; }
  .navbar-expand .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row; }
    .navbar-expand .navbar-nav .dropdown-menu {
      position: absolute; }
    .navbar-expand .navbar-nav .nav-link {
      padding-right: 0.5rem;
      padding-left: 0.5rem; }
  .navbar-expand > .container,
  .navbar-expand > .container-fluid {
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap; }
  .navbar-expand .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
    flex-basis: auto; }
  .navbar-expand .navbar-toggler {
    display: none; }

.navbar-light .navbar-brand {
  color: rgba(0, 0, 0, 0.9); }
  .navbar-light .navbar-brand:hover, .navbar-light .navbar-brand:focus {
    color: rgba(0, 0, 0, 0.9); }

.navbar-light .navbar-nav .nav-link {
  color: rgba(0, 0, 0, 0.5); }
  .navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
    color: rgba(0, 0, 0, 0.7); }
  .navbar-light .navbar-nav .nav-link.disabled {
    color: rgba(0, 0, 0, 0.3); }

.navbar-light .navbar-nav .show > .nav-link,
.navbar-light .navbar-nav .active > .nav-link,
.navbar-light .navbar-nav .nav-link.show,
.navbar-light .navbar-nav .nav-link.active {
  color: rgba(0, 0, 0, 0.9); }

.navbar-light .navbar-toggler {
  color: rgba(0, 0, 0, 0.5);
  border-color: rgba(0, 0, 0, 0.1); }



.navbar-light .navbar-text {
  color: rgba(0, 0, 0, 0.5); }
  .navbar-light .navbar-text a {
    color: rgba(0, 0, 0, 0.9); }
    .navbar-light .navbar-text a:hover, .navbar-light .navbar-text a:focus {
      color: rgba(0, 0, 0, 0.9); }

.navbar-dark .navbar-brand {
  color: #fff; }
  .navbar-dark .navbar-brand:hover, .navbar-dark .navbar-brand:focus {
    color: #fff; }

.navbar-dark .navbar-nav .nav-link {
  color: rgba(255, 255, 255, 0.5); }
  .navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
    color: rgba(255, 255, 255, 0.75); }
  .navbar-dark .navbar-nav .nav-link.disabled {
    color: rgba(255, 255, 255, 0.25); }

.navbar-dark .navbar-nav .show > .nav-link,
.navbar-dark .navbar-nav .active > .nav-link,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .nav-link.active {
  color: #fff; }

.navbar-dark .navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.1); }



.navbar-dark .navbar-text {
  color: rgba(255, 255, 255, 0.5); }
  .navbar-dark .navbar-text a {
    color: #fff; }
    .navbar-dark .navbar-text a:hover, .navbar-dark .navbar-text a:focus {
      color: #fff; }
.ftco-navbar-light {
  background: transparent !important;
  position: absolute;
  top: 20px;
  left: 0;
  right: 0;
  z-index: 9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999;
  padding: 0; }
  .ftco-navbar-light.router{
    background-color:red !important
  }
  @media (max-width: 991.98px) {
    .ftco-navbar-light {
      background: #000000 !important;
      position: relative;
      top: 0;
      padding: 10px 15px; } }
  .ftco-navbar-light.ftco-navbar-light-2 {
    position: relative;
    top: 0; }
  .ftco-navbar-light .navbar-brand {
    color: #000000; }
    .ftco-navbar-light .navbar-brand:hover, .ftco-navbar-light .navbar-brand:focus {
      color: #000000; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-brand {
        color: #fff; } }
  @media (max-width: 991.98px) {
    .ftco-navbar-light .navbar-nav {
      padding-bottom: 10px; } }
  .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
    font-size: 14px;
    padding-top: 0.01rem;
    padding-bottom: 0.01rem;
    padding-left: 20px;
    padding-right: 20px;
    font-weight: 400;
    color: #000000;
    opacity: 1 !important; }
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link:hover {
      color: #000000; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
        padding-left: 0;
        padding-right: 0;
        padding-top: .9rem;
        padding-bottom: .9rem;
        color: rgba(255, 255, 255, 0.7); }
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link:hover {
          color: #fff; } }
  .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu {
    border: none;
    background: #fff;
    -webkit-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
    -moz-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
    box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41); }
    .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu .dropdown-item {
      font-size: 14px; }
      .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu .dropdown-item:hover, .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu .dropdown-item:focus {
        background: transparent;
        color: #000000; }
  .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator {
    position: relative;
    margin-left: 20px;
    padding-left: 20px; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator {
        padding-left: 0;
        margin-left: 0; } }
    .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator:before {
      position: absolute;
      content: "";
      top: 5px;
      bottom: 5px;
      left: 0;
      width: 2px;
      background: rgba(255, 255, 255, 0.05); }
      @media (max-width: 991.98px) {
        .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator:before {
          display: none; } }
  .ftco-navbar-light .navbar-nav > .nav-item.cta > a {
    color: #000000; }
    @media (max-width: 767.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item.cta > a {
        padding-left: 15px;
        padding-right: 15px; } }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item.cta > a {
        color: #fff;
        background: #f1b8c4; } }
  .ftco-navbar-light .navbar-nav > .nav-item.active > a {
    color: #000000; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item.active > a {
        color: #fff; } }
  .ftco-navbar-light .navbar-toggler {
    border: none;
    color: rgba(255, 255, 255, 0.5) !important;
    cursor: pointer;
    padding-right: 0;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: .1em; }
    .ftco-navbar-light .navbar-toggler:focus {
      outline: none !important; }
  .ftco-navbar-light.scrolled {
    position: fixed;
    right: 0;
    left: 0;
    top: 0;
    margin-top: -130px;
    background: #fff !important;
    -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1); }
    .ftco-navbar-light.scrolled .nav-item.active > a {
      color: #f1b8c4 !important; }
    .ftco-navbar-light.scrolled .nav-item.cta > a {
      color: #fff !important;
      background: #f1b8c4;
      border: none !important; }
      .ftco-navbar-light.scrolled .nav-item.cta > a span {
        display: inline-block;
        color: #fff !important; }
    .ftco-navbar-light.scrolled .nav-item.cta.cta-colored span {
      border-color: #f1b8c4; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light.scrolled .navbar-nav {
        background: none;
        border-radius: 0px;
        padding-left: 0rem !important;
        padding-right: 0rem !important; } }
    @media (max-width: 767.98px) {
      .ftco-navbar-light.scrolled .navbar-nav {
        background: none;
        padding-left: 0 !important;
        padding-right: 0 !important; } }
    .ftco-navbar-light.scrolled .navbar-toggler {
      border: none;
      color: rgba(0, 0, 0, 0.5) !important;
      border-color: rgba(0, 0, 0, 0.5) !important;
      cursor: pointer;
      padding-right: 0;
      text-transform: uppercase;
      font-size: 16px;
      letter-spacing: .1em; }
    .ftco-navbar-light.scrolled .nav-link {
      padding-top: 0.4rem !important;
      padding-bottom: 0.4rem !important;
      color: #000000 !important; }
      .ftco-navbar-light.scrolled .nav-link.active {
        color: #f1b8c4 !important; }
    .ftco-navbar-light.scrolled.awake {
      margin-top: 0px;
      -webkit-transition: .3s all ease-out;
      -o-transition: .3s all ease-out;
      transition: .3s all ease-out; }
    .ftco-navbar-light.scrolled.sleep {
      -webkit-transition: .3s all ease-out;
      -o-transition: .3s all ease-out;
      transition: .3s all ease-out; }
    .ftco-navbar-light.scrolled .navbar-brand {
      color: #000000; }

.navbar-brand {
  font-weight: 300;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 2px; }

</style>
