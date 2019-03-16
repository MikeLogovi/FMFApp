<template>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
     <div class="center">
          <span>ADMINISTRATION</span>
      </div>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style='background-color:#263238'>
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
  

      <!-- Sidebar Menu -->
      <side-nav></side-nav>
      <!-- /.sidebar-menu -->
  
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    
    <section class="content" >
       <router-view></router-view>
       <vue-progress-bar></vue-progress-bar>
    </section>
   
  </div>
  
  <foot></foot>

  <aside class="control-sidebar control-sidebar-dark">
 
  </aside>
  
</div>
</body>
</template>
<script>
import SideNav from './SideNav'
export default{
    name:'administration',
    components:{SideNav},
    data(){
        return{

        }
    }
}
</script>
<style scoped>
</style>