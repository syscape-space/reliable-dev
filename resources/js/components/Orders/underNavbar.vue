<template>
              <div class="row w-100 mx-0 p-3 rounded" style="background-image: linear-gradient( to bottom, #2b7b7414, #163e3a1f );">
                  <div class="col-md-4">
                      <ul class="list-unstyled px-0 mb-0 f-14">
                        <li class="mb-2">
                          <span  class="ms-3 d-inline-block" style="min-width: 108px;">{{ $root._t("app.submittedReviews") }}:</span>
                          <span style="color: #E1AF1A;">25 <i class="fas fa-star"></i> </span>
                        </li>
                        <li class="mb-2">
                          <span  class="ms-3 d-inline-block" style="min-width: 108px;">{{ $root._t("app.availabilityNow") }}:</span>
                          <span style="color: #048E81;"><span class="green-circle ms-2"></span> {{ $root._t("app.connect") }}  </span>
                        </li>
                        <li class="mb-2">
                          <span  class="ms-3 d-inline-block" style="min-width: 108px;">{{ $root._t("app.executed") }}:</span> 
                          <span style="color: #048E81;">  {{ $root._t("app.twoYears") }} </span>
                        </li>
                      </ul>
                  </div>
                  <div class="col-md-4">
                    <span class="m-2 badge-link ">
                      <img :src="base_url + '/assets/images/prof-badge1.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url + '/assets/images/prof-badge2.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url + '/assets/images/prof-badge3.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url + '/assets/images/prof-badge4.svg'" alt="">
                    </span>
                    <span class="m-2 badge-link ">
                      <img :src="base_url + '/assets/images/prof-badge5.svg'" alt="">
                    </span>
                   
                  </div>
                  <div class="col-md-4 px-0">
                    <div class="d-flex w-100 align-items-center">
                        <div class="prof-mawthoq ">
                           {{ $root._t("app.officeMembership") }}
                        </div>
                        <div class="prof-mawthoq  text-center flex-column justify-content-end"
                          style="background-color: #C9FFE1;">
                          <div class="text-center w-100">
                            <img :src="base_url + '/assets/images/prf-verf.svg'" alt=""> 
                          </div>
                          <div class="w-100" style="color: #26A25C;">
                            {{ $root._t("app.mawthoqAccount") }}
                          </div>
                        </div>
                        <div class="f-12 bg-white px-2 flex-grow-1 py-4" style="border-radius: 11px;">
                          <div >
                            {{ $root._t("app.profile") }}
                          </div>
                          <div style="color: #048E81;">
                            {{ $root._t("app.completedByRatio") }}
                          </div>
                          <div class="progress mt-3" style="height: 3px;direction: ltr;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
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