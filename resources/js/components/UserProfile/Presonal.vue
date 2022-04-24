<template>
  <section class="requsts-sec mt-4 outside ">
    <div class="pc-container">
      <div class="pcoded-content" style="font-size: 14px;">
        <!-- Side Menu Profile Sections  -->
        <div class="row w-100 mx-0 px-0 ">
          <div class="col-12 col-lg-4 mb-5  parent-boxes ">
            <div class="card user-card user-card-1 us-bb bg-transparent border-0" style="font-size: 14px;">
              <div class="card-body pb-0">
                <div class="d-flex pt-3 mb-2 justify-content-center align-items-start">
                  <div>
                    <img 
                        :src="user?.photo_profile != null ? cloud_url + user?.photo_profile : base_url+ '/assets/images/dash-user.png'"
                        alt=""
                        class="d-block img-radius img-fluid wid-80"
                        style="width: 88px; height: 88px !important; border-radius: 50%; margin: auto;">
                  </div>
                  <span class="text-success" v-if="user_is_verified"><i
                      class="fas fa-certificate text-success bg-icon"></i> نشيط</span>
                </div>
                <div class="text-center">
                  <button
                    class="btn my-2"
                    style="border: 0px; background-color: rgb(4, 142, 129); color: rgb(255, 255, 255); font-size: 12px;width:120px;margin:auto ;font-size: 11px;"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">تحديث الصوره
                  </button>
                </div>
              </div>
              <div class="box text-start  box-data d-flex flex-column ">
                                    <div class="box-child d-flex flex-column ">
                                        <div class="data d-flex gap-1 justify-content-between align-items-center">
                                            <p class="title">
                                                بريد الالكتروني:
                                            </p>
                                            <p class="content">
                                                <a style="text-decoration:none" href="mailto:{{user?.email}}" class="text-body">
                                                  {{ user?.email }} </a>
                                            </p>
                                        </div>
                                        <div class="status active">
                                            تم التحقق
                                            <div class="icon">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-child d-flex flex-column ">
                                            <div class="data gap-1 d-flex justify-content-between align-items-center">
                                            <p class="title">هاتف:</p>
                                            <p class="content">
                                              <a style="text-decoration:none" href="#" class="text-body">{{ user?.mobile }}</a>
                                            </p>
                                            </div>
                                        <div class="status active">
                                            تم التحقق
                                            <div class="icon"> <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></div>

                                        </div>                            
                                    </div>
                                    <div class="box-child d-flex flex-column ">
                                        <div class="data d-flex gap-1 justify-content-between align-items-center">
                                            <p class="title mb-0">
                                                 الاشتركات:
                                            </p>
                                            <p class="dont-sub mb-0"  v-if="$root.auth_user.current_subscription" style="background: transparent linear-gradient(270deg, #2b7b74 0%, #048e81 100%) 0% 0% no-repeat padding-box;">
                                                  مشترك فى {{$root.auth_user.current_subscription.package.package_title}}
                                            </p>
                                            <p class="dont-sub mb-0" v-else>
                                                غير مشترك
                                            </p>
                                        </div>
                                        
                                    </div>
                                    <div class="box-child d-flex flex-column " v-if="user?.membership_type == 'vendor'">
                                        <div class="data d-flex gap-1 justify-content-between align-items-center" @click="activeLink = 'commercial'">
                                            <p class="title">
                                                 السجلات التجارية:
                                            </p>
                                            <div class="status dn-active"  v-if="commercial_status != 'unset'">
                                                لم يتم التحقق
                                                <div class="icon">
                                                    <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                                                </div>
                                            </div>
                                            <div class="status active" v-else>
                                            تم التحقق
                                            <div class="icon"> <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></div>

                                        </div>  
                                        </div>
                                        
                                    </div>
                                    <div class="box-child d-flex flex-column " v-if="user?.membership_type != 'user'">
                                        <div class="data d-flex gap-1 justify-content-between align-items-center"  @click="activeLink = 'license'">
                                            <p class="title" >
                                                 الرخصة المهنية:
                                            </p>
                                          
                                          
                                            <div class="status active" v-if="license_status != 'unset'">
                                            تم التحقق
                                            <div class="icon"> <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="box-child d-flex flex-column " v-if="user?.membership_type == 'vendor'">
                                        <div class="data d-flex gap-1 justify-content-between align-items-center" @click="activeLink = 'qualification'">
                                            <p class="title">
                                                  المؤهلات:
                                            </p>
                                            <div class="status active">
                                                تم  التحقق
                                                <div class="icon">
                                                    <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->                                                                                            </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="box-child d-flex flex-column " v-if="user?.membership_type == 'vendor'">
                                        <div  @click="activeLink = 'experience'"  class="data d-flex gap-1 justify-content-between align-items-center">
                                            <p class="title">
                                                  الخبرات:
                                            </p>
                                            <div class="status dn-active">
                                                لم يتم  التحقق
                                                <div class="icon">
                                                    <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
              

             
              <div class="nav flex-column nav-pills list-group list-group-flush list-pills" id="user-set-tab"
                   role="tablist" aria-orientation="vertical">
                <!-- <a class="nav-link list-group-item list-group-item-action px-0" :class="{active: activeLink == 'account_settings'}" @click="openAccountSettings()" href="#">Account Setting</a> -->
                <a class="nav-link list-group-item list-group-item-action px-0"
                 style="font-size: 16px;color: #0491e8;"
                   :class="{active: activeLink == 'account_settings'}" @click="activeLink = 'account_settings'"
                   href="#">
                  <span class="f-w-500">إعدادت الحساب </span> <span
                    class="float-start"></span>
                </a>
                
                <a class="nav-link box-child d-flex flex-column list-group-item px-0 list-group-item-action"
                    style="font-size: 16px;color: #0491e8;"
                    :class="{active: activeLink == 'verify_user'}" @click="activeLink = 'verify_user'" href="#">
                  <p class=""><i class="feather icon-disc m-r-10 h5 "></i>تحقق الهوية </p> 
                    <div class="status active">
                        تم التحقق
                        <div class="icon">
                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                        </div>
                    </div>
                   </a>
                <!-- <a class="nav-link list-group-item list-group-item-action px-0 active" id="user-edit-account-tab" data-toggle="pill" href="#user-edit-account" role="tab" aria-controls="user-edit-account" aria-selected="true"> <span class="f-w-500"><i class="feather icon-user m-r-10 h5 "></i>معلومات شخصية </span> <span class="float-start"><i class="feather icon-chevron-right"></i></span> </a> -->
                <!-- change password                -->
                <a class="nav-link list-group-item list-group-item-action px-0 px-0"
                   :class="{active: activeLink == 'change_password'}" @click="activeLink = 'change_password'" href="#">
                  <span class="f-w-500" style="font-size: 16px;color: #0491e8;">
                    <i class="feather icon-shield m-r-10 h5 "></i>تغيير كلمة المرور </span> <span
                    class="float-start"><i class="feather icon-chevron-right"></i></span> </a>
              </div>
            </div>
          </div>
          </div>

          <!-- @yield('content') -->
          <div class="col-12 col-lg-8">

            <!-- Start Account Settings -->


            <!-- End Account Settings -->

            <div v-if="loading" class="w-100 h-100 d-flex justify-content-center align-items-center">
              <div class="spinner-border spinner-secondary" role="status">
              </div>
            </div>

            <!-- Start License  -->
            <profile-personal :user="user" :subscribtion_end="subscribtion_end" :countries="countries" :cities="cities"
                              v-if="!loading && activeLink == 'account_settings'"
                              @refersh="handleRefresh"></profile-personal>
            <profile-license :user_id="user?.id" :license="license" :license_status="license_status"
                             :specialties="specialties" v-if="!loading && activeLink == 'license'"
                             @refersh="handleRefresh"></profile-license>
            <profile-commercial :user_id="user?.id" :commercial="commercial" :commercial_status="commercial_status"
                                :specialties="specialties" v-if="!loading && activeLink == 'commercial'"
                                @refersh="handleRefresh"></profile-commercial>
            <profile-experience :user_id="user?.id" :specialties="specialties"
                                v-if="!loading && activeLink == 'experience'"
                                @refersh="handleRefresh"></profile-experience>
            <profile-qualification :user_id="user?.id"  :specialties="specialties"
                                   v-if="!loading && activeLink == 'qualification'"
                                   @refersh="handleRefresh"></profile-qualification>
            <profile-change-password v-if="!loading && activeLink == 'change_password'"></profile-change-password>
            <profile-verify-user v-if="!loading && activeLink == 'verify_user'"></profile-verify-user>
            <!-- End License -->

          </div>
          <!-- [ Main Content ] end -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Side Section -->

  <!-- Modal For Updating Profile -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تحديث الصوره</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <form action="" enctype="multipart/form-data">
            <img :src="avatar" alt="image" style="width : 150px;"><br>
            <input type="file" @change="GetImage" accept="image/png, image/gif, image/jpeg"><br>
            <a href="#" class="btn btn-success" @click.prevent="updateProfileImage()">Upload</a>
          </form>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import api from "../../utils/api";
