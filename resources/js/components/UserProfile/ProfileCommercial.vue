<template>

    <div v-if="errors.length" class="alert alert-danger">
        <ul>
            <li v-for="error in errors" :key="error">{{ error }}</li>
        </ul>
    </div>
    <div v-if="commercial_status == 'end'" class="alert alert-warning">
        <strong>الرخصة منتهية</strong> يرجي تجديد الرخصة
    </div>

    <div v-if="successMsg" class="alert alert-success">
        <p class="m-0 p-0" v-text="successMsg"></p>
    </div>



    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">السجلات التجارية</span></h5>
            </div>
            <template v-if="parseInt(commercial.status) === 0">
              <div class="alert alert-info">
                جاري الفحص من الادارة
              </div>
            </template>
            <template v-else-if="parseInt(commercial.status) === 1">
              <div class="alert alert-success">
                تم الاعتماد
              </div>
            </template>
            <template v-else>
              <div class="alert alert-danger">
                تم الرفض من الادارة والسبب :
                <p v-html="commercial.comment"></p>
                الرجاء تصحيح الوثيقة والمحاولة
              </div>
            </template>
            <form v-on:submit.prevent="submitForm" ref='commercialForm' v-if="commercial || commercial.status == 2 || commercial.status == null  ">
                <input type="hidden" name="status" value="0" />
                <input type="hidden" v-model="user_id" name="user_id" />


                <div class="card-body">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="commercial_id">رقم السجل<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" v-model="commercial_id" placeholder="رقم السجل"
                                    name="commercial_id" type="text" :disabled="editable == false">
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="commercial_end_at">تاريخ نهاية السجل<span
                                        class="text-danger">*</span>
                                </label>
                                <input class="form-control" v-model="commercial_end_at" placeholder="تاريخ نهاية السجل"
                                    name="commercial_end_at" type="date" :disabled="editable == false">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mt-3 mb-1" for="commercial_file">رفع صورة السجل<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="commercial_file"
                                    type="file" :disabled="editable == false">
                                <small v-if="commercial_file" class="text-muted">{{commercial_file}}</small>

                            </div>
                        </div>


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
        props: ['user_id', 'commercial', 'commercial_status', 'specialties'],
        emits: ['refersh'],
        data() {
            return {
                errors: [],
                successMsg: null,
                loading: false,
                specialties: this.specialties,
                base_url: base_url,
                editable: this.commercial_status == "end" || this.commercial_status == "unset",
                specialtie_id: this.commercial?.specialtie_id ?? 0,
                commercial_id: this.commercial?.commercial_id,
                user_id: this.user_id,
                commercial_end_at: this.commercial?.commercial_end_at,
                commercial_file: this.commercial?.commercial_file,
                comment: this.commercial?.comment,
            };
        },

        methods: {
            
            submitForm() {               
                this.loading = true;
                  const commercialData = new FormData(this.$refs.commercialForm);
                  api.post("/profile/commercial", commercialData)
                  .then((response) => {
                      this.loading = false;
                      this.editable = false;
                      this.errors = [];
                      this.$emit('refersh');
                      this.successMsg = response.data.message;
                  })
                  .catch((e) => {
                      this.loading = false;
                      this.errors = [];
                      if(e.response.data.message === 'برجاء اضافة وظيفة في هذا التخصص قبل اضافة السجل'){
                          document.getElementById("chooseJobInpt").style.display = 'block';
                          document.getElementById("chooseJobInptSelector").style.border = "thick solid red";
                      }
                      this.errors= [e.response.data.message];
                  });

            },
            
        },
    }
</script>
<style scoped>

</style>