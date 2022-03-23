<template>
    <RightNavbar/>
    <TopNavbar/>
    <ShowAllOrders/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar.vue'
import TopNavbar from '../../components/UserProfile/TopNavbar.vue'
import ShowAllOrders from '../../components/Orders/ShowAllOrders.vue'

export default {
    components : { RightNavbar , TopNavbar , ShowAllOrders} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>