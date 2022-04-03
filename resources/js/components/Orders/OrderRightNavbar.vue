<template>
    <section>
      <div class="dash">
        <div class="head-dash">
          <div>
            <div class="text-center pt-4">
              <div class="image-user position-relative d-inline-block">
                <img style="width: 100px;" :src="base_url+'/assets/images/white-logo.svg'" alt="" srcset="" />
              </div>
            </div>
            <ul class="px-0 list-unstyled text-center dash-list  dash-list2 mt-0 accordion" id="accordionPanelsStayOpenExample">
              <router-link :to="{name:'home'}" class="pt-0 text-center mawtheq-head d-flex justify-content-center">
                <p class="m-0 bg-transparent text-white border px-3" style="width: auto;">لوحة التحكم</p>
                </router-link>
              <li class="mt-2 text-white" v-if="$root.auth_user.membership_type === 'vendor'">
                <img
                    :src="base_url+'/assets/images/o_new.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                />
                <a @click="changeStatus('rejected')">{{ $root._t("app.rejected") }}</a>
              </li>
              <li class=""  v-if="$root.auth_user.membership_type === 'user'">
                <a href="#" id="panelsStayOpen-headingTwo" style="width:150px">
                  <img
                      :src="base_url+'/assets/images/o_under.svg'"
                      style="width: 18px"
                      alt=""
                      srcset=""
                  />
                  <span  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">  طلباتي <i class="fas fa-angle-down me-2"></i></span>
                </a>
                <div id="panelsStayOpen-collapseTwo" class=" collapse " aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="">
                    <ul class="list-unstyled">
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:''}}">كل الطلبات</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'archived'}}">{{ $root._t("app.drafts") }}</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'under_review'}}">{{ $root._t("app.waitting") }}</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'open'}}"> المفتوحة</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'refused'}}">{{ $root._t("app.rejected") }}</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'working'}}">تحت التنفيذ</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'done'}}">اكتملت</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'closed'}}">مغلقه</router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
  data(){
    return{
      base_url:base_url ,
      status: ''
    };
  },
  state:{
    selectedStatus : ''
  },
  mounted(){
    
  },
  methods:{
    changeStatus(newState){
      this.status = newState
      localStorage.setItem('filter_state', newState)
    }
  }
}
</script>