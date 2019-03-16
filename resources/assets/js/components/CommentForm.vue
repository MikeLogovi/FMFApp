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
              <form role="form" enctype="multipart/form-data" @submit.prevent="createOrUpdateComment">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="fullName">Full name</label>
                         <input type="text" class='form-control' v-model='form.fullName' :class="{'is-invalid':form.errors.has('fullName')}" name='fullName' id='fullName'/>
                        <has-error :form="form" field="fullName"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea  rows="15" v-model="form.comment" class='form-control' id='comment' name='comment' :class="{'is-invalid':form.errors.has('comment')}"></textarea>
                        <has-error :form="form" field="comment"></has-error>
                    </div>
                   <div class="form-group">  
                        <label for='file'>Your picture</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" ref="file" id="file" aria-describedby="inputGroupFileAddon04" v-on:change="handleFileUpload">
                            <label class="custom-file-label" for="file">{{imgName}}</label>
                          </div>
                        </div>
                   </div>
                    <p class='text-danger' v-if='file_error'>Your file must have jpeg,png or gif extension</p>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="#"  class="btn btn-danger"  @click='dialog=false'>Close</a>
                  <button type="submit" class="btn btn-primary" :disabled='disabled'>{{buttonName}}</button>

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
                fullName:'',
                comment:'',
                avatar:'',
                file:''
            }),
            disabled:true,
            dialog:false,
            dialogName:'',
            buttonName:'',
            myItem:'',
            file:'',
            imgName:'',
            file_error:false,
            extensions:['jpeg','png','gif','jpg'],
           
        }
    },
    mounted(){
        Events.$on('CommentForm',()=>{
            this.dialog=true;
            this.dialogName='Add a comment'
            this.buttonName='Submit'
        })
        Events.$on('CommentUpdateForm',(item)=>{
            this.dialogName='Update comment'
            this.buttonName='Update'
            this.form.fill(item)
            this.dialog=true
            this.myItem=item
            this.disabled=false
        })
    },
    methods:{
       handleFileUpload(el){
       
        var extension  
        this.imgName=el.target.files[0].name
        this.file= this.imgName
        extension=getFileExtension(this.file).toLowerCase()
        if(this.extensions.indexOf(extension)!=-1){
            this.file_error=false
            this.disabled=false
            this.form.avatar=this.imgName
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
       createOrUpdateComment(){
           if(this.buttonName=='Submit'){
                this.$Progress.start()
                this.form.post('api/comment',this.form).then(()=>{
                        Toast.fire({
                        type: 'success',
                        title: 'Comment added successfully'
                        })
                        this.$Progress.finish()
                        Events.$emit('CommentCreated')
                        this.dialog=false

                }).catch(()=>{
                        this.$Progress.fail()
                })
           }
           else if(this.buttonName=='Update'){
               this.updateComment()
           }
       },
       updateComment(){
         this.$Progress.start()
           this.form.put('api/comment/'+this.myItem.id).then(()=>{
                        Toast.fire({
                        type: 'success',
                        title: 'Comment updated successfully'
                        })
                        this.$Progress.finish()
                        Events.$emit('CommentCreated')
                        this.dialog=false
           }).catch(()=>{
                        this.$Progress.fail()
                })
       }

    }
}
</script>