import profileLicense from "./ProfileLicense.vue";
import profilePersonal from "./ProfilePersonal.vue";
import profileCommercial from "./ProfileCommercial.vue";
import profileExperience from "./ProfileExperiance.vue";
import profileQualification from "./ProfileQualification.vue";
import profileChangePassword from "./ProfileChangePassword.vue";
import profileVerifyUser from "./ProfileVerifyUser.vue";

export default {

  components: {
    'profile-license': profileLicense,
    'profile-personal': profilePersonal,
    'profile-commercial': profileCommercial,
    'profile-experience': profileExperience,
    'profile-qualification': profileQualification,
    'profile-change-password': profileChangePassword,
    'profile-verify-user': profileVerifyUser,
  },
  data() {
    return {
      activeLink: "",
      editable: false,
      user: null,
      subscribtion_end: false,
      user_is_verified: false,
      license_status: 'unset',
      commercial_status: 'unset',
      license: null,
      commercial: null,
      countries: [],
      cities: [],
      specialties: [],
      userId: '',
      experience: null,
      qualification: null,
      loading: false,
      errors: null,
      base_url: base_url,
      cloud_url: cloud_url,
      avatar: null,
      file: null,
    };
  },
  mounted() {
    this.currentUser();


  },

  methods: {

    handleRefresh() {
      this.currentUser(true);
    },

    currentUser(refersh = false) {
      this.loading = !refersh;
      api
          .get("/profile?token=" + localStorage.getItem("token"))
          .then((response) => {
            this.loading = false;
            this.user = response.data.user;
            this.userId = response.data.user.id;
            this.subscribtion_end = response.data.subscribtion_end;
            this.license_status = response.data.license_status;
            this.commercial_status = response.data.commercial_status;
            this.license = response.data.license;
            this.commercial = response.data.commercial;
            this.specialties = response.data.specialties;
            this.experience = response.data.experience;
            this.qualification = response.data.qualification;
            this.user_is_verified = response.data.user_is_verified;
            this.countries = response.data.countries;
            this.cities = response.data.cities;
            if (this.activeLink == '') {
              this.activeLink = "account_settings"
            }
          })
          .catch((e) => {
            this.loading = false;
            this.errors = e.response.data.errors;
            console.log('error: ', e.response);
          });
    },

    exist(attr) {
      return typeof (attr) !== 'undefined' && attr !== null;
    },


    GetImage(e) {
      this.file = e.target.files[0];
      let image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        this.avatar = e.target.result
      }
    },

    updateProfileImage() {
      // console.log(this.user);
      let formData2 = new FormData();
      formData2.append("photo_profile", this.file);
      formData2.append("_method", 'put');

      api
          .post("v1/users/" + this.userId, formData2)
          .then((response) => {
            this.loading = false;
            this.$root.alertSuccess('updated successfully');
            this.currentUser();
            location.reload();
            console.log(response.data.message);
          })
          .catch((e) => {
            this.loading = false;
            // this.errors = e.response.data.errors;
            // console.log('error: ', e.response);
            console.log(e.response);
          });
    }
  },
};
</script>


