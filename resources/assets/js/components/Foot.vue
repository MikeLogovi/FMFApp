<template>
    <footer class="main-footer">
        <strong>Copyright &copy;{{time}} <a href="localhost:8080">CHUK'S APP</a>.</strong>
        All rights reserved.
   </footer>
</template>

<script>
export default {
    name:'foot',
    data(){
        return{
            time:new Date().getFullYear()
        }
    }
}
</script>

<style>

</style>
