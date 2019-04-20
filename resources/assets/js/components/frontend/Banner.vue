<template>
  <div class="row home" id='banner'>
		<img :src='website.logo' alt='logo' class='img img-responsive myLogo' />
		<div class="container home_background" ></div>
		<div class="home_content">
			<div class="home_content_inner">
				<div class="pa">
				   <h1 class="h1-responsive home_text_large" v-if="website.banner_quote">"{{website.banner_quote}}"</h1>
			 </div>
			
			</div>
      
		</div>
			<div class="home_text_welcome"><h1 class="h1-responsive  display-1 font-weight-bold text-center my-5">WELCOME</h1></div>
		 <div  class="arrow bounce text-center"><a href='#' ><v-icon size="30px" color="white">fa fa-chevron-circle-down</v-icon></a></div>

	</div>

</template>
<script>
import {mapState} from 'vuex'
   export default{
       name:'banner',
       components:{},
       mounted(){
					this.loadWebsiteParams()
					Echo.channel('my-channel').listen('WebsiteStateChanged',(e)=>{
						this.loadWebsiteParams()
						
					})
		  },
		 computed:{
        ...mapState([
					'website'
				])
		 },
	   methods:{
		   loadWebsiteParams(){
				 this.$store.dispatch('loadWebsiteParams')
		   }
	   }
   }
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Raleway:500');
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
.myLogo{
	position:absolute;
	top:85px;
	left:75px;
	width:75px;
	height:50px;
}
.home
{ 
	width: auto;
	height: 100vh;
	background-image: url('/banner/banner.jpg');
	background-size: cover;
	background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.home_background
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	
	/*background-color:#E74C3C;*/
}
.home_content
{
	position: absolute;
	top: 46%;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	-ms-transform: translateX(-50%);
	-o-transform: translateX(-50%);
	transform: translateX(-50%);
	width: 80%;
	text-align: center;
}
.home_text_large
{ 
	font-family:'Raleway',serif;
	font-size: 50px;
	font-weight: 400;
	color: #fff;
	text-transform: uppercase;
	line-height: 0.75;
	margin-bottom:0.5em;
}
.home_text_welcome{
	position:absolute;
	font-weight:bold;
	font-family:'Roboto Slab',serif;
	left:45%;
	bottom:12%;
	color:yellow;
}
.pa:after{
	position:absolute;
	text-align: center;
    content: "";
    width: 70%;
    height: 2px;
    bottom: 0;
		left:15%;
    background: #fff;
     

}
@-webkit-keyframes bounce{
  0%,20%,60%{
    -webkit-transform:translateY(0);
  }

  40%,43%{
     -webkit-transform:translateY(-30px);
     -webkit-transform:translateX(-30px);
     
  }
  43%,46%{
    -webkit-transform:translateX(30px);
  }
  75%{
    -webkit-transform:translateY(-20px);
  }
  100%{
    -webkit-transform:translateY(0);
  }
  
}
.bounce{
  position: absolute;
	left:50%;
	bottom:10%;
  animation:bounce 2s infinite;
  z-index:2;
}

/*RESPONIVE DESIGN*/

@charset "utf-8";
/* CSS Document */

/******************************

[Table of Contents]

1. 1600px
2. 1440px
3. 1280px
4. 1199px
5. 1024px
6. 991px
7. 959px
8. 880px
9. 768px
10. 767px
11. 539px
12. 479px
13. 400px

******************************/

/************
1. 1600px
************/

@media only screen and (max-width: 1600px)
{
	
}

/************
2. 1440px
************/

@media only screen and (max-width: 1440px)
{
	
}

/************
3. 1380px
************/

@media only screen and (max-width: 1380px)
{
	
}

/************
3. 1280px
************/

@media only screen and (max-width: 1280px)
{
	
}

/************
4. 1199px
************/

