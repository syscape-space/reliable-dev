<template>
  <section class="container pt-5 mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="d-flex align-items-center mb-3" style="max-width: 500px">
          <label class="ms-2" style="white-space: nowrap">
            قائمة الوظائف
          </label>
          <select class="form-control" name="" id="">
            <option value="">-- اختر --</option>
          </select>
        </div>
        <div class="row w-100 mx-0 px-0" style="min-height: 70vh">
          <div class="col-md-4 f-14" v-for="item in list" :key="item.id">
            <div class="border shadow p-3 mb-3" style="border-radius: 10px">
              <span style="color: #048e81">
                {{ item.address }}
              </span><br>
              <span style="color: rgb(165, 164, 164);" > {{ item.qualification }} </span>
              <div>
                <ul class="list-unstyled px-0 mb-0 f-13 text-end mt-4">
                  <li class="mb-3">
                    <span style="min-width: 80px" class="d-inline-block"
                      >نوع التعاقد</span
                    >
                    <span style="margin-right: 15px; color: #0995eb"
                      >وقت كامل</span
                    >
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 80px" class="d-inline-block"
                      >العدد المطلوب</span
                    >
                    <span style="margin-right: 15px; color: #0995eb"
                      >عدد 20 موظف للجنسين</span
                    >
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 80px" class="d-inline-block"
                      >وقت نشر الوظيفة</span
                    >
                    <span style="margin-right: 15px; color: #0995eb"
                      > {{ item.start_at }} </span
                    >
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 80px" class="d-inline-block"
                      >الموعد النهائي</span
                    >
                    <span style="margin-right: 15px; color: #0995eb"
                      > {{ item.end_at }} </span
                    >
                  </li>
                  <li class="btw-flex">
                    <button
                      style="
                        width: 48%;
                        border: 0;
                        background-color: #fff;
                        color: #363848;
                        border: 1px solid #363848;
                        font-size: 12px;
                        white-space: nowrap;
                      "
                      class="rounded btn"
                    >
                      عدد مشاهدات 2500
                      <img
                        style="
                          filter: brightness(0.2);
                          width: 20px;
                          vertical-align: middle;
                          white-space: nowrap;
                          margin-right: 5px;
                        "
                        :src="base_url + '/public/assets/images/o_eye.svg'"
                        alt=""
                      />
                    </button>
                    <button
                      style="
                        width: 48%;
                        border: 0;
                        background-color: #ff584d;
                        color: #fff;
                        border: 1px solid #ff584d;
                        font-size: 12px;
                      "
                      @click.prevent="applyThisJob(item.id)"
                      class="rounded btn"
                    >
                      تقدم لهذه الوظيفة
                    </button>
                  </li>
                </ul>
              </div>
            </div>
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
    this.getAllJobs();
  },
  data() {
    return {
      base_url: base_url,
      list : [] ,
    };
  },
  methods: {
    getAllJobs() {
      api
        .get("v1/all_jobs")
        .then((response) => {
        this.list = response.data.jobs ;
          console.log(response);
        })
        // error.response.data.errors
        .catch((e) => {
          console.log(e.response);
        });
    },
    applyThisJob(id){
        localStorage.setItem("jobId", id);
        this.$router.push({ name: "GetThisJobDetails" });
    }
  },
};
</script>