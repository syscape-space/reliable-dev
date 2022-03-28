<template>
    <div class="top-header" style="background-color: #f6f6f6">
      <div class="container">
        <ul class="list-unstyled d-flex m-0">
          <li class="ms-4 position-relative">
            <a href="#"
              ><img :src="base_url+'/public/assets/images/notification-nav.svg'" alt="" srcset="" />
              <span class="red-circle"></span>
            </a>
          </li>
          <li class="ms-5 position-relative">
            <a href="#"
              ><img :src="base_url+'/public/assets/images/nav-message.svg'" alt="" srcset="" />
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
              />
              <img
                style="width: 15px; position: absolute; right: 7px; top: 10px"
                :src="base_url+'/public/assets/images/nav-search.svg'"
                alt=""
              />
              <img
                style="width: 15px; position: absolute; left: 7px; top: 10px"
                :src="base_url+'/public/assets/images/nav-input.svg'"
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
          <li style="margin-right: auto" class="ms-2">
            <button
              style="
                border: 0;
                background-color: #048e81;
                color: #fff;
                font-size: 12px;
                padding: 0 40px;
                height:38px
              "
              class="rounded  "
            >
              اضافة طلب
            </button>
          </li>
          <li >
            <div class="dropdown">
              <a
                style="background-color: #fff"
                class="btn dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  style="width: 25px; margin-left: 5px"
                  :src="base_url+'/public/assets/images/dash-user.png'"
                  alt=""
                  srcset=""
                />
                <span class="ms-5" style="color: #048e81; font-size: 13px"
                  > {{ user.name }} </span
                >
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                  <a class="dropdown-item" @click.prevent="logout()" style="cursor: pointer;">خروج</a>
                </li>
              </ul>
            </div>
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
      base_url : base_url ,
      user:{},
    }
  },
  mounted() {
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/v1/account")
        .then((response) => {
          this.user = response.data.data;
          console.log(response.data.data)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
    logout(){
      api
        .post("/v1/logout")
        .then((response) => {
          
          // this.user = response.data.data;
          localStorage.removeItem('thisTicketId'); // thisTicketId
          localStorage.removeItem('token'); // token
          localStorage.removeItem('myIdTazkarty'); // myIdTazkarty
          localStorage.removeItem('logginedUser'); // logginedUser

          alert("thanks for using our website");
          this.$router.push({ name: "home" });
          console.log(response)
        })
        // error.response.data.errors
        .catch((e) => {
          // this.errors = e.response.data.errors;
          console.log(e.response);
        });
    }
  },
};
</script>