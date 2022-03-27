<template>
    
    <OrderRightNavbar/>
    <TopNavbar/>
    <Filteration/>
</template>
<script>
// import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import Filteration from '../../components/Orders/Filteration.vue'

import OrderRightNavbar from '../../components/Orders/OrderRightNavbar.vue'
import TopNavbar from '../../components/UserProfile/TopNavbar'

export default {
    //NewTopNavbar 
    components : { OrderRightNavbar , TopNavbar , Filteration} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>