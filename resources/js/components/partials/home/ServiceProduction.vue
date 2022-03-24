<template>
     <section class="py-5 position-relative" id="serviceProductionID">
       <img class="h1-it" :src="base_url+'/assets/images/h1.png'" alt="">
      <div class="container">
        <h3 class="text-center mt-5">{{ $root._t("app.serviceProducers") }}</h3>
        <h6 class="text-center my-2" style="color: #048e81">
          {{ $root._t("app.bestServiceProduceThisWeek") }}
        </h6>
        <div class="mt-5">
          <div class="d-flex align-items-center justify-content-between">
            <h4>{{ $root._t("app.serviceProducers") }}</h4>
            <router-link :to="{name:'Users'}" style="color: #0995eb">{{ $root._t("app.descoverServiceProducers") }}</router-link>
          </div>
        </div>
        <div class="mt-5">
          <div>
            <div id="slider" class="owl-carousel owl-theme"  style="display: flex;">
              <div style="min-width: 250px;margin-left: 24px;" class="user-ab" v-for="item in list" :key="item.id">
                <div class="d-flex">
                  <span
                    class="position-relative ms-2"
                    style="display: inline-block"
                  >
                    <img style="width: 50px;
    opacity: 1;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;" :src="base_url + '/storage/' +  item.photo_profile  " alt="" />
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                  <span>
                    <span class="d-block"> {{ item.name }} </span>
                    <span style="white-space: nowrap; text-overflow: ellipsis; width: 166px; display: inline-block; overflow: hidden;"><small> {{ item.bio }} </small></span>
                  </span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px;margin-top: -17px;">
                    <span>{{ $root._t("app.foutPointThree") }}</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                  <span style="margin-top: 17px;">
                    <button class="order-btn">{{ $root._t("app.serviceRequest") }}</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../../utils/api";
export  default {
  data(){
    return{
      base_url:base_url ,
      list : []
    };
  },
  mounted() {

    this.getAllServiceProduction();
  },
  methods: {
    getAllServiceProduction(){
      api
        .get("v2/vendors")
        .then((response) => {
          console.log(response.data.data);
          this.list = response.data.data.data ;
          if( this.list.length === 0 ){
            document.getElementById('serviceProductionID').style.display = "none";
          }
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
