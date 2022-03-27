<template>
    <div class="header-top" style="background-color: #f6f6f6">
      <div class="container">
        <ul class="list-unstyled d-flex m-0">
          <li class="ms-4 position-relative">
            <a
              href="#"
              role="button"
              id="dropdownMenuLink"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              ><img :src="base_url + '/public/assets/images/notification-nav.svg'" alt="" srcset="" />
              <span class="red-circle"></span>
            </a>
            <ul class="dropdown-menu rri_o" aria-labelledby="dropdownMenuLink">
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex align-iyems-center o_noti">
                    <div>
                      <img
                        class="ms-3"
                        style="width: 40px; height: 40px; border-radius: 50%"
                        :src="base_url + '/public/assets/images/user.svg'"
                        alt=""
                      />
                    </div>
                    <div class="flex-grow-1">
                      <div class="btw-flex w-100">
                        <span style="color: #2b7b74">محمد مصطفي</span>
                        <span class=" ">
                          <img :src="base_url + '/public/assets/images/o_cclo.svg'" alt="" />
                          <span style="color: #0995eb">منذ 30 دقيقة</span>
                        </span>
                      </div>
                      <p class="text-end my-1">
                        قام بتقديم عرض علي منشورك اليوم
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex align-iyems-center o_noti">
                    <div>
                      <img
                        class="ms-3"
                        style="width: 40px; height: 40px; border-radius: 50%"
                        :src="base_url + '/public/assets/images/user.svg'"
                        alt=""
                      />
                    </div>
                    <div class="flex-grow-1">
                      <div class="btw-flex w-100">
                        <span style="color: #2b7b74">محمد مصطفي</span>
                        <span class=" ">
                          <img :src="base_url + '/public/assets/images/o_cclo.svg'" alt="" />
                          <span style="color: #0995eb">منذ 30 دقيقة</span>
                        </span>
                      </div>
                      <p class="text-end my-1">
                        قام بتقديم عرض علي منشورك اليوم
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex align-iyems-center o_noti">
                    <div>
                      <img
                        class="ms-3"
                        style="width: 40px; height: 40px; border-radius: 50%"
                        :src="base_url + '/public/assets/images/user.svg'"
                        alt=""
                      />
                    </div>
                    <div class="flex-grow-1">
                      <div class="btw-flex w-100">
                        <span style="color: #2b7b74">{{ user.name }}</span>
                        <span class=" ">
                          <img :src="base_url + '/public/assets/images/o_cclo.svg'" alt="" />
                          <span style="color: #0995eb">{{ $root._t("app.login") }}</span>
                        </span>
                      </div>
                      <p class="text-end my-1">
                        
                        {{ $root._t("app.login") }}
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="ms-5 position-relative">
            <a href="#"
              ><img :src="base_url + '/public/assets/images/nav-message.svg'" alt="" srcset="" />
              <span class="red-circle"></span>
            </a>
          </li>
          <li class="d-flex">
            <div class="ms-2 position-relative">
              <input
                style="font-size: 13px; padding: 8px 30px"
                type="text"
                class="border-0 rounded"
                :placeholder="$root._t('app.search')"
              />
              <img
                style="width: 15px; position: absolute; right: 7px; top: 10px"
                :src="base_url + '/public/assets/images/nav-search.svg'"
                alt=""
              />
              <img
                style="width: 15px; position: absolute; left: 7px; top: 10px"
                :src="base_url + '/public/assets/images/nav-input.svg'"
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
          <li style="margin-right: auto">
            <div class="d-flex">
              <button
                style="
                  background-color: #0995eb;
                  color: #fff;
                  font-size: 12px;
                  padding: 0 40px;
                "
                @click.prevent="goToMakeNewOrder()"
                class="ms-3 border-0 rounded"
              >
                
                {{ $root._t("app.new_order") }}
              </button>
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
                    :src="base_url + '/public/assets/images/dash-user.png'"
                    alt=""
                    srcset=""
                  />
                  <span class="ms-5" style="color: #048e81; font-size: 13px"
                    >{{ user.name }}</span
                  >
                </a>

                <ul
                  class="dropdown-menu profile"
                  aria-labelledby="dropdownMenuLink"
                >
                  <li>
                    <a class="dropdown-item" href="#"> {{ $root._t("app.edit_profile") }}  </a>
                  </li>
                  <li><a class="dropdown-item" href="#">{{ $root._t("app.orders") }}</a></li>
                  <li>
                    <a class="dropdown-item" href="#"> {{ $root._t("app.card") }} </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"> {{ $root._t("app.customer_service") }} </a>
                  </li>
                  <li>
                    <a class="dropdown-item" @click.prevent="logout()" style="cursor: pointer;">Logout</a>
                  </li>
                </ul>
              </div>
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
    goToMakeNewOrder(){
      this.$router.push({ name: "DocumentRequest" });
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