<template>
  <section class="my-5">

  <!-- Grid row -->
  <v-layout>
  

    <!-- Grid column -->
    <v-flex sm8 offset-sm1>

      <!-- Card -->
       <v-hover>
    <v-card
      slot-scope="{ hover }"
      :class="`elevation-${hover ? 12 : 2}`"
      class="mx-auto"
      
    >
      <v-img
        :aspect-ratio="16/9"
        src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
      ></v-img>
        <div class="card-body card-body-cascade text-center">

          <!-- Title -->
          <h2 class="font-weight-bold"><a>Title of the news</a></h2>
          <!-- Data -->
          <p>Written by <a><strong>Abby Madison</strong></a>, 26/08/2018</p>
          <!-- Social shares -->
          <div class="row">
            <!-- Facebook -->
            <a class="btn btn-primary">
              <i class="fab fa-facebook"></i>
              <span class="clearfix d-none d-md-inline-block">Facebook</span>
            </a>
            <span class="counter">46</span>
            <!-- Twitter -->
            <a class="btn btn-info">
              <i class="fab fa-twitter pr-2"></i>
              <span class="clearfix d-none d-md-inline-block">Twitter</span>
            </a>
            <span class="counter">22</span>
            <!-- Google+ -->
            <a class="btn btn-gplus">
              <i class="fab fa-google-plus-g pr-2"></i>
              <span class="clearfix d-none d-md-inline-block">Google+</span>
            </a>
            <span class="counter">31</span>
            <!-- Comments -->
            <a class="btn btn-default">
              <i class="far fa-comments pr-2"></i>
              <span class="clearfix d-none d-md-inline-block">Comments</span>
            </a>
            <span class="counter">18</span>
          </div>
          <!-- Social shares -->

        </div>
     
    </v-card>
  </v-hover>
  
      <v-flex sm8 offset-sm2>
      <div class="mt-5">

        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui praesentium voluptatum deleniti atque
          corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
          sunt in culpa nemo enim ipsam voluptatem quia voluptas sit qui officia deserunt mollitia animi, id
          est laborum et dolorum fuga quidem rerum facilis est distinctio.
        </p>
        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
          maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Quis autem vel
          eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur. Temporibus
          autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates
          repudiandae sint et molestiae non recusandae itaque earum rerum.</p>
         </div>
      </v-flex>

    </v-flex>
    <!-- Grid column -->
  <!-- Grid row -->

  
  <!-- Grid row -->

  <hr class="mb-5 mt-4">
 </v-layout>
</section>
<!-- Section: Blog v.4 -->
</template>
<script>
export default{
   name:'my-blog',
   components:{},
   data(){
       return{

       }
   }
}
</script>
<style scoped>
</style>