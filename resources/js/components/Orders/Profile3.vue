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
                          :src="base_url+'/assets/images/user.svg'"
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
                        <img style="width: 17px;vertical-align: middle;" :src="base_url+'/assets/images/prof-heart.svg'" alt="">
                        <span>455</span>
                      </span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url+'/assets/images/prof-help.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #048e81"
                        class="fw-bold"
                        >{{ $root._t("app.aboutMe") }}</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url+'/assets/images/prof-case.svg'" alt="">
                      </span>
                      <span
                        style="margin-right: 15px; color: #363848"
                        class="fw-bold"
                        >{{ $root._t("app.works") }}</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 15px" class="d-inline-block">
                        <img :src="base_url+'/assets/images/prof-star.svg'" alt="">
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
              <div class="p-3 mt-3" style="background-color: #F9F9F9;">
                <div class="">
                  <div class="mb-2 text-start" style="font-size: 12px;">
                    <span class="ms-3">
                      <img style="width: 15px;" class="ms-1" :src="base_url+'/assets/images/o_clock.svg'" alt=""> <span>{{ $root._t("app.ago") }} 4 {{ $root._t("app.hours") }}</span>
                    </span>
                    <span class="ms-3">
                      <img style="width: 20px;" class="ms-1" :src="base_url+'/assets/images/o_eye.svg'" alt=""> <span>{{ $root._t("app.count") }} 5 {{ $root._t("app.works") }}</span>
                    </span>
                    <span class="ms-3">
                      <img style="width: 20px;" class="ms-1" :src="base_url+'/assets/images/o_offer.svg'" alt=""> <span>{{ $root._t("app.produce5Offers") }}</span>
                    </span>
                    <span class="ms-3">
                      <img style="width: 14px;" class="ms-1" :src="base_url+'/assets/images/o_map.svg'" alt=""> <span>{{ $root._t("app.saudiAribia") }}</span>
                    </span>
                    <span class="my-2" style="font-size: 12px;">
                      <span class="o-box ms-2">
                        <img style="width: 15px;" class="ms-1" :src="base_url+'/assets/images/o_delever.svg'" alt="">
                        <span>{{ $root._t("app.deliveryTime") }}:</span>
                        <span class="me-2">14 {{ $root._t("app.day") }}</span>
                      </span>
                      <span>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                   </span>
                  </div>
                  
                    
                </div>
                <div class="row w-100 mx-0 px-0 ">
                  <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                    <div  style="border-left: 3px solid #ddd;" class="px-3">
                      <img style="width: 70px;" :src="base_url+'/assets/images/user.svg'" alt="">
                    <div>
                      <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      </div>
                      <div>
                        <span style="color: #2b7b74" class="mb-2 d-inline-block text-center"> {{ $root._t("app.attorneyGeneral") }}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <h6 style="color: #048E81;">{{ $root._t("app.requestAddressHere") }}</h6>
                    <p class="pb-3 f-12">
                      {{ $root._t("app.longText") }}
                    </p>
                    <div class="mt-3 btw-flex">
                      <div>
                        
                      </div>
                      <div class="text-center">
                        <button style="
                        border: 0;
                        background-color: #048e81;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                        height: 40px;
                        " class="rounded">
                          {{ $root._t("app.dealNow") }}
                        </button>
                      </div>
                      <div class="text-center">
                        <button style="
                        border: 0;
                        background-color: #ff584d;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                        height: 40px;
                        " class="rounded">
                          {{ $root._t("app.expired") }}
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-3 mt-3" style="background-color: #F9F9F9;">
                <div class="">
                  <div class="mb-2 text-start" style="font-size: 12px;">
                    <span class="ms-3">
                      <img style="width: 15px;" class="ms-1" :src="base_url+'/assets/images/o_clock.svg'" alt=""> <span>{{ $root._t("app.ago") }} 4 {{ $root._t("app.hours") }}</span>
                    </span>
                    <span class="ms-3">
                      <img style="width: 20px;" class="ms-1" :src="base_url+'/assets/images/o_eye.svg'" alt=""> <span>{{ $root._t("app.count") }} 5 {{ $root._t("app.works") }}</span>
                    </span>
                    <span class="ms-3">
                      <img style="width: 20px;" class="ms-1" :src="base_url+'/assets/images/o_offer.svg'" alt=""> <span>{{ $root._t("app.produce5Offers") }}</span>
                    </span>
                    <span class="ms-3">
                      <img style="width: 14px;" class="ms-1" :src="base_url+'/assets/images/o_map.svg'" alt=""> <span>{{ $root._t("app.saudiAribia") }}</span>
                    </span>
                    <span class="my-2" style="font-size: 12px;">
                      <span class="o-box ms-2">
                        <img style="width: 15px;" class="ms-1" :src="base_url+'/assets/images/o_delever.svg'" alt="">
                        <span>{{ $root._t("app.deliveryTime") }}:</span>
                        <span class="me-2">14 {{ $root._t("app.day") }}</span>
                      </span>
                      <span>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                   </span>
                  </div>
                  
                    
                </div>
                <div class="row w-100 mx-0 px-0 ">
                  <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                    <div  style="border-left: 3px solid #ddd;" class="px-3">
                      <img style="width: 70px;" :src="base_url+'/assets/images/user.svg'" alt="">
                    <div>
                      <div class="text-center">
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      </div>
                      <div>
                        <span style="color: #2b7b74" class="mb-2 d-inline-block text-center">{{ $root._t("app.attorneyGeneral") }}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <h6 style="color: #048E81;">{{ $root._t("app.requestAddressHere") }}</h6>
                    <p class="pb-3 f-12">
                      {{ $root._t("app.longText") }}
                    </p>
                    <div class="mt-3 btw-flex">
                      <div>
                        
                      </div>
                      <div class="text-center">
                        <button style="
                        border: 0;
                        background-color: #048e81;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                        height: 40px;
                        " class="rounded">
                          {{ $root._t("app.dealNow") }}
                        </button>
                      </div>
                      <div class="text-center">
                        <button style="
                        border: 0;
                        background-color: #ff584d;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                        height: 40px;
                        " class="rounded">
                          {{ $root._t("app.expired") }}
                        </button>
                      </div>
                    </div>
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