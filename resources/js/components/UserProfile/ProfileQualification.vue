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
        <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">اضافة مؤهل</span></h5>
      </div>
      <form v-on:submit.prevent="submitForm" ref='qualificationForm'>
        <input type="hidden" name="csrf_token" value="ebd97b854219e3339845763cb1846258"/>
        <input type="hidden" name="token" value="NI0eiHSJ6I26pSIAihHjG1lCkUVK983_ofqxWxD2HEs"/>
        <input type="hidden" v-model="user_id" name="user_id"/>


        <div class="card-body">
          <div class="row w-100 mx-0 px-0">
            <!-- ddd -->
            <div class="col-sm-12  col-lg-6 col-xl-6">
              <div class="form-group">
                <label class="mt-3 mb-1" for="qualification_name">اسم شهادة الخبرة<span class="text-danger">*</span>
                </label>
                <input class="form-control" v-model="qualification_name" placeholder="اسم شهادة الخبرة"
                       name="qualification_name" type="text" :disabled="editable == false">
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-6">
              <div class="form-group">
                <label class="mt-3 mb-1" for="qualification_file">شهادة الخبرة<span class="text-danger">*</span>
                </label>
                <div class="position-relative form-control">
                  <input style="opacity:0" class="w-100" name="qualification_file" type="file" :disabled="editable == false">
                  <div class="file-icoo two"> <svg class="svg-inline--fa fa-paperclip" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path></svg><!-- <i class="fa-solid fa-paperclip"></i> Font Awesome fontawesome.com --> </div>
                </div>
                <small v-if="qualification_file" class="text-muted">{{ qualification_file }}</small>
              </div>

            </div>

            <!-- end ddd -->

          </div>
        </div>
        <div class="card-footer text-right">

          <button class="btn btn-primary d-flex align-items-center" type="submit" :disabled="loading || !editable">
            <span v-if="loading"> حفظ...</span>
            <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
            <span v-if="!loading">حفظ</span>
          </button>
        </div>
        <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check"
                                                                                value=""/></div>
      </form>
    </div>
  </div>
  <div class="card tab-content">
    <div class="tab-pane fade active show" id="user-edit-account-list">
      <div class="card-header">
        <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">المؤهلات المضافة </span></h5>
      </div>
      <div class="card-body">
        <table class="table table-bordered ">
          <tr>
            <td style="padding:10px">المسمي</td>
            <td style="padding:10px">الملف</td>
            <td style="padding:10px">الحالة</td>
          </tr>
          <tr v-for="qualification in qualifications" :key="'qualification-'+qualification.id">
            <td>{{qualification.qualification_name}}</td>
            <td><a :href="cloud_url + qualification.qualification_file">عرض</a></td>
            <td>{{ $root._t( 'admin.' + qualification.status ) }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

</template>
<script>
import api from '../../utils/api';

export default {
  props: [
      'user_id',
    'specialties'
  ],
  emits: ['refersh'],
  data() {
    return {
      errorMsg: null,
      successMsg: null,
      loading: false,
      base_url: base_url,
      cloud_url: cloud_url,
      editable: true,
      specialtie_id: "0",
      qualification_name: null,
      qualification_file: null,
      comment: null,
      qualifications: [],
    };
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData() {
      api.get('/v1/userqualifications?user_id=' + this.$root.auth_user.id).then(res => {
        this.qualifications = res.data.data;
      })
    },
    submitForm() {
      this.loading = true;
      if (this.user_id && this.qualification_name) {
        const qualificationData = new FormData(this.$refs.qualificationForm);
        api.post("/v1/userqualifications", qualificationData)
            .then((response) => {
              this.loading = false;
              // this.editable = false;
              this.errorMsg = null;
              this.$emit('refersh');
              this.successMsg = response.data.message;
              this.getData();
            })
            .catch((e) => {
              console.log(e.response.data);
              this.loading = false;
              this.successMsg = null;
              this.errorMsg = e.response.data.message;

            });
      } else {
        this.loading = false;
        this.successMsg = null;
        console.log('--------البيانات غير كاملة');
        this.errorMsg = "البيانات غير كاملة";
      }
    }
  },
}
</script>
<style scoped>

</style>