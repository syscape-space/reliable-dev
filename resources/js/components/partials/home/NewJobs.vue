<template>
    <section class="py-5 position-relative" id="newJobsDiv">
      
      <img class="h2-it" :src="base_url+'/assets/images/h2.png'" alt="">
      <div class="container">
        <div class="text-start">
          <img style="max-width: 50px;" 
             class="w-100" :src="base_url+'/assets/images/green-circleElement.svg'" alt="">
        </div>
        <h3 class="text-center mt-5">الوظائف الحديثة</h3>
        <h6 class="text-center my-2" style="color: #048e81">
          يطرح اخر الوظائف المتاحة
        </h6>
        <div class="mt-5">
          <div id="slider2" class="owl-carousel owl-theme" style="display: flex;">

            <div style="min-width: 250px" class="jobs" v-for="item in list" :key="item.id">
              <div class="text-end">
                <i
                  style="color: rgb(175, 175, 175)"
                  class="fas fa-ellipsis-h"
                ></i>
              </div>
              <div class="text-center mb-2">
                <img
                  style="width: 70px; margin-top: -20px; margin: auto"
                  :src="base_url+'/assets/images/work.svg'"
                  alt=""
                />
              </div>
              <div class="text-center">
                <h6 class="text-center"> {{ item.qualification }}} </h6>
                <h6 class="text-center" style="color: #048e81">
                  <small>دوام كامل</small>
                </h6>
                <div>
                  <button class="offer-btn">قدم عرضك الان</button>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="text-center">
          <button
            class="offer-btn mt-3"
            style="color: #ffffff; background-color: #048e81"
          >
            اكتشف كل الوظائف
          </button>
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
        .get("/careers")
        .then((response) => {
          console.log(response.data.data);
          this.list = response.data.data.data ;
          if( this.list.length === 0 ){
            document.getElementById('newJobsDiv').style.display = "none";
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