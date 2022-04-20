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
        <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">اضافة خبرة</span></h5>
      </div>
      <form v-on:submit.prevent="submitForm" ref='experienceForm'>
        <input type="hidden" v-model="user_id" name="user_id"/>


        <div class="card-body">
          <div class="row w-100 mx-0 px-0">
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
                <small v-if="experience_file" class="text-muted">{{ experience_file }}</small>
              </div>

            </div>

            <!-- end ddd -->

          </div>
        </div>
        <div class="card-footer text-right">

          <button class="btn btn-primary d-flex align-items-center" type="button" @click="submitForm()"
                  :disabled="loading || !editable">
            <span v-if="loading"> اضافة...</span>
            <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
            <span v-if="!loading">اضافة</span>
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
        <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">الخبرات المضافة </span></h5>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
            <td>المسمي</td>
            <td>الملف</td>
            <td>الحالة</td>
          </tr>
          <tr v-for="experience in experiences" :key="'experiences-'+experience.id">
            <td>{{experience.experience_name}}</td>
            <td><a :href="cloud_url + experience.experience_file">عرض</a></td>
            <td>{{ $root._t('admin.'+experience.status) }}</td>
          </tr>
        </table>
      </div>
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
      cloud_url: cloud_url,
      editable: true,
      experience_name: this.experience?.experience_name,
      experience_file: this.experience?.experience_file,
      comment: this.experience?.comment,
      experiences:[],
    };
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData(){
      api.get('/v1/userexperiences?user_id='+this.$root.auth_user.id).then(res=>{
        this.experiences = res.data.data;
      })
    },
    submitForm() {
      this.loading = true;
      if (this.user_id && this.experience_name) {
        const experienceData = new FormData(this.$refs.experienceForm);
        api.post("/v1/userexperiences", experienceData)
            .then((response) => {
              this.loading = false;
              // this.editable = false;
              this.errorMsg = null;
              this.$emit('refersh');
              this.successMsg = response.data.message;
              this.getData();
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