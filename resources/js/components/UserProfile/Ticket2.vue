<template>
            <div>
                                      <div  class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <div class="m-auto m-md-0 count-tickets">
                                <div class="logo">
                                    <img
                                        class="img-fluid"
                                        :src="`${base_url}assets/images/newLogo.png`"
                                        alt=""
                                    />
                                    <div class="text-logo">
                                        <h6>موثوق Reliable</h6>
                                        <p>صناع الثقة Trust Makers</p>
                                    </div>
                                </div>
                                <div class="count"> {{ $root._t("app.youHave") }} {{ ticketsCount }} {{ $root._t("app.Tickets") }} </div>
                            </div>
                            <div class="new-ticket m-auto m-md-0 btn"  @click.prevent="goToAddTicket()">
                                {{ $root._t("app.newTicket") }}
                            </div>
                        </div>
                        <div class="all-tickets d-flex flex-column gap-3">
                            <div class="ticket"  v-for="item in list" :key="item.id">
                                <div class="date">
                                    <i class="far fa-clock"></i>
                                    {{ $root._t("app.ago") }} {{ $root._t("app.month") }} {{ $root._t("app.almost") }}
                                </div>
                                <p class="text">
                                  {{ item.ticket_title }}
                                </p>
                                <div class="status open">تذكرة مفتوحة <span  @click.prevent="goToTicketDetails(item.id)" style="font-size:14px;cursor:pointer;">({{$root._t("app.ticketDetails")}})</span></div>
                            </div>
                        </div>
                        
            </div>
</template>

<script>
import api from "../../utils/api";
export default {
  data(){
    return{
      base_url:base_url ,
      cloud_url:cloud_url,
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
      let myIdSource = localStorage.getItem("myIdTazkarty");
      api
        .get("v1/my_tickets/" + myIdSource)
        .then((response) => {
          this.ticketsCount = response.data.myTicketsCount ;
          this.list = response.data.tickets
          console.log(response.data)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
    goToAddTicket(){
      this.$router.push({ name: "addTicket" });
    },
    goToTicketDetails( ticketId ){
      let thisTicketId = localStorage.setItem("thisTicketId", ticketId);
      this.$router.push({ name: "ChatPage" ,params:{id:ticketId} });
    }
  } ,
  
}
</script>
<style scoped>
/* Start Section Tickets */
section.tickets .count-tickets {
    display: flex;
    align-items: center;
    padding: 10px 35px;
    max-width: 370px;
    gap: 40px;
    background-color: #ecf8ff;
    border-radius: 12px;
}
section.tickets .count-tickets .logo {
    display: flex;
    flex-direction: column;
    gap: 5px;
    align-items: center;
}
section.tickets .count-tickets .logo img {
    width: 33.79px;
}
section.tickets .count-tickets .logo h6 {
    font-size: 16px;
    text-align: center;
    margin-bottom: 0px;
    color: var(--green-color);
    font-weight: normal;
}
section.tickets .count-tickets .logo p {
    font-size: 10px;
    color: var(--grey-color);
    margin-bottom: 0;

    text-align: center;
}
section.tickets .count-tickets .count {
    font: normal normal normal 28px/42px;
    letter-spacing: 0px;
    color: #0491e8;
}
@media (max-width: 575.98px) {
    section.tickets .count-tickets .count {
        font: normal normal normal 22px;
        letter-spacing: 0px;
        color: #0491e8;
    }
    section.tickets .count-tickets {
        display: flex;
        align-items: center;
        padding: 15px;
        max-width: 370px;
        gap: 40px;
        background-color: #ecf8ff;
        border-radius: 12px;
    }
}
section.tickets .new-ticket {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 202px;
    height: 55px;
    color: white;
    background: #0995eb 0% 0% no-repeat padding-box;
    border-radius: 12px;
}
section.tickets .all-tickets {
    margin-top: 5rem;
}
section.tickets .all-tickets .ticket {
    background-color: #ecf8ff;
    display: flex;
    padding: 11px 20px;
    align-items: center;
    border-radius: 12px;
}

section.tickets .all-tickets .ticket .date {
    display: flex;
    align-items: center;
    padding: 14.1px 25px;
    font-size: 18px;
    letter-spacing: 0px;
    position: relative;
    color: #363848;
}
section.tickets .all-tickets .ticket .date::before {
    content: "";
    position: absolute;
    background-color: #0491e8;
    height: 100%;
    width: 4px;
    left: 0;
    border-radius: 50px;
    top: 0;
}
section.tickets .all-tickets .ticket .date i[class="far fa-clock"] {
    color: #0491e8;
    margin-left: 20px;
}
section.tickets .all-tickets .ticket .text {
    margin: 0 30px 0 0;
    font-size: 18px;
    color: #363848;
}
section.tickets .all-tickets .ticket .status {
    font-size: 20px;
    letter-spacing: 0px;
    margin-right: auto;
}
section.tickets .all-tickets .ticket .status.open {
    color: #0491e8;
}
section.tickets .all-tickets .ticket .status.close {
    color: #e53535;
}
@media (max-width: 1199.98px) {
    section.tickets .all-tickets .ticket {
        flex-direction: column;
    }
    section.tickets .all-tickets .ticket .date {
        padding: 15px;
    }
    section.tickets .all-tickets .ticket .date::before {
        height: 4px;
        width: 100%;
        left: 0;
        top: 100%;
    }
    section.tickets .all-tickets .ticket .text {
        margin: 30px 0 70px 0;
    }
}

/* End Section Tickets */

</style>