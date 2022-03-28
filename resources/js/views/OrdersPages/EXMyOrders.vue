<template>
    
    <RightNavbar/>
    <TopNavbar/>
    <ExecuteNowOrder/>
</template>
<script>
// import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import ExecuteNowOrder from '../../components/Orders/executeNowOrders.vue'

import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'

export default {
    //NewTopNavbar 
    components : { RightNavbar , TopNavbar , ExecuteNowOrder} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>