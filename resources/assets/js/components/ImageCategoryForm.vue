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
              <form role="form"  @submit.prevent="createCategory">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model='form.name' :class="{'is-invalid':form.errors.has('name')}" type="text" class="form-control" id="name" name="name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="#"  class="btn btn-danger"  @click='dialog=false'>Close</a>
                  <button type="submit" class="btn btn-primary">{{buttonName}}</button>
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
   name:'image-category-form',
   props:['dialogName'],
   data(){
      return{
          dialog:false,
          form:new Form({
            name:'',
          }),
          buttonName:'',
          CategoryId:null
      }
   },
   mounted(){
       Events.$on('ImageCategoryForm',(value,optionName)=>{
                this.form.reset()
                this.dialogName=optionName
                this.dialog=value;
                this.buttonName='Submit'
                
       });
       Events.$on('UpdateImageCategoryForm',(value,optionName,category)=>{
                this.dialogName=optionName
                this.dialog=value;
                this.form.name=category.name
                this.form.fill(category)
                this.buttonName='Update'
                this.categoryId=category.id
                this.disabled=true
         });
       
   },
   methods: {
      createCategory(){
         if(this.dialogName==="Add an image category"){
            this.$Progress.start()
              this.form.post('api/imageCategory',this.form).then((resolve)=>{
                  this.form.name=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your category has been uploaded successfully',
                    'success'
                  )
                  Events.$emit('ImageCategoryCreated')
              }).catch((reject)=>{
                  this.$Progress.fail()
              })
          }
          else if(this.dialogName==="Update image category"){
            
            this.$Progress.start()
            this.form.put('api/imageCategory/'+this.imgId,this.form).then((resolve)=>{
                  this.form.name=''
                  this.dialog=false
                  this.$Progress.finish()
                  Swal.fire(
                    'Very good!',
                    'Your category has been updated successfully',
                    'success'
                  )
                  Events.$emit('ImageCategoryCreated')}).catch((reject)=>{
                  this.$Progress.fail()})
            
          }
         }
         

    }
   
}
</script>

<style>

</style>
