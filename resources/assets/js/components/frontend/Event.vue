<template>
  <section id="events" v-if="TodayHaveData||PastHaveData||UpcomingHaveData">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="text-uppercase text-danger h1-responsive font-weight-bold text-center my-5">Events</h2>
          </div>
        </div>
        <div v-if='PastHaveData'>
         <div class="col-lg-12 text-center">
            <h3 class="section-heading text-uppercase text-danger text-muted event__time">Past Events</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4" v-for="(past,key) in pasts.data" :key="key">
                  <v-hover>
                  <v-card
                      slot-scope="{ hover }"
                    :class="`elevation-${hover ? 12 : 2}`"
                    class="mx-auto event__card"
                  >
                      <v-img
                        :src="past.source"
                        height="200px"
                      >
                      </v-img>

                      <v-card-title primary-title>
                        <div class="event-entry">
                            <div class="desc">
                              <p class="meta"><span class="day">{{past.organized_at|day}}</span><span class="month">{{past.organized_at|month}}</span></p>
                              <p class="organizer"><span>Organized by:</span> <span><strong>{{past.organized_by}}</strong></span></p>
                              <h2><a href="event.html">{{past.title}}</a></h2>
                            </div>
                            <div class="location">
                              <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                              <p>{{past.organization_place}}</p>
                            </div>
                          </div>
                      </v-card-title>

                      <v-card-actions>
                        <v-btn flat color="purple"  @click="past.show = !past.show">Read about</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="past.show = !past.show">
                          <v-icon>{{ past.show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
                        </v-btn>
                      </v-card-actions>

                      <v-slide-y-transition>
                        <v-card-text v-show="past.show">
                        {{past.description}}
                        </v-card-text>
                      </v-slide-y-transition>
                    </v-card>
                  </v-hover>
          </div>
        </div>
        <pagination :data="pasts" @pagination-change-page="getPastResults">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
         </pagination>
       <hr/>
       </div>
       <div v-if='TodayHaveData'>
       <div class="col-lg-12 text-center event__time" style='margin-top:3em;margin-bottom:3em' >
            <h3 class="section-heading text-uppercase text-danger text-muted event__time">Today's Events</h3>
        </div>
        
        <div class="row text-center">
          <div class="col-md-4" v-for="(today,key) in todays.data" :key="key">
              <v-hover>    
                <v-card
                slot-scope="{ hover }"
                  :class="`elevation-${hover ? 12 : 2}`"
                  class="event__card mx-auto"
                  
                >
                    <v-img
                      :src="today.source"
                      height="200px"
                    >
                    </v-img>

                    <v-card-title primary-title>
                    <div class="event-entry">
                          <div class="desc">
                            <p class="meta"><span class="day">{{today.organized_at|day}}</span><span class="month">{{today.organized_at|month}}</span></p>
                            <p class="organizer"><span>Organized by:</span> <span>{{today.organized_by}}</span></p>
                            <h2><a href="event.html">{{today.title}}</a></h2>
                          </div>
                          <div class="location">
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <p>{{today.organization_place}}</p>
                          </div>
                        </div>
                    </v-card-title>

                    <v-card-actions>
                      <v-btn flat color="purple"  @click="today.show = !today.show">Read about</v-btn>
                      <v-spacer></v-spacer>
                      <v-btn icon @click="today.show = !today.show">
                        <v-icon>{{ today.show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
                      </v-btn>
                    </v-card-actions>

                    <v-slide-y-transition>
                      <v-card-text v-show="today.show">
                      {{today.description}}
                      </v-card-text>
                    </v-slide-y-transition>
                  </v-card>
              </v-hover>
          </div>
         
        
      </div>
      <pagination :data="todays" @pagination-change-page="getTodayResults">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
     </pagination>
        
        <hr/>
      </div>
      <div v-if='UpcomingHaveData'>
       <div class="col-lg-12 text-center event__time" style='margin-top:3em;margin-bottom:3em'>
            <h3 class="section-heading text-uppercase text-danger text-muted event__time">Upcoming Events</h3>
        </div>
        
        <div class="row text-center">
          <div class="col-md-4" v-for="(upcoming,key) in upcomings.data" :key="key">
              <v-hover>    
                <v-card
                slot-scope="{ hover }"
                  :class="`elevation-${hover ? 12 : 2}`"
                  class="event__card mx-auto"
                  
                >
                    <v-img
                      :src="upcoming.source"
                      height="200px"
                    >
                    </v-img>

                    <v-card-title primary-title>
                    <div class="event-entry">
                          <div class="desc">
                            <p class="meta"><span class="day">{{upcoming.organized_at|day}}</span><span class="month">{{upcoming.organized_at|month}}</span></p>
                            <p class="organizer"><span>Organized by:</span> <span>{{upcoming.organized_by}}</span></p>
                            <h2><a href="event.html">{{upcoming.title}}</a></h2>
                          </div>
                          <div class="location">
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <p>{{upcoming.organization_place}}</p>
                          </div>
                        </div>
                    </v-card-title>

                    <v-card-actions>
                      <v-btn flat color="purple"  @click="upcoming.show = !upcoming.show">Read about</v-btn>
                      <v-spacer></v-spacer>
                      <v-btn icon @click="upcoming.show = !upcoming.show">
                        <v-icon>{{ upcoming.show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
                      </v-btn>
                    </v-card-actions>

                    <v-slide-y-transition>
                      <v-card-text v-show="upcoming.show">
                      {{upcoming.description}}
                      </v-card-text>
                    </v-slide-y-transition>
                  </v-card>
              </v-hover>
          </div>
         
        
      </div>
      <pagination :data="upcomings" @pagination-change-page="getUpcomingResults">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
      </pagination>
       <hr/>
      </div>
    </section>
</template>
<script>
   export default{
       name:'event',
       components:{},
       data(){
           return{
              PastHaveData:false,
              TodayHaveData:false,
              UpcomingHaveData:false,
               pasts:{},
               todays:{},
               upcomings:{}
           }
	     },
	   mounted(){
			this.loadPastEvents()
			Echo.channel('my-channel').listen('PastEvent',(e)=>{
				 this.loadPastEvents()
				 
			})
      this.loadTodayEvents()
			Echo.channel('my-channel').listen('TodayEvent',(e)=>{
				 this.loadTodayEvents()
				 
			})
      this.loadUpcomingEvents()
			Echo.channel('my-channel').listen('UpcomingEvent',(e)=>{
				 this.loadUpcomingEvents()
				 
			})
	   },
	   methods:{
		   loadPastEvents(){
			   axios.get('/event/past').then(({data})=>{
                   
              this.pasts=data 
              if(data.data[0]) {
                      this.PastHaveData=true
                    }
                    
			   })
		   },
       getPastResults(page = 1) {
          axios.get('/event/past?page=' + page)
            .then(response => {
              this.pasts = response.data;
            });
      },
       loadTodayEvents(){
			   axios.get('/event/today').then(({data})=>{
                    this.todays=data
                    if(data.data[0]) {
                      this.TodayHaveData=true
                    }
                   
			   })
		   },
       getTodayResults(page = 1) {
          axios.get('/event/today?page=' + page)
            .then(response => {
              this.todays = response.data;
              
            });
        },
       loadUpcomingEvents(){
			   axios.get('/event/upcoming').then(({data})=>{
            this.upcomings=data 
            if(data.data[0]) {
              this.UpcomingHaveData=true
            }
			   })
		   },
       getUpcomingResults(page = 1) {
          axios.get('/event/upcoming?page=' + page)
            .then(response => {
              this.upcomings = response.data;
            });
        },
	   }
   }
</script>

<style scoped>
.event-entry {
  padding: 1em;
  background: rgba(253,253,253,0.5);
  }
  .event-entry .desc {
    border-bottom: 1px solid #e6e6e6;
    margin-bottom: 20px;
    padding-right: 60px;
    position: relative;
    text-align: right; }
    .event-entry .desc .startenddate {
      font-size: 16px;
      margin-bottom: 10px; }
      .event-entry .desc .startenddate span:first-child {
        font-weight: 700;
        color: #f17445; }
      .event-entry .desc .startenddate span:last-child {
        color: #000; }
    .event-entry .desc .meta {
      line-height: 1.3;
      text-transform: uppercase;
      position: absolute;
      top: 0;
      right: 0; }
      .event-entry .desc .meta span {
        display: block;
        font-weight: 700;
        color: #E74C3C; }
      .event-entry .desc .meta .day {
        font-size: 36px; }
      .event-entry .desc .meta .month {
        font-size: 20px;
        font-weight: 400; }
    .event-entry .desc .organizer span:last-child {
      color: #000; }
  .event-entry .location {
    position: relative;
    padding-left: 45px; }
    .event-entry .location .icon {
      position: absolute;
      top: 0;
      left: 0; }
      .event-entry .location .icon i {
        color: #E74C3C; }
  .event-entry h2 {
    font-size: 24px;
    line-height: 1.4; }
    .event-entry h2 a {
      color: #000; }

section {
  padding: 5px 0;
  margin-bottom:3em;
}
.event__time{
    text-decoration: underline;
}
.event__card{
    margin-bottom:1.5em;
}
#events{
    background-color:white;
    padding:5px 70px;
}
section h2.section-heading {
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 15px;
}

section h3.section-subheading {
  font-size: 16px;
  font-weight: 400;
  font-style: italic;
  margin-bottom: 75px;
  text-transform: none;
  font-family: 'Droid Serif', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
.service-heading {
  margin: 5px 0;
  text-transform: none;
}
.service__behind{
    margin-top:1.5em
}
</style>