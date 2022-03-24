<template>
    <section class="mt-5 position-relative ">
      <img class="h1-it" :src="base_url+'/public/assets/images/h1.png'" alt="">
      <div class="container py-5">
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-6">
            <h6>{{ $root._t("app.howItWork") }}</h6>
            <h3 style="max-width: 500px" class="mb-5">
              {{ $root._t("app.subscribeNowAdvice") }}
            </h3>
            <div class="d-flex mb-3 pos-rel">
              <span class="number ms-4"> {{ $root._t("app.one") }} </span>
              <div>
                <h5 class="add-order-gr">{{ $root._t("app.addYourRequest") }}</h5>
                <p style="font-size: 12px">
                  {{ $root._t("app.longText") }}
                </p>
              </div>
            </div>
            <div class="d-flex mb-3 pos-rel">
              <span class="number ms-4"> {{ $root._t("app.two") }} </span>
              <div>
                <h5 class="add-order-gr">{{ $root._t("app.addYourRequest") }}</h5>
                <p style="font-size: 12px">{{ $root._t("app.chooseYourOffer") }}</p>
              </div>
            </div>
            <div class="d-flex mb-3 pos-rel">
              <span class="number ms-4"> {{ $root._t("app.three") }} </span>
              <div>
                <h5 class="add-order-gr">{{ $root._t("app.DiscussAdvisorsAndExperts") }}</h5>
                <p style="font-size: 12px">
                  {{ $root._t("app.longText") }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 text-start">
            <img 
                class="w-100"
                style="max-width: 60px;" :src="base_url+'/public/assets/images/circleElement.svg'" alt="">
            <iframe
              class="w-100"
              height="315"
              src="https://www.youtube.com/embed/Aq8IXh67hdE"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
  name:"HotItWork",
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>