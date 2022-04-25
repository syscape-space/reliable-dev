<template>
    
    <TopNavbar/>
    <RightNavbar/>
    <Profile/>
    
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Profile from '../../components/UserProfile/Profile.vue'

export default {
    components : { RightNavbar , TopNavbar , Profile },
    mounted(){
         if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    },
}
</script>