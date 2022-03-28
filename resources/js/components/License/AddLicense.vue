<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <h6 class="my-4">{{ $root._t("app.license") }}</h6>
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
                  <label style="font-size: 13px">{{ $root._t("app.licenseNameOrLicenseNumber") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...اسم الترخيص / رقم الرخصة"
                    v-model="licenseName"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.license") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="file"
                    placeholder="...رفع ملف الرخصه "
                    @change="selectFile"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.licenseExpirdDate") }}</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="date"
                    placeholder="...اسم الترخيص / رقم الرخصة"
                    v-model="licenseEndAt"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="content-col">
                  <label style="font-size: 13px">{{ $root._t("app.notes") }}</label>
                  <textarea
                      class="input-personal mt-1 w-100"
                      name="" id="" cols="30" rows="10" v-model="licenseComment">
                  </textarea>
                </div>
              </div>

              <div class="col-md-12 text-center">
                <button class="save-btn" @click.prevent="addLicense()">
                  {{ $root._t("app.addLicenseBtn") }}
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
  mounted(){
    this.currentUser() ;
  },
  data(){
    return{
      base_url:base_url ,
      uId : "" ,
      licenseName  : "" ,
      licenseFile : null ,
      licenseEndAt : "" ,
      licenseComment : "" ,
      errors: null,
    };
  },
  methods : {
    currentUser() {
      api
        .get("/account?token=" + localStorage.getItem("token"))
        .then((response) => {
          this.uId = response.data.user.id;
          console.log(response.data.user.id);
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
    onSelectedLicense(event) {
      this.licenseFile = event.target.files[0];
    },
    addLicense() {
      let formData = new FormData();
      formData.append("license_name", this.licenseName);
      formData.append("license_file", this.licenseFile);
      formData.append("user_id", this.uId);
      formData.append("license_end_at", this.licenseEndAt);
      formData.append("comment", this.licenseComment);


      api
        .post(
          "http://law-mawthuq.com/reliable/public/api/v1/userlicenses",
          formData
        )
        .then((response) => {
          // document.getElementById("errors").style.display = "none";
          this.$root.alertSuccess("data is updated");
          // console.log(response);
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e);
        });
    },
  }
}
</script>