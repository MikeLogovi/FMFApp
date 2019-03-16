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
              <form role="form" enctype="multipart/form-data" @submit.prevent="createEvent">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type='text' v-model='form.title' class='form-control' id='title' name='title' :class="{'is-invalid':form.errors.has('title')}">
                        <has-error :form="form" field="title"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="organized_by">Organized by</label>
                        <input type='text' v-model='form.organized_by' class='form-control' id='organized_by' name='organized_by' :class="{'is-invalid':form.errors.has('organized_by')}">
                        <has-error :form="form" field="organized_by"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="organized_at">Event's date</label>
                        <input type='date' v-model='form.organized_at' class='form-control' id='organized_at' name='organized_at' :class="{'is-invalid':form.errors.has('organized_at')}">
                        <has-error :form="form" field="organized_at"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="organization_place">Event's place</label>
                        <input type='text' v-model='form.organization_place' class='form-control' id='organization_place' name='organization_place' :class="{'is-invalid':form.errors.has('organization_place')}">
                        <has-error :form="form" field="organization_place"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea v-model="form.description" class='form-control' id='description' name='description' :class="{'is-invalid':form.errors.has('description')}"></textarea>
                        <has-error :form="form" field="description"></has-error>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Your event's image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload">
                        <label class="custom-file-label" for="file">{{eventName}}</label>
                        
                      </div>
                      
                    </div>
                     <p class='text-danger' v-if='file_error'>Your file must have jpg,png or gif extension</p>
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
   name:'event-form',
   props:['dialogName'],
   data(){
      return{
          dialog:false,
          form:new Form({
            title:'',
            organized_by:'',
            organized_at:'',
            organization_place:'',
            file:'',
            source:'',
            description:''
          }),
          file:null,
          disabled:true,
          file_error:false,
          extensions:['jpg','jpeg','png','gif'],
          eventName:'Choose your file',
          buttonName:'',
          eventId:null,
          eventCategory:{}
      }
   },
   mounted(){
     
       Events.$on('EventForm',(value,optionName)=>{
                this.form.reset()
                this.dialogName=optionName
                this.dialog=value;
                this.buttonName='Submit'
                this.disabled=true
                
       });
       Events.$on('UpdateEventForm',(value,optionName,event)=>{
                this.dialogName=optionName
                this.dialog=value;
                this.form.name=event.name
                this.form.fill(event)
                this.buttonName='Update'
                this.eventId=event.id
                this.disabled=false
               
       });
       
   },
   methods: {
      
      handleFileUpload(el){
        console.log(el)
        var extension;
        
        this.eventName=el.target.files[0].name
        this.file= this.eventName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensions.indexOf(extension)!=-1){
            this.file_error=false
            this.disabled=false
            this.form.source=this.eventName
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
      
      createEvent(){
         if(this.dialogName==="Add an event"){
            this.$Progress.start()
              this.form.post('api/event',this.form).then((resolve)=>{
                  this.form.title='',
             this.form.organized_by='',
             this.form.organized_at='',
             this.form.organization_place='',
             this.form.source='',
             this.form.description=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your event has been uploaded successfully',
                    'success'
                  )
                  Events.$emit('EventCreated')
              }).catch((reject)=>{
                  this.$Progress.fail()
                 
              })
          }
          else if(this.dialogName==="Update event"){
            console.log('ok')
            this.$Progress.start()
            this.form.put('api/event/'+this.eventId,this.form).then((resolve)=>{
                  this.form.name=''
                  this.form.eventName=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your event has been updated successfully',
                    'success'
                  )
                  Events.$emit('eventCreated')}).catch((reject)=>{
                  this.$Progress.fail()})
            
          }
         }
         

    }
   
}
</script>

<style>

</style>
