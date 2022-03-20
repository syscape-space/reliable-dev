<template>
    <section class="py-5 position-relative" id="partnersDiv">
      <img class="h2-it" :src="base_url+'/assets/images/h2.png'" alt="">
      <div class="container py-5">
        <h3 class="text-center ">{{ $root._t("app.mawthoqPartners") }}</h3>
        <div class="mb-5 pb-3">
          <h6 class="text-center my-2" style="color: #048e81">
            {{ $root._t("app.shortText") }}
          </h6>
        </div>
        <div>
          <div id="slider3" class="owl-carousel owl-theme"  style="display: flex;">
            <div class="images-slider-ss text-center" v-for="item in list" :key="item.id">
              <img style="width: 150px; margin-bottom:12px" :src="base_url + '/partners/' +  item.logo" alt="">
              <h5>{{ item.name }}</h5>
            </div>
          </div>
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
    this.allJobs();
  },
  methods: {
    allJobs() {
      api
        .get("https://law-mawthuq.com/reliable/public/api/v2/partners")
        .then((response) => {
          console.log(response.data.data);
          this.list = response.data.data.data ;
          if( this.list.length === 0 ){
            document.getElementById('partnersDiv').style.display = "none";
          }
        })
        // error.response.data.errors
        .catch((e) => {
          // this.errors = e.response.data.errors;
          console.log(e.response.data.errors);
        });
    },
  },
};
</script>