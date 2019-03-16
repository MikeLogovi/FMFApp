<template>
    
     <section class="colorlib-blog" id='blog'>
			<div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase text-danger">RECENT POSTS</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-4">
						<article class="article-entry">
							<a href="#" class="blog-img" style="background-image: url(/slide/img/slide1.jpg);">
								<p class="meta"><span class="day">25</span><span class="month">Jun</span></p>
							</a>
							<div class="desc">
								<p class="admin"><span>Posted by:</span> <span>Chuks leBoss</span></p>
								<h2><a href="#" class='text-danger'>How to become rich</a></h2>
								<p>It's easy It's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easy</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="#" class="blog-img" style="background-image: url(/slide/img/slide1.jpg);">
								<p class="meta"><span class="day">25</span><span class="month">Jun</span></p>
							</a>
							<div class="desc">
								<p class="admin"><span>Posted by:</span> <span>Chuks leBoss</span></p>
								<h2><a href="#" class='text-danger'>How to become rich</a></h2>
								<p>It's easy It's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easy</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
					<article class="article-entry">
							<a href="#" class="blog-img" style="background-image: url(/slide/img/slide1.jpg);">
								<p class="meta"><span class="day">25</span><span class="month">Jun</span></p>
							</a>
							<div class="desc">
								<p class="admin"><span>Posted by:</span> <span>Chuks leBoss</span></p>
								<h2 ><a href="#" class='text-danger'>How to become rich</a></h2>
								<p>It's easy It's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easyIt's easy</p>
							</div>
						</article>
					</div>
				</div>

			</div>
		</section>

</template>
<script>
  export default{
      name:'blog',
      components:{},
      data(){
          return{

          }
      }
  }
</script>
<style scoped>
.colorlib-blog{
  padding: 2em 0;
  clear: both;
  background-color:rgba(250,250,250,0.5) 
}

  .article-entry .blog-img {
  height: 250px;
  display: block;
  position: relative; }
  .article-entry .blog-img .meta {
    line-height: 1.4;
    text-transform: uppercase;
    position: absolute;
    bottom: -49px;
    left: 1em;
    text-align: center; }
    .article-entry .blog-img .meta span {
      display: block;
      color: #000;
      font-weight: 700; }
    .article-entry .blog-img .meta .day {
      font-size: 24px;
      position: relative;
      padding: 5px 10px;
      color: #fff;
      background: #E74C3C; }
    .article-entry .blog-img .meta .month {
      font-size: 14px;
      font-weight: 400;
      padding: 5px 10px;
      color: #333333;
      background: #fff; }
  @media screen and (max-width: 768px) {
    .article-entry .blog-img {
      height: 400px; } }
  @media screen and (max-width: 480px) {
    .article-entry .blog-img {
      height: 270px; } }

.article-entry .desc {
  padding: 2.5em 1.5em;
  margin-bottom: 20px;
  position: relative; }
  .article-entry .desc h2 {
    font-size: 22px; }
   
  .article-entry .desc .admin {
    margin-bottom: 20px; }
    .article-entry .desc .admin span:last-child {
      color: #000; }
.blog-img{
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  position: relative;
}
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 25px;
}

.service-heading {
  margin: 5px 0;
  text-transform: none;
}
</style>