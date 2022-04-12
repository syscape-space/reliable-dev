<template>
  <right-navbar/>
  <top-navbar/>
  <section class="requsts-sec  mt-2">
    <h4>الاشتراك</h4>
    <template v-if="$root.auth_user.current_subscription">
      <div class="alert alert-success"> مشترك </div>
    </template>
    <template v-else>
      <div class="alert alert-danger">غير مشترك </div>
      <div class="card">
        <div class="card-header">الباقات المتاحة</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 text-center" v-for="item in packages">
              <h4>{{item.package_title}}</h4>
              <h4>{{item.package_price}} ر.س</h4>
              <button class="btn btn-success"  @click="requestPackage(item.id)">اشترك الان</button>
            </div>
          </div>
          <div class="row">

          </div>
        </div>
      </div>
    </template>
    <div class="card">
      <div class="card-header">الاشتراكات</div>
      <div class="card-body">
        <table class="table-striped table-bordered table text-center">
          <thead>
            <th>#</th>
            <th>حالة الاشتراك</th>
            <th>اسم الباقة</th>
            <th>الرصيد معلق</th>
            <th>مدة الاشتراك</th>
            <th>يبداء في</th>
            <th>ينتهي في</th>
          </thead>
          <tbody>
            <tr v-for="item in requests">
              <td>{{item.id}}</td>
              <td>{{$root._t('admin.'+item.request_status)}}</td>
              <td>{{item.package_id.package_title}}</td>
              <td>{{item.suspended_balance}}</td>
              <td>{{item.package_id.duration_package_days}} يوم</td>
              <td>{{item.start_at}}</td>
              <td>{{item.end_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</template>

<script>
import TopNavbar from '../components/UserProfile/TopNavbar'
import RightNavbar from '../components/UserProfile/RightNavbar'
import api from "../utils/api";
export default {
  components : { TopNavbar,RightNavbar  } ,
  name: "Subscription",
  data(){
    return{
      requests:[],
      packages:[],
    };
  },
  methods:{
    requestPackage(id){
      var temp = this.requests.filter(item=>item.request_status ==='pending')
      if (temp.length){
        this.$root.alertErrors(['هناك طلب اشتراك مرسل للأدراة بالفعل']);
      }else{
        var data = {package_id:id};
        api.post('/v1/packagerequests',data).then(res=>{
          this.getInitData();
          this.$root.alertSuccess('تم الارسال بنجاح');
        })
      }


    },
    getInitData(){
      api.get('/v1/packagerequests').then(res=>{
        this.requests = res.data.data;
        api.get('/v1/vendorpackages').then(res=>{
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

<style scoped>

</style>