@media only screen and (max-width: 1199px)
{
	.last_item_content
	{
		padding-left: 80px;
		padding-right: 70px;
	}
	.last_percent
	{
		font-size: 124px;
	}
	.last_title
	{
		font-size: 30px;
	}
}

/************
4. 1100px
************/

@media only screen and (max-width: 1100px)
{
	
}

/************
5. 1024px
************/

@media only screen and (max-width: 1024px)
{
	
}

/************
6. 991px
************/

@media only screen and (max-width: 991px)
{
	.header
	{
		top: 15px;
	}
	.main_nav,
	.search
	{
		display: none !important;
	}
	.hamburger
	{
		display: block;
	}
	.logo div:first-of-type
	{
		font-size: 22px;
	}
	.logo div:nth-child(2)
	{
		font-size: 9px;
	}
	.home_content
	{
		width: 100%;
	}
/*	.home_text_large
	{
		font-size: 125px;
	}*/
	.home_text_small
	{
		font-size: 42px;
		
	}
	.find_item:first-child
	{
		width: calc((100% - 8px) / 2);
		margin-bottom: 30px;
	}
	.find_item:nth-child(2)
	{
		width: calc((100% - 8px) / 2);
		margin-bottom: 30px;
	}
	.find_item:nth-child(3),
	.find_item:nth-child(4)
	{
		width: calc((100% - 154px) / 2);
	}
	.find_button
	{
		width: 138px;
	}
	.top_col
	{
		margin-bottom: 30px;
	}
	.top_col:last-child
	{
		margin-bottom: 0px;
	}	
	.top_col:nth-last-child(2)
	{
		margin-bottom: 0px;
	}
	.last_item_content
	{
		padding-left: 90px;
		padding-right: 80px;
	}
	.last_item
	{
		padding-right: 0;
		margin-bottom: 35px;
	}
	.last_col:last-child .last_item
	{
		padding-left: 0;
		margin-bottom: 0px;
	}
	.last_subtitle
	{
		text-align: center;
	}
	.last_percent
	{
		text-align: center;
	}
	.last_title
	{
		text-align: center;
	}
	.popular_item
	{
		width: calc((100% - 30px) / 2);
		margin-bottom: 26px;
	}
	.popular_item:nth-last-child(-n+4)
	{
		margin-bottom: 26px;
	}
	.popular_item:nth-last-child(-n+2)
	{
		margin-bottom: 0;
	}
	.special_content
	{
		width: 690px;
		margin-left: auto;
		margin-right: auto;
	}
	.special_slider_nav
	{
		display: none !important;
	}
	.footer_col
	{
		margin-bottom: 30px;
	}
	.copyright
	{
		margin-top: 22px;
	}
	.footer_latest
	{
		margin-bottom: 10px;
	}
}

/************
7. 959px
************/

@media only screen and (max-width: 959px)
{
	
}

/************
8. 880px
************/

@media only screen and (max-width: 880px)
{
		.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:40%;
	  bottom:5%;
	}
}

/************
9. 768px
************/

@media only screen and (max-width: 768px)
{
		.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:40%;
	  bottom:15%;
	}
}

/************
10. 767px
************/

@media only screen and (max-width: 767px)
{ 	.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:40%;
	  bottom:15%;
	}
	.menu_container
	{
		right: -100vw;
		width: 100vw;
		height: 100vh;
	}
	/*.home_text_large
	{
		font-size: 88px;
		
	}*/
	.home_text_small
	{  margin-right:2em;
		font-size: 36px;
	}
	.find_item:first-child
	{
		width: 100%;
		margin-bottom: 30px;
	}
	.find_item:nth-child(2)
	{
		width: 100%;
		margin-bottom: 30px;
	}
	.find_item:nth-child(3),
	.find_item:nth-child(4)
	{
		width: 100%;
		margin-bottom: 30px;
	}
	.find_button
	{
		width: 138px;
	}
	.top_col:nth-last-child(2)
	{
		margin-bottom: 30px;
	}
	.popular_item
	{
		width: 100%;
		margin-bottom: 26px;
	}
	.popular_item:nth-last-child(-n+4)
	{
		margin-bottom: 26px;
	}
	.popular_item:nth-last-child(-n+2)
	{
		margin-bottom: 26px;
	}
	.popular_item:last-child
	{
		margin-bottom: 0;
	}
	.special_content
	{
		width: 510px;
	}
	.newsletter_input
	{
		width: 100%;
	}
	.newsletter_button
	{
		margin-left: auto;
		margin-right: auto;
		margin-top: 15px;
	}
}

