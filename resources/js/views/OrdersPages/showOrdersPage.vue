<template>

    <OrderRightNavbar/>
    <TopNavbar/>
    <ShowOrders/>
    
    
</template>
<script>
import OrderRightNavbar from '../../components/Orders/OrderRightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import ShowOrders from '../../components/Orders/ShowOrders'

export default {
    components : { OrderRightNavbar , TopNavbar , ShowOrders  },
    mounted(){
         
    },
}
</script>