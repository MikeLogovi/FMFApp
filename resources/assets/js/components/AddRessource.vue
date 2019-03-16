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
              <form role="form" enctype="multipart/form-data" @submit.prevent="createImage">
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
                            <option v-for="(item,key) in imgCategory" :key="key" :value="item.id">{{item.name}}</option>
                        </select>
                        <has-error :form="form" field="category"></has-error>
                        
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Your image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload">
                        <label class="custom-file-label" for="file">{{imgName}}</label>
                        
                      </div>
                      
                    </div>
                     <p class='text-danger' v-if='file_error'>Your file must have as extensions jpg,jpeg,gif or png</p>
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
   name:'add-ressource',
   props:['dialogName'],
   data(){
      return{
          dialog:false,
          form:new Form({
            name:'',
            file:'',
            category:'',
            source:''
          }),
          file:null,
          disabled:true,
          file_error:false,
          extensions:['jpg','png','gif','jpeg'],
          imgName:'Choose your file',
          buttonName:'',
          imgId:null,
          imgCategory:{}
      }
   },
   mounted(){
       this.form.get('api/imageCategory').then(({data})=>{
          this.imgCategory=data.data
       })
       Events.$on('ImageForm',(value,optionName)=>{
                this.form.reset()
                this.imgName=''
                this.dialogName=optionName
                this.dialog=value;
                this.buttonName='Submit'
                this.disabled=true
                
       });
       Events.$on('updateImageForm',(value,optionName,image)=>{
                this.dialogName=optionName
                this.dialog=value;
                this.form.name=image.name
                this.form.fill(image)
                this.buttonName='Update'
                this.imgId=image.id
                this.disabled=false
               
       });
       
   },
   methods: {
      
      handleFileUpload(el){
        console.log(el)
        var extension;
        
        this.imgName=el.target.files[0].name
        this.file= this.imgName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensions.indexOf(extension)!=-1){
            this.file_error=false
            this.disabled=false
            this.form.source=this.imgName
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
      
      createImage(){
         if(this.dialogName==="Add an image"){
            this.$Progress.start()
              this.form.post('api/image',this.form).then((resolve)=>{
                  this.form.name=''
                  this.form.imgName=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your image has been uploaded successfully',
                    'success'
                  )
                  Events.$emit('imageCreated')
              }).catch((reject)=>{
                  this.$Progress.fail()
                
              })
          }
          else if(this.dialogName==="Update image"){
            console.log('ok')
            this.$Progress.start()
            this.form.put('api/image/'+this.imgId,this.form).then((resolve)=>{
                  this.form.name=''
                  this.form.imgName=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your image has been updated successfully',
                    'success'
                  )
                  Events.$emit('imageCreated')}).catch((reject)=>{
                  this.$Progress.fail()})
            
          }
         }
         

    }
   
}
</script>

<style>

</style>
