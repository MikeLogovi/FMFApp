import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export const store=new Vuex.Store({
    state:{
        user:{},
        website:{},
        histories:{},
        imageCategories:{},
        portfolio:{},
        posts:{},
        comments:{},
        contact:{},
        footer:{},
        socialites:{},
        dashboard:{
            histories:null,
            comments:null,
            events:null,
            images:null,
            image_categories:null,
            images:null,
            posts:null,
            sliders:null,
            socialites:null,
            videos:null,
            video_categories:null
        },
        token:localStorage.getItem('access_token')||null,
    },
   
    mutations:{
        loadFooter(state,data){
           state.footer=data
        },
        loadSocialitesVue(state,data){
           state.socialites=data
        },
        loadContact(state,data){
            state.contact=data
        },
        loadCommentsVue(state,data){
            state.comments=data
        },
        loadPosts(state,data){
            state.posts=data
        },
        loadPortfolio(state,data){
          state.portfolio=data
        },
        loadSpecificImages(state,data){
          state.portfolio=data
        },
        loadImageCategories(state,data){
            state.imageCategories=data
        },
        loadHistoriesVue(state,data){
            state.histories=data
        },
        loadHistories(state,data){
            state.dashboard.histories=data
        },
        loadComments(state,data){
            state.dashboard.comments=data
        },
        loadUser(state,data){
            state.user=data
        },
        loadWebsiteParams(state,data){
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
        loadSocialitesVue(context){
            axios.get('/socialite/vue').then(({data})=>{
                context.commit('loadSocialitesVue',data) 
            })
        },
        loadFooter(context){
            axios.get('api/footer').then(({data})=>{
                context.commit('loadFooter',data) 
           })
        },
        loadContact(context){
            axios.get('api/contact').then(({data})=>{
                context.commit('loadContact',data)
             })
        },
        loadCommentsVue(context){
            axios.get('/comment/vue').then(({data})=>{
                context.commit('loadCommentsVue',data)
            })
        },
        loadPosts(context){
            axios.get('/post/vue').then(({data})=>{
                context.commit('loadPosts',data)
           })
        },
        loadSpecificImages(context,id){
            axios.get('/portfolio/'+id).then(({data})=>{
                context.commit('loadSpecificImages',data)
           })
        },
        loadPortfolio(state,data){
            axios.get('/portfolio/random').then(({data})=>{
               context.commit('loadPortfolio',data)
           })
        },
        loadHistories(context){
            if(context.getters.loggedIn){

                return new Promise((resolve,reject)=>{
                    
                    axios.get('api/about').then(({data})=>{
                        this.items=data.paginate
                    }).catch(error=>{
                        localStorage.removeItem("access_token")
                        context.commit('destroyedToken')
                         reject(error)
                     })
                  })
            }
        },
        
        loadImageCategories(context){
            axios.get('api/imageCategory').then(({data})=>{
                context.commit('loadImageCategories',data)           
           })
        },
        loadHistoriesVue(context){
             axios.get('/about/vue').then(({data})=>{
                  context.commit('loadHistoriesVue',data)
             })
        },
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
      
        loadWebsiteParams(context){
            return new Promise((resolve,reject)=>{
                      axios.get('api/website').then(({data})=>{
                           context.commit('loadWebsiteParams',data)
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