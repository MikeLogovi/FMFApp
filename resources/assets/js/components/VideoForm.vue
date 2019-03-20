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
              <form role="form" enctype="multipart/form-data" @submit.prevent="createVideo">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model='form.name' :class="{'is-invalid':form.errors.has('name')}" type="text" class="form-control" id="name" name="name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="name">Category</label>
                        <select class='form-control' v-model='form.category' :class="{'is-invalid':form.errors.has('category')}" name='category' id='category'>
                            <option v-for="(item,key) in videoCategory" :key="key" :value="item.id">{{item.name}}</option>
                        </select>
                        <has-error :form="form" field="category"></has-error>
                        
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea v-model="form.description" class='form-control' id='description' name='description' :class="{'is-invalid':form.errors.has('description')}"></textarea>
                        <has-error :form="form" field="description"></has-error>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Your video</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload">
                        <label class="custom-file-label" for="file">{{videoName}}</label>
                        
                      </div>
                      
                    </div>
                     <p class='text-danger' v-if='file_error'>Your file must have an mp4 extension</p>
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
  function getFileExtension(file){
        var name=file.split('.')
        if(name.length===1||(name[0]==''&& name.length==2)){
          return ''
        }
        else{
          return name[1];
        }
  }
export default {
   name:'video-form',
   props:['dialogName'],
   data(){
      return{
          dialog:false,
          form:new Form({
            name:'',
            file:'',
            source:'',
            category:'',
            description:''
          }),
          file:null,
          disabled:true,
          file_error:false,
          extensions:['mp4','MP4'],
          videoName:'Choose your file',
          buttonName:'',
          videoId:null,
          videoCategory:{}
      }
   },
   mounted(){
       this.form.get('api/videoCategory').then(({data})=>{
          this.videoCategory=data.data
       })
       Events.$on('VideoForm',(value,optionName)=>{
                this.form.reset()
                this.imgName=''
                this.dialogName=optionName
                this.dialog=value;
                this.buttonName='Submit'
                this.disabled=true
                
       });
       Events.$on('UpdateVideoForm',(value,optionName,video)=>{
                this.dialogName=optionName
                this.dialog=value;
                this.form.name=video.name
                this.form.fill(video)
                this.buttonName='Update'
                this.videoId=video.id
                this.disabled=false
               
       });
       
   },
   methods: {
      
      handleFileUpload(el){
        console.log(el)
        var extension;
        
        this.videoName=el.target.files[0].name
        this.file= this.videoName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensions.indexOf(extension)!=-1){
            this.file_error=false
            this.disabled=false
            this.form.source=this.videoName
            var fileReader = new FileReader()
            fileReader.readAsDataURL(el.target.files[0])
            fileReader.onload=(e)=>{
              this.form.file=e.target.result
            }
        }
        else{
            this.disabled=true
            this.file_error=true
            
        }

      },
      
      createVideo(){
         if(this.dialogName==="Add a video"){
            this.$Progress.start()
              this.form.post('api/video',this.form).then((resolve)=>{
                  this.form.name=''
                  this.form.videoName=''
                  this.form.reset()
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your video has been uploaded successfully',
                    'success'
                  )
                  Events.$emit('VideoCreated')
              }).catch((reject)=>{
                  this.$Progress.fail()
                 
              })
          }
          else if(this.dialogName==="Update video"){
            console.log('ok')
            this.$Progress.start()
            this.form.put('api/video/'+this.videoId,this.form).then((resolve)=>{
                  this.form.name=''
                  this.form.videoName=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your video has been updated successfully',
                    'success'
                  )
                  Events.$emit('VideoCreated')
            }).catch((reject)=>{
                  this.$Progress.fail()
                })
            
          }
         }
         

    }
   
}
</script>

<style>

</style>
