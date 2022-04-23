<template>
  <top-navbar/>
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div
            class="col-12 back mb-5 d-flex align-items-center justify-content-end"
        >
          <div class="row w-100 justify-content-end">
            <div
                class="col-xl-9 d-flex align-items-center justify-content-between"
            >
              <h4>الاشتراك</h4>

              <a style="text-decoration:none;" href="" class="icon-back">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
        </div>
        <!--  -->
        <right-navbar/>

        <div class="col-xl-9">
          <template v-if="$root.auth_user.current_subscription">
            <div class="alert alert-success"> مشترك</div>
          </template>
          <template v-else>
            <div class="alert alert-danger">غير مشترك</div>
          </template>
          <div class="packages-available mb-5">
            <h6>الباقات المتاحة</h6>
            <div class="row justify-content-between">
              <div class="col-md-6 col-xl-4 pt-xl-0 p-4 pe-xl-0" :key="'item'+item" v-for="item in packages">
                <div class="box box-one">
                  <h4>{{ item.package_title }}</h4>
                  <div class="price">
                    {{ item.package_price }}<span>ر.س</span>
                  </div>
                  <div
                      class="d-flex align-items-center justify-content-between"
                  >
                    <a href="" @click="requestPackage(item.id)" class="btn"
                    >أشترك الأن</a
                    >
                    <span class="icon"
                    ><img
                        class="img-fluid"
                        src="../assets/images/three.png"
                        alt=""
                    /></span>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="subscriptions">
            <h6>الاشتراكات</h6>

            <div class="table-resp">
              <table>
                <thead>
                <tr>
                  <th>#</th>
                  <th>حاله الأشتراك</th>
                  <th>أسم الباقة</th>
                  <th>الرصيد المعلق</th>
                  <th>مدة الاشتراك</th>
                  <th>يبداء في</th>
                  <th>ينتهي في</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in requests" :key="'itemss_'+item.id">
                  <td>{{ item.id }}</td>
                  <td>{{ $root._t('admin.' + item.request_status) }}</td>
                  <td>{{ item.package_id.package_title }}</td>
                  <td>{{ item.suspended_balance }}</td>
                  <td>{{ item.package_id.duration_package_days }} يوم</td>
                  <td>{{ item.start_at }}</td>
                  <td>{{ item.end_at }}</td>
                </tr>

                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</template>

<script>
import TopNavbar from '../components/UserProfile/TopNavbar'
import RightNavbar from '../components/UserProfile/RightNavbar'
import api from "../utils/api";

export default {
  components: {TopNavbar, RightNavbar},
  name: "Subscription",
  data() {
    return {
      requests: [],
      packages: [],
    };
  },
  methods: {
    requestPackage(id) {
      var temp = this.requests.filter(item => item.request_status === 'pending')
      if (temp.length) {
        this.$root.alertErrors(['هناك طلب اشتراك مرسل للأدراة بالفعل']);
      } else {
        var data = {package_id: id};
        api.post('/v1/packagerequests', data).then(res => {
          this.getInitData();
          this.$root.alertSuccess('تم الارسال بنجاح');
        })
      }


    },
    getInitData() {
      api.get('/v1/packagerequests').then(res => {
        this.requests = res.data.data;
        api.get('/v1/vendorpackages').then(res => {
          this.packages = res.data.data;
        })
      })
    }
  },
  mounted() {
    this.getInitData();
  }
}
</script>

<style>
/* Start Section */
body {
  background-color: #fff !important;
}

@media (min-width: 1200px) {
  .r-bar {
    margin-top: -3.7rem;
  }
}

.parent-boxes .box {
  background-color: var(--light-green-color);
  text-align: center;
  padding: 20px 15px;
  border-radius: 8px;
}

.box-info .photo {
  overflow: hidden;
  width: 102px;
  height: 102px;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;

  background-color: white;
  justify-content: center;
}

.box-info .photo img {
  width: 100%;
}

.box-info h4 {
  font-size: 22px;
  color: var(--light-blue-color);
  font-weight: normal;
  margin: 15px auto;
}

.box-info p {
    font-size: 16px;
    margin: 25px auto 19px;
}

.box-info > img {
  color: var(--green-color);
  width: 28.2px;
}

.parent-boxes .box-welcome h6 {
    color: var(--light-blue-color);
    font-size: 14px;
    margin-bottom: 15px;
}

.parent-boxes .box-welcome p {
    font-size: 14px;
}

.parent-boxes .box-welcome p span {
  margin-right: 5px;
}

