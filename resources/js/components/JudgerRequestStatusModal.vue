<template>
  <div class="row">
    <div class="col-md-6 p-2">
      <button class="btn btn-success btn-block w-100" @click="vendorUpdateJudger(judger.pivot.id,true)">قبول</button>
    </div>
    <div class="col-md-6 p-2">
      <button @click="$refs.modal.modal('show')" class="btn btn-danger btn-block w-100" >رفض</button>
    </div>
  </div>
  <t-modal ref="modal" title="طلب المحكم">
    <div>
      <h4>هل انت متأكد من رفض ؟</h4>
      <textarea placeholder="سبب الرفض" v-model="judger_refused_message" class="form-control"></textarea>
      <br>
      <button class="btn btn-success" @click="vendorUpdateJudger(judger.pivot.id)">تأكيد الرفض</button>
    </div>
  </t-modal>
</template>

<script>
import TModal from "./TModal";
import api from "../utils/api";
export default {
  name: "JudgerRequestStatusModal",
  components: {TModal},
  props:['judger'],
  data(){
    return{
      judger_refused_message:'',
    };
  },
  methods:{
    vendorUpdateJudger(id,accepted=false){
      var data = {
        _method:'PUT',
        vendor_refused_message:this.judger_refused_message,
        vendor_status:accepted?'accepted':'refused',
      };
      api.post('/v1/orderarbitrators/'+id,data).then(res=>{
        this.$parent.gettingOrderDetails();
        this.$refs.modal.modal('hide');
        this.$root.alertSuccess('تم التحديث');
      })
    },
  }
}
</script>

<style scoped>

</style>