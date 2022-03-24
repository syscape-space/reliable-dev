<template>
  <section style="background-color: #EEEEEE;" class="position-relative">
    <div class="row w-100 mx-0 px-0" style="min-height: 400px;">
      <div class="col-md-6 h-100">
        <img class="w-100 h-100 "
             style="object-fit: cover;"
             :src="base_url+'/public/assets/images/apps.png'" alt="">
      </div>
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="pd-10 text-center">
          <h2 class=" gr-c my-3">{{ $root._t("app.mawthoqApp") }}</h2>
          <p class="gr-c pb-5">{{ $root._t("app.shortText") }}</p>
          <div class="pt-5 my-5">
            <a href="" class="mx-2">
              <img style="width: 150px;" :src="base_url+'/public/assets/images/google.svg'" alt="">
            </a>
            <a href="" class="mx-2">
              <img style="width: 150px;" :src="base_url+'/public/assets/images/apple.svg'" alt="">
            </a>

          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export  default {
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>