.parent-boxes .box-welcome .prog {
  border-radius: 4px !important;
  height: 8px;
  background-color: var(--prog-color) !important;
}

.parent-boxes .box-welcome .prog-bar {
  background-color: var(--green-color-two) !important;
}

.parent-boxes .box-welcome .btn {
  color: white !important;
  background-color: var(--light-blue-color) !important;
  display: block !important;
  max-width: 142px !important;
  text-align: center !important;
  border-radius: 18px !important;
  padding: 7.5px 5px;
  font-size: 12px !important;
  margin: 25px auto 0;
}

.parent-boxes .box-welcome .btn:hover {
  color: white !important;
}

.parent-boxes .box-package {
  position: relative;
}

.parent-boxes .box-package svg {
  position: absolute;
  right: 15px;
  width: 23px;
  color: var(--light-blue-color);
  height: 32px;
  top: -15px;
}

.parent-boxes .box-package h6 {
  color: var(--light-blue-color);
  font-size: 14px;
  font-weight: bolder;
  margin-bottom: 15px;
}

.parent-boxes .box-package p {
  font-size: 14px;
}

.parent-boxes .box-package p:first-of-type {
    font-size: 14px;
    margin-bottom: 50px;
}

.parent-boxes .box-package p:nth-of-type(2) {
  font-size: 14px;
  margin-bottom: 15px;
  font-weight: 600;
}

.parent-boxes .box-package p:nth-of-type(3) {
  font-size: 14px;
  color: var(--dark-red-color);
  text-align: right;
  margin-bottom: 15px;
  font-weight: 600;
}

.parent-boxes .box-package .prog {
  border-radius: 4px !important;
  height: 8px;
  background-color: var(--prog-color) !important;
  margin-bottom: 25px;
}

.parent-boxes .box-package .prog-bar {
  background-color: var(--dark-red-color) !important;
}

.parent-boxes .box-package .btn {
  color: white !important;
  background-color: var(--light-blue-color) !important;
  display: block !important;
  max-width: 142px !important;
  text-align: center !important;
  border-radius: 18px !important;
  padding: 7.5px 5px;
  font-size: 12px !important;
  margin: 15px auto 0;
}

.parent-boxes .support {
  box-shadow: 15px 15px 20px #0000001a;
  max-width: 178px;
  display: flex;
  justify-content: center;
  gap: 10px;
  padding: 14.5px 5px;
  align-items: center;
  margin: auto;
  font-size: 22px;
  color: var(--green-color-two);
  text-align: center;
  border-radius: 25px;
}

.parent-boxes .support svg {
  color: var(--light-blue-color);
  font-size: 31px;
}

.back h4 {
  font-weight: 600;
  color: var(--h-color);
}

.back .icon-back {
  background-color: #b8b8b8;
  width: 57px;
  border-radius: 9px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
}

.back .icon-back {
  color: black;
  font-size: 15px;
}

.packages-available h6 {
  font-size: 18px;
  color: var(--h-color);
  font-weight: 600;
  margin-bottom: 1.5rem;
}

.packages-available .box {
  background-color: #ecf8ff;
  text-align: center;
  padding: 25px 20px;
  border-radius: 8px;
}

.packages-available .box h4 {
  color: var(--h-color);
  font-size: 24px;
  margin-bottom: 30px;
}

.packages-available .box .price {
  color: #048e81;
  font-size: 26px;
  margin-bottom: 50px;
  font-weight: 600;
}

.packages-available .btn {
  max-width: 168px;
  width: 100%;
  color: white;
  outline: none;
  font-size: 20px;
  padding: 10.9px 5px;

  box-shadow: none;
  border: none;
  border-radius: 5px;
  background-color: #0491e8;
}

.packages-available .icon {
  width: 49.5px;
  height: 85px;
  overflow: hidden;
  display: flex;
  align-items: center;
  margin-right: 5px;
  justify-content: center;
  background-color: var(--light-green-color);
}

.packages-available .icon img {
  width: 100%;
}

.subscriptions .table-resp {
  padding: 25px;
  background-color: #ecf8ff;

  overflow: auto;
}

.subscriptions table {
  overflow: hidden;
  text-align: center;
  width: 100%;
  border-radius: 8px;
}

.subscriptions table th {
  color: #0491e8;
}

.subscriptions table th,
.subscriptions table td {
  font-weight: 600;
  font-size: 18px;
  padding: 15px;
}

.subscriptions h6 {
  font-size: 18px;
  color: var(--h-color);
  font-weight: 600;
  margin-bottom: 1.5rem;
}

/* End Section */

</style>