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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items" :key="key" >
                  <tr class='tr_table'>
                   <td> 
                       <video  id="my-player"
                        class="video-js vjs-big-play-centered"
                         controls
                         preload="auto"
     
                         data-setup='{}' width="200" height="75" >
                            <source :src="item.source">
                        </video> 
                   </td>
                   <td>{{item.name}}</td>
                   <td>{{item.category_name}}</td>
                   <td>{{item.description}}</td>
                   <td>{{item.created_at}}</td>
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
    },
    data(){
        return{
             items:{

             },
             dialogName:"Add a video"
             
        }
    },
    methods:{
          loadVideos(){
              axios.get('api/video').then(({data})=>{
                  this.items=data.data
              }) 
              Events.$on('VideoCreated',()=>{
                  this.loadVideos();
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
                             this.loadVideos();
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