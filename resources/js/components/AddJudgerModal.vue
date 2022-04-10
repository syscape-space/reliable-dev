<template>
  <button class="mohkam-btn" style="background-color: #0995EB;"  data-bs-toggle="modal" data-bs-target="#createBalanceRechargeModal">طلب محكم</button>
  <div class="modal fade" id="createBalanceRechargeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h5 class="modal-title" id="staticBackdropLabel">طلب محكم</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <input class="form-control" v-model="filter">
            </div>
            <div class="col-md-6">
              <select class="form-control" v-model="form.arbitrator_id">
                <option :value="null">اختر محكم</option>
                <option v-for="judger in judgers.filter(item=>item.name.includes(filter))" :value="judger.id">{{judger.name}}</option>
              </select>
            </div>
            <div class="col-md-12 text-center">
              <button class="btn btn-success" @click="sendRequest()" data-dismiss="modal">طلب</button>
            </div>
          </div>
          <h3>أو بيانات محكم من خارج الموقع</h3>
          <div class="row">
            <div class="col-md-6">
              <input class="form-control" v-model="judger.name" placeholder="الاسم">
            </div>
            <div class="col-md-6">
              <input class="form-control" v-model="judger.city" placeholder="المدينة">
            </div>
            <div class="col-md-12">
              <input class="form-control" v-model="judger.contact" placeholder="وسيلة اتصال">
            </div>
            <div class="col-md-12 text-center">
              <button class="btn btn-success" @click="sendJudgerRequest()" data-dismiss="modal">طلب</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../utils/api";

export default {
  name: "AddJudgerModal",
  data(){
    return{
      filter:'',
      judgers:[],
      judger:{
        name:'',
        city:'',
        contact:'',
        order_id:this.$parent.$props.id,
      },
      form:{
        arbitrator_id:null,
        order_id:null,
      },
    };
  },
  mounted() {
    this.getJudgers();
  },
  methods:{
    getJudgers(){
      api.get('/v1/judgers').then(res=>{
        this.judgers = res.data.data;
      })
    },

    sendRequest(){
      api.post('/v1/orderarbitrators',{arbitrator_id:this.form.arbitrator_id,order_id:this.$parent.$props.id}).then(res=>{
        this.$root.alertSuccess('تم ارسال الطلب بنجاح');
        this.$parent.gettingOrderDetails();
      })
    },
    sendJudgerRequest(){
      api.post('/v1/judger_requests',this.judger).then(res=>{
        this.$root.alertSuccess('تم ارسال الطلب بنجاح سيتم التواصل مع المحكم و ابلاغكم');
        this.$parent.gettingOrderDetails();
      })
    }
  }
}
</script>

<style scoped>

</style>