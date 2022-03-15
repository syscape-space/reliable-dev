<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <h6 class="my-4">{{ $root._t("app.presonalData") }}</h6>
          <form action="">
            <div class="row w-100 mx-0 px-0">
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">{{ $root._t("app.fullname") }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="username"
                  placeholder="محمد مصطفى  على"
                />
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">{{ $root._t("app.email") }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  v-model="email"
                  type="text"
                  placeholder="...البريد الالكتروني"
                />
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">{{ $root._t("app.mobile") }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  v-model="mobile"
                  type="text"
                  placeholder="...رقم الهاتف"
                />
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.uploadAttchmentOfCommercialRegister") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...رفع مر فقات السجل التجاري"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-info.svg'" alt="" srcset=""
                  /></a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.addDateOfEndingOfCommercialRegister") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...اضافه تاريخ انتهاء السجل"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-birth.svg'" alt="" srcset=""
                  /></a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.uploadLicense") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...رفع الرخصه"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-info.svg'" alt="" srcset="" />
                  </a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.dateOfEndingLicense") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...تاريخ انتهاء الرخصة"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-birth.svg'" alt="" srcset="" />
                  </a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.nationality") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...رقم الهاتف"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.dateOfBirth") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...تاريخ الميلاد"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <h6 class="pt-4">{{ $root._t("app.websiteData") }}</h6>
              </div>
              <div class="mb-3 col-md-6 mt-3">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.specialist") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...التخصص"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6 mt-3">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.jobTitle") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...المسمى الوظيفي"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">{{ $root._t("app.brief") }}</label>

                <textarea
                  class="input-personal mt-1 w-100"
                  type="text"
                  placeholder="...نبذة"
                  name=""
                  id=""
                  cols="30"
                  rows="10"
                ></textarea>
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">{{ $root._t("app.skills") }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  placeholder="...المهارات الشخصية"
                />
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">{{ $root._t("app.accountType") }}</label>
              </div>
              <div class="mb-3 col-md-12">
                <div class="d-flex align-items-center">
                  <div class="ms-3">
                    <input type="checkbox">
                    <label for="">{{ $root._t("app.projectExecuter") }} - {{ $root._t("app.serviceSeller") }}</label>
                  </div>
                  <div>
                    <input type="checkbox">
                    <label for="">{{ $root._t("app.avaliableForJobs") }}</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button class="save-btn" @click.prevent="updateInfo()">{{ $root._t("app.saveChanges") }}</button>
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
      username : "" ,
      email : "" ,
      mobile : "" ,
      base_url : base_url
    }
  },
  mounted() {
    
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/account?token=" + localStorage.getItem("token") )
        .then((response) => {
          // document.getElementById("name").value = response.data.user.name;
          this.username = response.data.user.name;
          this.email = response.data.user.email ;
          this.mobile = "0"+response.data.user.mobile ;
          console.log( response.data.user );
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
  },
};
</script>