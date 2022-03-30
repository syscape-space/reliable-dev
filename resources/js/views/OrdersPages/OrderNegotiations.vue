<template>
  <div v-if="negotiations.length">
    <div v-for="negotiate in negotiations">
      <router-link :to="{name:'negotiation',params:{id:negotiate.id}}" class="d-block mb-3" style="color: #21252a; text-decoration: none;">
       <ul class="your-ticket list-unstyled d-flex rounded m-0 w-100 py-2 px-3" style="background-image: linear-gradient(to right, rgba(4, 142, 129, 0.08), rgba(9, 149, 235, 0.13)); align-items: center;">
          <li><span class="me-3">منذ شهر تقريبا</span></li>
          <li>
              <div class="mx-3" style="height: 30px; width: 3px; background-color: rgb(255, 255, 255); border-radius: 10px;"></div>
          </li>
          <li>
              <div style="border-radius: 50%; background-color: rgba(224, 255, 252, 0.46);">
                
              </div>
          </li>
          <li><span class="mx-3"><span v-for="user in negotiate.users">{{user.first_name}}</span></span></li>
          <li style="margin-right: auto;">
              <div class="number-ticket d-flex">
                <span class="mx-3">
                  <button class="save-btn" style="background-color:rgb(9, 149, 235)">
                 المفاوضات 5
                  </button>
                </span>
              </div>
          </li>
        </ul>
        
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