<template>
  <section class=" container pt-5 mt-2">

      <div class="personal">
        <div class="personal-info">
          <div class="btw-flex mb-4">
            <div class="f-14">
                <p>{{ $root._t("app.jobDetails") }}</p>
                <p style="color: #2B7B74;">{{ jobDetails }}</p>
            </div>
            <div class="f-14">
                <span>{{ $root._t("app.publishAt") }}</span>
                <span 
                  class="mx-2"
                  style="color: #0995EB;">
                    {{ publishedAt }}
                </span>
                <button class="rounded" style="
                            border: 0;
                            background-color: #048e81;
                            color: #fff;
                            font-size: 12px;
                            padding: 10px 40px;">
                  {{ $root._t("app.shareJob") }}
                </button>
            </div>
          </div>
          <div class="rounded p-3 mb-4 " style="background-color: #FCFCFC;border: 1px solid #C1C1C1;">
            <h5 class="fw-bold">{{ $root._t("app.applingDetails") }}</h5>
            <ul class="mx-0 px-0 list-unstyled f-14 " style="color: #000;">
              <li 
                class="mb-2"  
                style="font-weight: 200;">
                {{ $root._t("app.qulification") }} : {{ qualification }}
              </li>
              <li 
                class="mb-2"  
                style="font-weight: 200;">
                {{ $root._t("app.experiences") }} : {{ experience }}
              </li>
            </ul>
          </div>
          <div class="row w-100 mx-0 px-0">
            <div class="col-md-12 mb-2">
              <label for="">
                {{ $root._t("app.applyNowForThisJob") }}
              </label>
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" placeholder="محمد مصطفي علي" 
              style="padding: 10px;background-color: #FCFCFC;border: 1px solid #C1C1C1;">
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" placeholder="...رقم الجوال" 
              style="padding: 10px;background-color: #FCFCFC;border: 1px solid #C1C1C1;">
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" placeholder="...البريد الالكتروني" 
              style="padding: 10px;background-color: #FCFCFC;border: 1px solid #C1C1C1;">
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" placeholder="...المدينة" 
              style="padding: 10px;background-color: #FCFCFC;border: 1px solid #C1C1C1;">
            </div>
            <div class="col-md-12 mb-3 f-14 ">
                <label for="">{{ $root._t("app.files") }}</label>

                <div class="btw-flex">
                  <div class="position-relative">
                    <input style="width: 141px;" type="file" class="abs-file">
                    <div style="color: #048E81;" class="add-o-file  f-12">
                      <span>{{ $root._t("app.uploadYouCv") }}</span>
                      <img style="width: 12px;" :src="base_url + '/assets/images/o_file.svg'" alt="">
                    </div>
                  </div>
                  
                </div>
            </div>
            <div class="col-md-12 text-center mb-3">
              <button class="rounded" style="
                            border: 0;
                            background-color: #FF584D;
                            color: #fff;
                            font-size: 12px;
                            padding: 10px 40px;">
                  {{ $root._t("app.applyNow") }}
                </button>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";
export default {
  mounted() {
    this.getThisJobDetails();
  },
  data() {
    return {
      base_url: base_url,
      jobDetails : "" ,
      publishedAt : "" ,
      qualification : "" ,
      experience : ""
    };
  },
  methods: {
    getThisJobDetails() {
        let jobId = localStorage.getItem("jobId");
      api
        .get("v1/get_this_job_details/" + jobId)
        .then((response) => {
            this.jobDetails = response.data.jobDetails.address ;
            this.publishedAt = response.data.jobDetails.start_at ;
            this.qualification = response.data.jobDetails.qualification ;
            this.experience = response.data.jobDetails.experience ;
          console.log(response.data.jobDetails);
        })
        // error.response.data.errors
        .catch((e) => {
          console.log(e.response);
        });
    }
  },
};
</script>