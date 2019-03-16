<template>
<div>
    <slider-form></slider-form>
  <div  style='margin:1.5em 1.5em'>
          
          <div class='row'  style='margin:1.5em 1.5em'>
            <h2 class="h2-responsive" style='margin-left:1em; color:#3F729B;text-decoration:underline'>Sliders</h2>
            <v-spacer></v-spacer>
            <button class='btn btn-success pull-right' @click='addSlider'>Add a slider</button>
           </div>
        
        
     <div class="row">
        <div class="col-12">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items" :key="key" >
                   <tr class='tr_table'>
                   <td><a :href='`/public${item.source}`' class='pop'><img style="width:75px; height:75px" :src="`${item.source}`"/></a></td>
                   <td>{{item.title}}</td>
                   <td>{{item.subtitle}}</td>
                   <td>
                       <div class="col-xs-12">
                           <a href="#" @click.prevent="updateSlider(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteSlider(item.id)">
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
import SliderForm from './SliderForm'
export default{
   name:'slider',
   components:{SliderForm},
   data(){
       return{
          
           items:{

           }
       }
   },
   mounted(){
       this.loadSliders()
       Events.$on('SliderCreated',()=>{
           this.loadSliders()
       })
   },
   methods:{
       loadSliders(){
            axios.get('api/slider').then(({data})=>{
             this.items=data.data
            })
       },
       addSlider(){
           Events.$emit('SliderForm');
       },
       updateSlider(item){
           Events.$emit('SliderUpdateForm',item);
       },
        deleteSlider(id){
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
                         axios.delete('api/slider/'+id).then(()=>{
                                        Toast.fire({
                                        type: 'success',
                                        title: 'Slider deleted successfully'
                                        })
                                        this.$Progress.finish()
                                        Events.$emit('SliderCreated')
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