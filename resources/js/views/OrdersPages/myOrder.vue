<template>
    <NewTopNavbar/>
    
    <MyOrders/>
</template>
<script>
import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import MyOrders from '../../components/Orders/MyOrders.vue'

export default {
    components : { NewTopNavbar , MyOrders} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>