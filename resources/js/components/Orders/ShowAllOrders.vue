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
                  style="width: 15px"
                  class="ms-1"
                  :src="base_url + '/assets/images/o_clock.svg'"
                  alt=""
                />
                <span>منذ 4 ساعات</span>
              </span>

              <span class="ms-3">
                <img
                  style="width: 20px"
                  class="ms-1"
                  :src="base_url + '/assets/images/o_offer.svg'"
                  alt=""
                />
                <span>مقدم 5 عروض</span>
              </span>
              <span class="ms-3">
                <img
                  style="width: 14px"
                  class="ms-1"
                  :src="base_url + '/assets/images/o_map.svg'"
                  alt=""
                />
                <!--  -->
                <span v-if="item.country_id === null"> غير مسجل للبلد </span>
                <span v-else> {{ item.country_id.country_name_ar }} </span>
              </span>
              <span class="my-2" style="font-size: 12px">
                <span class="o-box ms-2">
                  <img
                    style="width: 15px"
                    class="ms-1"
                    :src="base_url + '/assets/images/o_delever.svg'"
                    alt=""
                  />
                  <span>مده التسليم:</span>
                  <span class="me-2">14 يوم</span>
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
              <h6 style="color: #048e81">عنوان الطلب هنا</h6>
              <p class="pb-3 f-12">
                {{ item.order_title }}
              </p>
              <h6 style="color: #048e81">محتوى الطلب</h6>
              <p class="pb-3 f-12" v-html=" item.order_content ">
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
                    التفاوض الان
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
                   {{ item.order_status }}  
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <nav aria-label="Page navigation example">
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
    this.getMyOrders2();
  },
  data() {
    return {
      base_url: base_url,
      list2 : [] ,
    };
  },
  methods: {
    getMyOrders2() {
      api
        .get("v1/orders")
        .then((response) => {
          this.list2 = response.data.data.data;
          console.log(response.data.data.data);
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
  },
};
</script>