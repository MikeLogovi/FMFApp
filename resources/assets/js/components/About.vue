<template>
<div>
    <navigation nav-title="About" nav-action="#" nav-icon='fas fa-history' nav-actioname="Add an history"></navigation>
    <about-form></about-form>
         <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title" style="color:white">ABOUT</h1>
            </div>
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Reference image</th>
                  <th>Title</th>
                  <th>Period</th>
                  <th>History</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items.data" :key="key" >
                  <tr class='tr_table'>
                   <td><a :href='`/public${item.source}`' class='pop'><img style="width:75px; height:75px" :src="`${item.source}`"/></a></td>
                   <td>{{item.title}}</td>
                   <td>{{item.period|yearDate}}</td>
                   <td>{{item.history}}</td>
            
                   <td>
                        <div class="col-xs-12">
                           
                           <a href="#" @click.prevent="updateAbout(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteAbout(item.id)">
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
    import AboutForm from './AboutForm'
    export default{
      name:'about',
      components:{Navigation,AboutForm},
      data(){
          return{
            items:{
              
            }
          }
      },
      mounted(){
          this.loadHistories()
          Events.$on('HistoryCreated',()=>{
              this.loadHistories()
          })
      },
      methods:{
        paginate(page = 1) {
          axios.get('api/about?page=' + page)
            .then(response => {
              this.items = response.data.paginate;
            });
        },
        
        loadHistories(){
             axios.get('api/about').then(({data})=>{
                     this.items=data.paginate
             })
        },
        updateAbout(item){
          Events.$emit('AboutUpdateForm',item)
        },
        deleteAbout(id){
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
                            axios.delete('api/about/'+id).then(()=>{
                                        Toast.fire({
                                        type: 'success',
                                        title: 'History deleted successfully'
                                        })
                                        this.$Progress.finish()
                                        Events.$emit('HistoryCreated')
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