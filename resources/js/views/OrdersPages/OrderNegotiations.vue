<template>
  <div v-if="negotiations.length">
    <div v-for="negotiate in negotiations">
      <router-link :to="{name:'negotiation',params:{id:negotiate.id}}" class="col-md-4 btn btn-success">
        <label>مفاوضة مع</label>
        <br>
        <span v-for="user in negotiate.users">{{user.first_name}}</span>
      </router-link>
    </div>
  </div>
  <div v-else>
    لا يوجد
  </div>
</template>

<script>
import api from "../../utils/api";

export default {
  props:['id'],
  name: "OrderNegotiations",
  data(){
    return{
      negotiations:[],
    };
  },
  methods:{
    getNegotiations(){
      api.get('/v1/negotiations?order_id='+this.$props.id).then(res=>{
        this.negotiations = res.data.data.negotiations;
      })
    }
  },
  created() {
    this.getNegotiations();
  }
}
</script>

<style scoped>

</style>