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
                <li><a style="   text-align: right;font-size: 14px;" class="dropdown-item" @click="filter.sort_by = 'desc'" href="#">الاحدث</a></li>
                <li><a style="   text-align: right;font-size: 14px;" class="dropdown-item" @click="filter.sort_by = 'asc'" href="#">الاقدم</a></li>
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
              <li v-for="category in categories.filter(item=>item.parent == null)"><a class="dropdown-item"  @click="filter.main_category_id = category.id" href="#">{{category.department_name_ar}}</a></li>
            </ul>
          </div>
          <div class="dropdown mx-1" v-if="filter.main_category_id">
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
              <li v-for="category in categories.filter(item=>item.parent !== null && filter.main_category_id === item.parent)"><a class="dropdown-item" @click="filter.sub_category_id = category.id"  href="#">{{category.department_name_ar}}</a></li>
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
              <li v-for="city in cities.data"><a class="dropdown-item" @click="filter.city_id = city.id"  href="#">{{city.city_name_ar}}</a></li>
            </ul>
          </div>
          <button
              @click="filter = {
        main_category_id:null,
        sub_category_id:null,
        city_id:null,
      }"
              class="btn border "
              type="button"
          >
            الكل
          </button>
        </div>
        <div
          class="p-3 mt-3"
          style="background-color: #f9f9f9"
          v-for="item in filtered_orders"
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
      this.getMyOrders2();
      if (this.$root.auth_user.membership_type === "user") {
        this.$router.push({ name: "MyOrder" });
      }
      this.getCategories();
  },
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
      categories:[],
      cities:[],
      list2: [],
      filter:{
        main_category_id:null,
        sub_category_id:null,
        city_id:null,
        sort_by:null,
      }
    };
  },
  computed:{
    filtered_orders(){
      return this.list2.filter(item=>{
        return ((item.department_id && item.department_id.id === this.filter.sub_category_id) || this.filter.sub_category_id == null)
            && ((item.city_id && item.city_id.id === this.filter.city_id) || this.filter.city_id == null);
      }).sort((a,b)=>{
        if (parseInt(a.id) < parseInt(b.id)) {
          return  this.filter.sort_by === 'asc'? -1 : 1;
        }
        if (parseInt(a.id) > parseInt(b.id)) {
          return  this.filter.sort_by === 'asc'? 1 : -1;
        }
        // a must be equal to b
        return 0;
      })
    },
  },
  methods: {
    getCategories(){
      api.get('/v1/departments').then(res=>{
        this.categories = res.data.data;
        api.get('/v1/cities').then(res=>{
          this.cities = res.data.data;
        })
      })
    },
    getMyOrders2() {
      api
        .get("/v1/orders")
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