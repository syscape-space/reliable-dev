<template>
    <div class="container">
        <Navbar/>
    </div>
    <ShowAllJobs/>
</template>
<script>

import Navbar from '../../components/partials/LayoutNavBar.vue'
import ShowAllJobs from '../../components/Jobs/ShowAllJobs'
export default {
    data(){
      return{
        base_url:base_url
      };
    },
    components :{
        Navbar , 
        ShowAllJobs
        },
        mounted(){
        }
}
</script>