<style >
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
  color: #fff;
  background-color: #048e81;
  border-color: #048e81;
}

.nav-pills .nav-link.active .text-success, .nav-pills .nav-link.active .text-danger {
  color: #FFF !important
}
.us-bb {
  font-size: 14px;
    background-color: #ecf8ff;
    text-align: center;
    padding: 20px 15px;
    border-radius: 8px;
}
.parent-boxes .box {
    background-color: #ecf8ff !important;
    text-align: center !important;
    padding: 20px 15px !important;
    border-radius: 8px !important;
}
.box-data .data .title {
    font-size: 16px;
    color: #0491e8;
}
 .box-data .data .content {
    font-size: 18px;
}
 .box-data .data .content {
    font-size: 18px;
}
 .box-data .status {
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 20px;
}
 .box-data .status.active {
    color: #0cbb9d;
}
.box-data .status.active .icon {
    width: 23px;
    justify-content: center;
    height: 23px;
    display: flex;
    align-items: center;
    background-color: #b0ef8f;
    border-radius: 50%;
}
.box-data .dont-sub {
    background: transparent linear-gradient(270deg, #df2929 0%, #ff6d6d 100%) 0% 0% no-repeat padding-box;
    min-height: 50px;
    color: white;
    min-width: 100px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}
 .box-data .status {
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 20px;
}
 .box-data .status.dn-active {
    color: #e53535 !important;
}
.box-data .status.waiting {
    color: #73737d;
}
 .box {
    background-color: #ecf8ff;
    text-align: center;
    padding: 20px 15px;
    border-radius: 8px;
}
.box-child {
  margin: 8px 0;
}
.box-data .status.dn-active .icon {
    width: 23px;
    justify-content: center;
    height: 23px;
    display: flex;
    align-items: center;
    background-color: #ff4a4a;
    border-radius: 50%;
    color: #fff;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
  color: #fff;
    background-color: #7fc3ef47 !important;
    padding: 15px 10px;
    border-radius: 6px;
}
.nav-pills .nav-link:hover  {
    background-color: #7fc3ef47 !important;

}
.nav-pills .nav-link.active {
  padding: 15px 10px !important;
}
.btn-primary {
    background-color: rgb(4, 145, 232) !important;
      color: white; font-size: 18px;
      min-height: 50px;
        justify-content: center; 
        margin: 0px auto;
        min-width: 200px; 
        border: 1px solid #73737d8f;
        outline: none; padding: 0 10px; 
        border-radius: 10px !important;
}
.card-footer {
  border: 0 !important;
  background-color:transparent !important
}
.file-icoo {
  top: 25px;
    background: linear-gradient( 0deg, rgb(4, 144, 214), rgb(4, 142, 140) );
    width: 24px;
    height: 24px;
    border-radius: 50%;
    z-index: 2;
    position: absolute;
    display: flex;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    transform: translateY(-55%);
    left: 10px;
    color: white;
}
.box-child:hover {
  cursor: pointer;
}
.card.tab-content {
  border: 0;
}
</style>