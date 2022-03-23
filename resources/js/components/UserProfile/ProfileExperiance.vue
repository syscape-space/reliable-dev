<template>

   
   
    <div v-if="successMsg" class="alert alert-success">
        <p class="m-0 p-0" v-text="successMsg"></p>
    </div>
     <div v-if="errorMsg" class="alert alert-danger">
        <p class="m-0 p-0" v-text="errorMsg"></p>
    </div>

    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">الخبرات</span></h5>
            </div>
            <form v-on:submit.prevent="submitForm" ref='experienceForm'>
                <input type="hidden" name="csrf_token" value="ebd97b854219e3339845763cb1846258" />
                <input type="hidden" name="token" value="NI0eiHSJ6I26pSIAihHjG1lCkUVK983_ofqxWxD2HEs" />
                <input type="hidden" v-model="user_id" name="user_id" />


                <div class="card-body">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-sm-12  col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="specialtie_id">التخصص<span class="text-danger">*</span>
                                </label>
                                <select class="form-control" v-model="specialtie_id" name="specialtie_id"
                                    id="specialtie_id" :disabled="editable == false">
                                    <option value="0">{{$root._t('admin.choose')}}</option>
                                    <option v-for="sp in specialties" :key="sp.id" :value="sp.id"
                                        :selected="sp.id == (experience?.specialtie_id ?? '')">
                                        {{sp.specialty_name_ar}}
                                    </option>
                                </select>
                            </div>
                        </div>
                      
                        <!-- ddd -->
                        <div class="col-sm-12  col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="experience_name">اسم شهادة الخبرة<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" v-model="experience_name" placeholder="اسم شهادة الخبرة"
                                    name="experience_name" type="text" :disabled="editable == false">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="experience_file">شهادة الخبرة<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="experience_file" type="file" :disabled="editable == false">
                                <small v-if="experience_file" class="text-muted">{{experience_file}}</small>
                            </div>

                        </div>
                        
                        <!-- end ddd -->
                    
                    </div>
                </div>
                <div class="card-footer text-right">

                <button class="btn btn-primary d-flex align-items-center" type="button" @click="submitForm()" :disabled="loading || !editable">
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
        props: ['user_id', 'experience', 'specialties'],
        emits: ['refersh'],
        data() {
            return {
                errorMsg: null,
                successMsg: null,
                loading: false,
                base_url: base_url,
                editable: true,
                specialties: this.specialties,
                specialtie_id: this.experience?.specialtie_id ?? "0",
                experience_name: this.experience?.experience_name,
                experience_file: this.experience?.experience_file,
                comment: this.experience?.comment,
                user_id: this.user_id,
            };
        },

        methods: {
            submitForm() {               
                this.loading = true;
                if (this.specialtie_id != "0" && this.user_id && this.experience_name) {
                    const experienceData = new FormData(this.$refs.experienceForm);
                    api.post("/profile/experience", experienceData)
                    .then((response) => {
                        this.loading = false;
                        // this.editable = false;
                        this.errorMsg = null;
                        this.$emit('refersh');
                        this.successMsg = response.data.message;
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
    }
</script>
<style scoped>

</style>