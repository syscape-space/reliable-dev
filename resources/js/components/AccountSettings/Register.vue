<template>
  <section class="login sgin-sec py-4">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-5 text-center text-xl-end mt-xl-5 mb-5 mb-xl-0" >
              <div class="info">
                  <h5>انشاء حسابك في موثوق في اقل من دقيقة!</h5>
                  <ul>
                      <li>
                          <span class="icon">
                              <i class="fas fa-desktop"></i>
                          </span>
                          اكمل تسجيل بيانات حسابك
                      </li>
                      <li>
                          <span class="icon"
                              ><i class="far fa-file-alt"></i></span
                          >اختر الباقة الخاصة بك
                      </li>
                      <li>
                          <span class="icon"
                              ><i class="far fa-address-card"></i></span
                          >قم بتحقيق الهوية
                      </li>
                      <li>
                          <span class="icon"
                              ><i class="far fa-comments"></i></span
                          >التواصل مع مقدمين الخدمة مباشرة
                      </li>
                  </ul>
                  <div class="row mt-5">
                      <div class="col-sm-6 text-center">
                          <div class="photo m-auto mb-3 mb-sm-0">
                              <div class="overlay">
                                  <i
                                      class="fa-solid fa-circle-play"
                                  ></i>
                              </div>
                              <img
                                  class="img-fluid"
                                  :src="`${base_url}/assets/images/corner.png`"
                                  alt=""
                              />
                          </div>
                      </div>
                      <div
                          class="col-sm-6 d-flex flex-column text-center justify-content-between"
                      >
                          <a href="" class="btn"
                              >الدليل الارشادي لطلب الخدمة
                              <i class="fas fa-book-open"></i
                          ></a>
                          <div class="logo">
                              <img :src="`${base_url}/assets/images/logo-min.png`" alt="" />
                              <div class="text">
                                  <h5>موثوق Reliable</h5>
                                  <p>صناع الثقة Trust Makers</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-5">
                        <div class="errors">
            <div class="alert alert-danger" v-for="error in errors" :key="error">
              <strong>{{ error }}</strong>
            </div>
          </div>
                        <form action="">
                            <div class="logo-sgin text-center">
                                <img :src="`${base_url}/assets/images/logo-min.png`" alt="" />
                                <h1>موثوق Reliable</h1>
                                <p>صناع الثقة Trust Makers</p>
                            </div>
                            <h5 class="text-center">{{ $root._t("app.register") }}</h5>
                            <!-- <div class="group-btn mb-2 text-center">
                                <a href="" class="btn"> عميل </a>
                                <a href="" class="btn"> شركة </a>
                            </div> -->
                            <div class="lable">الاسم</div>
                            <input
                                type="text"
                                placeholder="الاسم ..."
                                name=""
                                id=""
                                v-model="name"
                            />
                            <div class="lable">
                                <i class="fas fa-phone-alt"></i>رقم الجوال
                            </div>
                            <input
                                type="number"
                                placeholder="رقم الجوال..."
                                name=""
                                id=""
                                v-model="mobile"
                            />
                                                        <div class="lable">
                                <i class="fas fa-phone-alt"></i>رقم الهوية
                            </div>
                            <input
                                type="number"
                                placeholder="رقم الهوية..."
                                name=""
                                id=""
                                v-model="id_number"
                            />
                            <div class="lable">البريد الالكتروني</div>
                            <input
                                type="email"
                                placeholder="البريد الالكتروني ..."
                                name=""
                                id=""
                                v-model="email"
                            />
                                                                                 <div class="lable">
                                <i class="fas fa-phone-alt"></i> الرقم السري
                            </div>
                            <input
                                type="password"
                                placeholder=" الرقم السري..."
                                name=""
                                id=""
                                v-model="password"
                            />
                            <div class="messag justify-content-center mt-2">
                                <span class="check">
                                    <input v-model="notRobot" type="checkbox" name="" id="" />
                                    <span class="lable">أنا لست روبوت </span>
                                </span>
                            </div>
                            <button :disabled="ifRobot" class="login-btn" @click.prevent="registerFun()"> {{ $root._t("app.create_account") }} </button>
                            <p class="sgin">
              {{ $root._t("app.already_have_account") }} ?
            <router-link :to="{name:'Login'}" style="color: #048e81" class=""> {{ $root._t("app.login") }} </router-link>
          </p>
                        </form>
                    </div>
        </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import Navbar from "../../components/partials/LayoutNavBar.vue";
import api from "../../utils/api";

