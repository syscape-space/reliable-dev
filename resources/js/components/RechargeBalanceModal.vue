<template>
  <button class="bl-btn" style="background-color: #0995EB;"  data-bs-toggle="modal" data-bs-target="#createBalanceRechargeModal">{{ $root._t("app.chargeBalance") }}</button>
  <div class="modal fade" id="createBalanceRechargeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h5 class="modal-title" id="staticBackdropLabel">شحن رصيد</h5>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">تحويل بنكي</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">دفع الكتروني</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="p-2">
                <b>بيانات التحويل البنكي</b>
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="amount">بقيمة</label>
                      <input name="amount" id="amount" v-model="form.amount" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="transfer_name">اسم المحول</label>
                      <input name="transfer_name" id="transfer_name" v-model="form.transfer_name" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="operation_number">رقم العملية</label>
                      <input name="operation_number" id="operation_number" v-model="form.operation_number" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="bank_name">اسم البنك</label>
                      <input name="bank_name" id="bank_name" v-model="form.bank_name" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="user_note">ملاحظة</label>
                      <input name="user_note" id="user_note" v-model="form.user_note" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="transfer_image">صورة</label>
                      <input name="transfer_image" ref="transfer_image" @change="uploadImage" type="file" id="transfer_image" accept="image/*" class="form-control">
                    </div>
                    <div class="col-md-12 form-group p-2">
                      <button type="button" class="btn btn-success btn-sm" @click="sendRecharge()" data-bs-dismiss="modal">ارسال</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="p-2">
                <b>بيانات البطاقة الائتمانية</b>
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="credit-amount">بقيمة</label>
                      <input name="amount" id="credit-amount" v-model="form.amount" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="credit_number">رقم البطاقة</label>
                      <input name="credit_number" id="credit_number" v-model="form.credit_number" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="exp_date">تاريخ الانتهاء</label>
                      <input name="exp_date" id="exp_date" v-model="form.exp_date" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="csv">csv</label>
                      <input name="csv" id="csv" v-model="form.csv" class="form-control">
                    </div>
                    <div class="col-md-12 form-group p-2">
                      <button type="button" class="btn btn-success btn-sm" @click="$swal('تحت التطوير')" data-bs-dismiss="modal">ارسال</button>
                    </div>
                  </div>
                </div>
              </div>
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
  name: "RechargeBalanceModal",
  data(){
    return{
      form:{
        charge_by:'bank_transfer',
        amount:null,
        user_note:null,
        transfer_name:null,
        operation_number:null,
        bank_name:null,
        transfer_image:null,
      },
    };
  },
  methods:{
    uploadImage(){
      this.form.transfer_image = this.$refs.transfer_image.files[0];
    },
    sendRecharge(){
      const formData = new  FormData();
      formData.append('charge_by',this.form.charge_by);
      formData.append('amount',this.form.amount);
      formData.append('user_note',this.form.user_note);
      formData.append('transfer_name',this.form.transfer_name);
      formData.append('operation_number',this.form.operation_number);
      formData.append('bank_name',this.form.bank_name);
      formData.append('transfer_image',this.form.transfer_image);
      api.post('/v1/balancerecharges',formData).then(res=>{
        this.form = {
          charge_by:this.form.charge_by,
          amount:null,
          user_note:null,
          transfer_name:null,
          operation_number:null,
          bank_name:null,
          transfer_image:null,
        };
        this.$root.alertSuccess('تم الارسال بنجاح');
      }).catch(e=>{
        this.$root.alertErrors(e.response.data.errors_messages);
      })
    }
  }
}
</script>

<style scoped>

</style>