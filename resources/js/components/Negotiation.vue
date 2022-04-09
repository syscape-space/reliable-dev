<template>
  <order-right-navbar/>
  <NewTopNavbar/>
  <single-negotiation :id="$props.id"/>
</template>

<script>
import OrderRightNavbar from "./Orders/OrderRightNavbar";
import LayoutNavBar from "./partials/LayoutNavBar";
import NewTopNavbar from "./Orders/NewTopNavbar";
import api from "../utils/api";
import SingleNegotiation from "./SingleNegotiation";
export default {
  name: "Negotiation",
  props:{
    id:{
      type:String,
      nullable:true,
    }
  },
  components: {SingleNegotiation, LayoutNavBar, OrderRightNavbar,NewTopNavbar},

}
</script>

<style scoped>
.item-chat li.sec-list>span {

}
</style>