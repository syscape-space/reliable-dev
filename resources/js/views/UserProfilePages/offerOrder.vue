<template>
    <RightNavbar/>
    <TopNavbar/>
    <OfferOrder/>
    
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import OfferOrder from '../../components/UserProfile/OfferOrder.vue'

export default {
    components : { RightNavbar , TopNavbar , OfferOrder },
    mounted(){
         if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    },
}
</script>