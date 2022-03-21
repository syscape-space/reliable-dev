<template>
    <section class="py-5 position-relative " id="servicesDiv">
      <img class="h1-it" :src="base_url+'/assets/images/h1.png'" alt="">
      <div class="container">
        <div class="text-start">
          <img style="max-width: 50px;" 
             class="w-100" :src="base_url+'/assets/images/green-circleElement.svg'" alt="">
        </div>
        <h3 class="text-center mt-5">{{ $root._t("app.mawthoqServices") }}</h3>
        <div class=" ">
          <h6 class="text-center my-2" style="color: #048e81">
            {{ $root._t("app.shortText") }}
          </h6>
          <a
            href=""
            class="text-dark d-flex align-items-center justify-content-end sev-top"
          >
            <span> {{ $root._t("app.surfAllServices") }} </span>
            <span>
              <img
                class="me-2"
                style="width: 20px"
                :src="base_url+'/assets/images/blue-arrow.svg'"
                alt=""
              />
            </span>
          </a>
        </div>
        
        <div class="mt-5">
          <div
            class="d-flex align-items-center justify-content-center flex-wrap"
          >
            <a href="#" class="our-sev active" v-for="item in list" :key="item.id">
              <div class="w-100">
                <img style="width: 20px" :src="base_url+'/assets/images/tan.svg'" alt="" />
                <span> {{item.title  }} </span>
              </div>
            </a>
          </div>
        </div>
        <div class="text-end">
          <img style="max-width: 50px;" 
             class="w-100" :src="base_url+'/assets/images/green-circleElement.svg'" alt="">
        </div>
      </div>
    </section>
</template>

<script>
import api from "../../../utils/api";

export default {
  data(){
    return{
      list : [] ,
      base_url:base_url
    }
  },
  mounted() {
    this.allOurServices();
  },
  methods: {
    allOurServices() {
      api
        .get("v2/our-services")
        .then((response) => {
          console.log(response.data.data);
          this.list = response.data.data ;
          if( this.list.length === 0 ){
            document.getElementById('servicesDiv').style.display = "none";
          }
        })
        // error.response.data.errors
        .catch((e) => {
          // this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
  },
};
</script>