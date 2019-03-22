<template>
<div>
      <navigation nav-title="Profile"></navigation>

    <v-layout>
        <v-flex sm12>
             <v-card>
         <div class="col-lg-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('/slide/img/slide1.jpg') center center;">
                <h3 class="widget-user-username">{{user.name}}</h3>
               
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="/slide/img/slide1.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                  <form role="form" enctype="multipart/form-data" @submit.prevent="updateUser">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type='text' v-model='form.name' class='form-control' id='name' name='name' :class="{'is-invalid':form.errors.has('name')}" :placeholder="user.name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type='email' v-model='form.email' class='form-control' id='email' name='email' :class="{'is-invalid':form.errors.has('email')}" :placeholder="user.email">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="old_password">Old password</label>
                        <input type='password' v-model='form.old_password' class='form-control' id='old_password' name='old_password' :class="{'is-invalid':form.errors.has('old_password')}">
                        <has-error :form="form" field="old_password"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="password">New password</label>
                        <input type='password' v-model='form.password' class='form-control' id='password' name='password' :class="{'is-invalid':form.errors.has('password')}">
                        <has-error :form="form" field="password"></has-error>
                    </div>

                     <div class="form-group">
                        <label for="password">Confirm your new password</label>
                        <input type='password' v-model='form.conf_password' class='form-control' id='conf_password' name='conf_password' :class="{'is-invalid':form.errors.has('conf_password')}">
                        <has-error :form="form" field="conf_password"></has-error>
                    </div>
                  
                    <div class="form-group">
                    <label for="exampleInputFile">Profile picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload">
                        <label class="custom-file-label" for="file">{{fileName}}</label>
                        
                      </div>
                      
                    </div>
                     <p class='text-danger' v-if='file_error'>Your file must have jpg,png or gif extension</p>
                  </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                  <button type="submit" class="btn btn-primary"  :disabled="disabled" >Update <i class="fas fa-user"></i></button>

                </div>
              </form>
                 
  
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
             </v-card>
        </v-flex>
    </v-layout>
</div>
</template>
<script>
import Navigation from './Navigation'
export default{
      name:'profile',
      components:{Navigation},
      data(){
         return {
           user:'',
           website:'',
           form :new Form({
              name:'',
              email:'',
              old_password:'',
              conf_password:'',
              password:'',
              file:''
           }),
             extensions:['jpg','jpeg','png','gif'],
             file:'',
             file_error:'',
             fileName:'',
             buttonName:'',
             disabled:false
         }
      },
      mounted(){
        this.user=this.$store.state.user;
        console.log(this.user.id)
        this.website=this.$store.state.website
      },
      methods:{
        updateUser(){
             this.$Progress.start()
             this.$store.dispatch('updateUser',this.form,this.user.id).then(()=>{
                  this.user=this.$store.state.user;
                  this.$Progress.finish()
                  Events.$emit('userUpdated')
                 Toast.fire({
                  type: 'success',
                  title: 'Profile updated successfully'
                })
             }).catch(()=>{
                 this.$Progress.fail()
             })
        },
        handleFileUpload(el){
            var extension;
        
        this.fileName=el.target.files[0].name
        this.file= this.fileName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensions.indexOf(extension)!=-1){
            this.file_error=false
            var fileReader = new FileReader()
            fileReader.readAsDataURL(el.target.files[0])
            fileReader.onload=(e)=>{
              this.form.file=e.target.result
            }
        }
        else{   
            this.file_error=true     
        }
      },
      }
}
</script>