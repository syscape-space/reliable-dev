<template>

    <!-- <div v-if="errors.length" class="alert alert-danger">
        <ul>
            <li v-for="error in errors" :key="error">{{ error }}</li>
        </ul>
    </div> -->
    <div v-if="license_status == 'end' && !errorMsg && !successMsg" class="alert alert-warning">
        <strong>الرخصة منتهية</strong> يرجي تجديد الرخصة
    </div>

    <div v-if="successMsg" class="alert alert-success">
        <p class="m-0 p-0" v-text="successMsg"></p>
    </div>
    <div v-if="errorMsg" class="alert alert-danger">
        <p class="m-0 p-0" v-text="errorMsg"></p>
    </div>



    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">الرخصة
                        المهنية</span></h5>
            </div>
            <form v-on:submit.prevent="submitForm" ref='licenseForm'>
                <input type="hidden" name="csrf_token" value="ebd97b854219e3339845763cb1846258" />
                <input type="hidden" name="token" value="NI0eiHSJ6I26pSIAihHjG1lCkUVK983_ofqxWxD2HEs" />
                <input type="hidden" v-model="user_id" name="user_id" />


                <div class="card-body">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="specialtie_id">التخصص<span class="text-danger">*</span>
                                </label>
                                <select class="form-control" v-model="specialtie_id" name="specialtie_id"
                                    id="specialtie_id" :disabled="editable == false">
                                    <option value=0>{{$root._t('admin.choose')}}</option>
                                    <option v-for="sp in specialties" :key="sp.id" :value="sp.id"
                                        :selected="sp.id == (license?.specialtie_id ?? '')">
                                        {{sp.specialty_name_ar}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="license_name">رقم الرخصة<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" v-model="license_name" placeholder="رقم الرخصة"
                                    name="license_name" type="text" :disabled="editable == false">
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="license_end_at">تاريخ نهاية الترخيص<span
                                        class="text-danger">*</span>
                                </label>
                                <input class="form-control" v-model="license_end_at" placeholder="تاريخ نهاية الترخيص"
                                    name="license_end_at" type="date" :disabled="editable == false">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="license_file">رفع صورة الرخصة<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="license_file"
                                    type="file"  :disabled="editable == false">
                                <small v-if="license_file" class="text-muted">{{license_file}}</small>
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="mt-2 mb-1" for="comment">معلومات اضافية</label>
                                <textarea name="comment" v-model="comment" class="form-control" style="height: 100px;"
                                    id="" rows="5" :disabled="editable == false"
                                    v-text="license?.comment ?? '' "></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">

                <button class="btn btn-primary d-flex align-items-center" type="submit" :disabled="loading || !editable">
                  <span v-if="loading"> حفظ...</span>
                  <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
                  <span v-if="!loading" >حفظ</span>
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
        props: ['user_id', 'license', 'license_status', 'specialties'],
        emits: ['refersh'],
        data() {
            return {
                errors: [],
                successMsg: null,
                errorMsg: null,
                loading: false,
                specialties: this.specialties,
                base_url: base_url,
                editable: this.license_status == "end" || this.license_status == "unset",
                specialtie_id: this.license?.specialtie_id ?? 0,
                license_name: this.license?.license_name,
                user_id: this.user_id,
                license_end_at: this.license?.license_end_at,
                license_file: this.license?.license_file,
                comment: this.license?.comment,
            };
        },

        methods: {
            submitForm() {               
                this.loading = true;
                if (this.specialtie_id != 0 && this.user_id && this.license_name && this.license_end_at) {
                    const licenseData = new FormData(this.$refs.licenseForm);
                    api.post("/profile/license", licenseData)
                    .then((response) => {
                        this.loading = false;
                        this.editable = false;
                        this.errorMsg = null;
                        this.$emit('refersh');
                        this.successMsg = response.data.message;
                        console.log('success message: ', this.successMsg);
                    })
                    .catch((e) => {
                        console.log(e.response.data.message);
                        this.loading = false;
                        this.successMsg = null;
                        this.errorMsg = e.response.data.message;
                    });
                } else {
                    this.loading = false;
                    this.successMsg = null;
                    this.errorMsg = 'البيانات غير كاملة';
                }
            }
        },
        exist(attr) {
            return typeof (attr) !== 'undefined' && attr !== null;
        },
    }
</script>
<style scoped>

</style>