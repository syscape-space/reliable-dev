<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <h6 class="my-4">{{ $root._t("app.ticketDetails") }}</h6>
          <form action="" enctype="multipart/form-data">
            <div class="row w-100 mx-0 px-0">
             
             <!--- Error Will Validate Here -->
          <div class="errors">
            <div class="alert alert-danger" v-for="error in errors" :key="error">
              <strong>{{ error }}</strong>
            </div>
          </div>

              <div class="mb-3 col-md-4">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.ticketTitle") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="عنوان التذكره"
                    v-model="ticketTitle"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.chooseDepartment") }}</label>
                    <select  class="input-personal mt-1 w-100" v-model="ticketDepartment">
                        <option :value="item.id" v-for="item in list" :key="item.id"> {{ item.department_name_ar }} </option>
                    </select>
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.uploadFiles") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="file"
                    @change="onSelectedImage"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.relatedTo") }}</label>
                    <select  class="input-personal mt-1 w-100" v-model="ticketLinked">
                        <option value="order" > {{ $root._t("app.order") }} </option>
                        <option value="offer" > {{ $root._t("app.preview") }} </option>
                        <option value="charge" > {{ $root._t("app.charge") }} </option>
                        <option value="received_money" > {{ $root._t("app.recieveMony") }} </option>
                        <option value="account" > {{ $root._t("app.account") }} </option>
                        <option value="other" > {{ $root._t("app.other") }} </option>
                    </select>
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.content") }}</label>
                  <textarea
                      class="input-personal mt-1 w-100"
                      name="" id="" cols="30" rows="10" v-model="ticketContent">
                  </textarea>
                </div>
              </div>

              <div class="col-md-12 text-center">
                <button class="save-btn" @click.prevent="addNewTicket()">
                  اضافه تذكره جديده
                </button>
              </div>
              
            </div>
          </form>
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
      errors: null,
      count : "" ,
      ticketTitle : "" ,
      ticketLinked : "" ,
      ticketContent : "" ,
      ticketStatus : "opened" ,
      ticketDepartment : "" ,
      file : null

    };
  },
  mounted(){
    this.gettingAllDeps();
  },
  methods:{
    gettingAllDeps(){
         api
        .get("v1/all_depts/")
        .then((response) => {
            this.list = response.data.depts ;
          console.log(response.data.depts)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e);
        });
    } , 
    onSelectedImage(event) {
      this.file = event.target.files[0];
    },
    addNewTicket(){
        let formData = new FormData();
        formData.append("ticket_title", this.ticketTitle);
        formData.append("ticket_linked", this.ticketLinked);
        formData.append("user_id", localStorage.getItem("myIdTazkarty") );
        formData.append("ticket_department_id", this.ticketDepartment);
        formData.append("ticket_content", this.ticketContent);
        formData.append("file", this.file);

        api
        .post("v1/new_ticket" , formData)
        .then((response) => {
          console.log(response)
          alert("Ticket Added Successfully");
          this.$router.push({ name: "Ticket2" });
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response.data.errors);
        });
    }
  } ,

  
}
</script>