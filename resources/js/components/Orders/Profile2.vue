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
                          :src="base_url + '/assets/images/user.svg'"
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
                      <span class="text-center">محمد مصطفي</span> <br />
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
              <div class="row w-100 mx-0 p-3 my-3 rounded" style="background-color: #f5f5f5b0;">
                <h5>{{ $root._t("app.aboutMe") }}:</h5>
                <p class="f-12 py-3">{{ $root._t("app.longText") }}</p>
              </div>
              <div class="row w-100 mx-0 p-3 my-3 rounded" style="background-color: #f5f5f5b0;">
                <h5>{{ $root._t("app.Specialties") }}:</h5>
                <div class="row w-100 mx-0 px-0">
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
                    </span>
                  </div>
                  <div class="col-md-3 mb-2">
                    <span class="o-box text-center  ms-2 f-14 p-2 w-100">
                      <span>{{ $root._t("app.specialty") }} 1</span>
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
import UnderNavbar from '../Orders/underNavbar.vue' ;
export default {
  data(){
    return{
      base_url:base_url 
    };
  },
  components : {UnderNavbar}
}
</script>
<style scoped>

</style>