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
            <div class="col-sm-12">
              <div class="form-group">
                <label class="mt-3 mb-1" for="qualification_file">شهادة الخبرة<span class="text-danger">*</span>
                </label>
                <input class="form-control" name="qualification_file" type="file" :disabled="editable == false">
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
        <table class="table table-bordered">
          <tr>
            <td>المسمي</td>
            <td>الملف</td>
            <td>الحالة</td>
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