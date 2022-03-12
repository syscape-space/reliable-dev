<template>
  <section>
    <div class="container">
      <div class="py-3 bg-white mwth-form">
        <div class="row w-100 mx-0 px-0">
          <div
              class="col-md-3 d-flex align-items-center justify-content-center search-section"
              style="border-left: 1px solid #ddd"
          >
            <div class="d-flex align-items-center w-100">
              <img :src="base_url+'/images/serv.svg'" alt="" />
              <select name="service"  class="form-control border-0"
                      style="font-size: 13px;">
                <option value="">اختر الخدمة</option>
              </select>
              <img :src="base_url+'/images/down.svg'" alt="" />
            </div>
          </div>
          <div
              class="col-md-3 d-flex align-items-center justify-content-center search-section"
              style="border-left: 1px solid #ddd"
          >
            <div class="d-flex align-items-center w-100">
              <img :src="base_url+'/images/spec.svg'" alt="" />
              <select name="" class="form-control border-0"
                      style="font-size: 13px;">
                <option value="">اختر التخصص</option>
              </select>
              <img :src="base_url+'/images/down.svg'" alt="" />
            </div>
          </div>
          <div
              class="col-md-3 d-flex align-items-center justify-content-center search-section"
              style="border-left: 1px solid #ddd"
          >
            <div class="d-flex align-items-center w-100">
              <img :src="base_url+'/images/map.svg'" alt="" />
              <select name="" class="form-control border-0"
                      style="font-size: 13px;">
                <option value="">اختر الموقع الجغرافي</option>
              </select>
              <img :src="base_url+'/images/down.svg'" alt="" />
            </div>
          </div>
          <div
              class="col-md-3 d-flex align-items-center justify-content-center search-section"
          >
            <button class="search-btn">ابحث</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "SearchServiceSection",
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>

<style scoped>

</style>