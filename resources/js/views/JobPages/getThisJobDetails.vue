<template>
    <div class="container">
        <Navbar/>
    </div>
    <GetThisJobDetails/>
</template>
<script>

import Navbar from '../../components/partials/LayoutNavBar.vue'
import GetThisJobDetails from '../../components/Jobs/GetThisJobDetails'
export default {
    data(){
      return{
        base_url:base_url
      };
    },
    components :{
        Navbar , 
        GetThisJobDetails
        },
        mounted(){
        }
}
</script>