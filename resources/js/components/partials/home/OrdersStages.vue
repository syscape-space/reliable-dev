<template>
    <section class="py-5" style="background-color: #EEEEEE;">
      <div class="container">
        <h3 class="text-center ">{{ $root._t("app.knowOrdersPhases") }}</h3>
        <div class="mb-5">
          <h6 class="text-center my-2" style="color: #048e81">
            {{ $root._t("app.shortText") }}
          </h6>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button
                class="accordion-button py-4 gr-c"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseOne"
                aria-expanded="true"
                aria-controls="collapseOne"
              >
                {{ $root._t("app.differentBetweenAgancyAndElectronicAgency") }}
              </button>
            </h2>
            <div
              id="collapseOne"
              class="accordion-collapse collapse show"
              aria-labelledby="headingOne"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                {{ $root._t("app.longText") }}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button
                class="accordion-button py-4 gr-c collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
              >
                {{ $root._t("app.differentBetweenAgancyAndElectronicAgency") }}
              </button>
            </h2>
            <div
              id="collapseTwo"
              class="accordion-collapse collapse"
              aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                {{ $root._t("app.longText") }}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button
                class="accordion-button py-4 gr-c collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
              >
                {{ $root._t("app.differentBetweenAgancyAndElectronicAgency") }}
              </button>
            </h2>
            <div
              id="collapseThree"
              class="accordion-collapse collapse"
              aria-labelledby="headingThree"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                {{ $root._t("app.longText") }}
              </div>
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
    
  },
  methods: {
  },
};
</script>