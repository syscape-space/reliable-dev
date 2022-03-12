<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <h6 class="my-4">بياناتك الشخصية</h6>
          <form action="">
            <div class="row w-100 mx-0 px-0">
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">الأسم بالكامل</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  id="name"
                  placeholder="محمد مصطفى  على"
                />
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">البريد الالكتروني</label>
                <input
                  class="input-personal mt-1 w-100"
                  id="email"
                  type="text"
                  placeholder="...البريد الالكتروني"
                />
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">رقم الهاتف</label>
                <input
                  class="input-personal mt-1 w-100"
                  id="mobile"
                  type="text"
                  placeholder="...رقم الهاتف"
                />
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">رفع مر فقات السجل التجاري</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...رفع مر فقات السجل التجاري"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-info.svg'" alt="" srcset=""
                  /></a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">اضافه تاريخ انتهاء السجل</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...اضافه تاريخ انتهاء السجل"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-birth.svg'" alt="" srcset=""
                  /></a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">رفع الرخصه</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...رفع الرخصه"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-info.svg'" alt="" srcset="" />
                  </a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">تاريخ انتهاء الرخصة</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...تاريخ انتهاء الرخصة"
                  />
                  <a href=""
                    ><img :src="base_url+'/assets/images/input-birth.svg'" alt="" srcset="" />
                  </a>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">الجنسية</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...رقم الهاتف"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="content-col">
                  <label style="font-size: 13px">تاريخ الميلاد</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...تاريخ الميلاد"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <h6 class="pt-4">بيانات الموقع</h6>
              </div>
              <div class="mb-3 col-md-6 mt-3">
                <div class="content-col">
                  <label style="font-size: 13px">التخصص</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...التخصص"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6 mt-3">
                <div class="content-col">
                  <label style="font-size: 13px">المسمى الوظيفي</label>
                  <input
                    class="input-personal mt-1 w-100"
                    type="text"
                    placeholder="...المسمى الوظيفي"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">نبذة</label>

                <textarea
                  class="input-personal mt-1 w-100"
                  type="text"
                  placeholder="...نبذة"
                  name=""
                  id=""
                  cols="30"
                  rows="10"
                ></textarea>
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">المهارات الشخصية</label>
                <input
                  class="input-personal mt-1 w-100"
                  type="text"
                  placeholder="...المهارات الشخصية"
                />
              </div>
              <div class="mb-3 col-md-12">
                <label style="font-size: 13px">نوع الحساب</label>
              </div>
              <div class="mb-3 col-md-12">
                <div class="d-flex align-items-center">
                  <div class="ms-3">
                    <input type="checkbox">
                    <label for="">منفذ مشاريع - بائع خدمات</label>
                  </div>
                  <div>
                    <input type="checkbox">
                    <label for="">متاح للتوظيف حالياً</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button class="save-btn" >حفظ التغييرات</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";

export default {
  data(){
    return{
      name : ""
    }
  },
  mounted() {
    if( localStorage.getItem("token") === "" ){
                this.$router.push({ name: "Login" });
    }
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/account?token=" + localStorage.getItem("token") )
        .then((response) => {
          document.getElementById("name").value = response.data.user.name;
          document.getElementById("email").value = response.data.user.email ;
          document.getElementById("mobile").value = "0"+response.data.user.mobile ;
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