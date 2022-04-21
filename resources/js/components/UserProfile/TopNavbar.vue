<template>
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div
                        class="mb-4 mb-xl-0 col-xl-3 text-center text-xl-end d-flex justify-content-between align-items-center"
                    >
                        <div
                            class="logo justify-content-center justify-content-xl-end"
                        >
                            <img :src="`${base_url}/assets/images/newLogo.png`" alt="" />
                            <div class="text">
                                <h6>موثوق Reliable</h6>
                                <p>صنتاع الثقة Trust Makers</p>
  

                            </div>
                        </div>
                        <a href="" class="icon-notice me-5 position-relative">
                            <i class="fas fa-bell"></i
                            ><span class="notice"></span>
                        </a>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <form action="">
                                    <a
                                        href=""
                                        class="icon-mssg position-relative"
                                    >
                                        <i class="far fa-comments"></i
                                        ><span class="mssg"></span>
                                    </a>
                                    <div class="inpts">
                                        <div class="search position-relative">
                                            <span class="i-search">
                                                <i
                                                    class="fa fa-magnifying-glass"
                                                ></i>
                                            </span>
                                            <input
                                                type="search"
                                                name=""
                                                id=""
                                                placeholder="بحث...."
                                            />
                                            <span class="i-filter">
                                                <i style="color:#0995eb;"
                                                    class="fas fa-filter"
                                                ></i>
                                            </span>
                                        </div>
                                        <input type="submit" value="بحث" />
                                                    <router-link :to="{name:'DocumentRequest'}"
             id="addOrderBasedOnUserMembership"
              style="
                  border: 0px;
                  background-color: rgb(4, 142, 129);
                  color: rgb(255, 255, 255);
                  font-size: 14px;
                  padding: 7px 40px;
                  height: 38px;
                  display: block;
                  text-decoration: none;
                "
              class="rounded  "
            >
               طلب
            </router-link>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 text-center text-md-start">
                                <div
                                    class="dropdown ms-auto ms-lg-0 position-relative drop-d"
                                >
                                    <button
                                        class="ms-auto ms-md-0 btn btn-secondary dropdown-toggle"
                                        type="button"
                                        id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <div
                                            class="d-flex gap-2 align-items-center"
                                        >
                                            <span class="photo">
                                                <img
                                                    class="img-fluid"
                                                    :src="`${base_url}/assets/images/person.jpg`"

                                                    alt=""
                                                />
                                            </span>

                                            {{ user.name }}
                                        </div>
                                    </button>
                                    <ul
                                        class="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton1"
                                    >
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                >تعديل الملف الشخصي</a
                                            >
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                >الاعدادات
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
</template>

<script>
import api from "../../utils/api";

export default {
  data(){
    return{
      name : "" ,
      base_url : base_url ,
      cloud_url: cloud_url,
      user:{},
    }
  },
  mounted() {
    this.currentUser();
    //element
let toggSearch = document.querySelectorAll("form .togg-search"),
    search = document.querySelector("header form .inpts");

// Add Event

toggSearch.forEach(function (e) {
    e.addEventListener("click", function () {
        search.classList.toggle("show-s");
        if (search.classList.contains("show-s")) {
            toggSearch[0].style.display = "none";
        } else {
            toggSearch[0].style.display = "block";
        }
    });
});

    // document.getElementById("addOrderBasedOnUserMembership").style.display = 'none';
  },
  methods: {
    currentUser() {
      api
        .get("/v1/account")
        .then((response) => {
          this.user = response.data.data;
          if(response.data.data.membership_type === 'vendor' ){
            // document.getElementById("addOrderBasedOnUserMembership").style.display = 'none';
          }else{
          //  document.getElementById("addOrderBasedOnUserMembership").style.display = 'block';
          }
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

          this.$root.alertSuccess("thanks for using our website");
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

<style scoped>
.profile a {
    width: 190px;
    background-color: #f9faff;
    font-size: 14px;
    text-align: center;
    padding: 10px 5px;
    margin: 5px;
    border-radius: 6px;
}
header {
    padding-top: 15px !important;
    padding-bottom: 15px !important;
    background-color: #f6f6f6 !important;
    background-image: none !important;
    min-height: unset !important;
    background-size: unset !important;
}
header .search .i-filter svg {
    font-size: 17px;
    color: #0995eb;
}
header form {
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    justify-content: space-between !important;
}
header .icon-mssg .mssg {
    position: absolute;
    background-color: red;
    width: 8px;
    height: 8px;
    right: 0;
    top: 0;
    border-radius: 50%;
    box-shadow: 0px 0px 6px red;
}
header .icon-notice .notice {
    position: absolute;
    background-color: red;
    width: 8px;
    height: 8px;
    right: 0;
    top: 0;
    border-radius: 50%;
    box-shadow: 0px 0px 6px red;
}

header .icon-mssg {
    margin-bottom: -5px !important;
}

header form .inpts {
    display: flex !important;
    gap: 15px !important;
    align-items: baseline !important;
}

header .search {
    max-width: 352px !important;
}
.position-relative {
    position: relative !important;
}

header .search .i-search {
    position: absolute;
    right: 7px;
    top: 55%;
    transform: translateY(-50%);
}
header .search input[type="search"] {
    border: none;
    outline: none;
    border-radius: 7px;
    width: 100%;
    padding: 9px 30px;
}
header .search .i-filter {
    position: absolute;
    left: 7px;
    top: 55%;
    transform: translateY(-50%);
}

header .drop-d button {
    background-color: white !important;
    border: none !important;
    box-shadow: 5px 5px 15px #0000000f !important;
    border-radius: 7px !important;
    max-width: 353px !important;
    display: flex;
    align-items: center;
    gap: 50px;
    justify-content: space-between;
    margin-right: auto;
    font-size: 18px !important;
    text-align: right;
    padding: 5px 12px !important;
    outline: none !important;
    color: var(--green-color-two) !important;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 0.25rem;
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    text-decoration: none;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}
header form input[type="submit"] {
    background: #2b7b74 !important;
    border: none;
    outline: none;
    color: white;
    border-radius: 7px;
    padding: 9px 41.4px;
    margin: unset;
}
header .logo {
    display: flex;
    align-items: center;
    gap: 10px;
}
header .logo h6 {
    font-size: 18px;
    margin: 0;
    font-weight: bolder;
    color:#2b7b74 !important;
}
header .logo p {
    font-size: 12px;
    margin: 0;
    color: #808285 !important;
}
header .drop-d button .photo {
    overflow: hidden;
    width: 33px;
    height: 33px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
</style>