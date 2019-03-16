<template>
  <div>
     <v-card-title primary-title>
          <div>
            <h2 class="h2-responsive" style='margin-left:1em; color:#3F729B;text-decoration:underline'>Footer</h2>
           </div>
    </v-card-title>
          
     <form role="form"  @submit.prevent="updateFooter">
               <h4 class='text-center'><button class='btn btn-primary' >Update</button></h4>
                <div class="card-body">
                    <div class="form-group">
                        <textarea  rows="10" v-model="form.description" class='form-control' id='description' name="description"></textarea>
                    </div>
                </div>
    </form>
</div>
</template>
<script>
export default{
    name:'footer-form',
    components:{},
    data(){
        return{
            form:new Form({
                description:'',
            })
           
        }
    },
    mounted(){
        this.loadFooter()
        Events.$on('FooterUpdated',()=>{
            this.loadFooter()
        })
    },
    methods:{
        loadFooter(){
            this.form.get('api/footer').then(({data})=>{
                  this.form.fill(data)
            })
        },
        updateFooter(){
             this.$Progress.start()
             this.form.put('api/footer/1',this.form).then(()=>{
                   Toast.fire({
                    type: 'success',
                    title: 'Website footer updated successfully'
                    })
                    this.$Progress.finish()
                    Events.$emit('FooterUpdated')
                    
                   
             }).catch(()=>{
                this.$Progress.fail()
             })
        }
    }
}
</script>