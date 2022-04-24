<template>
  <header class="fix hid">
    <div class="container">
      <div
        class="
          box-search
          fix
          row
          d-flex
          align-items-center
          justify-content-between
        "
      >
        <div class="col-xl-8 d-flex align-items-center gap-3">
          <form class="flex-fill" action="">
            <div class="box-inpt position-relative">
              <input
                type="search"
                placeholder="أبحث بالأسم....."
                name="search-offers"
                id=""
              />
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </form>
        </div>
        <div class="mt-3 mt-xl-0 col-xl-4 d-flex">
          <div class="select-search">
            <div class="text">
              <div class="icon">
                <i class="fa-solid fa-check"></i>
              </div>
              تحديد كل المحامين
            </div>
            <div class="icon">!</div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <header class="fix sc">
    <div class="container">
      <div
        class="
          box-search
          fix
          row
          d-flex
          align-items-center
          justify-content-between
        "
      >
        <div class="col-xl-8 d-flex align-items-center gap-3">
          <form class="flex-fill" action="">
            <div class="box-inpt position-relative">
              <input 
                type="search"
                placeholder="أبحث بالأسم....."
                name="search-offers"
                id=""
              />
              
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </form>
        </div>
        <div class="mt-3 mt-xl-0 col-xl-4 d-flex">
          <div class="select-search">
            <div class="text">
              <div class="icon" >
                <i class="fa-solid fa-check"></i>
              </div>
              تحديد كل المحامين
            </div>
            <div class="icon">
              !
              <div class="tol-t">
                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
                هذا النص من مولد النص العربی
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section class="select overflow-hidden pt-4">
    <form action="">
      <div class="container">
        <div class="boxes-offers d-flex flex-wrap">

          <div class="box-offer" v-for="user in list" :key="user.id">
            <div
              class="
                d-flex
                flex-wrap
                box-child
                align-items-center
                justify-content-between
              "
            >
              <input type="checkbox" name="person" :id="'person-' + user.id" :class="'check'" />
              <div class="info">
                <p class="name">{{user.first_name + ' ' +	user.last_name}}</p>
                <p class="specialty">
                  <span class="color">محامي:</span>
                  {{user.name}}
                </p>
                <p class="license-number">
                  <span class="color">رخصة برقم: </span>
                   <span v-if="user.licenses.length != 0">  {{user.licenses[0].license_name}} </span>
                  <span v-else></span>
                 
                </p>
                <p class="duration">
                  <span class="color"> عدد العقود المنفذة:</span>
                  {{user.orders_count}}
                </p>
                <p class="price">
                  <span class="color">مكان العمل: </span>

                  <span v-if="user.city != null"> {{user.city.city_name_ar}} </span>
                  <span v-else> جميع المدن </span>

                  
                </p>
              </div>
              <div class="photo text-center">
                <div class="img-cont">
                  <img
                    class="img-fluid"
                    :src="cloud_url + user.photo_profile"
                    alt=""
                  />
                </div>
                <div class="star">
                  {{user.rate_overall}}
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>
            </div>
            <router-link :to="{ name: 'UserProfile', params: { id: user.id }}">تصفح الملف الشخصي</router-link>
            <!-- <a href="" class="profile">تصفح الملف الشخصي</a> -->
          </div>

        </div>
      </div>
      <div class="box-sub">
        <div class="container">
          <input class="inp-sub" type="submit" value="تم" />
        </div>
      </div>
    </form>
  </section>
</template>
<script>
export default {
  data() {
    return {
      base_url: base_url,
      cloud_url:cloud_url,
      list : [],
      selected: [],
      keyword: null,  
    };
  },
  mounted() {
    if (localStorage.getItem("token") === "") {
      this.$router.push({ name: "Login" });
    }
    
    this.getAllUsers();
  },
  watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
  methods:{

    // getResults() {
    //     axios.get('api/v1/lawyers-search', { params: { keyword: this.keyword } })
    //     .then(response => this.list = response.users)
    //     .catch(error => {});
    // },

    getAllUsers(){
        axios
        .get("api/v1/lawyers")
        .then((response) => {
            this.list = response.data.users ;
          console.log(response.data)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e);
        });
    } , 
    
  } ,
};
</script>

