<template>
     <TopNavbar/>
<RightNavbar/>
   
    <Presonal/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Presonal from '../../components/UserProfile/Presonal.vue'

export default {
    components : { RightNavbar , TopNavbar , Presonal} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>