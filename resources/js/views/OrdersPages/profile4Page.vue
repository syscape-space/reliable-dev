<template>
    <NewTopNavbar/>
    
    <Profile4/>
</template>
<script>
import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import Profile4 from '../../components/Orders/Profile4.vue'

export default {
    components : { NewTopNavbar , Profile4} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>