import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export const store=new Vuex.Store({
    state:{
        user:{},
        website:{}
    },
    mutations:{
        loadUser(state,data){
            state.user=data
        },
        loadWebsite(state,data){
            state.website=data
        }
    },
    actions:{
        loadUser(context){
            return new Promise((resolve,reject)=>{
                      axios.get('api/user').then(({data})=>{
                           context.commit('loadUser',data)
                           resolve(data)
                      })
                      
            })
        },
        loadWebsite(context){
            return new Promise((resolve,reject)=>{
                      axios.get('api/website').then(({data})=>{
                           context.commit('loadWebsite',data)
                           resolve(data)
                      })
                      
                    })
        },
        updateUser({commit,state},form){
            
           
            return new Promise((resolve,reject)=>{
                
               form.put('api/user/'+state.user.id,form).then(({data})=>{
                     commit('loadUser',data)
                     resolve(data)
                    
                }).catch(()=>{
                    reject(form)
                    
                })
             })
        }
    }
})