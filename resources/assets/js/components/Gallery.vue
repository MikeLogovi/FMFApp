<template>
<div>
    <navigation nav-title="Gallery" nav-icon="fas fa-image" nav-action="#" nav-actioname="Add an image" ></navigation>
      <add-ressource :dialog-name="dialogName"></add-ressource>
     
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header ">
              <h1 class="card-title" style="color:white">IMAGES</h1>
            </div>
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Image's name</th>
                  <th>Category</th>
                  <th>Last modification at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items.data" :key="key" >
                   <tr class='tr_table'>
                   <td><a :href='`/public${item.source}`' class='pop'><img style="width:75px; height:75px" :src="`${item.source}`"/></a></td>
                   <td>{{item.name}}</td>
                   <td>{{item.category_name}}</td>
                   <td>{{item.updated_at|myDate}}</td>
                   <td>
                       <div class="col-xs-12">
                           <a :href="item.source"  class="pop btn btn-success">See</a> 
                           <a href="#" @click.prevent="updateImage(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteImage(item.id)">
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
import AddRessource from './AddRessource'
import jQuery from 'jquery'
export default{
    name:'gallery',
    components:{Navigation,AddRessource},
    data(){
        return{
             items:{    
             },
             dialogName:"Add an image"
        }
    },   
    mounted(){
     
       this.loadImages()
       console.log('ok1')
       Events.$on('imageCreated',()=>{
          this.loadImages();
       })
       this.$nextTick(_=>{
           $('.pop').magnificPopup({type:'image'})
       })
     
    },
    methods:{
         paginate(page = 1) {
          axios.get('api/image?page=' + page)
            .then(response => {
              this.items = response.data.paginate;
            });
        },
     
        loadImages(){
            axios.get('api/image').then(({data})=>{
                this.items=data.paginate
             
            })
        },
        deleteImage(id){
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
                        axios.delete('api/image/'+id).then((resolve)=>{
                            Swal.fire(
                                'Deleted!',
                                'Your image has been deleted.',
                                'success'
                             )
                             this.loadImages();
                             this.$Progress.finish()
                        }
                             
                        ).catch((reject)=>{
                               Swal.fire(
                                'Sorry!',
                                'Your image has not been deleted.',
                                'error'
                             )
                             this.$Progress.fail()
                        } )
                       
                    }
           })

        },
        updateImage(image){
           Events.$emit('updateImageForm',true,"Update image",image)
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