export default {
  components: { Navbar },
  name: "Register",
  data() {
    return {
      name : "" ,
      firstname : "" ,
      midname : "" ,
      lastname : "" ,
      mobile: "",
      email: "",
      password: "",
      id_number : "" ,
      membership_type : this.$route.query.type ,
      errors: null ,
      base_url : base_url,
      notRobot:false,
      ifRobot:''
    };
  },
  watch:{
    'notRobot'(val){
      if(val){
        this.ifRobot = false
      }else{
        this.ifRobot = true
      }
    }
  },
  methods: {
     
    registerFun() {

      let Fullname = this.name ;
      let ourNameSplitter = Fullname.split(" ");
      if( ourNameSplitter.length === 1){
        this.firstname = ourNameSplitter[0];
        this.midname = null ;
        this.lastname = null ;
      }else if( ourNameSplitter.length === 2 ){
        this.firstname = ourNameSplitter[0];
        this.midname = ourNameSplitter[1];
        this.lastname = null ;
      }else{
        this.firstname = ourNameSplitter[0];
        this.midname = ourNameSplitter[1];
        this.lastname = ourNameSplitter[2];
      }

      api
        .post("/v2/register", {
          name : this.name ,
          first_name : this.firstname ,
          middle_name : this.midname , 
          last_name : this.lastname ,
          mobile: this.mobile,
          email: this.email,
          membership_type: this.membership_type,
          id_number : this.id_number ,
          password: this.password,
        } )
        .then((response) => {

          this.$root.alertSuccess("Account is created");
          
          let token = response.data.data.access_token ;
          // saving token to localSorage 
          localStorage.setItem("token", token );
          this.$root.getAuthUser();
          // route for u_index page
          this.$router.push({ name: "profilePage" });
        })
        
        .catch((e) => {
          this.success = "" ;
          this.errors = e.response.data.errors;
        });
    },
  },
};
</script>

<style>
:root {
    --color-inp: #e9fefd;
    --main-color: #048e81;
    --section-color: #ecf8ff;
    --main-transition: 300ms;
    --color-blue: #0490cd;
    --color-text: #838689;
    --color-p: #4e5567;
    --color-green: #048fa6;
}
  section.login {
    background-color: var(--section-color);
    min-height: 100vh;
    z-index: 1;
    position: relative;
}
section.login::before {
    content: "";
    /* background-image: url(../../assets/images/bgOverlay.png); */
    right: 0;
    opacity: 0.1;
    bottom: 0;
    background-repeat: no-repeat;
    background-size: cover;
    width: 400px;
    height: 400px;
    z-index: -1;
    position: absolute;
}
@media (min-width: 1200px) {
    .info {
        margin-top: 4.2rem;
    }
}
.info h5 {
    color: var(--color-blue);
    margin-bottom: 3rem;
}
.info ul li {
    margin: 25px 0;
    color: var(--color-p);
    display: flex;
    align-items: center;
}
.info ul li .icon {
    margin-left: 10px;
    width: 40px;
    color:white;
    border-radius: 5px;
    height: 40px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    background-color: var(--color-green);
}
.info ul li svg {
    color: white;
    font-size: 18px;
}
.info .photo {
    width: 225px;
    max-height: 225px;
    overflow: hidden;
    position: relative;
    border-radius: 10px;
}

.info .photo .overlay {
    width: 100%;
    height: 100%;
    color: var(--color-green);
    content: "";
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    left: 0;
    font-size: 35px;
    top: 0;
    background-color: rgba(0, 0, 0, 0.5);
}
.info .btn {
    color: var(--color-blue);
    background-color: white;
    border-radius: 15px;
    font-size: 14px;
    width: 250px;
    margin-right: auto;
    column-gap:10px;
    margin-left: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
}
.info .btn:hover {
    color: var(--color-blue);
}
.info .btn svg {
    margin-right: 10px;
    font-size: 18px;
}
.info .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
.info .logo img{
    width:50px;
}
.info .logo h5 {
    margin: 0;
    margin-bottom: 7px;
}
.info .logo p {
    color: var(--color-text);
    font-size: 13px;
}
form .logo {
    letter-spacing: 1px;
    margin-bottom: 2rem;
}
form .logo h1 {
    font-size: 30px;
    color: var(--main-color);
}
form .logo p {
    font-size: 19px;
    color: var(--color-text);
}
form > h5 {
    color: var(--color-blue);
    margin-bottom: 4rem;
}
.lable {
    color: var(--color-p);
    font-size: 15px;
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    column-gap:10px;
}
.lable svg {
    margin-left: 7px;
}
form input[type="text"],
form input[type="email"],form input[type="number"],form input[type="password"] {
    border: 1px solid var(--main-color);
    background-color: var(--color-inp);
    border-radius: 13px;
    width: 100%;
    padding: 13px 20px;
}
.messag {
    font-size: 13px;
    display: flex;
    justify-content: space-between;
}
.messag .lable {
    display: inline-block;
    color: var(--color-green);
    margin-right: 6px;
}
.messag .count {
    color: red;
}
form input[type="submit"] {
    background-color: var(--main-color);
    color: white;
    border: none;
    box-shadow: none;
    outline: none;
    border-radius: 13px;
    padding: 10px 7rem;
    display: block;
    margin: 7rem auto 0;
}
.sgin {
    text-align: center;
    font-size: 13px;
    margin-top: 2rem;
}
.sgin a {
    color: var(--color-blue);
    text-decoration: none;
}
.logo-sgin img {
    width: 40px;
    margin-bottom: 5px;
}
.logo-sgin h1 {
    margin-bottom: 3px;
    font-size: 16px;
    color: var(--main-color);
}

.logo-sgin p {
    margin-bottom: 1.5rem;
    font-size: 11px;
    color: var(--color-text);
}
.sgin-sec form > h5 {
    margin-bottom: 1.5rem;
}
.group-btn a {
    background-color: white;
    padding: 0.7rem 1.5rem;
    color: black;
    margin: 5px;
}
.sgin-sec form input[type="text"],
.sgin-sec form input[type="email"],form input[type="number"],form input[type="password"] {
    margin-bottom: 20px;
}
.sgin-sec form input[type="submit"] {
    margin-top: 2rem;
} 
</style>