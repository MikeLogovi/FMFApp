<template>
    <div>
    <navigation nav-title="Contact" nav-action="#"></navigation>
     <v-layout>
    <v-flex xs12>
      <v-card>
       
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0 text-primary">CONTACT</h3>
           </div>
        </v-card-title>
        <form role="form" @submit.prevent="updateContact">
                <div class="card-body">
                    <alert-error :form="form" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                        <label for="email">E-mail adress</label>
                        <input v-model='form.email' :class="{'is-invalid':form.errors.has('email')}" type="email" class="form-control" id="email" name="email" :placeholder="item.email">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                     <div class="form-group">
                        <label for="phone_number">Phone number</label>
                        <input v-model='form.phone_number' :class="{'is-invalid':form.errors.has('phone_number')}" type="phone_number" class="form-control" id="phone_number" name="phone_number" :placeholder="item.phone_number">
                        <has-error :form="form" field="phone_number"></has-error>
                        
                    </div>
                    <div class="form-group">
                        <label for="localisation">Localisation</label>
                        <input type="text" v-model="form.localisation" class='form-control' id='localisation' name='localisation' :class="{'is-invalid':form.errors.has('localisation')}" :placeholder="item.localisation">
                        <has-error :form="form" field="localisation"></has-error>
                    </div>
                   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
    
                  <button type="submit" class="btn btn-primary">Update</button>

                </div>
              </form>
      </v-card>
    </v-flex>
  </v-layout>
</div>
</template>
<script>
import Navigation from './Navigation'
export default{
    components:{Navigation},
    
    data(){
        return{
            form:new Form({
            email:'',
            phone_number:'',
            localisation:'',
             }),
          item:{

          }
        }
    },
    mounted(){
        this.loadContact()
        Events.$on('ContactUpdated',()=>{
            this.loadContact()
        })
    },
    methods:{
        loadContact(){
            this.form.get('api/contact').then(({data})=>{
                console.log(data)
               this.item=data
            })
        },
        updateContact(){
            this.$Progress.start()
            this.form.put('api/contact/1').then(()=>{
                Toast.fire({
                type: 'success',
                title: 'Contact updated successfully'
                })
                this.$Progress.finish()
            }).catch(()=>{
                Toast.fire({
                type: 'error',
                title: 'Sorry, an error ocured'
                })
                this.$Progress.fail()
            })
            Events.$emit('ContactUpdated')
        }
    }
}
</script>
