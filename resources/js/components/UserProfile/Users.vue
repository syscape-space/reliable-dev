<template>
<div class="top-header" style="background-color: #f6f6f6 ; width:100%" >
      <div class="container">
        <ul class="list-unstyled d-flex m-0">
        <li class="ms-4 my-1 position-relative m-d-none">
            <a href="" style="color: #048e81;">
              الرئيسية
            </a>
          </li>
          <li class="ms-4 position-relative">
            <a href="#"
              ><img :src="base_url+'/assets/images/notification-nav.svg'" alt="" srcset="" />
              <span class="red-circle"></span>
            </a>
          </li>
          <li class="ms-5 position-relative">
            <a href="#"
              ><img :src="base_url+'/assets/images/nav-message.svg'" alt="" srcset="" />
              <span class="red-circle"></span>
            </a>
          </li>
          <li class="d-flex">
            <div class="ms-2 position-relative">
              <input
                style="font-size: 13px; padding: 8px 30px"
                type="text"
                class="border-0 rounded"
                placeholder="...بحث"
                v-model="search"
              />
              <img
                style="width: 15px; position: absolute; right: 7px; top: 10px"
                :src="base_url+'/assets/images/nav-search.svg'"
                alt=""
              />
              <img
                style="width: 15px; position: absolute; left: 7px; top: 10px"
                :src="base_url+'/assets/images/nav-input.svg'"
                alt=""
              />
            </div>
            <button
              style="
                border: 0;
                background-color: #048e81;
                color: #fff;
                font-size: 12px;
                padding: 0 40px;
              "
              class="rounded"
            >
              {{ $root._t("app.search") }}
            </button>
          </li>
        </ul>
      </div>
    </div>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <div class="row w-100 mx-0 px-0">
            <div class="col-md-9">
              <div class="row w-100 mx-0 px-0">
                <div class="col-md-4 mb-3"  v-for="item in filterdList" :key="item.id">
                  <form>
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
                      <button @click.prevent="getProfile2( item.id )" class="btn-users">{{ $root._t("app.seeProfile") }}</button>
                    </div>
                  </form>
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
      list : [] , 
      search : '' ,
      uId : "" 
    };
  },
  mounted() {

    this.getAllServiceProduction();
  },
  computed : {
    filterdList:function(){
      return this.list.filter( (list) => {
        return list.name.match(this.search)
      })
    }
  } ,
  methods: {
    getAllServiceProduction(){
      api
        .get("v2/vendors")
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
    } ,

    getProfile2( id ){
      this.uId = id ;
      this.$router.push({ name: 'Profile4' , params: { uId: id } })
    }
  }
}
</script>
<style scoped>

</style>
