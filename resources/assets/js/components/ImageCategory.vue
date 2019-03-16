<template>
<div>
    <navigation nav-title="Gallery's categories" nav-icon="fas fa-image" nav-action="#" nav-actioname="Add an image category" ></navigation>      
     <image-category-form :dialog-name="dialogName"></image-category-form>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header ">
              <h1 class="card-title" style="color:white">IMAGE CATEGORIES</h1>
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
                           <a href="#" @click.prevent="updateImageCategory(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteImageCategory(item.id)">
                               <i style="color:red" class='fa fa-trash'></i>
                           </a>
                       </div>
                     </td> 
                    </tr> 
                </tbody>
               
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
import ImageCategoryForm from './ImageCategoryForm'
export default{
    name:'image-category',   
    components:{Navigation,ImageCategoryForm},

    
    data(){
        return{
             items:{
               
             },
             dialogName:"Add an image category"
        }
    },
   
    mounted(){
       this.loadImageCategories();
       Events.$on('ImageCategoryCreated',()=>{
          this.loadImageCategories();
       });
    },
    methods:{
        loadImageCategories(){
            axios.get('api/imageCategory').then(({data})=>{
                console.log(data.data)
                this.items=data.data
            })
        },
        deleteImageCategory(id){
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
                        axios.delete('api/imageCategory/'+id).then((resolve)=>{
                            Swal.fire(
                                'Deleted!',
                                'Your image category has been deleted.',
                                'success'
                             )
                             this.loadImageCategories();
                             this.$Progress.finish()
                        }
                             
                        ).catch((reject)=>{
                               Swal.fire(
                                'Sorry!',
                                'Your image category has not been deleted.',
                                'error'
                             )
                             this.$Progress.finish()
                        } )
                       
                    }
           })

        },
        updateImageCategory(imageCategory){
           Events.$emit('UpdateImageCategoryForm',true,"Update an image category",imageCategory)
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