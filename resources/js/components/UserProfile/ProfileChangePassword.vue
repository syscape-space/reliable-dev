<template>

    
    <div v-if="success" class="alert alert-success">
        <p class="m-0 p-0" v-text="success"></p>
    </div>

    <div v-if="errorMsg" class="alert alert-danger">
        <p class="m-0 p-0" v-text="errorMsg"></p>
    </div>

    <div v-if="subscribtion_end && subscribe_end_at" class="alert alert-warning">
        <strong>الاشتراك منتهي</strong> يرجي تجديد الاشتراك
    </div>

    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><span class="p-l-5">اعدادات الحساب</span></h5>
            </div>
            <form v-on:submit.prevent="changePassword" ref='changePasswordForm'>
                <div class="card-body">
                    <div class="row w-100 mx-0 px-0">
                                    
                    <div class="col-sm-12  col-lg-6">
                        <div class="form-group">
                            <label class="mt-3 mb-1" for="current_password">{{ $root._t('admin.current_password') }}<span class="text-danger">*</span></label>
                            <input class="form-control" v-model="current_password" :placeholder="$root._t('admin.current_password')" name="current_password" type="password">
                            <small v-if="verified_password_status == 'verified'" class="text-success" >تم التحقق بنجاح</small>
                            <small v-if="verified_password_status == 'wrong'" class="text-danger" >كلمة مرور غير صحيحة</small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label class="mt-3 mb-1"></label>
                         <button class="btn btn-primary mt-3 d-flex align-items-center" type="button" @click="verifyPassword()" :disabled="verifing || !current_password">
                  <span v-if="verifing"> تحقق...</span>
                  <span v-if="verifing" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
                  <span v-if="!verifing" >تحقق</span>
                </button>
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            <label class="mt-3 mb-1" for="new_password">{{ $root._t('admin.new_password') }}<span class="text-danger">*</span></label>
                            <input class="form-control" v-model="new_password" :placeholder="$root._t('admin.new_password')" name="new_password" type="password" :disabled="verified_password_status != 'verified'">
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            <label class="mt-3 mb-1" for="password_confirmation">{{ $root._t('admin.confirm_new_password') }}<span class="text-danger">*</span></label>
                            <input class="form-control" v-model="password_confirmation" :placeholder="$root._t('admin.confirm_new_password')" name="password_confirmation" type="password" :disabled="verified_password_status != 'verified'">
                            <small v-if="!newPasswordIsMatched() && verified_password_status == 'verified' && new_password" class="text-danger">كلمة السر غير متطابقة</small>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer text-right">

                <button class="btn btn-primary d-flex align-items-center" type="submit" :disabled="loading || !newPasswordIsMatched()">
                  <span v-if="loading"> تغيير...</span>
                  <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
                  <span v-if="!loading" >تغيير</span>
                </button>
                </div>
                <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check"
                        value="" /></div>
            </form>
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
                current_password: null,
                new_password: null,
                password_confirmation: null,
                verified_password_status: '',
                allow_enter_new_password: false,
            };
        },

        methods: {

            newPasswordIsMatched() {
                return this.new_password && this.password_confirmation && this.new_password === this.password_confirmation;
            },

            verifyPassword() {
                this.verifing = true;
                this.verified_password_status = '';
                if(!this.current_password) {
                    this.success = null;
                    this.errorMsg = 'برجاء ادخال كلمة المرور';
                    return;
                }
                api.post('/v1/verify/password', {'current_password': this.current_password})
                .then((response) => {
                        this.verifing = false;
                        this.verified_password_status = 'verified';
                })
                .catch((response) => {
                        this.verifing = false;
                        this.verified_password_status = 'wrong';
                })
            },
            changePassword() {
                this.loading = true;
                if(this.current_password && this.new_password && this.password_confirmation) {
                const formData = new FormData(this.$refs.changePasswordForm);
                    api.post("/v1/change/password", formData)
                    .then((response) => {
                        this.loading = false;
                        this.errorMsg = null;
                        this.current_password = null;
                        this.new_password = null;
                        this.password_confirmation = null;
                        this.verified_password_status = '';
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
