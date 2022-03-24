<template>

    <OrderRightNavbar/>
    <TopNavbar/>
    <OfferOrder1/>
    
    
</template>
<script>
import OrderRightNavbar from '../../components/Orders/OrderRightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import OfferOrder1 from '../../components/Orders/OfferOrder1.vue'

export default {
    components : { OrderRightNavbar , TopNavbar , OfferOrder1  },
    mounted(){
         
    },
}
</script>