<template>
          <section class="orders py-5">
            <div class="container">
                <div
                    class="col-12 back mb-5 d-flex align-items-center justify-content-between"
                >
                    <div
                        class="group-filtar flex-wrap d-flex align-items-center gap-4"
                    >
                        <!-- <div class="box check">
                            المحاماة <i class="fas fa-filter"></i>
                        </div> -->
                                    <div class="btn-group one_drop">
              <button
                
                type="button"
                class="f-14 collapsed btn dropdown-toggle "
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i style="color:#0995eb" class="fas fa-filter"></i>
                <span>فلتر</span>
              </button>
              <ul class="dropdown-menu">
                <li><a style="   text-align: right;font-size: 14px;" class="dropdown-item" @click="filter.sort_by = 'desc'" href="#">الاحدث</a></li>
                <li><a style="   text-align: right;font-size: 14px;" class="dropdown-item" @click="filter.sort_by = 'asc'" href="#">الاقدم</a></li>
              </ul>
              </div>
              
        <div class="d-flex align-items-center one_drop">
          <div class="dropdown mx-1">
            <button
              class="btn  dropdown-toggle"
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
          </div>
                    <div class="dropdown mx-1 one_drop" v-if="filter.main_category_id">
            <button
              class="btn dropdown-toggle"
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

                    <div class="dropdown mx-1 one_drop">
            <button
              class="btn dropdown-toggle"
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
                        <!-- <div class="box">
                            القسم الفرعي <i class="fas fa-filter"></i>
                        </div>
                        <div class="box">
                            حالة الطلب <i class="fas fa-filter"></i>
                        </div> -->
                    </div>
                    <!-- <a href="" style="text-decoration:none;" class="icon-back"> -->
                        <router-link style="text-decoration:none;" class="icon-back" :to="{name:'profilePage'}">
                        <i class="fas fa-arrow-left"></i>

                        </router-link>
                    <!-- </a> -->
                </div>
                         <div
          class="p-3 mt-3"
          v-for="item in filtered_orders"
          :key="item.id"
        >
          <order-card :order="item" />
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
.one_drop{
  background-color: #ecf8ff;
    border: 0.5px solid #0491e8;
    display: flex;
    border-radius: 7px;
    align-items: center;
    justify-content: space-between;
    font-size: 17px;
    cursor: pointer;
    min-width: 200px;
}
/* Satrt Section Order */
section.orders .back .box {
    background-color:#ecf8ff;
    padding: 5px 10px;
    border: 0.5px solid #0491e8;
    display: flex;
    border-radius: 7px;
    align-items: center;
    justify-content: space-between;
    font-size: 17px;
    cursor: pointer;
  
    min-width: 200px;
}
section.orders .back .box.check {
    color: #0491e8;
}
section.orders .back .box i[class="fas fa-filter"] {
    color: #0491e8;
}
@media (max-width: 767.98px) {
    section.orders .back .box {
        min-width: 100px;
    }
}
section.orders .box-order {
    border-radius: 19px;
    background-color: #ecf8ff;
    display: flex;
    padding: 20px;
    gap: 50px;
}
@media (max-width: 1199.98px) {
    section.orders .box-order {
        flex-direction: column;
        position: relative;
    }
}
section.orders .box-order .info {
    text-align: center;
    min-width: 150px;
    position: relative;
}
section.orders .box-order .info::before {
    content: "";
    position: absolute;
    width: 2px;
    background-color: #0491e8;
    height: 75%;
    left: -15px;
    top: 50%;
    transform: translateY(-50%);
}
@media (max-width: 1199.98px) {
    section.orders .box-order .info::before {
        content: "";
        position: absolute;
        width: 75%;
        background-color: #0491e8;
        height: 2px;
        left: 50%;
        top: unset;
        bottom: -25px;
        transform: translateX(-50%);
    }
}
section.orders .box-order .info .photo {
    overflow: hidden;
    width: 74px;
    height: 74px;
    background-color: white;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
section.orders .box-order .stars {
    margin-bottom: 10px;
}
section.orders .box-order .stars i[class="fas fa-star"] {
    font-size: 14px;
    color: #e3ab00;
}
section.orders .box-order .name {
    color: var(--color-info);
    font-size: 18px;
    margin-bottom: 3px;
    font-weight: 600;
}
section.orders .box-order .job {
    color:#2b7b74;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 0;
}
section.orders .box-order .text {
    flex: 1;
}
section.orders .box-order .data {
    font-size: 14px;
    color: var(--color-info);
    margin-bottom: 1rem;
    position: relative;
}
section.orders .box-order .data .order-num {
    font-weight: bold;
}

section.orders .box-order .data .order-num .count {
    color: #0491e8;
}
section.orders .box-order .data i {
    color: #0491e8;
    font-size: 16px;
    margin-left: 2px;
}
section.orders .box-order .duration {
    border: 0.5px solid #0491e8;
    color: #0491e8;
    display: flex;
    background-color: var(--light-green-two);
    padding: 5px 9px;
    border-radius: 5px;
    margin-left: 1.5rem;
    margin-right: 10px;
    align-items: center;
    gap: 2px;
}
@media (min-width: 1200px){
.info {
    margin-top: 0;
}
}
@media (min-width: 1400px) {
    section.orders .box-order .duration {
        margin-right: 25px;
    }
}
section.orders .box-order .setting {
    left: 0;
    top: 20px;
    position: absolute;
}
section.orders .box-order .setting svg {
    font-size: 20px;
    color: var(--color-info);
}
@media (max-width: 1199.98px) {
    section.orders .box-order .setting {
        left: 20px;
        top: 20px;
    }
    section.orders .box-order .data {
        position: unset;
    }
}
section.orders .box-order .title {
    font-weight: bold;
    color: #0491e8;
    font-size: 18px;
}
section.orders .box-order .content {
    max-width: 65%;
    font-size: 16px;
    line-height: 28px;
    margin-bottom: 0;
    color: var(--color-text);
}
@media (max-width: 991.98px) {
    section.orders .box-order .content {
        max-width: 100%;
        margin-bottom: 1rem;
    }
}

section.orders .box-order .group-btn .btn {
    border-radius: 5px;

    color: white;
    text-align: center;
    min-width: 170px;
    font-size: 16px;
    outline: none;
    font-weight: normal;
    border: none;
    padding: 11px;
}
section.orders .box-order .group-btn .btn.new {
    background-color: #ffc107;
}
section.orders .box-order .group-btn .btn.negotiate {
    background-color: #0491e8;
}
section.orders .box-order .group-btn .btn.under-review {
    background-color: var(--yellow-color);
}
section.orders .box-order .group-btn .btn.finished {
    background-color: var(--red-color-two);
}
section.orders .box-order .group-btn .btn.offered-orders {
    background-color: var(--dark-grey-color);
}
section.orders .box-order .group-btn .btn.underway {
    background-color: var(--dark-green-three);
}
/* End Section Order */

</style>