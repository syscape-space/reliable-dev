
<template>
  <TopNavbar/>
<RightNavbar/>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="btw-flex">
          <div class="position-relative">

          </div>
          <div>
            <div class="btn-group">
              <button
                  style="background-color: #0995eb; border-color: #0995eb"
                  type="button"
                  class="f-14 collapsed btn btn-danger dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
              >
                <i class="fas fa-filter"></i>
                {{ $root._t("app.filter") }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">الاقدم</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">الاحدث</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-3 mt-3" style="background-color: #f9f9f9" v-for="item in filteredOrders" :key="item.id">
          <order-card :order="item"/>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import api from "../../utils/api";
import OrderCard from "../../components/Orders/OrderCard";
import OrderRightNavbar from "../../components/Orders/OrderRightNavbar";
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
export default {
  props:{
      status:{default:''}
  },
  components: {OrderCard,RightNavbar,TopNavbar,OrderRightNavbar},
  data() {
    return {
      base_url: base_url,
      cloud_url:cloud_url,
      list : [] ,
      id : "" ,
      search : '' ,
      filter : '' ,
      checking : []
    };
  },
  mounted() {
    this.getMyOrders();

  },
  computed:{
    filteredOrders(){
      return this.list.filter(item=>{
        return this.$props.status === '' || item.order_status === this.$props.status;
      });
    },
  },
  methods: {
    getMyOrders() {
      api
          .get("v1/orders?my=1")
          .then((response) => {
            this.list = response.data.data.data;

            if (this.list.length === 0) {
              document.getElementById("pagesCount").style.display = "none";
            } else {
              document.getElementById("pagesCount").style.display = "block";
            }

            console.log(response);
          })
          .catch((e) => {
            console.log(e.response);
          });
    },
    showThisOrderDetails(id){
      this.$router.push({ name: "ShowSingleOrder" , params:{id:id} });
    },
    getCategory(e) {
      this.filter = e.target.value;
      console.log(this.filter)
    },
    checkIfThereApprovedOffers($id){
      api
          .get("v1/check_if_there_approved_offers/" + $id)
          .then((response) => {
            this.checking = response.data.checking

            if( this.checking.length > 0 ){
              let offerOwnerData = response.data.checking[0].id ;

              this.$router.push({ name: "offerOrder2Page" , params:{id:offerOwnerData} });
            }else{
              this.showThisOrderDetails( $id );
            }
            console.log(response.data.checking);
          })
          .catch((e) => {
            console.log(e.response);
          });
    }
  },
};
</script>