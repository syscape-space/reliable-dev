<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <div class="row w-100 mx-0 px-0">
            <div class="col-md-9">
              <div class="row w-100 mx-0 px-0">
                <div class="col-md-4 mb-3"  v-for="item in list" :key="item.id">
                  <div class="p-3 bg-users text-center">
                    <div class="text-center" v-if="item.photo_profile">
                      <img class="uses-img" :src="base_url + '/storage/' +  item.photo_profile  " alt="">
                    </div>
                    <div class="text-center" v-else>
                      <img class="uses-img" :src="base_url + '/assets/images/emptyUser.png'" alt="">
                    </div>
                    <div class="text-center"> 
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="text-center ">{{ item.name }}</span> <br>
                    <span style="color: #2B7B74;" class="mb-2 d-inline-block text-center">{{ item.bio }} </span>
                    <button class="btn-users">{{ $root._t("app.seeProfile") }}</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <span style="color: #2B7B74;">{{ $root._t("app.filterServiceProducers") }}</span>
              </div>
              <div class="btw-flex mb-2" style="flex-wrap: nowrap;">
                <input placeholder=".....بحث" type="text" class="input-cc form-control">
                <button class="btn-cc"><i class="fas fa-search"></i></button>
              </div>
              <div class="mb-2 mt-4">
                <span > {{ $root._t("app.classifications") }}  </span>
              </div>
              <div>
                <ul class="list-unstyled px-0">
                  <li class="mb-2" style="font-size: 14px;">
                    <input type="checkbox">
                    <label for="">firstClass</label>
                  </li>
                  <li class="mb-2" style="font-size: 14px;">
                    <input type="checkbox">
                    <label for="">{{ $root._t("app.firstClass") }}</label>
                  </li>
                  <li class="mb-2" style="font-size: 14px;">
                    <input type="checkbox">
                    <label for="">{{ $root._t("app.firstClass") }}</label>
                  </li>
                  <li class="mb-2" style="font-size: 14px;">
                    <input type="checkbox">
                    <label for="">{{ $root._t("app.firstClass") }}</label>
                  </li>
                  <li class="mb-2" style="font-size: 14px;">
                    <input type="checkbox">
                    <label for="">{{ $root._t("app.firstClass") }}</label>
                  </li>
                  <li class="mb-2 mt-4" style="font-size: 14px;">
                    <span>{{ $root._t("app.evaluation") }}</span>
                    <div class=""> 
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star yellow"></i>
                      <i class="fas fa-star"></i>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";
export  default {
  data(){
    return{
      base_url:base_url ,
      list : [] 
    };
  },
  mounted() {
    
    this.getAllServiceProduction();
  },
  methods: {
    getAllServiceProduction(){
      api
        .get("/vendors")
        .then((response) => {
          console.log(response.data.data);
          this.list = response.data.data.data ;
          if( this.list.length === 0 ){
            document.getElementById('serviceProductionID').style.display = "none";
          }
        })
        // error.response.data.errors
        .catch((e) => {
          // this.errors = e.response.data.errors;
          console.log(e.response.data.errors);
        });
    }
  }
}
</script>
<style scoped>

</style>