/************
11. 575px
************/

@media only screen and (max-width: 575px)
{ 
	 	.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:40%;
	  bottom:15%;
	}
  .myLogo{
		top:55px;
		left:40px;
		width:70px;
		height:55px;
  }
	h2{font-size: 24px;}
	.header_container
	{
		height: 70px;
	}
	.header.scrolled .header_container
	{
		height: 70px;
	}
	.logo
	{
		padding-left: 33px;
	}
	.logo_image
	{
		width: 30px;
	    top: -22px;
	    left: 14px;
	}
	.header.scrolled .logo_image
	{
		width: 30px;
	    top: -22px;
	    left: 14px;
	}
	.logo div:first-of-type
	{
		font-size: 16px;
	}
	.logo div:nth-child(2)
	{
		font-size: 8px;
	}
	.menu
	{
		top: 70px;
		padding-right: 32px;
	}
	.menu_item
	{
		margin-bottom: 0px;
	}
	.menu_item a
	{
		font-size: 24px;
	}
	.menu_copyright
	{
		display: none;
	}
	.menu_social_container
	{
		margin-top: 50px;
	}
	.menu_close_container
	{
		right: 30px;
		top: 34px;
	}
	.hamburger
	{
		right: -10px;
		font-size: 18px;
	}
	.menu_search_input
	{
		height: 40px;
	}
	.menu_search_submit
	{
		width: 40px;
		height: 40px;
	}
	.menu_search_submit img
	{
		max-width: 50%;
	}
	/*.home_text_large
	{
		font-size: 64px;
	}*/
	.home_text_small
	{
		font-size: 24px;
		margin-right:2em;
	}
	.find_title
	{
		font-size: 24px;
	}
	.find_input
	{
		height: 40px;
		line-height: 36px;
	}
	.find_button
	{
		height: 40px;
		line-height: 40px;
		width: 120px;
		padding: 0;
	}
	.find_input::-webkit-input-placeholder
	{
		font-size: 12px !important;
	}
	.find_input:-moz-placeholder
	{
		font-size: 12px !important;
	}
	.find_input::-moz-placeholder
	{
		font-size: 12px !important;
	} 
	.find_input:-ms-input-placeholder
	{ 
		font-size: 12px !important;
	}
	.find_input::input-placeholder
	{
		font-size: 12px !important;
	}
	.dropdown_item_select
	{
		font-size: 12px;
	}
	.find_item div
	{
		font-size: 12px;
	}
	.find_button
	{
		font-size: 14px;
	}
	.section_title div
	{
		font-size: 12px;
		margin-top: 12px;
	}
	.last_item_content
	{
		padding-left: 25px;
		padding-right: 25px;
	}
	.last_percent
	{
		font-size: 72px;
	}
	.last_subtitle
	{
		font-size: 12px;
	}
	.last_title
	{
		font-size: 24px;
	}
	.last_text
	{
		font-size: 12px;
	}
	.last_logo
	{
		top: -51px;
	    left: -37px;
	    width: 106px;
	}
	.button
	{
		width: 121px;
		height: 40px;
	}
	.button a
	{
		font-size: 12px;
		line-height: 40px;
	}
	.video_title
	{
		font-size: 24px;
	}
	.video_subtitle
	{
		font-size: 12px;
	}
	.special_content
	{
		width: 100%;
		padding-left: 15px;
		padding-right: 15px;
	}
	.newsletter_title
	{
		font-size: 24px;
	}
	.newsletter_input
	{
		height: 40px;
		line-height: 36px;
	}
	.newsletter_button
	{
		height: 40px;
		line-height: 40px;
		width: 140px;
		padding: 0;
	}
	.newsletter_input::-webkit-input-placeholder
	{
		font-size: 12px !important;
	}
	.newsletter_input:-moz-placeholder
	{
		font-size: 12px !important;
	}
	.newsletter_input::-moz-placeholder
	{
		font-size: 12px !important;
	} 
	.newsletter_input:-ms-input-placeholder
	{ 
		font-size: 12px !important;
	}
	.newsletter_input::input-placeholder
	{
		font-size: 12px !important;
	}
}

