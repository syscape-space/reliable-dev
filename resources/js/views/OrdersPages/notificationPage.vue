<template>
    <NewTopNavbar/>
    
    <Notification/>
</template>
<script>
import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import Notification from '../../components/Orders/Notification.vue'

export default {
    components : { NewTopNavbar , Notification} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>