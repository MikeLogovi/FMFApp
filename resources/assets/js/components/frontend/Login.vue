<template>
<body>
  <vue-progress-bar></vue-progress-bar>
       <form class="form-signin" @submit.prevent="login">
        
          <div class="text-center mb-4">
            <img class="mb-4" :src="item.logo" alt="" width="72" height="72" style="margin-top:2.75em">
            <h1 class="section-heading text-primary h1-responsive font-weight-bold text-center my-5">Login</h1>

          </div>
            <div class="alert alert-danger" v-if="error.form">
                 {{error.message}}
             </div>
            <div class="form-label-group">
                <input v-model='form.username' :class="{'is-invalid':form.errors.has('username')}" type="email" class="form-control" id="username" name="username">
                <has-error :form="form" field="username"></has-error>
                <label for="username">E-mail address</label>
            </div>
            <div class="form-label-group">
                <input v-model='form.password' :class="{'is-invalid':form.errors.has('password')}" type="text" class="form-control" id="password" name="password">
                <has-error :form="form" field="password"></has-error>
                <label for="password">Password</label>
             </div>
        
        
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          
  </form>
</body>
</template>
<script>
export default{
    name:'login',
    components:{},
    data(){
        return {
            form:new Form({
               grant_type:'password',
               client_id:4,
               client_secret:'WW6uwOB3y2kJvnV00g1ua9rVfSkVhrnbG2h3rnBs',
               username:'',
               password:'',
               
            }),
            item:{},
            error:{
              form:false,
              message:''
            }

        }
    },
    mounted(){
        this.loadWebsite()
       
    },
    methods:{
        loadWebsite(){
          axios.get('api/website').then(({data})=>{
             this.item=data
          })
        },
        login(){
          this.error.form=false
          this.$Progress.start()
          this.$store.dispatch('retrieveToken',this.form).then((response)=>{
                  this.$router.push('/administration')
                   this.$Progress.finish()
          }).catch((error)=>{
                this.$Progress.fail()
                this.error.form=true
                this.error.message="Your credentials doesn't match with any of our records"
                
          });
        }
    }
}
</script>
<style>
  .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

   

body {

  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */
@supports (-ms-ime-align: auto) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>