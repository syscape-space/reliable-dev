<template>
     <TopNavbar/>
<RightNavbar/>
   
    <AddTicket/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import AddTicket from '../../components/Tickets/AddTicket.vue'

export default {
    components : { RightNavbar , TopNavbar , AddTicket} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>