/************
11. 539px
************/

@media only screen and (max-width: 539px)
{
	 	.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:35%;
	  bottom:15%;
	}
		 .arrow{
	     margin-top:12em;
     }
	
}

/************
12. 480px
************/

@media only screen and (max-width: 480px)
{ 	.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:35%;
	  bottom:15%;
	}
	.myLogo{
		top:45px;
		left:35px;
		width:65px;
		height:45px;
  }
}

/************
13. 479px
************/

@media only screen and (max-width: 479px)
{
		.home_text_large{
		font-size:30px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:48%
	}
	.pa:after{
    width:50%;
		left:25%;
		margin-bottom:2em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:35%;
	  bottom:15%;
	}
	.myLogo{
		top:45px;
		left:35px;
		width:65px;
		height:45px;
  }
}

/************
14. 400px
************/

@media only screen and (max-width: 400px)
{
		.home_text_large{
		font-size:20px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
    width:60%;
		left:20%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:30%;
	  bottom:15%;
	}
.myLogo{
		top:40px;
		left:30px;
		width:55px;
		height:40px;
  }
}
@media only screen and (min-width: 360px) and (max-width: 370px)
{
		.home_text_large{
		font-size:20px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
    width:60%;
		left:20%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:30%;
	  bottom:15%;
	}
.myLogo{
		top:40px;
		left:30px;
		width:55px;
		height:40px;
  }
}
@media only screen and (min-width: 350px) and (max-width: 359px)
{ 	.home_text_large{
		font-size:20px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
    width:60%;
		left:20%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:30%;
	  bottom:15%;
	}
	.myLogo{
		top:40px;
		left:30px;
		width:55px;
		height:40px;
  }
}
@media only screen and (min-width: 340px) and (max-width: 349px)
{ 	.home_text_large{
		font-size:20px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
    width:60%;
		left:20%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:25%;
	  bottom:15%;
	}
	.myLogo{
		top:40px;
		left:30px;
		width:55px;
		height:40px;
  }
}
@media only screen and (min-width: 320px) and (max-width: 339px)
{
	.home_text_large{
		font-size:20px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
    width:60%;
		left:20%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:25%;
	  bottom:15%;
	}
	.myLogo{
		top:40px;
		left:30px;
		width:55px;
		height:40px;
		
  }
}
@media only screen and (min-width: 300px) and (max-width: 319px)
{ 
	.home_text_large{
		font-size:20px;
		margin-bottom:2.3em;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
    width:60%;
		left:20%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:25%;
	  bottom:15%;
	}
	.myLogo{
		top:35px;
		left:25px;
		width:55px;
		height:40px;
  }
}

@media only screen and (min-width: 290px) and (max-width: 300px)
{ .home_text_large{
		font-size:14px;
		margin-bottom:2.5em;
		line-height: 10px;
	}
	.bounce{
		bottom:5%;
		left:45%
	}
	.pa:after{
		left:15%;
		margin-bottom:1em;
		
	}
	.home_text_welcome{
    font-size:20px;
		left:21.5%;
	  bottom:15%;
	}
	.myLogo{
			top:25px;
			left:15px;
			width:50px;
			height:35px;
    }
}


</style>