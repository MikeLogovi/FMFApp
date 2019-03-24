<template>
<div>

<banner></banner>

<!--SLIDER-->
<slider></slider>
<!--END SLIDER-->
<nav-bar is-home-component='true'></nav-bar>
<beginning></beginning>
<about></about>
<service></service>
<portfolio></portfolio>
<event></event>
<blog></blog>
<comment></comment>
<contact></contact>   
<new-footer></new-footer> 
</div>     


  
</template>



<script>
  import Banner from './Banner'   
  import NavBar from './NavBar'
  import Slider from './Slider'
  import Beginning from './Beginning'
  import About from './About'
  import Service from './Service'
  import Portfolio from './Portfolio'
  import Event from './Event'
  import Blog from './Blog'
  import Comment from './Comment'
  import Contact from './Contact'
  import NewFooter from './NewFooter'

export default {
    components:{NavBar,NewFooter,About,Banner,Slider,Contact,Service,Beginning,Portfolio,Event,Comment,Blog},
    data(){
      return {
      }
    },
    mounted(){
     
        this.$nextTick(_=>{
                $(document).ready(function(){
                   $('body').append('<a href="#banner" class="top_link peach-gradient" title="Revenir en haut de page"><i class="fas fa-angle-up"></i></a>');
                   $('.top_link').css({
                                      'position'				:	'fixed',
                                      'right'					:	'20px',
                                      'bottom'				:	'50px',
                                      'display'				:	'none',
                                      'padding'				:	'20px',
                                      '-moz-border-radius'	:	'40px',
                                      '-webkit-border-radius'	:	'40px',
                                      'border-radius'			:	'40px',
                                      'opacity'				:	'0.9',
                                      'z-index'				:	'2000'
                                    });
                });
                $(window).scroll(function(){
                      var posScroll = $(document).scrollTop();
                      if(posScroll >=550) 
                        $('.top_link').fadeIn(600);
                      else
                        $('.top_link').fadeOut(600);
                });
               $('.arrow').on('click',function(e){
                    e.preventDefault();
                    $(this).removeClass('bounce');
                    console.log('ok');
                    $("html,body").animate({scrollTop:$("#slider").offset().top},"slow")
                    console.log('non');
               });
        });
    }
  }
</script>

<style scoped>





</style>