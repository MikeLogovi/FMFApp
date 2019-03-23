import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export const store=new Vuex.Store({
    state:{
        user:{},
        website:{},
        token:localStorage.getItem('access_token')||null,
    },
    mutations:{
        loadUser(state,data){
            state.user=data
        },
        loadWebsite(state,data){
            state.website=data
        },
        retrieveToken(state,token){
            state.token=token
        },
        destroyedToken(state){
             state.token=null
        }
    },
    getters:{
       loggedIn(state){
           return state.token!=null
       }
    },
    actions:{
        retrieveToken(context,form){
            return new Promise((resolve,reject)=>{
                
                form.post('/oauth/token',form).then(response=>{
                      const token=response.data.access_token
                      localStorage.setItem("access_token",token)
                      context.commit('retrieveToken',token)
                      resolve(response)
                     
                 }).catch(error=>{
                     console.log(error)
                     reject(error)
                 })
              })
        },
        destroyedToken(context){
            axios.defaults.headers.common['Authorization']='Bearer '+context.state.token
           if(context.getters.loggedIn){

               return new Promise((resolve,reject)=>{
                   
                   axios.post('api/logout').then(response=>{
                         localStorage.removeItem("access_token")
                         context.commit('destroyedToken')
                         resolve(response)
                        
                    }).catch(error=>{
                       localStorage.removeItem("access_token")
                       context.commit('destroyedToken')
                        reject(error)
                    })
                 })
           }
        },
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