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
                          :src="base_url + '/storage/' + image"
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
                      <span class="text-center"> {{ username }} </span> <br />
                      <span
                        style="color: #0995eb"
                        class=" d-inline-block text-center"
                        >{{ $root._t("app.countries") }}
                      </span><br>
                      <span
                        style="color: #2b7b74"
                        class="mb-2 d-inline-block text-center"
                        >{{ $root._t("app.attorneyGeneral") }}
                      </span> <br>
                      <span
                        style="color: #ff584d"
                        class="mb-2 d-inline-block text-center"
                        >
                        <img style="width: 17px;vertical-align: middle;" :src="base_url + '/assets/images/prof-heart.svg'" alt="">
                        <span>455</span>
                      </span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url + '/assets/images/prof-help.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #048e81"
                        class="fw-bold"
                        >{{ $root._t("app.aboutMe") }}</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url + '/assets/images/prof-case.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #363848"
                        class="fw-bold"
                        >{{ $root._t("app.works") }}</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url + '/assets/images/prof-star.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #363848"
                        class="fw-bold"
                        >{{ $root._t("app.evaluations") }}</span
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
                      {{ $root._t("app.hiring") }}
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
              <UnderNavbar/>
              <div class="btw-flex p-3 mt-3 rounded f-14" style="    background-image: linear-gradient(to bottom, #FF584D20, #802C2710);">
                <span>{{ $root._t("app.portFilteringForOthers") }}</span>
                <div>
                  <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                   </div>
                </div>
              </div>
              <div class="btw-flex p-3 mt-3 rounded f-14" style="    background-image: linear-gradient(to bottom, #FF584D20, #802C2710);">
                <span>{{ $root._t("app.portFilteringForOthers") }}</span>
                <div>
                  <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                   </div>
                </div>
              </div>
              <div class="btw-flex p-3 mt-3 rounded f-14" style="    background-image: linear-gradient(to bottom, #FF584D20, #802C2710);">
                <span>{{ $root._t("app.portFilteringForOthers") }}</span>
                <div>
                  <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                   </div>
                </div>
              </div>
              <div class="btw-flex p-3 mt-3 rounded f-14" style="    background-image: linear-gradient(to bottom, #FF584D20, #802C2710);">
                <span>{{ $root._t("app.portFilteringForOthers") }}</span>
                <div>
                  <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                   </div>
                </div>
              </div>
              <div class="btw-flex p-3 mt-3 rounded f-14" style="    background-image: linear-gradient(to bottom, #FF584D20, #802C2710);">
                <span>{{ $root._t("app.portFilteringForOthers") }}</span>
                <div>
                  <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                   </div>
                </div>
              </div>
              <div class="p-3 mt-3" style="background-color: #F9F9F9;">
                
                <div class="row w-100 mx-0 px-0 ">
                  <div class="col-md-3   text-center d-flex align-items-center justify-content-center" style="border-left: 3px solid #ddd;">
                    <img style="width: 50px;" :src="base_url + '/assets/images/user.svg'" alt="">
                  </div>
                  <div class="col-md-9">
                    <p class="py-0 f-12">
                      {{ $root._t("app.longText") }}
                    </p>
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
import UnderNavbar from '../Orders/underNavbar.vue' ;
import api from "../../utils/api";
export default {
  mounted(){
    this.getProfile2();
  },
  data(){
    return{
      base_url:base_url ,
      username : "" ,
      image : null ,
    };
  },
  components : {UnderNavbar} ,
  methods:{
    getProfile2(){
      let userId = localStorage.getItem("uId");
      let mainRoute = "http://localhost/reliable/public/api/v1/vendor_profile/" + userId ;
      api
        .get(mainRoute)
        .then((response) => {
          this.username = response.data.userData[0].name ;
          this.image = response.data.userData[0].photo_profile ;
          console.log(response.data.userData[0]);
        })
        // error.response.data.errors
        .catch((e) => {
          // this.errors = e.response.data.errors;
          console.log(e.response.data.errors);
        });
    }
  }
}
</script>
<style scoped>

</style>