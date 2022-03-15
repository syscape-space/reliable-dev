<template>
    <section>
      <div class="dash">
        <div class="head-dash">
          <div>
            
            <div class="text-center py-4">
              <div class="image-user position-relative d-inline-block">
                <img style="width: 100px;" :src="base_url + '/assets/assets/images/white-logo.svg'" alt="" srcset="" />
                
              </div>
            
            </div>
            <ul class="px-0 list-unstyled text-center dash-list  dash-list2 mt-0 accordion" id="accordionPanelsStayOpenExample">
              <li class=" active">
                <a href="#" id="panelsStayOpen-headingOne">
                  <img
                    :src="base_url + '/assets/assets/images/o_new.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">{{ $root._t("app.newOrders") }}</span>
                </a>
                <div id="panelsStayOpen-collapseOne" class=" collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="">
                    <ul class="list-unstyled">
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.drafts") }}</a>
                      </li>
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.waitting") }}</a>
                      </li>
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.offers") }}</a>
                      </li>
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.rejected") }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class=" active">
                <a href="#" id="panelsStayOpen-headingTwo">
                  <img
                    :src="base_url + '/assets/assets/images/o_under.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">  {{ $root._t("app.underExecuting") }} </span>
                </a>
                <div id="panelsStayOpen-collapseTwo" class=" collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="">
                    <ul class="list-unstyled">
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.drafts") }}</a>
                      </li>
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.waitting") }}</a>
                      </li>
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.offers") }}</a>
                      </li>
                      <li class="mt-2">
                        <a href="">{{ $root._t("app.rejected") }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
             
            
            </ul>
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