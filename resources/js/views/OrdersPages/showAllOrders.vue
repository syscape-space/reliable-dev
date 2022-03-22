<template>
    <NewTopNavbar/>
    
    <ShowAllOrders/>
</template>
<script>
import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import ShowAllOrders from '../../components/Orders/ShowAllOrders.vue'

export default {
    components : { NewTopNavbar , ShowAllOrders} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>