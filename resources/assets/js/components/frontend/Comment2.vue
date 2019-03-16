<template>
 	<section class="wrapper">
				<div class="inner">
					        <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2 class="text-uppercase text-danger h1-responsive font-weight-bold text-center my-5">WHAT PEOPLE THINK ABOUT US</h2>
                                </div>
                           </div>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>FMF is the best society,they produce everything i need I liked working with them.Yes that is true.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="/slide/img/slide1.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Jane Baker</strong> <span>CEO - Alger centre.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>FMF is the best society,they produce everything i need I liked working with them.Yes that is true.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="/slide/img/slide1.jpg" alt=""/>
									</div>
									<p class="credit">- <strong>Prince DIggger </strong> <span>CEO - Master Cop.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>FMF is the best society,they produce everything i need I liked working with them.Yes that is true.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="/slide/img/slide1.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Mike LeBoss</strong> <span>CEO - AlgerEnterprise.</span></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>
</template>
<script>
 export default{
     name:'comment',
     components:{},
     data(){
        return{

        }
     }
 }
</script>
<style scoped>
.wrapper {
    background-color:rgba(225,225,225,0.5);
  padding: 1rem 0 6rem 0 ;
  position: relative;
  z-index: 1; }
  @media screen and (max-width: 1280px) {
    .wrapper {
      padding: 4rem 0 2rem 0 ; } }
  @media screen and (max-width: 736px) {
    .wrapper {
      padding: 3rem 0 1rem 0 ; } }
  @media screen and (max-width: 480px) {
    .wrapper {
      padding: 2rem 0 0.1rem 0 ; } }

.inner {
  margin: 0 auto;
  width: 75rem;
  max-width: calc(100% - 6rem); }
  @media screen and (max-width: 480px) {
    .inner {
      max-width: calc(100% - 3rem); } }

header.special {
  text-align: center;
  margin-bottom: 4rem; }
  header.special p {
    max-width: 75%;
    margin-left: auto;
    margin-right: auto; }

