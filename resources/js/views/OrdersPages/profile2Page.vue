<template>
    <NewTopNavbar/>
    
    <Profile2/>
</template>
<script>
import NewTopNavbar from '../../components/Orders/NewTopNavbar.vue'
import Profile2 from '../../components/Orders/Profile2.vue'

export default {
    components : { NewTopNavbar , Profile2} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>