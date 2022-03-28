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
        <div class="p-3 mt-3" style="background-color: #f9f9f9">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px">
              <!-- <span class="ms-3">
                <img
                  style="width: 15px"
                  class="ms-1"
                  :src="base_url + '/public/assets/images/o_clock.svg'"
                  alt=""
                />
                <span>{{ $root._t("app.ago") }} {{ item.created_at }} {{ $root._t("app.hours") }}</span>
              </span> -->

<!--             <span class="ms-3">-->
                
<!--              <span v-if="item.country_id['country_name_en'] === 'Kingdom Saudi Arabia' "> {{ $root._t("app.saudiAribianCompleteName") }} </span>-->
<!--                <img-->
<!--                  style="width: 14px"-->
<!--                  class="ms-1"-->
<!--                  :src="base_url + '/public/assets/images/o_map.svg'"-->
<!--                  alt=""-->
<!--                />-->
<!--              </span>-->
              
              
               <span class="ms-3">
                <span>{{ $root._t("app.present") }} 0 {{ $root._t("app.offers") }}</span>
                <img
                  style="width: 20px"
                  class="ms-1"
                  :src="base_url + '/public/assets/images/o_offer.svg'"
                  alt=""
                />
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
                  :src="cloud_url  + ''"
                  alt=""
                />
                <div>
                  <span
                    style="color: #2b7b74"
                    class="mb-2 d-inline-block text-center"
                    >adfsdfsa
                  </span>
                </div>

                <div>
                  <span
                    style="color: #2b7b74"
                    class="mb-2 d-inline-block text-center"
                    >dfasdfs
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="clicker"  style="cursor: pointer;">
                <h6 style="color: #048e81"> {{ $root._t("app.orderTitleHere") }} </h6>
                <p class="pb-3 f-12">
                  rewrwwr
                </p>
                <h6 style="color: #048e81"> {{ $root._t("app.orderContent") }} </h6>
                <p class="pb-3 f-12">
                  adfsdfas
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
                   dasfadfs
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
        <input type="text" id="status">
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
      cloud_url:cloud_url ,
      filterState: ''
    };
  },
  
  mounted() {
    this.gettingFilterationData();
    this.filterState = localStorage.getItem('filter_state', 'waiting')
    console.log(this.filterState)
  },
created(){
          
},
  methods: {
      gettingFilterationData(){
          
          // alert(this.orderStatus);
          // console.log(this.$route.params.data);
        //   api
        // .get("v1/getting_filtered_orders/" + )
        // .then((response) => {
        //   console.log(response);
        // })
        // .catch((e) => {
        //   console.log(e.response);
        // });
      }
  },
};
</script>