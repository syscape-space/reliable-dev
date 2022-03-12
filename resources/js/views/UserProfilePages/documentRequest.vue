<template>
    <!-- <RightNavbar/>
    <TopNavbar/> -->
    <DocumentRequest/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import DocumentRequest from '../../components/UserProfile/DocumentRequest.vue'

export default {
    components : { RightNavbar , TopNavbar , DocumentRequest } ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>