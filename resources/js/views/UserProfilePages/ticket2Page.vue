<template>
    <RightNavbar/>
    <TopNavbar/>
    <Ticket2/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Ticket2 from '../../components/UserProfile/Ticket2.vue'

export default {
    components : { RightNavbar , TopNavbar , Ticket2} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>