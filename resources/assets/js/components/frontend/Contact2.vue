<template>
<div>
  <nav-bar></nav-bar>
    <div>
          <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile _icon"></i>
                <p>
                  Call:+213 552 80 72 03 <br>
                  
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o _icon"></i>
                <p>
                  Email: chuck@gmail.com<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker _icon"></i>
                <p>
                 Adress:Ben Aknoun, Alger <br>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
   <footer-bar></footer-bar>
    </div>
  </div>
</template>
<script>
import NavBar from './NavBar'
  import FooterBar from './FooterBar'
export default {
    name:'contact',
     components:{NavBar,FooterBar},
}
</script>
<style scoped>
.contact-area {
  height: auto;
  width: 100%;
}

.contact-content {
  padding: 100px;
  background: #000 none repeat scroll 0 0;
}

.contact-content-right {
  padding: 100px;
}

.contact-form input[type="text"], .contact-form input[type="email"] {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: 1px solid #ccc;
  border-radius: 0;
  color: #444;
  height: 40px;
  margin-bottom: 16px;
  padding-left: 20px;
  width: 100%;
}

.contact-form textarea  {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: 1px solid #ccc;
  border-radius: 0;
  color: #444;
  height: 140px;
  padding: 20px;
  width: 100%;
}

.contact-form button[type="submit"] {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: 1px solid #ccc;
  color: #444;
  font-size: 16px;
  font-weight: 700;
  margin-top: 8px;
  padding: 12px 30px;
  text-transform: uppercase;
  transition: all 0.3s ease 0s;
  border-radius: 30px;
}

.contact-form button[type=submit]:hover {
  color: #fff;
  border: 1px solid #3EC1D5;
  background: #3EC1D5;
}

.contact-form  #sendmessage {
  color: #3EC1D5;
  border: 1px solid #3EC1D5;
  display: none;
  text-align: center;
  padding: 15px;
  font-weight: 600;
  margin-bottom: 15px;
}

.contact-form #errormessage {
  color: red;
  display: none;
  border: 1px solid red;
  text-align: center;
  padding: 15px;
  font-weight: 600;
  margin-bottom: 15px;
}

.contact-form #sendmessage.show, .contact-form #errormessage.show, .contact-form .show {
  display: block;
}

#contact .form .validation {
  color: red;
  display: none;
  margin: 0 0 20px;
  font-weight: 400;
  font-size: 13px;
}

.single-icon i {
  font-size: 24px;
  width: 50px;
  height: 50px;
  border: 1px solid #444;
  line-height: 46px;
  border-radius: 50%;
  margin-bottom: 20px;
}

.single-icon p {
  font-size: 16px;
  line-height: 30px;
}

.contact-icon {
  margin-bottom: 40px;
}

#google-map {
  height: 370px;
  margin-bottom: 20px;
}
._icon:hover{
   background-color:#3EC1D5;
}
</style>