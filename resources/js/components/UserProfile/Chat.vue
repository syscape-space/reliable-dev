<template>
  <section class="requsts-sec mt-4">
    <div class="chat-clinet" style="max-width: 1000px;margin: auto;">
      <ul class="chat-list d-flex list-unstyled">

        <li class="d-flex mx-3">
          <img style="width:40px ;" :src="cloud_url +  $root.auth_user.photo_profile  " alt="">
          <p style="font-size: 13px;     margin-top: 10px !important;" class="me-1 m-0"> {{ username }} <br>
            <span
                style="height: 23px; display: inline-block; max-width: 63px; overflow: hidden;color: rgb(165, 164, 164);"> </span>
          </p>
        </li>
        <br>
        <li class="d-flex mx-3">
          <p style="font-size: 13px;" class="me-1 m-0"> عنوان التذكره <br>
            <span
                style="height: 23px; display: inline-block; max-width: 63px; overflow: hidden;color: rgb(165, 164, 164);"> {{
                ticketTitle
              }} </span></p>
        </li>
        <li class="d-flex mx-3">
          <p style="font-size: 13px;" class="me-1 m-0"> التذكرة مرتبطة ب <br>
            <span
                style="height: 23px; display: inline-block; max-width: 63px; overflow: hidden;color: rgb(165, 164, 164);"> {{
                RelatedTo
              }} </span></p>
        </li>
        <li class="d-flex mx-3">
          <p style="font-size: 13px;" class="me-1 m-0"> قسم الدعم الفنى <br>
            <span
                style="height: 23px; display: inline-block; max-width: 63px; overflow: hidden;color: rgb(165, 164, 164);"> {{
                department
              }} </span></p>
        </li>

        <li class="d-flex me-auto ms-3">
          <img class="mx-4" :src="base_url+'/assets/images/chate2.svg'" alt="">
          <!-- getting this ticket details -->
          <img :src="base_url+'/assets/images/chate.svg'" alt="">
        </li>
      </ul>
      <div class=" text-center " style=" font-size: 13px;
         "><p class="m-0"> <span style="background-color:#F8FAFC;
          color: rgb(177, 177, 177);
          padding: 10px;
         border-radius: 20px; "
      >may 21</span></p>
      </div>

      <ul class="item-chat border p-3 list-unstyled text-start px-0" v-for="item in list" :key="item.id">
        <li v-if="item.admin_id != null ">
            
            <span class="w-100 d-block">
                <div class="d-flex mb-3 align-items-center justify-content-between">
                  <p style="font-weight:bold" class="m-0"> {{ $root._t("app.admin") }} </p>
                  <!-- <img style="width: 30px; margin-right: 5px;" src="./images/morning.svg" alt=""> <br> -->
                  <small style=" padding-bottom: 4px;">{{ item.created_at }}</small>
                </div>  
               {{ item.replay }}
            </span>
        </li>
        <li class="sec-list" v-else>
           
            <span class="w-100 d-block" key=""
                  style="background-color: #e1e1e1 !important;max-width: 90%;border-radius: 10px 2px 10px 10px !important;    color: #4c5053;">
                 <div class="d-flex mb-3 align-items-center justify-content-between">
                  <!-- <img style="width: 30px;" src="./images/morning.svg" alt=""> <br> -->
                  <p style="font-weight:bold" class="m-0 me-2"> {{ item.name }} </p>
                  <small style=" padding-bottom: 4px;">{{ item.created_at }}</small>
                </div>
              <span v-if="item.type === 'text'" v-html="item.replay"></span>
              <span v-else-if="item.type === 'image'">
                <img height="100" style="max-height: 150px" class="img-thumbnail" :src="cloud_url + item.replay">
              </span>
              <span v-else-if="item.type === 'video'">
                <video style="max-height: 200px" class="img-thumbnail" controls>
                  <source :src="cloud_url + item.replay">
                </video>
              </span>
            </span>
        </li>


      </ul>
      <!--- Error Will Validate Here -->
      <div class="errors">
        <div class="alert alert-danger" v-for="error in errors" :key="error">
          <strong>{{ error }}</strong>
        </div>
      </div>
      <div class="me-2 mb-4">{{ $root._t("app.ticketDetails") }}</div>
      <div class="d-flex mx-3" style="background-color: #f6f6f6;">
        <p style="font-size: 13px;" class="me-1 m-0"> محتوى التذكره <br>
          {{ ticketContent }}
        </p>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <div class="border mb-2 p-1 position-relative d-inline-block text-center" style="width:28px">
            <i class="fas fa-paperclip" style="color:rgb(119 119 119)"></i>
            <input @change="uploadFile" ref="fileUploader"
                   style="width: 28px; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0;"
                   type="file" name="" id="">
          </div>
          <br>
        </div>
        <div class="w-100 mt-3 d-flex align-items-center mb-3">
          <div class="d-flex align-items-center w-100 p-2  ">
            <span class="flex-grow-1">
              <textarea v-if="comment_file === null" style="height: 76px;" rows="2" type="text"
                        placeholder=".....اكتب تعليقك هنا" class="form-control bg-transparent " v-model="comment">
              </textarea>
              <template v-else>
                <span v-if="comment_file_type === 'image'">
                  <img height="100" style="max-height: 150px" class="img-thumbnail" :src="comment_file_url">
                </span>
                <span v-else-if="comment_file_type === 'video'">
                  <video style="max-height: 200px" class="img-thumbnail" controls>
                    <source :src="comment_file_url">
                  </video>
                </span>
              </template>
            </span>
            <span>
              <button class="bg-transparent border-0">
                <img :src="base_url+'/assets/images/telegram.png'" @click.prevent="addCommentForThisTicket()">
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import api from "../../utils/api";

