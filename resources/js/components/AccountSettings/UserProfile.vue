<template>  
    <section class="container mt-2">
      <div class="personal">
        <div class="personal-info">
          <div class="row w-100 mt-4 mx-0 px-0" >
            <div class="col-lg-3">
              <div>
                <div
                  class="bg-users f-14 p-3 text-center"
                  style="
                      background-image: linear-gradient( to bottom, #2b7b7414, #163e3a1f );
                      border-radius: 8px;
                      background-color: transparent;
                  "
                >
                  <ul class="list-unstyled px-0 f-12 text-end mt-4 mb-0">
                    <li class="mb-3 mt-4 text-center">
                      <div class="text-center mb-2">
                        <img
                          style="width: 60px; height: 60px"
                          class="uses-img"
                          :src="cloud_url+ userProfile.photo_profile"
                          alt=""
                        />
                      </div>
                      <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <span class="text-center"> {{ userProfile.name }} </span> <br />
                      <span
                        style="color: #0995eb"
                        class=" d-inline-block text-center"
                        >{{ country_name }}
                      </span><br>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url+'/assets/images/prof-help.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #048e81"
                        class="fw-bold"
                        >نبذه عني</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url+'/assets/images/prof-case.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #363848"
                        class="fw-bold"
                        >الاعمال</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url+'/assets/images/prof-star.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #363848"
                        class="fw-bold"
                        >التقييمات</span
                      >
                    </li>
                 
                    <li class="text-center">
                      <button
                        style="
                          background-image: linear-gradient(to bottom right, #048E81, #0995EB);
                          color: #fff;
                          font-size: 12px;
                          padding: 15px 40px;
                        "
                        class="border-0 rounded fw-bold w-100"
                      >
                      توظيف
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="row w-100 mx-0 p-3 rounded" style="background-image: linear-gradient( to bottom, #2b7b7414, #163e3a1f );">
                  <div class="col-md-4">
                      <ul class="list-unstyled px-0 mb-0 f-14">
                        <li class="mb-2">
                          <span  class="ms-3 d-inline-block" style="min-width: 108px;">التقييمات المقدمة:</span>
                          <span style="color: #E1AF1A;">25 <i class="fas fa-star"></i> </span>
                        </li>
                        <li class="mb-2">
                          <span  class="ms-3 d-inline-block" style="min-width: 108px;">حالة التواجد الان:</span>
                          <span style="color: #048E81;"><span class="green-circle ms-2"></span> متصل  </span>
                        </li>
                        <li class="mb-2">
                          <span  class="ms-3 d-inline-block" style="min-width: 108px;">منفذ علي موثوق:</span> 
                          <span style="color: #048E81;"> منذ سنتين </span>
                        </li>
                      </ul>
                  </div>
                  <div class="col-md-4">
                    <span class="m-2 badge-link ">
                      <img :src="base_url+'/assets/images/prof-badge1.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url+'/assets/images/prof-badge2.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url+'/assets/images/prof-badge3.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url+'/assets/images/prof-badge4.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url+'/assets/images/prof-badge5.svg'" alt="">
                    </span>
                   
                  </div>
                  <div class="col-md-4 px-0">
                    <div class="d-flex w-100 align-items-center">
                        <div class="prof-mawthoq ">
                           عضويه مكتب
                        </div>
                        <div class="prof-mawthoq  text-center flex-column justify-content-end"
                          style="background-color: #C9FFE1;">
                          <div class="text-center w-100">
                            <img :src="base_url+'/assets/images/prf-verf.svg'" alt=""> 
                          </div>
                          <div class="w-100" style="color: #26A25C;">
                            حساب موثوق
                          </div>
                        </div>
                        <div class="f-12 bg-white px-2 flex-grow-1 py-4" style="border-radius: 11px;">
                          <div >
                            الملف الشخصي
                          </div>
                          <div style="color: #048E81;">
                            مكتمل بنسبة
                          </div>
                          <div class="progress mt-3" style="height: 3px;direction: ltr;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="row w-100 mx-0 p-3 my-3 rounded" style="background-color: #f5f5f5b0;">
                <h5>نبذه عني:</h5>
                <p class="f-12 py-3">لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت </p>
              </div>
              <div class="row w-100 mx-0 p-3 my-3 rounded" style="background-color: #f5f5f5b0;">
                <h5>تخصصات:</h5>
                <div class="row w-100 mx-0 px-0">
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>تخصص ١</span>
                    </span>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    
</template>

<script>
import Navbar from '../../components/partials/LayoutNavBar.vue'
import api from "../../utils/api";

export default {
  components : { Navbar } ,
  mounted(){
      this.getThisUserData();
      this.gettingCountry();
  },
  data() {
    return {
      base_url : base_url ,
      cloud_url : cloud_url ,
      userCountryId : '' ,
      userProfile : [] ,
      country_name : '' ,
    };
  },
  methods:{
    getThisUserData(){
        let thisUserId = localStorage.getItem("userProfileId");
        api
          .get("/v1/users/" + thisUserId)
          .then((response) => {
              this.userProfile = response.data.data ;
              this.userCountryId = response.data.data.country_id  ;
              this.gettingCountry(this.userCountryId);
              console.log(response.data.data);
          })
          .catch((e) => {
              console.log(e.response);
          });
    },
    gettingCountry(country_id){
        api
          .get("/v1/countries/" + country_id)
          .then((response) => {
              // this.userProfile = response.data.data ;
              // this.userCountryId = response.data.data.country_id  ;
              // this.gettingCountry(this.userCountryId);
              this.country_name = response.data.data.country_name_ar ;
              console.log(response.data.data);
          })
          .catch((e) => {
              console.log(e.response);
          });
    }
  }
}
</script>