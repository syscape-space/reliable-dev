<template>
  <OrderRightNavbar/>
  <NewTopNavbar/>
  <div class="container">
    <OrderNegotiations :id="$props.id"/>
  </div>
</template>

<script>
import api from "../../utils/api";
import NewTopNavbar from "../../components/Orders/NewTopNavbar.vue";
import OrderRightNavbar from "../../components/Orders/OrderRightNavbar";
import OrderNegotiations from "./OrderNegotiations";
import OffersList from "../../components/Orders/OffersList";
export default {
  props:['id'],
  name: "NegotiationsPage",
  components: {OrderNegotiations, NewTopNavbar, OrderRightNavbar},
}
</script>

<style scoped>

</style>