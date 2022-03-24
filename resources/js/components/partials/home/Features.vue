<template>
    <section class="position-relative ">
      <img class="h2-it" :src="base_url+'/public/assets/images/h2.png'" alt="">
      <div class="container">
        <h3 class="text-center mb-5">{{ $root._t("app.whyChoosignMawthoq") }}</h3>
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-4 mb-4">
            <div class="d-sec">
              <img style="width: 50px" :src="base_url+'/public/assets/images/s1.svg'" alt="" />
              <h5 style="color: #048e81" class="mb-2 mt-3">{{ $root._t("app.security") }}</h5>
              <p style="font-size: 14px">
                {{ $root._t("app.longText") }}
              </p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-sec">
              <img style="width: 50px" :src="base_url+'/public/assets/images/s2.svg'" alt="" />
              <h5 style="color: #048e81" class="mb-2 mt-3">{{ $root._t("app.easyToUse") }}</h5>
              <p style="font-size: 14px">
                {{ $root._t("app.longText") }}
              </p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-sec">
              <img style="width: 50px" :src="base_url+'/public/assets/images/s3.svg'" alt="" />
              <h5 style="color: #048e81" class="mb-2 mt-3">{{ $root._t("app.GuaranteeAllParties") }}</h5>
              <p style="font-size: 14px">
                {{ $root._t("app.longText") }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
  export  default {
    name:"Features",
    data(){
      return{
        base_url:base_url
      };
    },
  }
</script>