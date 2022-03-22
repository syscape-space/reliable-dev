<template>
    <section class="requsts-sec mt-4">
      <div class="chat-clinet" style="max-width: 1000px;margin: auto;">
        <ul class="chat-list d-flex ">
          <li class="me-2">{{ $root._t("app.ticketDetails") }}</li>
          <li class="d-flex me-5">
            <img style="width:40px ;" :src="base_url + '/storage/' +  profileImage  " alt="">
            <p style="font-size: 13px;     margin-top: 10px !important;" class="me-1 m-0"> {{ username }} <br>
               <span style="color: rgb(165, 164, 164);" > </span> </p>
          </li><br>
          <li class="d-flex me-5">
            <p style="font-size: 13px;" class="me-1 m-0"> عنوان التذكره <br>
               <span style="color: rgb(165, 164, 164);" > {{ ticketTitle }} </span> </p>
          </li>
          <li class="d-flex me-5">
            <p style="font-size: 13px;" class="me-1 m-0"> التذكرة مرتبطة ب <br>
               <span style="color: rgb(165, 164, 164);" > {{ RelatedTo }} </span> </p>
          </li>
          <li class="d-flex me-5">
            <p style="font-size: 13px;" class="me-1 m-0"> قسم الدعم الفنى <br>
               <span style="color: rgb(165, 164, 164);" > {{ department }} </span> </p>
          </li>
          <li class="d-flex me-5">
            <p style="font-size: 13px;" class="me-1 m-0"> محتوى التذكره <br>
               <span style="color: rgb(165, 164, 164);" > {{ ticketContent }} </span> </p>
          </li>
          <li class="d-flex me-auto ms-3" >
            <img class="mx-4" :src="base_url + '/assets/images/chate2.svg'" alt="">
            <!-- getting this ticket details --> 
            <img :src="base_url + '/assets/images/chate.svg'" alt="">
          </li>
        </ul>
        <div class=" text-center " style=" font-size: 13px;
         "> <p class="m-0"  > <span style="background-color:#F8FAFC;
          color: rgb(177, 177, 177);
          padding: 10px;
         border-radius: 20px; "
         >may 21</span></p> 
        </div>
        <ul class="item-chat list-unstyled text-start px-0" >
          <li class="sec-list" v-for="item in list" :key="item.id"> 

            
            <span>{{ item.replay }} 
              <br>              
              <small>05:12</small>

            </span>
          </li>
          
        </ul>
        <div style="background-color: #FAFAFA;" class="mt-3 d-flex align-items-center mb-3">
          <div class="d-flex align-items-center w-100 p-2  ">
            <span style="display: inline-block; padding-left: 8px; border-left: 2px solid #ddd;">
              <img :src="base_url + '/assets/images/file.png'" alt="">
            </span>
            <span class="flex-grow-1">
              <input type="text" placeholder=".....اكتب تعليقك هنا" class="form-control bg-transparent border-0">
            </span>
            <span>
              <img :src="base_url + '/assets/images/Frame2.png'" alt="">
            </span>
            <span>
              <button class="bg-transparent border-0">
                <img :src="base_url + '/assets/images/telegram.png'" alt="">
              </button>
            </span>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";
export default {
  mounted(){
    this.gettingTicketDetails();
    this.getAllReplysOfThisTicket();
  },
  data(){
    return{
      base_url:base_url ,
      profileImage : "" ,
      username : "" ,
      ticketTitle : "" ,
      RelatedTo : "" ,
      department : "" ,
      ticketContent : "" ,
      list : []
    };
  },
  methods:{
    gettingTicketDetails(){
      let ticketId = localStorage.getItem("thisTicketId");
      api
        .get("v1/get_specific_ticket/" + ticketId)
        .then((response) => {
          this.profileImage = response.data.tickets[0].photo_profile;
          this.username = response.data.tickets[0].name;
          this.ticketTitle = response.data.tickets[0].ticket_title ;
          this.RelatedTo = response.data.tickets[0].ticket_linked ;
          this.department = response.data.tickets[0].department_name_ar ;
          this.ticketContent = response.data.tickets[0].ticket_content ;
          console.log(response.data.tickets)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
    getAllReplysOfThisTicket(){
      let ticketId = localStorage.getItem("thisTicketId");
      api
        .get("v1/get_all_replys_of_this_ticket/" + ticketId)
        .then((response) => {
          this.list = response.data.ticketReplys
          console.log(response.data)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    }
  }
}
</script>
<style scoped>

</style>