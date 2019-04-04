<template>

<v-layout id='myContact'>
    <v-flex xs12 sm6 offset-sm3>
      <v-card>

 <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2 class=' text-danger h1-responsive font-weight-bold text-center my-5' style="font-size:45px">CONTACT US</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fas fa-phone _icon"></i>
                <p>
                  Call: {{contact.phone_number}}<br>
                  
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fas fa-envelope _icon"></i>
                <p>
                  Email: {{contact.email}}<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fas fa-map-marker-alt _icon"></i>
                <p>
                 Adress:{{contact.localisation}} <br>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form contact-form">
              
              <form @submit.prevent="sendMail" >
                  <alert-success :form="form" message="Your message has been sent successfully!"></alert-success>
                  <alert-error :form="form" message="There were some problems with your input."></alert-error>
                <div class="form-group">
                  <input  v-model='form.name' :class="{'is-invalid':form.errors.has('name')}" type="text" class="form-control" id="name" name="name" placeholder="Your name"/>
                   <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                  <input  v-model='form.email' type="email" :class="{'is-invalid':form.errors.has('email')}" class="form-control" name="email" id="email" placeholder="Your Email" />
                   <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                  <input v-model='form.subject' :class="{'is-invalid':form.errors.has('subject')}"  type="text" class="form-control" name="subject" id="subject" placeholder="Subject" />
                  <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                  <textarea v-model='form.message' :class="{'is-invalid':form.errors.has('message')}" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <has-error :form="form" field="message"></has-error>
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
</v-card>
    </v-flex>
  </v-layout>
    
    
    
    
     
</template>
<script>

import {mapState} from 'vuex'
export default {
    name:'contact',
     
     data(){
       return{
          form:new Form({
             name:'',
             email:'',
             subject:'',
             message:''
          }),
          item:{

          }
       }
     },
     mounted(){
      this.loadContact()
      Echo.channel('my-channel').listen('ContactUpdated',(e)=>{
         this.loadContact()
      })
     },
     computed:{
       ...mapState([
         'contact'
       ])
     },
     methods:{
       loadContact(){
         this.$store.dispatch('loadContact')
           
        },
        sendMail(){
           this.form.post('/sendmail',this.form).then(()=>{
             this.form.reset();
           })
        }
     }
}
</script>
<style scoped>
#myContact{
  background-color: #212529;
  background-image: url(/images/map-image.png);
}
#contact{
  margin-top:1.5em;
  margin-bottom:1.85em;
}
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
  border: 1px solid #C82333;
  background: #C82333;
}

.contact-form  #sendmessage {
  color: #C82333;
  border: 1px solid black;
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
   background-color:#E74C3C;
}
</style>