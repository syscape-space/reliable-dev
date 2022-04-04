<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
import api from "./utils/api";

export default {
  name: "App",
  data(){
    return {
      settings:{},
      auth_user:{}
    };
  },
  setup: () => ({
    title: "welcome to vue page <3",
    _t:(key) => {
      return _.get(window.trans, key, key);
    },
    lang_loc:window.lang_loc,
  }),
  methods:{
    alertErrors(errors){
      let html = "<h4 style='text-align: right'>بيانات غير صحيحة :</h4><p style='justify-content: right;text-align:right;'>"+errors.join('<br>')+"</p>";
      this.$swal({
        icon: 'error',
        title: 'عذراً ...',
        html:html,
      });
    },
    alertSuccess(message){
      this.$swal({
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
      });
    },
    getSetting(){
      api.get('/v1/settings').then(res=>{
        this.settings = res.data.setting;
      })
    },
    getAuthUser(){
      api.get('/v1/account').then(res=>{
        this.auth_user = res.data.data;
        localStorage.setItem('auth_user_id',res.data.data.id);
      })
    },
    userLicenseAndCommercialSubmitted(){
      if (this.auth_user.membership_type === 'vendor' && (this.auth_user.license_submitted == false ||  this.auth_user.commercial_submitted == false)){
        this.$router.replace({name:'u_indexPage'});
        this.alertErrors(['يجب اكمل الرخصة و السجل التجاري .']);
      }
    }
  },
  watch:{
    $route (to, from){
      if(to.name !== 'u_indexPage'){
        this.userLicenseAndCommercialSubmitted();
      }
    }
  },
  mounted() {
    this.getSetting();
    this.getAuthUser();
    if (this.$route.name !== 'u_indexPage'){
      this.userLicenseAndCommercialSubmitted();
    }
  }
}
</script>

<style scoped>

</style>