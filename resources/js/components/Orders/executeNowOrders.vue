<template>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="btw-flex">
          <div class="position-relative">
            
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
        <div
          class="p-3 mt-3"
          style="background-color: #f9f9f9"
          v-for="item in filterdList"
          :key="item.id"
        >
          <div v-if="item.order_status === 'under_review'">
                <div class="">
            <div class="mb-2 text-start" style="font-size: 12px">

              <span class="ms-3">
                <span
                  >{{ $root._t("app.present") }} 0
                  {{ $root._t("app.offers") }}</span
                >
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
                        :src="cloud_url  + item.user_id['photo_profile']"
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
                    <div
                        class="clicker"
                        @click.prevent="showThisOrderDetails(item.id)"
                        style="cursor: pointer"
                    >
                        <h6 style="color: #048e81">
                        {{ item.order_title }}
                        </h6><br>
                        <h6 style="color: #048e81">
                        {{ $root._t("app.orderContent") }}
                        </h6>
                        <p class="pb-3 f-12">
                        {{ item.order_content.substring(0, 100) + ".." }}
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
                            {{ $root._t("app." + item.order_status) }}
                        </button>
                        </div>
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
      cloud_url:cloud_url,
      list: [],
      id: "",
      search: "",
    };
  },
  mounted() {
    api
        .get("/v1/account")
        .then((response) => {
          if( response.data.data.membership_type === 'vendor' ){ // مقدم خدمه
              this.getMyExecutingNowOrders();
          }else if( response.data.data.membership_type === 'user' ){
            this.$router.push({ name: "MyOrder" });
          }
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });

    
    document.getElementById("pagesCount").style.display = "none";
    
  },
  computed: {
    filterdList: function () {
      return this.list.filter((list) => {
        return list.order_title.match(this.search);
      });
    },
  },
  methods: {
    getMyExecutingNowOrders() {
      api
        .get("v1/orders?my=1")
        .then((response) => {
            this.list = response.data.data.data;

            if (this.list.length === 0 || this.list[0].order_status != 'under_review') {
              document.getElementById("pagesCount").style.display = "none";
            } else {
              document.getElementById("pagesCount").style.display = "block";
            }

            console.log(response.data.data.data.order_status);
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
    showThisOrderDetails(id) {
      this.$router.push({ name: "ShowSingleOrder", params: { id: id } });
    },
  },
};
</script>