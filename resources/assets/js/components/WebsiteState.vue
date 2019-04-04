<template>
  <div>
    <!--WEBSITE STATE-->
    <website-state-form></website-state-form>
    <v-card-title primary-title>
          <div>
            <h2 class="h2-responsive" style='margin-left:1em; color:#3F729B;text-decoration:underline'>Website state</h2>
           </div>
    </v-card-title>
          <h4 class='text-center'><button class='btn btn-primary' @click='websiteStateUpdateForm'>Update</button></h4>
    <v-layout>
        <v-flex xs4 style='margin-left:1.5em'>
            <h2 class='text-center  text-info'>Website name</h2>
        
                <h4 class='text-center' style='font-size:35px'>{{item.name}}</h4>
           
        </v-flex>
        <v-flex xs4>
            <h2  class='text-center text-info'>Website logo</h2>
            <h4 class='text-center'>
                <img :src='item.logo' style='width:70px;height:45px;'>
            </h4>
        </v-flex>
        <v-flex xs4>
            <h2  class='text-center text-info'>Website quote</h2>
            <h4 class='text-center' style='margin-right:1.5em'>
                {{item.quote}} 
            </h4>
        </v-flex>
       
       </v-layout> 
       <v-layout>
           <v-flex xs6>
            <h2  class='text-center text-info'>Banner quote</h2>
            <h4 class='text-center' style='margin-right:1.5em'>
                {{item.banner_quote}} 
            </h4>
        </v-flex>
        <v-flex xs6>
            <h2  class='text-center text-info'>About quote</h2>
            <h4 class='text-center' style='margin-right:1.5em'>
                {{item.about_quote}} 
            </h4>
        </v-flex>
       </v-layout>

  
</div>
</template>
<script>
 function getFileExtension(file){
        var name=file.split('.')
        if(name.length===1||(name[0]==''&& name.length==2)){
          return ''
        }
        else{
          return name[1];
        }
  }


import WebsiteStateForm from './WebsiteStateForm'

export default{
    name:'settings',
    components:{WebsiteStateForm},
    data(){
       return{
        form:new Form({
            name:'',
            file:'',
            logo:'',
    
           }),
           file:null,
        logoName:'',
        extensions:['jpeg','jpg','png'],
        item:{

        }
       }
    },
    mounted(){
        this.loadWebsiteState();
        Events.$on('WebsiteStateUpdated',()=>{
             this.loadWebsiteState();
        })
    },
    methods:{
        loadWebsiteState(){
            axios.get('api/website').then(({data})=>{
              this.item=data
            })
        },
        websiteStateUpdateForm(){
           Events.$emit('WebsiteStateForm',this.item)
        }
       
    }
}
</script>
<style scoped>
</style>
