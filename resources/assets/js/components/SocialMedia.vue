<template>
<div>
    <social-media-form></social-media-form>
  <div  style='margin:1.5em 1.5em'>
          
          <div class='row'  style='margin:1.5em 1.5em'>
            <h2 class="h2-responsive" style='margin-left:1em; color:#3F729B;text-decoration:underline'>Socialite</h2>
            <v-spacer></v-spacer>
            <button class='btn btn-success pull-right' @click='addSocialMedia'>Add an social media</button>
           </div>
        
        
     <div class="row">
        <div class="col-12">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Social media</th>
                  <th>Link</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items" :key="key" >
                   <tr class='tr_table'>
                   
                   <td><i :class='`fab fa-${item.social_media}`'></i> {{item.social_media}}</td>
                   <td><a :href="item.link" target="_blank">{{item.link}}</a></td>
                   <td>
                       <div class="col-xs-12">
                           <a href="#" @click.prevent="updateSocialMedia(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteSocialMedia(item.id)">
                               <i style="color:red" class='fa fa-trash'></i>
                           </a>
                       </div>
                     </td> 
                    </tr> 
                </tbody>
               
              </table>
              </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
</div>
</template>
<script>
import SocialMediaForm from './SocialMediaForm'
export default{
   name:'social-media',
   components:{SocialMediaForm},
   data(){
       return{
          
           items:{

           }
       }
   },
   mounted(){
       this.loadSocialMedia()
       Events.$on('SocialMediaCreated',()=>{
           this.loadSocialMedia()
       })
   },
   methods:{
       loadSocialMedia(){
            axios.get('api/socialite').then(({data})=>{
             this.items=data.data
            })
       },
       addSocialMedia(){
           Events.$emit('SocialMediaForm');
       },
       updateSocialMedia(item){
           Events.$emit('SocialMediaUpdateForm',item);
       },
        deleteSocialMedia(id){
         Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                    if(result.value) {
                        this.$Progress.start()
                         axios.delete('api/socialite/'+id).then(()=>{
                                        Toast.fire({
                                        type: 'success',
                                        title: 'Social media deleted successfully'
                                        })
                                        this.$Progress.finish()
                                        Events.$emit('SocialMediaCreated')
                                }).catch(()=>{
                                        this.$Progress.fail()
                                        Toast.fire({
                                        type: 'danger',
                                        title: 'Sorry, an error occured'
                                        })
                                        this.$Progress.fail()
                                    
                                })
                                            
                                            }
                                })
          
       }
   }
}
</script>