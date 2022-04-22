<template>
     <TopNavbar/>
<RightNavbar/>
   
    <EmploymentApplications/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import EmploymentApplications from '../../components/UserProfile/EmploymentApplications.vue'

export default {
    components : { RightNavbar , TopNavbar , EmploymentApplications } ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>