<script src="/slide/js/jquery-min.js"></script>
<script src="/slide/js/popper.min.js"></script>
<script src="/slide/js/bootstrap.min.js"></script>
<script src="/slide/js/jquery.countdown.min.js"></script>
<script src="/slide/js/jquery.nav.js"></script>
<script src="/slide/js/jquery.easing.min.js"></script>
<script src="/slide/js/wow.js"></script>
<script src="/slide/js/jquery.slicknav.js"></script>
<script src="/slide/js/nivo-lightbox.js"></script>
 <script src="/slide/js/main.js"></script>
<template>

     <div id="main-slide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          <li data-target="#main-slide" data-slide-to="1"></li>
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 sliding" src="/slide/img/slide1.jpg" alt="First slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Design Thinking Conference</h1>
              <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Get Ticket</a>
              <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 sliding" src="/slide/img/slide2.jpg" alt="Second slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
              <h1 class="wow bounceIn heading" data-wow-delay=".7s">22 Amazing Speakers</h1>
              <a href="#" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Learn More</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 sliding" src="/slide/img/slide3.jpg" alt="Third slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
              <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Book Your Seat Now!</h1>
              <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Explore</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
          <span class="carousel-control"><i class="fas fa-arrow-square-left"></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
          <span class="carousel-control"><i class="fas fa-arrow-square-right"></i></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</template>
<script>
   export default{
       name:'name',
       components:{},
       data(){
           return{

           }
       }
   }
</script>
<style scoped>
/*MAIN SLIDE*/
#main-slide .carousel-control {
  display: none;
  transition: all 0.3s ease-in-out;
}

#main-slide .carousel-indicators {
  cursor: pointer;
  bottom: 90px;
}

#main-slide:hover .carousel-control {
  display: block;
  transition: all 0.3s ease-in-out;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}

#main-slide .carousel-item img {
  position: relative;
  width: 100%;
}

#main-slide .carousel-inner .carousel-item::after {
  bottom: 0;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
}

#main-slide .carousel-item .carousel-caption {
  opacity: 0;
  transition: opacity 100ms ease 0s;
  z-index: 0;
}

#main-slide .carousel-item .carousel-caption .heading {
  font-size: 48px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 0.1rem;
  margin-top: 30px;
}

#main-slide .carousel-item .carousel-caption p {
  font-size: 20px;
}

#main-slide .carousel-item.active .carousel-caption {
  opacity: 1;
  transition: opacity 100ms ease 0s;
  z-index: 1;
}

#main-slide .carousel-caption {
  color: #fff;
  position: absolute;
  top: 35%;
}

#main-slide .carousel-caption .btn {
  margin: 25px 25px 0px 0px;
}

#main-slide .carousel-control-next,
#main-slide .carousel-control-prev {
  opacity: 1;
  box-shadow: none;
}

#main-slide .carousel-control-prev span {
  padding: 15px;
}

#main-slide .carousel-control-next span {
  padding: 15px;
}

#main-slide .carousel-control {
  top: 45%;
}

#main-slide .carousel-control .lni-chevron-left,
#main-slide .carousel-control .lni-chevron-right {
  position: absolute;
  z-index: 5;
}

#main-slide .carousel-control .lni-chevron-left {
  left: 15px;
}

#main-slide .carousel-control .lni-chevron-right {
  right: 15px;
}

.carousel-indicators li {
  width: 12px;
  height: 12px;
  border-radius: 50%;
}

#main-slide .carousel-control i {
  line-height: 40px;
  font-size: 18px;
  width: 45px;
  border: 2px solid #fff;
  height: 45px;
  display: block;
  border-radius: 2px;
  background: transparent;
  color: #fff;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
}

#main-slide .carousel-control i:hover {
  background: rgba(255, 255, 255, 0.2);
  color: #fff;
  border-color: #fff;
}
.btn {
  font-size: 14px;
  padding: 12px 20px;
  border-radius: 4px;
  cursor: pointer;
  font-weight: 400;
  color: #fff;
  text-transform: uppercase;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear;
  display: inline-block;
}

.btn i {
  margin-right: 5px;
}

.btn:focus,
.btn:active {
  box-shadow: none;
  outline: none;
  color: #fff;
}

.btn-common {
  background-color: #E91E63;
  position: relative;
  z-index: 1;
}

.btn-common:hover {
  color: #fff;
  background: #F50057;
  box-shadow: 0 6px 22px rgba(0, 0, 0, 0.1);
  transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -webkit-transition: all .2s ease-in-out;
}

.btn-border {
  color: #fff;
  background-color: transparent;
  border: 1px solid #fff;
}

.btn-border:hover {
  color: #fff;
  background-color: rgba(255, 255, 255, 0.2);
}

.btn-lg {
  padding: 12px 34px;
  text-transform: uppercase;
  font-size: 14px;
}

.btn-rm {
  padding: 7px 10px;
  text-transform: capitalize;
}

button:focus {
  outline: none !important;
}

.icon-close, .icon-check {
  color: #E91E63;
}

.bg-drack {
  background: #f1f1f1;
}

.bg-white {
  background: #fff;
}

.mb-30 {
  margin-bottom: 30px;
}

.mt-30 {
  margin-top: 30px;
}


a.back-to-top {
  display: none;
  position: fixed;
  bottom: 18px;
  right: 15px;
  text-decoration: none;
}

a.back-to-top i {
  display: block;
  font-size: 22px;
  width: 40px;
  height: 40px;
  line-height: 40px;
  color: #fff;
  background: #E91E63;
  border-radius: 0px;
  text-align: center;
  transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
}

a.back-to-top:hover, a.back-to-top:focus {
  text-decoration: none;
}

</style>