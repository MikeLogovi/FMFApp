<template>

<footer id="footer" >
				
				<div class="inner">
					<div class="content">
						<h3>{{website.name}}</h3>
						<p>{{footer.description}}
                       </p>
					</div>
					<div class="copyright" v-if="socialites[0]">
						<h3>Follow me</h3>
						<ul class="icons">
							<li  v-for="(socialite,key) in socialites" :key="key"><a :href="socialite.link" class="icon" target="_blank"><i :class='`fab fa-${socialite.social_media}`' ></i></a></li>
							
						</ul>
						&copy;<span v-if="website">{{website.name}}</span> Corporation-All right reserved.
					</div>
				</div>
</footer>

</template>
<script>
import {mapState} from 'vuex'
export default{
    name:'new-footer',
    components:{},

    mounted(){
	        this.loadSocialMedia()
           
			Echo.channel('my-channel').listen('SocialiteEvent',(e)=>{
				 this.loadSocialMedia()
			})

			this.loadFooter()
			Echo.channel('my-channel').listen('FooterEvent',(e)=>{
				 this.loadFooter()
			})
	   },
	   computed:{
       ...mapState([
		   'website',
		   'footer',
		   'socialites'
	        ])
	    },
	   methods:{
		
		  loadFooter(){
			  this.$store.dispatch('loadFooter')
			  
		   },
		   
		   loadSocialMedia(){
			this.$store.dispatch('loadSocialitesVue')
            
       },
	   }
}
</script>
<style scoped>
	ul.icons {
			
			padding-left: 0;
		}

			ul.icons li {
				display: inline-block;
				padding: 0 1em 0 0;
			}

				ul.icons li:last-child {
					padding-right: 0;
				}

				ul.icons li .icon:before {
					font-size: 3em;
				}

 #footer {
		-moz-transition: bottom 0.2s ease;
		-webkit-transition: bottom 0.2s ease;
		-ms-transition: bottom 0.2s ease;
		transition: bottom 0.2s ease;
		
		
		color: #FFF;
		left: 0;
		width: 100%;
		text-align: center;
		z-index:-1;
	}

		
		#footer .info {
			position: relative;
			display: inline-block;
			text-decoration: none;
			border-radius: 50% 50% 0 0;
			background: #e74c3c;
			width: 3em;
			height: 3em;
			margin-bottom: -1.75em;
			color: #FFF;
			font-size: 1.25em;
			padding-top: .35em;
		}

			#footer .info span {
				display: none;
			}

		#footer .inner {
			display: -moz-flex;
			display: -webkit-flex;
			display: -ms-flex;
			display: flex;
			-moz-justify-content: center;
			-webkit-justify-content: center;
			-ms-justify-content: center;
			justify-content: center;
			-moz-align-items: stretch;
			-webkit-align-items: stretch;
			-ms-align-items: stretch;
			align-items: stretch;
			display: -ms-flexbox;
			-ms-flex-align: center;
			-ms-flex-pack: center;
			position: relative;
			z-index: 1;
			background: #e74c3c;
			padding: 2em;
			height: 20em;
		}

			#footer .inner .content,
			#footer .inner .copyright {
				width: 50%;
				text-align: left;
				color: rgba(255, 255, 255, 0.75);
				padding: 2em;
				display: inline-block;
			}

				#footer .inner .content h3,
				#footer .inner .copyright h3 {
					color: #FFF;
					font-size: 1.75em;
				}

				#footer .inner .content a,
				#footer .inner .copyright a {
					color: #FFF;
				}

					#footer .inner .content a:hover,
					#footer .inner .copyright a:hover {
						color: rgba(255, 255, 255, 0.75);
					}

				#footer .inner .content p,
				#footer .inner .copyright p {
					margin: 0;
				}

			#footer .inner .copyright ul {
				border-bottom: 1px solid rgba(255, 255, 255, 0.15);
				padding-bottom: 1em;
			}

		@media screen and (max-width: 980px) {

			#footer {
				position: relative;
				bottom: 0;
			}

				#footer .inner {
					height: auto;
					display: block;
				}

					#footer .inner .content,
					#footer .inner .copyright {
						display: block;
						width: 100%;
						text-align: center;
					}

				#footer .info {
					display: none;
				}

		}

		@media screen and (max-width: 480px) {

			#footer .inner {
				padding: 2em;
			}

				#footer .inner .content,
				#footer .inner .copyright {
					padding: 1em;
				}

		}
</style>