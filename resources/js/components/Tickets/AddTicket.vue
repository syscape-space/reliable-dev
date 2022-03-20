<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <h6 class="my-4">اضافه تذكره</h6>
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
                  <label style="font-size: 13px">عنوان التذكره</label>
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
                  <label style="font-size: 13px">اختار القسم</label>
                    <select  class="input-personal mt-1 w-100" v-model="ticketDepartment">
                        <option :value="item.id" v-for="item in list" :key="item.id"> {{ item.department_name_ar }} </option>
                    </select>
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <div class="content-col">
                  <label style="font-size: 13px">ارفاق ملفات</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="file"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="content-col">
                  <label style="font-size: 13px">التذكره مرتبطه ب</label>
                    <select  class="input-personal mt-1 w-100" v-model="ticketLinked">
                        <option value="order" > طلب </option>
                        <option value="offer" > عرض </option>
                        <option value="charge" > شحن رصيد </option>
                        <option value="received_money" > سحب رصيد </option>
                        <option value="account" > حساب </option>
                        <option value="other" > اخرى </option>
                    </select>
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="content-col">
                  <label style="font-size: 13px">المحتوى</label>
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
      ticketDepartment : ""

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
    addNewTicket(){
        let formData = new FormData();
        formData.append("ticket_title", this.ticketTitle);
        formData.append("ticket_linked", this.ticketLinked);
        formData.append("user_id", localStorage.getItem("myIdTazkarty") );
        formData.append("ticket_department_id", this.ticketDepartment);
        formData.append("ticket_content", this.ticketContent);

        api
        .post("v1/new_ticket" , formData)
        .then((response) => {
          console.log(response)
          alert("Ticket Added Successfully");
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