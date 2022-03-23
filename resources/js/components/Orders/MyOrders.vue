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
              placeholder="... بحث"
              class="search-cc form-control pe-4"
              type="text"
              name=""
              id=""
              v-model="search"
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
                {{ $root._t("app.filter") }}
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
        <div class="p-3 mt-3" style="background-color: #f9f9f9" v-for="item in  filterdList" :key="item.id">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px">
              <!-- <span class="ms-3">
                <img
                  style="width: 15px"
                  class="ms-1"
                  :src="base_url + '/assets/images/o_clock.svg'"
                  alt=""
                />
                <span>{{ $root._t("app.ago") }} {{ item.created_at }} {{ $root._t("app.hours") }}</span>
              </span> -->

             <span class="ms-3">
                
              <span v-if="item.country_id['country_name_en'] === 'Kingdom Saudi Arabia' "> {{ $root._t("app.saudiAribianCompleteName") }} </span>
                <img
                  style="width: 14px"
                  class="ms-1"
                  :src="base_url + '/assets/images/o_map.svg'"
                  alt=""
                />
              </span>
              
              
               <span class="ms-3">
                <span>{{ $root._t("app.present") }} 0 {{ $root._t("app.offers") }}</span>
                <img
                  style="width: 20px"
                  class="ms-1"
                  :src="base_url + '/assets/images/o_offer.svg'"
                  alt=""
                />
              </span>

              <span class="my-2" style="font-size: 12px">
                <span class="o-box ms-2">
                  <img
                    style="width: 15px"
                    class="ms-1"
                    :src="base_url + '/assets/images/o_delever.svg'"
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
                  :src="base_url + '/assets/images/user.svg'"
                  alt=""
                />
                <div>
                  <span
                    style="color: #2b7b74"
                    class="mb-2 d-inline-block text-center"
                    >{{ item.user_id["name"] }}
                  </span>
                </div>

                <div>
                  <span
                    style="color: #2b7b74"
                    class="mb-2 d-inline-block text-center"
                    >{{ item.department_id["department_desc_ar"] }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <h6 style="color: #048e81"> {{ $root._t("app.orderTitleHere") }} </h6>
              <p class="pb-3 f-12">
                {{ item.order_title }}
              </p>
              <h6 style="color: #048e81"> {{ $root._t("app.orderContent") }} </h6>
              <p class="pb-3 f-12">
                {{ item.order_content }}
              </p>
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
  
  data() {
    return {
      base_url: base_url,
      list : [] ,
      id : "" ,
      search : '' ,
    };
  },
  mounted() {
    this.getMyOrders();
  },
  computed : {
    filterdList:function(){
      return this.list.filter( (list) => {
        return list.order_title.match(this.search)
      })
    }
  } ,
  methods: {
    getMyOrders() {
      api
        .get("v1/orders?my=1")
        .then((response) => {
          this.list = response.data.data.data;
          
          if(this.list.length === 0){
            document.getElementById('pagesCount').style.display = "none";
          }
          console.log(response.data.data.data);
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
  },
};
</script>