<template>
<form v-on:submit.prevent="verify" ref='verifyUserForm'>
                     <input type="hidden" name="_token" value="dQ9prgyzkwCl37RD5nHZJ4r60rP9NYoupWp0k4KT">
                     <div class="col-12 px-0 row mb-4">
                        <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img :src="front_side_url != null ? front_side_url : 'https://nafezly.com/site_images/verification/id-verify-front-side.nafezly.svg'" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 برجاء ارفاق صورة الوجه الأمامي من بطاقة تعريف الهوية الوطنية
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative text-center">
                                 <input type="file" @change="getFrontSide" name="front_side" style="height: 40px;opacity: 0;z-index: 1;position: relative;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0;overflow: hidden;" class="mx-auto" required="" accept="image/x-png,image/gif,image/jpeg">
                                 <div style="position: absolute;top: 17px;height: 40px;background: #4595FE;color: #fff; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto">
                                    ارفاق ملف
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img :src="back_side_url != null ? back_side_url : 'https://nafezly.com/site_images/verification/id-verify-back-side.nafezly.svg'" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 برجاء ارفاق صورة الوجه الخلفي من بطاقة تعريف الهوية الوطنية
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative text-center" style="cursor: pointer;">
                                 <input type="file" @change="getBackSide" name="back_side" style="height: 40px;opacity: 0;z-index: 1;position: relative;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0;overflow: hidden;" class="mx-auto" required="" accept="image/x-png,image/gif,image/jpeg">
                                 <div style="position: absolute;top: 17px;height: 40px;background: #4595FE;color: #fff; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto">
                                    ارفاق ملف
                                 </div>
                              </div>
                           </div>
                        </div>
                         <div class="col-12 col-lg-6   my-3 py-2">
                           <div class="col-12 px-0">
                              <div class="col-12 px-0 d-flex text-center justify-content-center">
                                 <img :src="selfie_url != null ? selfie_url : 'https://nafezly.com/site_images/verification/id-verify-selfie.nafezly.svg'" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
                              </div>
                              <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                                 برجاء ارفاق صورة وانت تحمل الهوية الوطنية الخاصة بك
                              </div>
                              <div class="col-12 px-0 pt-3 position-relative text-center" style="cursor: pointer;">
                                 <input type="file" @change="getSelfieSide" name="selfie" style="height: 40px;opacity: 0;z-index: 1;position: relative;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0;overflow: hidden;" class="mx-auto" required="" accept="image/x-png,image/gif,image/jpeg">
                                 <div style="position: absolute;top: 17px;height: 40px;background: #4595FE;color: #fff; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto">
                                    ارفاق ملف
                                 </div>
                              </div>
                           </div> -->
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
                                 
    
                                 <button style="position: absolute; height: 40px; border-radius: 3px;z-index: 0;cursor: pointer;width: 150px;max-width: 100%;left:0;right: 0" class="font-1 text-center py-2 mx-auto btn btn-success" type="submit" :disabled="loading || front_side_url == null || back_side_url == null || selfie_url == null ">
                                    <span v-if="loading"> جاري تقديم الطلب...</span>
                                    <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
                                    <span v-if="!loading" >تقديم طلب التوثيق</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
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
                front_side_url: null,
                back_side_url: null,
                selfie_url: null,
                back_side: null,
                selfie: null,
            };
        },

        methods: {

            getFrontSide(event) {
                const reader = new FileReader();
                if(event.target.files && event.target.files.length) {
                    const file = event.target.files[0];
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                      this.front_side_url = reader.result;               
                    }
                }
            },

            getBackSide(event) {
                const reader = new FileReader();
                if(event.target.files && event.target.files.length) {
                    const file = event.target.files[0];
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                      this.back_side_url = reader.result;               
                    }
                }               
            },

            getSelfieSide(event) {
                const reader = new FileReader();
                if(event.target.files && event.target.files.length) {
                    const file = event.target.files[0];
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                      this.selfie_url = reader.result;               
                    }
                }               
            },            
            verify() {
                this.loading = true;
                if(this.front_side_url && this.back_side_url && this.selfie_url) {
                const formData = new FormData(this.$refs.verifyUserForm);
                    api.post("/v1/identity/upload", formData)
                    .then((response) => {
                        this.loading = false;
                        this.$emit('refresh');
                        console.log(response.data.message);
                    })
                    .catch((response) => {
                        console.log(response);
                        this.loading = false;
                        this.success = null;
                        this.errorMsg = response.data.message; 
                        this.$emit('error', this.errorMsg);
                    });
                } else {
                    this.loading = false;
                    this.success = null;
                    this.errorMsg = 'البيانات غير كاملة'; 
                    this.$emit('error', this.errorMsg);
                }
            }
        }
    }
</script>
<style scoped>

</style>
