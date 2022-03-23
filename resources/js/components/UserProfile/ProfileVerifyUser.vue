<template>

    
    <div v-if="success" class="alert alert-success">
        <p class="m-0 p-0" v-text="success"></p>
    </div>

    <div v-if="errorMsg" class="alert alert-danger">
        <p class="m-0 p-0" v-text="errorMsg"></p>
    </div>


    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><span class="p-l-5">تحقق الهوية </span></h5>
            </div>
                <div class="card-body">
                   <form v-on:submit.prevent="verify" ref='verifyUserForm'>
                     <input type="hidden" name="_token" value="dQ9prgyzkwCl37RD5nHZJ4r60rP9NYoupWp0k4KT">
                     <div class="col-12 px-0 row mb-4">
                        <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img src="https://nafezly.com/site_images/verification/id-verify-front-side.nafezly.svg" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 برجاء ارفاق صورة الوجه الأمامي من بطاقة تعريف الهوية الوطنية
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative text-center">
                                 <input type="file" name="front_side" style="height: 40px;opacity: 0;z-index: 1;position: relative;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0;overflow: hidden;" class="mx-auto" required="" accept="image/x-png,image/gif,image/jpeg">
                                 <div style="position: absolute;top: 17px;height: 40px;background: #4595FE;color: #fff; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto">
                                    ارفاق ملف
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img src="https://nafezly.com/site_images/verification/id-verify-back-side.nafezly.svg" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 برجاء ارفاق صورة الوجه الخلفي من بطاقة تعريف الهوية الوطنية
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative text-center" style="cursor: pointer;">
                                 <input type="file" name="back_side" style="height: 40px;opacity: 0;z-index: 1;position: relative;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0;overflow: hidden;" class="mx-auto" required="" accept="image/x-png,image/gif,image/jpeg">
                                 <div style="position: absolute;top: 17px;height: 40px;background: #4595FE;color: #fff; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto">
                                    ارفاق ملف
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img src="https://nafezly.com/site_images/verification/id-verify-selfie.nafezly.svg" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 برجاء ارفاق صورة وانت تحمل الهوية الوطنية الخاصة بك
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative text-center" style="cursor: pointer;">
                                 <input type="file" name="selfie" style="height: 40px;opacity: 0;z-index: 1;position: relative;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0;overflow: hidden;" class="mx-auto" required="" accept="image/x-png,image/gif,image/jpeg">
                                 <div style="position: absolute;top: 17px;height: 40px;background: #4595FE;color: #fff; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto">
                                    ارفاق ملف
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img src="https://nafezly.com/site_images/verification/id-verify-welcomenafezly.png" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 بتقديمك لطلب توثيق الهوية فانك توافق على شروط الاستخدام و الخصوصية
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative" style="cursor: pointer;">
                                 <button style="position: absolute; height: 40px; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto btn btn-success">
                                 تقديم طلب التوثيق
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                </div>

                <!-- <div class="card-footer text-right">
                    <button class="btn btn-primary d-flex align-items-center" type="submit" :disabled="loading">
                      <span v-if="loading"> تغيير...</span>
                      <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
                      <span v-if="!loading" >تغيير</span>
                    </button>
                </div> -->
                <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check"
                        value="" /></div>
        </div>
    </div>

</template>
<script>
import api from '../../utils/api';

    export default {
        
        data() {
            return {
                errorMsg: null,
                success: null,
                loading: false,
                verifing: false,
                front_side: null,
                back_side: null,
                selfie: null,
            };
        },

        methods: {

            verify() {
                this.loading = true;
                if(this.front_side && this.back_side && this.selfie) {
                const formData = new FormData(this.$refs.verifyUserForm);
                    api.post("/v1/change/password", formData)
                    .then((response) => {
                        this.loading = false;
                        this.errorMsg = null;
                        //...
                        this.success = response.data.message;
                    })
                    .catch((response) => {
                        console.log(response.data);
                        this.loading = false;
                        this.success = null;
                        this.errorMsg = response.data.message; 
                    });
                } else {
                    this.loading = false;
                    this.success = null;
                    this.errorMsg = 'البيانات غير كاملة'; 
                }
            }
        }
    }
</script>
<style scoped>

</style>
