<template>
    <RightNavbar/>
    <TopNavbar/>
    <Chat/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Chat from '../../components/UserProfile/Chat.vue'

export default {
    components : { RightNavbar , TopNavbar , Chat} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>