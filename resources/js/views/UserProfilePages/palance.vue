<template>
    <RightNavbar/>
    <TopNavbar/>
    <Palance/>
    
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Palance from '../../components/UserProfile/Palance.vue'

export default {
    components : { RightNavbar , TopNavbar , Palance },
    mounted(){
         if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    },
}
</script>