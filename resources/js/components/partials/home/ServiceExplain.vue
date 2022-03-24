<template>
    <section>
      <div class="container py-5">
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-4 mb-3">
            <div class="gr-c mb-3">
              <img style="width: 25px" :src="base_url+'/public/assets/images/green-gavel.svg'" alt="" />
              <span>{{ $root._t("app.execution") }}</span>
            </div>
            <div>
              <h6> {{ $root._t("app.requestToIssueCustodyOrder") }} </h6>
              <p class="f-12">
                {{ $root._t("app.longText") }}
              </p>
              <a href="" class="mt-5 bl-c">
                <small>
                  <span class="ms-2">{{ $root._t("app.serviceExplain") }}</span
                  ><span>
                    <img
                      style="margin-left: 6px; width: 20px"
                      :src="base_url+'/public/assets/images/green-arrow.svg'"
                      alt="" /></span
                ></small>
              </a>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="gr-c mb-3">
              <img style="width: 25px" :src="base_url+'/public/assets/images/green-gavel.svg'" alt="" />
              <span>{{ $root._t("app.execution") }}</span>
            </div>
            <div>
              <h6>{{ $root._t("app.requestToIssueCustodyOrder") }}</h6>
              <p class="f-12">
                {{ $root._t("app.longText") }}
              </p>
              <a href="" class="mt-5 bl-c">
                <small>
                  <span class="ms-2">{{ $root._t("app.serviceExplain") }}</span
                  ><span>
                    <img
                      style="margin-left: 6px; width: 20px"
                      :src="base_url+'/public/assets/images/green-arrow.svg'"
                      alt="" /></span
                ></small>
              </a>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="gr-c mb-3">
              <img style="width: 25px" :src="base_url+'/public/assets/images/green-gavel.svg'" alt="" />
              <span>{{ $root._t("app.execution") }}</span>
            </div>
            <div>
              <h6>{{ $root._t("app.requestToIssueCustodyOrder") }}</h6>
              <p class="f-12">
                {{ $root._t("app.longText") }}
              </p>
              <a href="" class="mt-5 bl-c">
                <small>
                  <span class="ms-2">{{ $root._t("app.serviceExplain") }}</span
                  ><span>
                    <img
                      style="margin-left: 6px; width: 20px"
                      :src="base_url+'/public/assets/images/green-arrow.svg'"
                      alt="" /></span
                ></small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>

<style scoped>

</style>