export default {
  mounted() {
    this.gettingTicketDetails();
    this.getAllReplysOfThisTicket();
  },
  props: ['id'],
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
      profileImage: "",
      username: "",
      ticketTitle: "",
      RelatedTo: "",
      department: "",
      ticketContent: "",
      comment: "",
      comment_file: null,
      comment_file_url: null,
      comment_file_type: null,
      errors: null,
      list: []
    };
  },
  methods: {
    uploadFile() {
      var file = this.$refs.fileUploader.files[0];
      var formData = new FormData();
      let ticketId = localStorage.getItem("thisTicketId");
      this.comment_file = file;
      this.comment_file_url = URL.createObjectURL(file);
      this.comment_file_type = file.type.split('/')[0];
      console.log(file);
      // formData.append("ticket_id", ticketId);
      // formData.append("user_id", localStorage.getItem("myIdTazkarty") );
      // formData.append("replay",file);
      // api.post("v1/add_comment_for_this_ticket/" + this.$props.id , formData  )
      //     .then((response) => {
      //       this.getAllReplysOfThisTicket();
      //       console.log("comment is saved");
      //       this.comment = "" ;
      //     })
    },
    gettingTicketDetails() {
      let ticketId = localStorage.getItem("thisTicketId");
      api
          .get("v1/get_specific_ticket/" + ticketId)
          .then((response) => {
            this.profileImage = response.data.tickets[0].photo_profile;
            this.username = response.data.tickets[0].name;
            this.ticketTitle = response.data.tickets[0].ticket_title;
            this.RelatedTo = response.data.tickets[0].ticket_linked;
            this.department = response.data.tickets[0].department_name_ar;
            this.ticketContent = response.data.tickets[0].ticket_content;
            console.log(response.data.tickets)
          })
          // error.response.data.errors
          .catch((e) => {
            this.errors = e.response.data.errors;
            console.log(e.response);
          });
    },
    getAllReplysOfThisTicket() {
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
    },
    addCommentForThisTicket($id) {

      let ticketId = localStorage.getItem("thisTicketId");

      let formData = new FormData();
      formData.append("ticket_id", ticketId);
      formData.append("user_id", localStorage.getItem("myIdTazkarty"));
      if (this.comment_file){
        formData.append("replay", this.comment_file);
      }else{
        formData.append("replay", this.comment);
      }

      api
          .post("v1/add_comment_for_this_ticket/" + this.$props.id, formData)
          .then((response) => {
            this.getAllReplysOfThisTicket();
            console.log("comment is saved");
            this.comment = "";
            this.comment_file = null;
            this.comment_file_type = null;
            this.comment_file_url = null;
            // this.$root.alertSuccess("Ticket Added Successfully");
            // this.$router.push({ name: "Ticket2" });
          })
          // error.response.data.errors
          .catch((e) => {
            this.errors = e.response.data.errors;
            console.log(e.response.data.errors);
          });
    }
  }
}
</script>
<style scoped>
.item-chat li > span {
  background-color: #fff !important;
  padding: 10px 15px 0px !important;
  border-radius: 2px 10px 10px 10px !important;
  margin-left: 2rem !important;
  display: inline-block !important;
  min-width: 150px !important;
}
</style>