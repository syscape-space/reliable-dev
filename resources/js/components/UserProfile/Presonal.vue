<template>

  <section class="requsts-sec mt-4 outside ">
    <div class="pc-container">
      <div class="pcoded-content" style="font-size: 14px;">

        <!-- Side Menu Profile Sections  -->
        <div class="row w-100 mx-0 px-0 ">
          <div class="col-12 col-md-4 mb-5">
            <div class="card user-card user-card-1" style="font-size: 14px;">
              <div class="card-body pb-0">
                <div class="d-flex pt-3 mb-2 justify-content-center align-items-start" >
                  <div>
                    <img :src="user?.photo_profile != null ? cloud_url + user?.photo_profile : base_url+ '/assets/images/dash-user.png'" alt=""
                      class="d-block img-radius img-fluid wid-80" style="width: 55px; height: 55px !important; border-radius: 50%; margin: auto;">
                  </div>
                  <span class="text-success" v-if="user_is_verified"><i class="fas fa-certificate text-success bg-icon"></i> نشيط</span>
                </div>
               
              </div>
              <ul class="list-group list-group-flush px-0 border-0 mb-3 text-center">
                <button 
                class="btn " 
                style="border: 0px; background-color: rgb(4, 142, 129); color: rgb(255, 255, 255); font-size: 12px;width:120px;margin:auto ;font-size: 11px;"
                data-bs-toggle="modal" 
                data-bs-target="#exampleModal">تحديث الصوره</button>
              </ul>
              
              <ul class="list-group list-group-flush px-0">
                <li class="list-group-item"> <span class="f-w-500"><i class="feather icon-mail m-r-10"></i>بريد
                    الالكتروني </span> <a href="mailto:{{user?.email}}" class="text-body"> {{user?.email}} </a>
                </li>
                <li class="list-group-item"> <span class="f-w-500"><i class="feather icon-phone-call m-r-10"></i> هاتف
                  </span> <a href="#" class="text-body">{{user?.mobile}}</a> </li>
              </ul>
              <div class="nav flex-column nav-pills list-group list-group-flush list-pills" id="user-set-tab"
                role="tablist" aria-orientation="vertical">
                <!-- <a class="nav-link list-group-item list-group-item-action" :class="{active: activeLink == 'account_settings'}" @click="openAccountSettings()" href="#">Account Setting</a> -->
                <a class="nav-link list-group-item list-group-item-action"
                  :class="{active: activeLink == 'account_settings'}" @click="activeLink = 'account_settings'" href="#">
                  <span class="f-w-500">إعدادت الحساب </span> <span
                    class="float-start"></span> </a>
                <a class="nav-link list-group-item list-group-item-action"
                  :class="{active: activeLink == 'verify_user'}" @click="activeLink = 'verify_user'" href="#">
                  <span class="f-w-500"><i class="feather icon-disc m-r-10 h5 "></i>تحقق الهوية </span> <span
                    class="float-start"><i class="fa fa-check-circle text-success fa-x" ></i></span> </a>
                <!-- <a class="nav-link list-group-item list-group-item-action active" id="user-edit-account-tab" data-toggle="pill" href="#user-edit-account" role="tab" aria-controls="user-edit-account" aria-selected="true"> <span class="f-w-500"><i class="feather icon-user m-r-10 h5 "></i>معلومات شخصية </span> <span class="float-start"><i class="feather icon-chevron-right"></i></span> </a> -->
                
                <a v-if="user?.membership_type != 'user'" class="nav-link list-group-item list-group-item-action  d-flex justify-content-between"
                  :class="{active: activeLink == 'commercial'}" @click="activeLink = 'commercial'" href="#"> <span
                    class="f-w-500"><i class="feather icon-image m-r-10 h5 ">
                    </i>السجلات التجارية </span> <span class="float-start">
                      <i class="fa fa-times-circle text-danger fa-x" data-v-2a94f58a=""></i>
                    <p v-if="commercial_status != 'unset'" class="p-0 m-0" :class="{'text-danger': commercial_status == 'end', 'text-success': commercial_status == 'active', 'text-white': activeLink == 'commercial'}" v-text="commercial_status == 'active' ? 'نشيط' : 'منتهي'"></p>

                  </span> </a>

                <!-- license-->
                <a v-if="user?.membership_type != 'user'" class="nav-link list-group-item list-group-item-action d-flex justify-content-between"
                  :class="{active: activeLink == 'license'}" @click="activeLink = 'license'" href="#"> <span
                    class="f-w-500"><i class="feather icon-image m-r-10 h5 "></i>الرخصة المهنية </span>
                  <span class="float-start">
                    
                    <p v-if="license_status != 'unset'" class="p-0 m-0" :class="{'text-danger': license_status == 'end', 'text-success': license_status == 'active', 'text-white': activeLink == 'license'}" v-text="license_status == 'active' ? 'نشيط' : 'منتهي'"></p>
                    <i class="feather icon-chevron-right">
                    </i></span> </a>
                
                <!-- qualification -->
                <a v-if="user?.membership_type != 'user'" class="nav-link list-group-item list-group-item-action"
                  :class="{active: activeLink == 'qualification'}" @click="activeLink = 'qualification'" href="#"> <span
                    class="f-w-500"><i class="feather icon-image m-r-10 h5 "></i>المؤهلات </span> <span
                    class="float-start"><i class="fa fa-check-circle text-success fa-x" ></i></span> </a>
                
                <!-- experience -->
                <a v-if="user?.membership_type != 'user'" class="nav-link list-group-item list-group-item-action" :class="{active: activeLink == 'experience'}"
                  @click="activeLink = 'experience'" href="#"> <span class="f-w-500"><i
                      class="feather icon-image m-r-10 h5 "></i>الخبرات </span> <span class="float-start">
                        <i class="fa fa-times-circle text-danger fa-x" data-v-2a94f58a=""></i></span> </a>

                <!-- change password                -->
                <a class="nav-link list-group-item list-group-item-action"
                  :class="{active: activeLink == 'change_password'}" @click="activeLink = 'change_password'" href="#">
                  <span class="f-w-500"><i class="feather icon-shield m-r-10 h5 "></i>تغيير كلمة المرور </span> <span
                    class="float-start"><i class="feather icon-chevron-right"></i></span> </a>
              </div>
            </div>
          </div>
          <!-- @yield('content') -->
          <div class="col-12 col-md-8">
            
            <!-- Start Account Settings -->




            <!-- End Account Settings -->
            
            <div v-if="loading" class="w-100 h-100 d-flex justify-content-center align-items-center">
              <div class="spinner-border spinner-secondary" role="status">
              </div>
            </div>

            <!-- Start License  -->
            <profile-personal :user="user" :subscribtion_end="subscribtion_end" :countries="countries" :cities="cities" v-if="!loading && activeLink == 'account_settings'" @refersh="handleRefresh"></profile-personal>
            <profile-license :user_id="user?.id" :license="license" :license_status="license_status"  :specialties="specialties" v-if="!loading && activeLink == 'license'" @refersh="handleRefresh"></profile-license>
            <profile-commercial :user_id="user?.id" :commercial="commercial" :commercial_status="commercial_status"  :specialties="specialties" v-if="!loading && activeLink == 'commercial'" @refersh="handleRefresh"></profile-commercial>
            <profile-experience :user_id="user?.id" :experience="experience" :specialties="specialties" v-if="!loading && activeLink == 'experience'" @refersh="handleRefresh"></profile-experience>
            <profile-qualification :user_id="user?.id" :qualification="qualification" :specialties="specialties" v-if="!loading && activeLink == 'qualification'" @refersh="handleRefresh"></profile-qualification>
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
        userId : '' ,
        experience: null,
        qualification: null,
        loading: false,
        errors: null,
        base_url: base_url,
        cloud_url: cloud_url,
        avatar : null ,
        file : null ,
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
            this.userId = response.data.user.id ;
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
            if(this.activeLink == '') {
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


      GetImage(e){
          this.file = e.target.files[0];
          let image = e.target.files[0] ;
          let reader = new FileReader();
          reader.readAsDataURL(image);
          reader.onload = e => {
            this.avatar = e.target.result
          }
      } ,

      updateProfileImage (){
        // console.log(this.user);
        let formData2 = new FormData();
        formData2.append("photo_profile", this.file);
        formData2.append("_method", 'put');
        
        api
          .post("v1/users/" + this.userId , formData2)
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


<style scoped>
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #048e81;
    border-color: #048e81;
}
.nav-pills .nav-link.active .text-success, .nav-pills .nav-link.active .text-danger {
  color:#FFF !important
}
</style>