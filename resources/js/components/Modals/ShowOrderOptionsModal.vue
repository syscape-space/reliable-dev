<template>
  <t-modal title="تحقق الطلب" ref="modal">
    <div class="w-100 p-3">
      <div class="form-group">
        <input type="checkbox" id="option-1" v-model="form.option_1" value="1">
        <label class="text-danger" for="option-1">هل يوجد اي خلاف بينك وبين صاحب الطلب ؟</label>
      </div>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </p>
      <div class="form-group">
        <input type="checkbox" id="option-2" v-model="form.option_2" value="1">
        <label class="text-success" for="option-2">هل توافق علي كل شروط صاحب الطلب ؟</label>
      </div>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </p>
      <div class="w-100 text-center">
        <button class="btn btn-success" @click="submitOrderAccess()">حفظ</button>
      </div>
    </div>
  </t-modal>
</template>

<script>
import TModal from "./../TModal";
import api from "../../utils/api";

export default {
  props:['order_id'],
  name: "ShowOrderOptionsModal",
  components: {TModal},
  data(){
    return{
      form:{
        option_1:0,
        option_2:0,
      }
    };
  },
  mounted() {
  },
  methods:{
    modal(op = 'toggle'){
      this.$refs.modal.modal(op);
    },
    submitOrderAccess(){
      api.post('/v1/order-access/'+this.$props.order_id,this.form).then(res=>{
        this.$parent.gettingOrderDetails();
        this.$root.alertSuccess('تم التحقق بنجاح');
      })
    }
  }
}
</script>

<style scoped>

</style>