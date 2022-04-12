<template>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="btw-flex">
          <div class="position-relative"></div>
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
                <li><a style="    text-align: right;font-size: 14px;" class="dropdown-item" href="#">تصنيف</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="d-flex align-items-center">
          <div class="dropdown mx-1">
            <button
              class="btn btn-success dropdown-toggle"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              اختيار القسم
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          <div class="dropdown mx-1">
            <button
              class="btn border dropdown-toggle"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              الفرعى
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          <div class="dropdown mx-1">
            <button
              class="btn border dropdown-toggle"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              اختيار المدينة
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          <div class="dropdown mx-1">
            <button
              class="btn border dropdown-toggle"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              الكل
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          <div class="dropdown mx-1">
            <button
              class="btn border  dropdown-toggle"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              عرض النتائج
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>
        <div
          class="p-3 mt-3"
          style="background-color: #f9f9f9"
          v-for="item in list2"
          :key="item.id"
        >
          <order-card :order="item" />
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import api from "../../utils/api";
import OrderCard from "./OrderCard";
export default {
  components: { OrderCard },
  mounted() {
    // let thisorderId = localStorage.getItem("thisOrderId");
    // check user type
    api
      .get("/v1/account")
      .then((response) => {
        if (response.data.data.membership_type === "vendor") {
          // مقدم خدمه
          this.getMyOrders2();
        } else if (response.data.data.membership_type === "user") {
          this.$router.push({ name: "MyOrder" });
        }
      })
      // error.response.data.errors
      .catch((e) => {
        this.errors = e.response.data.errors;
        console.log(e.response);
      });
  },
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
      list2: [],
    };
  },
  methods: {
    getMyOrders2() {
      api
        .get("v1/orders")
        .then((response) => {
          this.list2 = response.data.data.data;
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
  },
};
</script>

<style>
button:not(.collapsed)::after {
    background-image: url(/images/down-aa.svg?18e7856…);
    transform: rotate(0deg) !important;
}
</style>