.testimonials {
  margin: 2.5rem 0;
  width: 100%;
  display: -moz-flex;
  display: -webkit-flex;
  display: -ms-flex;
  display: flex;
  -moz-flex-wrap: wrap;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -moz-align-items: -moz-stretch;
  -webkit-align-items: -webkit-stretch;
  -ms-align-items: -ms-stretch;
  align-items: stretch; }
  .testimonials > * {
    -moz-flex-shrink: 1;
    -webkit-flex-shrink: 1;
    -ms-flex-shrink: 1;
    flex-shrink: 1;
    -moz-flex-grow: 0;
    -webkit-flex-grow: 0;
    -ms-flex-grow: 0;
    flex-grow: 0; }
  .testimonials > * {
    width: 33.3333333333%; }
  .testimonials > * {
    padding: 1.5rem;
    width: calc(33.3333333333% + 1rem); }
  .testimonials > :nth-child(-n + 3) {
    padding-top: 0; }
  .testimonials > :nth-last-child(-n + 3) {
    padding-bottom: 0; }
  .testimonials > :nth-child(3n + 1) {
    padding-left: 0; }
  .testimonials > :nth-child(3n) {
    padding-right: 0; }
  .testimonials > :nth-child(3n + 1),
  .testimonials > :nth-child(3n) {
    width: calc(33.3333333333% + -0.5rem); }
  .testimonials .content {
    border-radius: 4px;
    height: 100%;
    padding: 3rem; }
    .testimonials .content .author {
      display: -moz-flex;
      display: -webkit-flex;
      display: -ms-flex;
      display: flex;
      -moz-align-items: center;
      -webkit-align-items: center;
      -ms-align-items: center;
      align-items: center; }
      .testimonials .content .author blockquote {
        margin: 0; }
      .testimonials .content .author .image {
        margin-right: 2rem;
        width: 20%; }
        .testimonials .content .author .image img {
          border-radius: 100%;
          max-width: 100%; }
    .testimonials .content .credit {
      font-size: 0.75rem; }
    .testimonials .content p:last-child {
      margin: 0; }
  .testimonials > div > :last-child {
    margin-bottom: 0; }
  @media screen and (max-width: 980px) {
    .testimonials > * {
      width: 50%; }
    .testimonials > * {
      padding: 1rem;
      width: calc(33.3333333333% + 0.6666666667rem); }
    .testimonials > :nth-child(-n + 3) {
      padding-top: 1rem; }
    .testimonials > :nth-last-child(-n + 3) {
      padding-bottom: 1rem; }
    .testimonials > :nth-child(3n + 1) {
      padding-left: 1rem; }
    .testimonials > :nth-child(3n) {
      padding-right: 1rem; }
    .testimonials > :nth-child(3n + 1),
    .testimonials > :nth-child(3n) {
      padding: 1rem;
      width: calc(50% + 1rem); }
    .testimonials > * {
      padding: 1rem;
      width: calc(50% + 1rem); }
    .testimonials > :nth-child(-n + 2) {
      padding-top: 0; }
    .testimonials > :nth-last-child(-n + 2) {
      padding-bottom: 0; }
    .testimonials > :nth-child(2n + 1) {
      padding-left: 0; }
    .testimonials > :nth-child(2n) {
      padding-right: 0; }
    .testimonials > :nth-child(2n + 1),
    .testimonials > :nth-child(2n) {
      width: calc(50% + 0rem); }
    .testimonials .content {
      padding: 2rem; } }
  @media screen and (max-width: 736px) {
    .testimonials > * {
      width: 100%; }
    .testimonials > * {
      padding: 1rem;
      width: calc(33.3333333333% + 0.6666666667rem); }
    .testimonials > :nth-child(-n + 3) {
      padding-top: 1rem; }
    .testimonials > :nth-last-child(-n + 3) {
      padding-bottom: 1rem; }
    .testimonials > :nth-child(3n + 1) {
      padding-left: 1rem; }
    .testimonials > :nth-child(3n) {
      padding-right: 1rem; }
    .testimonials > :nth-child(3n + 1),
    .testimonials > :nth-child(3n) {
      padding: 1rem;
      width: calc(100% + 2rem); }
    .testimonials > * {
      padding: 1rem;
      width: calc(50% + 1rem); }
    .testimonials > :nth-child(-n + 2) {
      padding-top: 1rem; }
    .testimonials > :nth-last-child(-n + 2) {
      padding-bottom: 1rem; }
    .testimonials > :nth-child(2n + 1) {
      padding-left: 1rem; }
    .testimonials > :nth-child(2n) {
      padding-right: 1rem; }
    .testimonials > :nth-child(2n + 1),
    .testimonials > :nth-child(2n) {
      padding: 1rem;
      width: calc(100% + 2rem); }
    .testimonials > * {
      padding: 1rem;
      width: calc(100% + 2rem); }
    .testimonials > :nth-child(-n + 1) {
      padding-top: 0; }
    .testimonials > :nth-last-child(-n + 1) {
      padding-bottom: 0; }
    .testimonials > :nth-child(1n + 1) {
      padding-left: 0; }
    .testimonials > :nth-child(1n) {
      padding-right: 0; }
    .testimonials > :nth-child(1n + 1),
    .testimonials > :nth-child(1n) {
      width: calc(100% + 1rem); } }

.testimonials .content {
  background: #ffffff;
  box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.025); }
  .testimonials .content .credit strong {
    color: #ce1b28; }

blockquote{
     margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline; 
}
blockquote {
  border-left: solid 0.5rem;
  font-style: italic;
  margin: 0 0 2rem 0;
  padding: 1rem 0 1rem 2rem; 
   border-left-color: rgba(0, 0, 0, 0.25); 
}
blockquote, q {
  quotes: none; }
  blockquote:before, blockquote:after, q:before, q:after {
    content: '';
    content: none; }

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
</style>