<template>
    <div class="top-header" style="background-color: #f6f6f6">
      <div class="container">
        <ul class="list-unstyled d-flex m-0">
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
</template>
<script>
import api from "../../utils/api";

export default {
  data(){
    return{
      name : "" ,
      base_url : base_url
    }
  },
  mounted() {
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/account?token=" + localStorage.getItem("token") )
        .then((response) => {
          this.name = response.data.user.name
          console.log(response.data.user)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
  },
};
</script>