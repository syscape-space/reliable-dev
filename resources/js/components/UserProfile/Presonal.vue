<template>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="errors" id="errors">
        <div class="alert alert-danger" v-for="error in errors" :key="error">
          <strong>{{ error }}</strong>
        </div>
      </div>
      <div class="personal-info" style="    padding: 0 20px;">
        <h6 class="my-4">{{ $root._t("app.presonalData") }}</h6>
        <form action="" enctype="multipart/form-data">
          <div class="row w-100 mx-0 px-0">
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{
                $root._t("app.firstname")
              }}</label>
              <input
                class="input-personal mt-1 w-100"
                type="text"
                v-model="firstname"
                placeholder="First name"
              />
            </div>
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{
                $root._t("app.midname")
              }}</label>
              <input
                class="input-personal mt-1 w-100"
                type="text"
                v-model="midname"
                placeholder="middle name"
              />
            </div>
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{
                $root._t("app.lastname")
              }}</label>
              <input
                class="input-personal mt-1 w-100"
                type="text"
                v-model="lastname"
                placeholder="last name"
              />
            </div>
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{
                $root._t("app.profileImage")
              }}</label>
              <input
                class="input-personal mt-1 w-100"
                type="file"
                @change="onSelectedImage"
                accept="image/png, image/gif, image/jpeg"
                placeholder="profile image"
              />
            </div>
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{ $root._t("app.email") }}</label>
              <input
                class="input-personal mt-1 w-100"
                v-model="email"
                type="text"
                placeholder="...البريد الالكتروني"
              />
            </div>
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{
                $root._t("app.mobile")
              }}</label>
              <input
                class="input-personal mt-1 w-100"
                v-model="mobile"
                type="text"
                placeholder="...رقم الهاتف"
              />
            </div>
            <div class="mb-3 col-md-3">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.uploadAttchmentOfCommercialRegister")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="AttchmentOfCommercialRegister"
                  placeholder="...رفع مر فقات السجل التجاري"
                />
                <a href=""
                  ><img
                    :src="base_url + '/assets/images/input-info.svg'"
                    alt=""
                    srcset=""
                /></a>
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.addDateOfEndingOfCommercialRegister")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="DateOfEndingOfCommercialRegister"
                  placeholder="...اضافه تاريخ انتهاء السجل"
                />
                <a href=""
                  ><img
                    :src="base_url + '/assets/images/input-birth.svg'"
                    alt=""
                    srcset=""
                /></a>
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.uploadLicense")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="uploadLicense"
                  placeholder="...رفع الرخصه"
                />
                <a href=""
                  ><img
                    :src="base_url + '/assets/images/input-info.svg'"
                    alt=""
                    srcset=""
                  />
                </a>
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.dateOfEndingLicense")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="dateOfEndingLicense"
                  placeholder="...تاريخ انتهاء الرخصة"
                />
                <a href=""
                  ><img
                    :src="base_url + '/assets/images/input-birth.svg'"
                    alt=""
                    srcset=""
                  />
                </a>
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.nationality")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="nationality"
                  placeholder="...رقم الهاتف"
                />
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.dateOfBirth")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="dateOfBirth"
                  placeholder="...تاريخ الميلاد"
                />
              </div>
            </div>
            <div class="mb-3 col-md-12">
              <h6 class="pt-4">{{ $root._t("app.websiteData") }}</h6>
            </div>
            <div class="mb-3 col-md-3 ">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.specialist")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="specialist"
                  placeholder="...التخصص"
                />
              </div>
            </div>
            <div class="mb-3 col-md-3 ">
              <div class="content-col">
                <label style="font-size: 13px">{{
                  $root._t("app.jobTitle")
                }}</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  v-model="jobTitle"
                  placeholder="...المسمى الوظيفي"
                />
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <label style="font-size: 13px">{{
                $root._t("app.skills")
              }}</label>
              <input
                class="input-personal mt-1 w-100"
                type="text"
                v-model="skills"
                placeholder="...المهارات الشخصية"
              />
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
                v-model="brief"
              ></textarea>
            </div>

            <div class="mb-3 col-md-12">
              <label style="font-size: 13px">{{
                $root._t("app.accountType")
              }}</label>
            </div>
            <div class="mb-3 col-md-12">
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <input type="checkbox" />
                  <label for=""
                    >{{ $root._t("app.projectExecuter") }} -
                    {{ $root._t("app.serviceSeller") }}</label
                  >
                </div>
                <div>
                  <input type="checkbox" />
                  <label for="">{{ $root._t("app.avaliableForJobs") }}</label>
                </div>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button class="save-btn" @click.prevent="updateInfo()">
                {{ $root._t("app.saveChanges") }}
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
  data() {
    return {
      username: "",
      firstname: "",
      midname: "",
      lastname: "",
      profileImage: null,
      email: "",
      mobile: "",
      AttchmentOfCommercialRegister: "",
      DateOfEndingOfCommercialRegister: "",
      uploadLicense: "",
      dateOfEndingLicense: "",
      nationality: "",
      dateOfBirth: "",
      specialist: "",
      jobTitle: "",
      brief: "",
      skills: "",
      uId: "",
      errors: null,
      base_url: base_url,
    };
  },
  mounted() {
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/account?token=" + localStorage.getItem("token"))
        .then((response) => {
          // document.getElementById("name").value = response.data.user.name;
          this.firstname = response.data.user.first_name;
          this.lastname = response.data.user.last_name;
          this.midname = response.data.user.middle_name;
          this.email = response.data.user.email;
          this.mobile = "0" + response.data.user.mobile;
          this.uId = response.data.user.id;
          console.log(response.data.user);
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
    onSelectedImage(event) {
      this.profileImage = event.target.files[0];
    },
    updateInfo() {
      let formData = new FormData();
      formData.append("_method", "PUT");
      formData.append("first_name", this.firstname);
      formData.append("middle_name", this.midname);
      formData.append("last_name", this.lastname);
      formData.append("photo_profile", this.profileImage);
      formData.append("email", this.email);
      formData.append("email_verify", "pending");
      formData.append("mobile_verify", "pending");
      formData.append("add_offer", "enable");
      formData.append("name", this.firstname + " " + this.midname + " " + this.lastname);

      api
        .post(
          "http://law-mawthuq.com/reliable/public/api/v1/users/" + this.uId,
          formData
        )
        .then((response) => {
          this.currentUser();
          document.getElementById("errors").style.display = "none";
          alert("data is updated");
          console.log(response);
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e);
        });
    },
  },
};
</script>
