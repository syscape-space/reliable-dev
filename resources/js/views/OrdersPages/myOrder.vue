<template>
    
    <RightNavbar/>
    <TopNavbar/>
    <MyOrders/>
</template>
<script>
// import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import MyOrders from '../../components/Orders/MyOrders.vue'

import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'

export default {
    //NewTopNavbar 
    components : { RightNavbar , TopNavbar , MyOrders} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>