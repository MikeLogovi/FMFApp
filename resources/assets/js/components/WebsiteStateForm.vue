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
                <h3 class="card-title">Update website state</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" @submit.prevent="updateWebsiteState">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="name">Website name</label>
                        <input v-model='form.name' :class="{'is-invalid':form.errors.has('name')}" type="text" class="form-control" id="name" name="name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                   
                    <div class="form-group">
                        <label for="name">Website quote</label>
                        <textarea v-model="form.quote" class='form-control' id='quote' name='quote' :class="{'is-invalid':form.errors.has('quote')}"></textarea>
                        <has-error :form="form" field="quote"></has-error>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Website logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload">
                        <label class="custom-file-label" for="file">{{logoName}}</label>
                        
                      </div>
                      
                    </div>
                     <p class='text-danger' v-if='file_error'>Your file must have jpeg,png or gif extension</p>
                  </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="#"  class="btn btn-danger"  @click='dialog=false'>Close</a>
                  <button type="submit" class="btn btn-primary">Update</button>

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
export default{
    name:'WebsiteStateForm',
    components:{},
    data(){
        return{
            form:new Form({
                name:'',
                logo:'',
                quote:''
            }),
            file:'',
            file_error:false,
            logoName:'',
            dialog:false,
            extensions:['jpg','jpeg','png','gif']
        }
    },
    mounted(){
        Events.$on('WebsiteStateForm',(presentState)=>{
            this.dialog=true;
            this.form.fill(presentState)
        })
    },
    methods:{
        handleFileUpload(el){
       
        var extension  
        this.logoName=el.target.files[0].name
        this.file= this.logoName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensions.indexOf(extension)!=-1){
            this.file_error=false
            this.form.logo=this.logoName
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
       updateWebsiteState(){
           this.$Progress.start()
           this.form.put('api/website/1',this.form).then(()=>{
                this.$Progress.start()
                Toast.fire({
                type: 'success',
                title: 'Website state updated successfully'
                })
                this.$Progress.finish()
                 Events.$emit('WebsiteStateUpdated')
                this.dialog=false
                this.form.nam

           }).catch(()=>{
                this.$Progress.fail()
           })
       }
    }
}
</script>