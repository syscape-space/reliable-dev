<template>

  <div v-if="errors.length" class="alert alert-danger">
    <ul>
      <li v-for="error in errors" :key="error">{{ error }}</li>
    </ul>
  </div>
  <div v-if="success" class="alert alert-success">
    <p class="m-0 p-0" v-text="success"></p>
  </div>
  <div v-if="subscribtion_end && subscribe_end_at" class="" style="
      background: transparent linear-gradient(270deg, #df2929 0%, #ff6d6d 100%) 0% 0% no-repeat padding-box;
      min-height: 50px;
      color: white;
      min-width: 100px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;">
    <strong>الاشتراك منتهي</strong> يرجي تجديد الاشتراك
  </div>

  <div class="card tab-content border-0">
    <div class="tab-pane fade active show border-0" id="user-edit-account">
      <div class="card-header bg-transparent border-0">
        <h5 style="    font-size: 1.5rem;"><span class="p-l-5">اعدادت الحساب الخاص بك</span></h5>
      </div>
      <div>
        <div class="card-body">
          <div class="row w-100 mx-0 px-0">

            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="first_name">{{ $root._t('admin.first_name') }}<span
                    class="text-danger">*</span></label>
                <input class="form-control" v-model="first_name" :placeholder="$root._t('admin.first_name')"
                       name="first_name" type="text">
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="middle_name">{{ $root._t('admin.middle_name') }}<span class="text-danger">*</span></label>
                <input class="form-control" v-model="middle_name" :placeholder="$root._t('admin.middle_name')"
                       name="middle_name" type="text">
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="last_name">{{ $root._t('admin.last_name') }}<span
                    class="text-danger">*</span></label>
                <input class="form-control" v-model="last_name" :placeholder="$root._t('admin.last_name')"
                       name="last_name" type="text">
              </div>
            </div>


            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="name">{{ $root._t('admin.name') }}</label>
                <input class="form-control"
                       :value="(first_name ?? '') + (first_name != null ? ' ' : '') + (middle_name ?? '') + (middle_name != null ? ' ' : '') + (last_name ?? '')"
                       :placeholder="$root._t('admin.name')" name="last_name" type="text" disabled>
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="email">{{ $root._t('admin.email') }}</label>
                <input class="form-control" :value="email" :placeholder="$root._t('admin.email')" name="email"
                       type="text" disabled>
              </div>
            </div>

            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="email_verify">{{ $root._t('admin.email_verify') }}</label>
                <input class="form-control"
                       :value="email_verify == 'pending' ? $root._t('admin.pending') : $root._t('admin.pending')"
                       :placeholder="$root._t('admin.email_verify')" name="email_verify" type="text" disabled>
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="gender">{{ $root._t('admin.gender') }}<span
                    class="text-danger">*</span></label>
                <select class="form-control" v-model="gender" name="gender" id="gender">
                  <option value="0">{{ $root._t('admin.choose') }}</option>
                  <option value="male">{{ $root._t('admin.male') }}</option>
                  <option value="female">{{ $root._t('admin.female') }}</option>
                </select>
              </div>
            </div>
            <div v-if="$root.auth_user.membership_type && $root.auth_user.membership_type === 'vendor'" class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="main_department">القسم الرئيسي<span
                    class="text-danger">*</span></label>
                <select class="form-control" v-model="main_department" name="main_department" id="main_department">
                  <option :value="null">{{ $root._t('admin.choose') }}</option>
                  <option v-for="department in main_departments" :value="department.id">{{ department.department_name_ar }}</option>
                </select>
              </div>
            </div>
            <div v-if="$root.auth_user.membership_type && $root.auth_user.membership_type === 'vendor'" class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="sub_department">القسم الفرعي<span
                    class="text-danger">*</span></label>
                <select class="form-control" v-model="sub_department" name="sub_department" id="sub_department">
                  <option :value="null">{{ $root._t('admin.choose') }}</option>
                  <option v-for="department in sub_departments" :value="department.id">{{ department.department_name_ar }}</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="mobile">{{ $root._t('admin.mobile') }}</label>
                <input class="form-control" :value="mobile" :placeholder="$root._t('admin.mobile')" name="mobile"
                       type="text" disabled>
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="mobile_verify">{{ $root._t('admin.mobile_verify') }}</label>
                <input class="form-control"
                       :value="mobile_verify == 'pending' ? $root._t('admin.pending') : $root._t('admin.pending')"
                       :placeholder="$root._t('admin.mobile_verify')" name="mobile_verify" type="text" disabled>
              </div>
            </div>


            <div class="col-sm-12  col-lg-6 col-xl-8">
              <div class="form-group">
                <div class="form-group">
                  <label class="mt-3 mb-1" for="country_id">{{ $root._t('admin.country_id') }}<span class="text-danger">*</span></label>
                  <select class="form-control" v-model="country_id" name="country_id" id="country_id">
                    <option value="0" disabled>{{ $root._t('admin.choose') }}</option>
                    <option v-for="country in countries" :key="country.id" :value="country.id">
                      {{ country.country_name_ar }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <div class="form-group">
                  <label class="mt-3 mb-1" for="city_id">{{ $root._t('admin.city_id') }}<span
                      class="text-danger">*</span></label>
                  <select class="form-control" v-model="city_id" name="city_id" id="city_id">
                    <option value="0" disabled>{{ $root._t('admin.choose') }}</option>
                    <option v-for="city in cities.filter((c) => c.country_id == country_id)" :key="city.id"
                            :value="city.id">{{ city.city_name_ar }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-lg-6  col-xl-8">
              <div class="form-group">
                <label class="mt-3 mb-1" for="address">{{ $root._t('admin.address') }}</label>
                <input class="form-control" v-model="address" :placeholder="$root._t('admin.address')" name="address"
                       type="text">
              </div>
            </div>
            <div class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="account_type">{{ $root._t('admin.account_type') }}<span
                    class="text-danger">*</span></label>
                <select class="form-control" v-model="account_type" name="account_type" id="account_type"
                        :disabled="account_type != '0'">
                  <option value="0">{{ $root._t('admin.choose') }}</option>
                  <option value="individual">{{ $root._t('admin.individual') }}</option>
                  <option value="company">{{ $root._t('admin.company') }}</option>
                </select>
              </div>
            </div>
            <div v-if="subscribe_end_at" class="col-sm-12  col-lg-6 col-xl-4">
              <div class="form-group">
                <label class="mt-3 mb-1" for="subscribe_end_at">{{ $root._t('admin.subscribe_end_at') }}</label>
                <input class="form-control" v-model="subscribe_end_at" :placeholder="$root._t('admin.subscribe_end_at')"
                       name="subscribe_end_at" type="text" disabled>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="mt-2 mb-1" for="bio">{{ $root._t('admin.bio') }}</label>
                <textarea name="bio" v-model="bio" class="form-control" style="height: 100px;" rows="5"
                          v-text="bio"></textarea>
              </div>
            </div>


          </div>
        </div>
        <div class="card-footer text-right bg-white">

          <button style="
            background-color: rgb(4, 145, 232); color: white; font-size: 18px; min-height: 50px; justify-content: center; margin: 0px auto; min-width: 200px; border: 1px solid #73737d8f; outline: none; padding: 0 10px; border-radius: 10px;
          " class=" d-flex align-items-center" type="button" @click="submitForm()"
                  :disabled="loading">
            <span v-if="loading"> حفظ...</span>
            <span v-if="loading" class="spinner-border spinner-border-sm me-3 ms-1" role="status"></span>
            <span v-if="!loading">حفظ</span>
          </button>
        </div>
        <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check"
                                                                                value=""/></div>
      </div>
    </div>
  </div>

</template>
<script>
import api from '../../utils/api';

// import Vue from "vue";
// const EventBus = new Vue();
export default {
  props: ['user', 'subscribtion_end', 'countries', 'cities'],
  emits: ['refersh'],


  data() {
    return {
      errors: [],
      success: null,
      main_department: this.user?.main_department,
      sub_department: this.user?.sub_department,
      loading: false,
      first_name: this.user?.first_name,
      middle_name: this.user?.middle_name,
      last_name: this.user?.last_name,
      name: this.user?.name,
      email: this.user?.email,
      email_verify: this.user?.email_verify,
      mobile: this.user?.mobile,
      mobile_verify: this.user?.mobile_verify,
      gender: this.user?.gender ?? '0',
      country_id: this.user?.country_id ?? '0',
      city_id: this.user?.city_id ?? '0',
      subscribe_end_at: this.user?.subscribe_end_at,
      account_type: this.user?.account_type ?? '0',
      address: this.user?.address,
      bio: this.user?.bio,
      base_url: base_url,
      departments:[],
    };
  },
  mounted(){
    this.getData();
  },
  computed:{
    main_departments(){
      return this.departments.filter(item=> item.parent === null);
    },
    sub_departments(){
      return this.departments.filter(item=> item.parent !== null && item.parent === this.main_department);
    },
  },
  methods: {
    getData(){
      api.get('/v1/departments').then(res=>{
        this.departments = res.data.data;
      });
    },
    submitForm() {
      this.loading = true;
      if (this.first_name && this.middle_name && this.last_name && this.name && this.email && this.mobile && this.country_id != "0" && this.gender != "0" && this.city_id != "0" && this.account_type != "0") {

        const data = {
          'first_name': this.first_name,
          'middle_name': this.middle_name,
          'last_name': this.last_name,
          'name': this.name,
          'email': this.email,
          'mobile': this.mobile,
          'gender': this.gender,
          'country_id': this.country_id,
          'city_id': this.city_id,
          'account_type': this.account_type,
          'address': this.address,
          'bio': this.bio,
          'add_offer': this.user?.add_offer,
          'main_department':this.main_department,
          'sub_department':this.sub_department,
        };


        api.post("/profile/personal", data)
            .then((response) => {
              this.loading = false;
              this.errors = [];
              this.editable = false;
              this.$emit('refersh');
              this.success = response.data.message;
            })
            .catch((response) => {
              this.loading = false;
              this.errors = [];
              this.errors.push(response.data.message);
            });
      } else {
        this.loading = false;
        this.errors = [];
        this.errors.push('البيانات غير كاملة');
      }
    }
  }
}
</script>
<style scoped>
  .form-control {
    width: 100%;
    min-height: 50px;
    border: 1px solid #73737d8f;
    outline: none;
    padding: 0 10px;
    border-radius: 10px;
  }
  label {
    font-size: 17px !important;
    margin-bottom: 5px !important;
  }
</style>
