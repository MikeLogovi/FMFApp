<template>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{navTitle}}</li>
            </ol>
          </div><!-- /.col -->
          <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add an image'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeImageForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div><!-- /.col -->
           <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add an image category'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeImageCategoryForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div><!-- /.col -->
           <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add a video'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeVideoForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div><!-- /.col -->
           <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add a video category'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeVideoCategoryForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div><!-- /.col -->
           <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add an event'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeEventForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div><!-- /.col -->
          <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add an history'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeAboutForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div>
           <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add a comment'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activeCommentForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div>
          <div  class="col-sm-6 pull-right" v-if="navAction && navActioname=='Add a post'">
            <a :href="navAction" class="btn btn-primary"  v-on:click="activePostForm">{{navActioname}}<i :class="navIcon"></i></a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</template>
<script>
   export default{
        name:'navigation',
        props:['navTitle','navAction','navActioname','navIcon','navClick'],
        methods:{
            activeImageForm:function(){
              Events.$emit('ImageForm',true,'Add an image');
           },
            activeImageCategoryForm:function(){
              Events.$emit('ImageCategoryForm',true,'Add an image category');
           },
           activeVideoForm:function(){
              Events.$emit('VideoForm',true,'Add a video');
           },
            activeVideoCategoryForm:function(){
              Events.$emit('VideoCategoryForm',true,'Add a video category');
           },
            activeEventForm:function(){
              Events.$emit('EventForm',true,'Add an event');
           },
            activeAboutForm:function(){
              Events.$emit('AboutForm');
           },
           activeCommentForm:function(){
              Events.$emit('CommentForm');
           },
            activePostForm:function(){
              Events.$emit('PostForm',true,'Add a post');
           },
    },

   }
</script>