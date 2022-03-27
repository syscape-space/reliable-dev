<template>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="btw-flex">
          <div class="position-relative">
            <i
              style="
                position: absolute;
                top: 50%;
                right: 5px;
                transform: translateY(-50%);
              "
              class="text-white fas fa-search"
            ></i>
            <input
              :placeholder="$root._t('app.search')"
              class="search-cc form-control pe-4"
              type="text"
              name=""
              id=""
            />
          </div>
          <div>
            <div class="btn-group">
              <button
                style="background-color: #0995eb; border-color: #0995eb"
                type="button"
                class="f-14 collapsed btn btn-danger dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-filter"></i>
                فلتر
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-3 mt-3" style="background-color: #f9f9f9" v-for="item in list2" :key="item.id">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px">
              <span class="ms-3">
                <img
                  style="width: 20px"
                  class="ms-1"
                  :src="base_url + '/public/assets/images/o_offer.svg'"
                  alt=""
                />
                <span>{{ $root._t("app.present") }} 0 {{ $root._t("app.offers") }}</span>
              </span>
              <span class="ms-3">
                <img
                  style="width: 14px"
                  class="ms-1"
                  :src="base_url + '/public/assets/images/o_map.svg'"
                  alt=""
                />
                <!--  -->
                <span v-if="item.country_id === null"> {{ $root._t("app.notRegisterCountry") }} </span>
                <span v-else> {{ $root._t("app.saudiAribianCompleteName") }}</span>
              </span>
              <span class="my-2" style="font-size: 12px">
                <span class="o-box ms-2">
                  <img
                    style="width: 15px"
                    class="ms-1"
                    :src="base_url + '/public/assets/images/o_delever.svg'"
                    alt=""
                  />
                  <span> {{ $root._t("app.deliveryTime") }} :</span>
                  <span class="me-2"> 0 {{ $root._t("app.day") }}</span>
                </span>
                <span>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
              </span>
            </div>
          </div>
          <div class="row w-100 mx-0 px-0">
            <div
              class="
                col-md-3
                text-center
                d-flex
                align-items-center
                justify-content-center
              "
            >
              <div style="border-left: 3px solid #ddd" class="px-3">
                <img
                  style="width: 70px"
                  :src="cloud_url  + item.user_id.photo_profile"
                  alt=""
                />
                <div>
                  <span
                    style="color: #2b7b74"
                    class="mb-2 d-inline-block text-center"
                    >{{ item.user_id.name }}
                  </span>
                </div>

                <div>
                  <span
                    style="color: #2b7b74"
                    class="mb-2 d-inline-block text-center"
                    >{{ item.department_id.department_name_ar }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="clicker" @click.prevent="showThisOrderDetails(item.id)" style="cursor: pointer;">
                <h6 style="color: #048e81">{{ $root._t("app.orderTitleHere") }}</h6>
                <p class="pb-3 f-12">
                  {{ item.order_title }}
                </p>
                <!-- v-html=" item.order_content.split(' ')[0]" -->
                <h6 style="color: #048e81">{{ $root._t("app.orderContent") }}</h6>
                <p class="pb-3 f-12" v-html="item.order_content.substring(0,40)+'..'">
                </p>
              </div>
              <div class="mt-3 btw-flex">
                <div></div>
                <div class="text-center">
                  <button
                    style="
                      border: 0;
                      background-color: #048e81;
                      color: #fff;
                      font-size: 12px;
                      padding: 0 40px;
                      height: 40px;
                    "
                    class="rounded"
                  >
                    {{ $root._t("app.negotiateNow") }}
                  </button>
                </div>
                <div class="text-center">
                  <button
                    style="
                      border: 0;
                      background-color: #4ac272;
                      color: #fff;
                      font-size: 12px;
                      padding: 0 40px;
                      height: 40px;
                    "
                    class="rounded"
                  >
                   {{ $root._t("app."+item.order_status) }} 
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <nav aria-label="Page navigation example" id="pagesCount">
          <ul class="pagination justify-content-center mt-2">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
</template>
<script>
import api from "../../utils/api";
export default {
   mounted() {
     // let thisorderId = localStorage.getItem("thisOrderId");
    // check user type 
    api
        .get("/v1/account")
        .then((response) => {
          if( response.data.data.membership_type === 'vendor' ){ // مقدم خدمه
              this.getMyOrders2();
          }else if( response.data.data.membership_type === 'user' ){
            this.$router.push({ name: "MyOrder" });
          }
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
  

   
    document.getElementById('pagesCount').style.display = "none";
  },
  data() {
    return {
      base_url: base_url,
      cloud_url:cloud_url,
      list2 : [] ,
    };
  },
  methods: {
    getMyOrders2() {
      api
        .get("v1/orders")
        .then((response) => {
          this.list2 = response.data.data.data;
          if(this.list2.length === 0){
            document.getElementById('pagesCount').style.display = "none";
          }else{
            document.getElementById('pagesCount').style.display = "block";
          }
          
          console.log( response.data.data.data );
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
    showThisOrderDetails(id){
      this.$router.push({ name: "ShowSingleOrder",params:{id:id} });
    }
  },
};
</script>