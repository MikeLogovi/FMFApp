<template>
  <div data-app>
     <v-layout row justify-center>
    <v-dialog v-model="dialog"  max-width="600px">
       <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
            <!-- general form elements -->
            <div class="card card-primary" style="max-width:600px">
              <div class="card-header">
                <h3 class="card-title">{{dialogName}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" @submit.prevent="createPost">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type='text' v-model='form.title' class='form-control' id='title' name='title' :class="{'is-invalid':form.errors.has('title')}">
                        <has-error :form="form" field="title"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="author">Author</label>
                        <input type='text' v-model='form.author' class='form-control' id='author' name='author' :class="{'is-invalid':form.errors.has('author')}">
                        <has-error :form="form" field="author"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="written_at">Written at</label>
                        <input type='date' v-model='form.written_at' class='form-control' id='written_at' name='written_at' :class="{'is-invalid':form.errors.has('written_at')}">
                        <has-error :form="form" field="written_at"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="attached_link">Attached link</label>
                        <input type='text' v-model='form.attached_link' class='form-control' id='attached_link' name='attached_link' :class="{'is-invalid':form.errors.has('attached_link')}" placeholder="This field is optional">
                        <has-error :form="form" field="attached_link"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea v-model="form.description" class='form-control' id='description' name='description' :class="{'is-invalid':form.errors.has('description')}"></textarea>
                        <has-error :form="form" field="description"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Attached file(Optional)</label>
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload" placeholder="This field is optional">
                            <label class="custom-file-label" for="file">{{fileName}}</label>
                            
                          </div>
                        
                      </div>
                    </div>
                     <p class='text-danger' v-if='file_error'>Your file must have pdf or word extension</p>
                     <div class="form-group">
                        <label for="exampleInputFile">Attached image</label>
                        <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleImageUpload">
                                <label class="custom-file-label" for="file">{{imageName}}</label>
                                
                              </div>
                          
                        </div>
                        <p class='text-danger' v-if='image_error'>Your file must have jpg,png or gif extension</p>
                      </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="#"  class="btn btn-danger"  @click='dialog=false'>Close</a>
                  <button type="submit" class="btn btn-primary"  :disabled="disabled" >{{buttonName}}</button>
                </div>
              </form>
            </div>
             </div>
        </div>
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </v-dialog>
  </v-layout>
</div>
</template>

<script>
 
export default {
   name:'post-form',
   props:['dialogName'],
   data(){
      return{
          dialog:false,
          form:new Form({
            title:'',
            description:'',
            author:'',
            written_at:'',
            attached_link:'',
            attached_image:'',
            attached_file:''
          }),
          file:null,
          image:null,
          disabled:true,
          file_error:false,
          image_error:false,
          extensionsForFile:['pdf','word'],
          extensionsForImage:['jpg','jpeg','png','gif'],
          fileName:'',
          imageName:'',
          buttonName:'Choose your file',
          eventId:null,
        
      }
   },
   mounted(){
     
       Events.$on('PostForm',(value,optionName)=>{
                this.form.reset()
                this.dialogName=optionName
                this.dialog=value
                this.fileName=''
                this.imageName=''
                this.buttonName='Submit'
                this.disabled=true
                
       });
       Events.$on('UpdatePostForm',(value,optionName,post)=>{
                this.dialogName=optionName
               
                this.form.description=post.description
                this.form.author=post.author
                this.form.written_at=post.written_at
                this.form.attached_link=post.attached_link
                this.fileName=''
                this.imageName=''
                this.buttonName='Update'
                this.postId=post.id
                this.dialog=value
                
                this.disabled=false
               
       });
       
   },
   methods: {
    
       handleImageUpload(el){
        var extension;
        
        this.imageName=el.target.files[0].name
        this.image= this.imageName
        extension=getFileExtension(this.image).toLowerCase()
        if(this.extensionsForImage.indexOf(extension)!=-1){
            this.image_error=false
            this.disabled=false
            var fileReader = new FileReader()
            fileReader.readAsDataURL(el.target.files[0])
            fileReader.onload=(e)=>{
              this.form.attached_image=e.target.result
            }
        }
        else{
            this.disabled=true
            this.image_error=true
            
        }
      },
       
      handleFileUpload(el){
            var extension;
        
        this.fileName=el.target.files[0].name
        this.file= this.fileName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensionsForFile.indexOf(extension)!=-1){
            this.file_error=false
            
            var fileReader = new FileReader()
            fileReader.readAsDataURL(el.target.files[0])
            fileReader.onload=(e)=>{
              this.form.attached_file=e.target.result
            }
        }
        else{
           
            this.file_error=true
            
        }
      },
      createPost(){
         if(this.dialogName==="Add a post"){
            this.$Progress.start()
              this.form.post('api/post',this.form).then((resolve)=>{
                  this.form.reset()
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your post has been uploaded successfully',
                    'success'
                  )
                  Events.$emit('PostCreated')
              }).catch((reject)=>{
                  this.$Progress.fail()
                 
              })
          }
          else if(this.dialogName==="Update post"){
            console.log('ok')
            this.$Progress.start()
            this.form.put('api/post/'+this.postId,this.form).then((resolve)=>{
                  this.form.reset()
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your post has been updated successfully',
                    'success'
                  )
                  Events.$emit('PostCreated')}).catch((reject)=>{
                  this.$Progress.fail()})
            
          }
         }
         

    }
   
}
</script>

<style>

</style>
