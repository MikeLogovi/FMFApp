<template>
<div>
    <navigation nav-title="Comments" nav-action="#" nav-icon='far fa-comment' nav-actioname="Add a comment"></navigation>
    <comment-form></comment-form>
         <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title" style="color:white">COMMENTS</h1>
            </div>
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Full name</th>  
                  <th>Comment</th>
                  <th>Last modification at</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items.data" :key="key" >
                  <tr class='tr_table'>
                   <td><a :href='`/public${item.avatar}`' class='pop'><img style="width:75px; height:75px" :src="`${item.avatar}`"/></a></td>   
                  <td>{{item.fullName}}</td>
                   <td>{{item.comment}}</td>
                   <td>{{item.updated_at|myDate}}</td>
            
                   <td>
                        <div class="col-xs-12">
                           
                           <a href="#" @click.prevent="updateComment(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteComment(item.id)">
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
    import CommentForm from './CommentForm'
    export default{
      name:'about',
      components:{Navigation,CommentForm},
      data(){
          return{
            items:{
              
            }
          }
      },
      mounted(){
          this.loadComments()
          Events.$on('CommentCreated',()=>{
              this.loadComments()
          })
      },
      methods:{
         paginate(page = 1) {
          axios.get('api/comment?page=' + page)
            .then(response => {
              this.items = response.data.paginate;
            });
        },
        loadComments(){
            axios.get('api/comment').then(({data})=>{
                    this.items=data.paginate
             })

        },
        updateComment(item){
          Events.$emit('CommentUpdateForm',item)
        },
        deleteComment(id){
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
                            axios.delete('api/comment/'+id).then(()=>{
                                        Toast.fire({
                                        type: 'success',
                                        title: 'Comment deleted successfully'
                                        })
                                        this.$Progress.finish()
                                        Events.$emit('CommentCreated')
                                }).catch(()=>{
                                        this.$Progress.fail()
                                        Toast.fire({
                                        type: 'error',
                                        title: 'Sorry, an error occured'
                                        })
                                        
                                    
                                })
                                            
                                            }
                                })
          
       }
        }
      }
  
</script>
<style scoped>
.card-header{
    background-color:#3F51B5;
}
</style>