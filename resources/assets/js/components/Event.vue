<template>
<div>
    <navigation nav-title="Events" nav-action="#" nav-actioname="Add an event" nav-icon="far fa-calendar-alt"></navigation>
    <event-form :dialog-name="dialogName"></event-form>
     
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title" style="color:white">EVENTS</h1>
            </div>
            <!-- /.card-header -->
         <div class="card-body ">
             <div class="table-responsive">
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Event</th>
                  <th>Title</th>
                  <th>Organized by</th>
                  <th>Event's date</th>
                  <th>Event's place</th>
                   <th>Decription</th>
                  <th>Registred at</th>
                  <th>State</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id ='tbody' v-for="(item,key) in items.data" :key="key" >
                  <tr class='tr_table'>
                   <td><a :href='`/public${item.source}`' class='pop'><img style="width:75px; height:75px" :src="item.source"/></a></td>
                   <td>{{item.title}}</td>
                   <td>{{item.organized_by}}</td>
                   <td>{{item.organized_at|myDate}}</td>
                    <td>{{item.organization_place}}</td>
                    <td>{{item.description}}</td>
                   <td>{{item.created_at|myDate}}</td>
                   <td>
                        <a href="#" class="btn btn-danger" v-if="item.event_state==0">PASSED</a>
                           <a href="#" class="btn btn-success" v-else-if="item.event_state==1">IT'S TODAY</a>
                           <a href="#" class="btn btn-warning" v-else-if="item.event_state==2">UPCOMING</a>
                   </td>
                   <td>
                        <div class="col-xs-12">
                          

                           <a href="#" @click.prevent="updateEvent(item)">
                               <i style="color:warning" class='fa fa-edit'></i>
                            </a>
                            / 
                           <a href="#" @click.prevent="deleteEvent(item.id)">
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
import EventForm from './EventForm'
export default{
    name:'event',
    components:{Navigation,EventForm},
    mounted(){
        this.loadEvents();
    },
    data(){
        return{
             items:{

             },
             dialogName:"Add an event"
             
        }
    },
    methods:{
         paginate(page = 1) {
          axios.get('api/event?page=' + page)
            .then(response => {
              this.items = response.data;
            });
        },
          loadEvents(){
              axios.get('api/event').then(({data})=>{
                  this.items=data
              })
              Events.$on('EventCreated',()=>{
                  this.loadEvents();
              })
          },
          deleteEvent(id){
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
                        axios.delete('api/event/'+id).then((resolve)=>{
                            Swal.fire(
                                'Deleted!',
                                'Your event has been deleted.',
                                'success'
                             )
                             this.loadEvents();
                             this.$Progress.finish()
                            }
                             
                        ).catch((reject)=>{
                               Swal.fire(
                                'Sorry!',
                                'Your event has not been deleted.',
                                'error'
                             )
                             this.$Progress.fail()
                        } )
                       
                    }
           })

        },
        updateEvent(myEvent){
           Events.$emit('UpdateEventForm',true,"Update event",myEvent)
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