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
    }
  },
  mounted() {
    this.getSetting();
  }
}
</script>

<style scoped>

</style>