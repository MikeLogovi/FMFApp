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
              <form role="form" enctype="multipart/form-data" @submit.prevent="createSocialMedia">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="social_media">Social media</label>
                         <select class='form-control' v-model='form.social_media' :class="{'is-invalid':form.errors.has('social_media')}" name='social_media' id='social_media'>
                            <option v-for="(item,key) in available_social_media" :key="key" :value="item.name">{{item.name|capitalizeIt}}</option>
                        </select>
                        <has-error :form="form" field="social_media"></has-error>
                    </div>
                   
                    <div class="form-group">
                        <label for="link">Social link</label>
                        <input type='text' v-model="form.link" class='form-control' id='link' name='link' :class="{'is-invalid':form.errors.has('link')}"/>
                        <has-error :form="form" field="link"></has-error>
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
                social_media:'',
                link:'',
            }),
            dialog:false,
            dialogName:'',
            buttonName:'',
            myItem:'',
            available_social_media:[
                {name:'facebook'},
                {name:'twitter'},
                {name:'youtube'},
                {name:'dribbble'},
                {name:'linkedin'},
                {name:'instagram'}
            ]
        }
    },
    mounted(){
        Events.$on('SocialMediaForm',()=>{
            this.dialog=true;
            this.dialogName='Add an social media'
            this.buttonName='Create'
        })
        Events.$on('SocialMediaUpdateForm',(item)=>{
            this.dialogName='Update social media'
            this.buttonName='Update'
            this.form.fill(item)
            this.dialog=true
            
            
            this.myItem=item
        })
    },
    methods:{
     
       createSocialMedia(){
           if(this.buttonName=='Create'){
                this.$Progress.start()
                this.form.post('api/socialite',this.form).then(()=>{
                        Toast.fire({
                        type: 'success',
                        title: 'Social media added successfully'
                        })
                        this.$Progress.finish()
                        Events.$emit('SocialMediaCreated')
                        this.dialog=false

                }).catch(()=>{
                        this.$Progress.fail()
                })
           }
           else if(this.buttonName=='Update'){
               this.updateSocialMedia()
           }
       },
       updateSocialMedia(){
           this.form.put('api/socialite/'+this.myItem.id).then(()=>{
                        Toast.fire({
                        type: 'success',
                        title: 'Social media updated successfully'
                        })
                        this.$Progress.finish()
                        Events.$emit('SocialMediaCreated')
                        this.dialog=false
           }).catch(()=>{
                        this.$Progress.fail()
                })
       }

    }
}
</script>