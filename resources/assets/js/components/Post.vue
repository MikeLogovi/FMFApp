<template>
<div>
    <navigation nav-title="Blog" nav-action="#" nav-actioname="Add a post" nav-icon="fas fa-paste"></navigation>
    <post-form :dialog-name="dialogName"></post-form>
     
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title" style="color:white">POSTS</h1>
            </div>
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Post</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Description</th>
                  <th>Written at</th>
                  <th>Attached link</th>
                  <th>Attached file</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items.data" :key="key" >
                  <tr class='tr_table'>
                   <td><a :href='`/public${item.attached_image}`' class='pop'><img style="width:75px; height:75px" :src="`${item.attached_image}`"/></a></td>
                   <td>{{item.title}}</td>
                   <td>{{item.author}}</td>
                   <td>{{item.description}}</td>
                    <td>{{item.written_at|myDate}}</td>
                    <td><a :href="item.attached_link" target="_blank    ">{{item.attached_link}}</a></td>
                   <td ><a v-if='item.attached_file' :href="`/download_post_file/${item.id}`"><i class="fas fa-book"></i></a></td>
                   <td>
                        <div class="col-xs-12">
                           <a href="#" @click.prevent="updatePost(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deletePost(item.id)">
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
import PostForm from './PostForm'
export default{
    name:'post',
    components:{Navigation,PostForm},
   data(){
        return{
             items:{

             },
             dialogName:"Add a post"
             
        }
    },
    mounted(){
        this.loadPosts();
          Events.$on('PostCreated',()=>{
                  this.loadPosts();
              })
    },
  
    methods:{
         paginate(page = 1) {
          axios.get('api/post?page=' + page)
            .then(response => {
              this.items = response.data;
            });
        },
          loadPosts(){
              axios.get('api/post').then(({data})=>{
                  this.items=data
                  
              })
            
          },
          deletePost(id){
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
                        axios.delete('api/post/'+id).then((resolve)=>{
                            Swal.fire(
                                'Deleted!',
                                'Your post has been deleted.',
                                'success'
                             )
                             this.loadPosts();
                             this.$Progress.finish()
                            }
                             
                        ).catch((reject)=>{
                               Swal.fire(
                                'Sorry!',
                                'Your post has not been deleted.',
                                'error'
                             )
                             this.$Progress.fail()
                        } )
                       
                    }
           })

        },
        updatePost(item){
           Events.$emit('UpdatePostForm',true,"Update post",item)
        },
        download(id){
            axios.get('/download_post_file/'+id).then(()=>{
               console.log('done') 
            } );
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