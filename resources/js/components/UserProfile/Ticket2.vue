<template>
    <section class="requsts-sec mt-4">
      <div class="px-5">
        <div class="have-ticket d-flex justify-content-between">
          <div class="count-ticket">
            <img style="width: 50px" :src="base_url + '/assets/images/login-1-logo.svg'" alt="" />
            <span style="color: #048e81; font-size: 14px" class="me-4"
              >{{ $root._t("app.youHave") }} {{ ticketsCount }} {{ $root._t("app.Tickets") }}</span
            >
          </div>
          <button
            style="
              border: 0;
              background-color: #0995eb;
              color: #fff;
              font-size: 14px;
              padding: 10px 70px;
              border-radius: 7px;
            "
          >
            {{ $root._t("app.newTicket") }}
          </button>
        </div>
        <div class="your-tickets mt-5">
          <ul
            class="your-ticket list-unstyled d-flex rounded m-0 w-100 py-2 px-3"
            style="    background-image: linear-gradient(to right,#048e8114, #0995eb21);align-items: center;"
            v-for="item in list" :key="item.id"
          >
            <li><img :src="base_url + '/assets/images/time.svg'" alt="" /></li>
            
            <li> <span class="me-3" >{{ $root._t("app.ago") }} {{ $root._t("app.month") }} {{ $root._t("app.almost") }} </span> </li>
            <li><div
              class="mx-3"
              style="
                height: 30px;
                width: 3px;
                background-color: #fff;
                border-radius: 10px;
              ">
            </div></li>
            <li><div
              style="
                
                border-radius: 50%;
                background-color: #e0fffc75;
              "><img style="height: 50px; width: 50px;" :src="base_url + '/storage/' +  item.photo_profile  " alt="" />
            </div></li>
            <li> 
              <span class="mx-3" >{{ item.ticket_title }}</span>
            </li>
            <li style="margin-right: auto;">
              <div class="number-ticket d-flex">
                <img style="width: 20px;" :src="base_url + '/assets/images/morning1.svg'" alt="">
                <span class="mx-3">{{ $root._t("app.ticketNum") }} {{ count }}</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";
export default {
  data(){
    return{
      base_url:base_url ,
      ticketsCount : "" ,
      list : [] ,
      count : "" ,
    };
  },
  mounted(){
    this.gettingMyTickets();
  },
  methods:{
    gettingMyTickets(){
      let myIdSource = this.$route.params.myId ;
      api
        .get("v1/my_tickets/" + myIdSource)
        .then((response) => {
          this.ticketsCount = response.data.myTicketsCount ;
          this.list = response.data.tickets
          this.count++ 
          console.log(response.data)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    }
  } ,
  
}
</script>
<style scoped>

</style>