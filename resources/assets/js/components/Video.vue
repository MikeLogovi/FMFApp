<template>
<div>
    <navigation nav-title="Videos" nav-action="#" nav-actioname="Add a video" nav-icon="fas fa-video"></navigation>
    <video-form :dialog-name="dialogName"></video-form>
     
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title" style="color:white">VIDEOS</h1>
               
            </div>
            
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Video</th>
                  <th>Video's name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Created at</th>
                  <th>Link</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items.data" :key="key" >
                  <tr class='tr_table'>
                   <td>
                     <div v-if="item.source" >
                       <video  
                         controls
                         preload="auto"
     
                         data-setup='{}' width="200" height="75" >
                            <source :src="item.source" type="video/mp4">
                            <source :src="item.source" type="video/ogg">
                        </video>
                     </div>
                     <div v-else-if="item.link">
                       <iframe width="200" height="75" :src="`${item.link}?autoplay=0`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                   </td>
                   <td>{{item.name}}</td>
                   <td>{{item.category_name}}</td>
                   <td>{{item.description}}</td>
                   <td>{{item.created_at}}</td>
                   <td><a :href="item.link" target="_blank" v-if="item.link">{{item.link}}</a></td>
                   <td>
                        <div class="col-xs-12">
                           <a href="#" class="btn btn-success">See</a> 
                           <a href="#" @click.prevent="updateVideo(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteVideo(item.id)">
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
import VideoForm from './VideoForm'
export default{
    name:'gallery',
    components:{Navigation,VideoForm},
    mounted(){
        this.loadVideos();
         Events.$on('VideoCreated',()=>{
                  this.loadVideos();
          })
    },
    data(){
        return{
             items:{

             },
             dialogName:"Add a video"
             
        }
    },
   
    methods:{
        sourceOrLink(item){
            if(item.link!=null){
                return item.link
            }
            else{
                return item.source
            }
        },
        paginate(page = 1) {
          axios.get('api/video?page=' + page)
            .then(response => {
              this.items = response.data.paginate;
            });
        },
          loadVideos(){
              axios.get('api/video').then(({data})=>{
                  this.items=data.paginate
              }) 
             
          },
          deleteVideo(id){
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
                        axios.delete('api/video/'+id).then((resolve)=>{
                            Swal.fire(
                                'Deleted!',
                                'Your video has been deleted.',
                                'success'
                             )
                             Events.$emit('VideoCreated')
                             this.$Progress.finish()
                            }
                             
                        ).catch((reject)=>{
                               Swal.fire(
                                'Sorry!',
                                'Your video has not been deleted.',
                                'error'
                             )
                             this.$Progress.fail()
                        } )
                       
                    }
           })

        },
        updateVideo(video){
           Events.$emit('UpdateVideoForm',true,"Update video",video)
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