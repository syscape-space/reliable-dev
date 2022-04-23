<template>
     <TopNavbar/>
<RightNavbar/>
   
    <Ticket1/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Ticket1 from '../../components/UserProfile/Ticket1.vue'

export default {
    components : { RightNavbar , TopNavbar , Ticket1} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>