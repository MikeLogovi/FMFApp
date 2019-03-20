<template>
<div>
    <navigation nav-title="Video's categories" nav-icon="fas fa-video" nav-action="#" nav-actioname="Add a video category" ></navigation>      
     <video-category-form :dialog-name="dialogName"></video-category-form>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header ">
              <h1 class="card-title" style="color:white">VIDEO CATEGORIES</h1>
            </div>
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Last modification at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items" :key="key" >
                   <tr class='tr_table'>
                   
                   <td>{{item.name}}</td>
                   <td>{{item.updated_at|myDate}}</td>
                   <td>
                       <div class="col-xs-12">
                           <a href="#" @click.prevent="updateVideoCategory(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteVideoCategory(item.id)">
                               <i style="color:red" class='fa fa-trash'></i>
                           </a>
                       </div>
                     </td> 
                    </tr> 
                </tbody>
                <tfoot>
                 <pagination :data="items" @pagination-change-page="paginate">
                    <span slot="prev-nav">&lt;</span>
                    <span slot="next-nav">&gt;</span>
                 </pagination>
                </tfoot>
              </table>
              </div>
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
import Navigation from './Navigation'
import VideoCategoryForm from './VideoCategoryForm'
export default{
    name:'video-category',   
    components:{Navigation,VideoCategoryForm},

    
    data(){
        return{
             items:{
               
             },
             dialogName:"Add a video category"
        }
    },
   
    mounted(){
       this.loadVideoCategories();
       Events.$on('VideoCategoryCreated',()=>{
          this.loadVideoCategories();
       });
    },
    methods:{
         paginate(page = 1) {
          axios.get('api/videoCategory?page=' + page)
            .then(response => {
              this.items = response.data;
            });
        },
        loadVideoCategories(){
            axios.get('api/videoCategory').then(({data})=>{
                console.log(data.data)
                this.items=data.data
            })
        },
        deleteVideoCategory(id){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        this.$Progress.start()
                        axios.delete('api/videoCategory/'+id).then((resolve)=>{
                            Swal.fire(
                                'Deleted!',
                                'Your video category has been deleted.',
                                'success'
                             )
                             this.loadVideoCategories();
                             this.$Progress.finish()
                        }
                             
                        ).catch((reject)=>{
                               Swal.fire(
                                'Sorry!',
                                'Your video category has not been deleted.',
                                'error'
                             )
                             this.$Progress.finish()
                        } )
                       
                    }
           })

        },
        updateVideoCategory(videoCategory){
           Events.$emit('UpdateVideoCategoryForm',true,"Update a video category",videoCategory)
        }
    }
}
</script>
<style scoped>
.card-header{
    background-color:#3F51B5;
}
.tr_table:hover{
  background-color:#B0BEC5;
}
</style>