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
                <li><a class="dropdown-item" href="#">الاقدم</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">الاحدث</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-3 mt-3" style="background-color: #f9f9f9" v-for="item in  filterdList" :key="item.id">
          <order-card :order="item"/>
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
import OrderCard from "./OrderCard";
export default {
  components: {OrderCard},
  data() {
    return {
      base_url: base_url,
      cloud_url:cloud_url,
      list : [] ,
      id : "" ,
      search : '' ,
      filter : ''
    };
  },
  mounted() {
    this.getMyOrders();
    document.getElementById('pagesCount').style.display = "none";
      
  },
  methods: {
    getMyOrders() {
      api
        .get("v1/orders?my=1")
        .then((response) => {
          this.list = response.data.data.data;

          if (this.list.length === 0) {
            document.getElementById("pagesCount").style.display = "none";
          } else {
            document.getElementById("pagesCount").style.display = "block";
          }

          console.log(response.data.data.data);
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
    showThisOrderDetails(id){
      this.$router.push({ name: "ShowSingleOrder" , params:{id:id} });
    },
    getCategory(e) {
      this.filter = e.target.value;
      console.log(this.filter)
    },
  },
};
</script>