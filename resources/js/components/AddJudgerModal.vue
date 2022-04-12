<template>
  <t-modal title="طلب محكم" ref="modal">
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
  </t-modal>
</template>

<script>
import api from "../utils/api";
import TModal from "./TModal";

export default {
  name: "AddJudgerModal",
  components: {TModal},
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
    modal(op = 'toggle'){
      this.$refs.modal.modal(op);
    },
    getJudgers(){
      api.get('/v1/judgers').then(res=>{
        this.judgers = res.data.data;
      })
    },

    sendRequest(){
      api.post('/v1/orderarbitrators',{arbitrator_id:this.form.arbitrator_id,order_id:this.$parent.$props.id}).then(res=>{
        this.$root.alertSuccess('تم ارسال الطلب بنجاح');
        this.$refs.modal.modal('hide');
        this.$parent.gettingOrderDetails();
      })
    },
    sendJudgerRequest(){
      api.post('/v1/judger_requests',this.judger).then(res=>{
        this.$root.alertSuccess('تم ارسال الطلب بنجاح سيتم التواصل مع المحكم و ابلاغكم');
        this.$refs.modal.modal('hide');
        this.$parent.gettingOrderDetails();
      })
    }
  }
}
</script>

<style scoped>

</style>