<template>
  <order-right-navbar/>
  <NewTopNavbar/>
  <section class="requsts-sec mt-4">
    <div class="chat-clinet" style="max-width: 1000px;margin: auto;">
      <ul class="chat-list justify-content-between  list-unstyled d-flex ">
        <li class="d-flex me-5" v-if="otherUser">
          <img style="width:40px" :src="base_url+'/images/morning.svg'" alt="">
          <p style="font-size: 13px;" class="me-1 m-0">{{ otherUser.first_name }}<br>
            <span style="color: rgb(165, 164, 164);">موثوق</span></p>
        </li>
        <li class="d-flex me-5" v-else>
          لم يدخل طرف اخر المفاوضة
        </li>
        <li class="text-center">
          <span>رقم الطلب</span> <br>
          <span>{{ negotiate.order.id }}</span>
        </li>
        <li>
          <a :href="base_url+'/u_profile'" style="color:    color: #212529;">{{ negotiate.order.order_title }}</a>
        </li>
        <li>
          <span>مرحلة التفاوض</span>
        </li>
        <li class="d-flex  ms-3">
          <img class="mx-4" :src="base_url+'/images/chate2.svg'" alt="">
          <img :src="base_url+'/images/chate.svg'" alt="">
        </li>
      </ul>
      <ul class="item-chat list-unstyled text-start px-0">
        <li :class="{'sec-list':message.user.membership_type === 'user'}" v-for="message in negotiate.messages">
          
          <span class="w-100 d-block"
                style="background-color: rgb(216 240 255) !important; max-width: 90%; border-radius: 10px 2px 10px 10px !important; color: rgb(76, 80, 83);">
            <div class="d-flex mb-3">
              <div>
                <img style="width: 30px;" :src="cloud_url+message.user.photo_profile" alt=""> <br>
                <p class="m-0 me-2">{{ message.user.first_name }}</p>
              </div>
              <span :class="{'bg-primary text-white':message.user.membership_type !== 'user'}">
                <small>{{ message.created_at }}</small>
              </span>
            </div>
            <div>
              <span v-if="message.type === 'text'" v-html="message.content"></span>
              <span v-else-if="message.type === 'image'" >
                <img height="100" style="max-height: 150px" class="img-thumbnail" :src="cloud_url + message.content">
              </span>
              <span v-else-if="message.type === 'video'" >
                <video style="max-height: 200px" class="img-thumbnail" controls>
                  <source  :src="cloud_url + message.content">
                </video>
              </span>
            </div>
          </span>
        </li>
      </ul>
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <div class="border mb-2 p-1 position-relative d-inline-block text-center" style="width:28px">
            <i class="fas fa-paperclip" style="color:rgb(119 119 119)"></i>
            <input @change="uploadFile" ref="fileUploader" style="width: 28px; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0;"
                   type="file" name="" id="">
          </div>
          <br>
        </div>
        <div class="w-100 mt-3 d-flex align-items-center mb-3">
          <div class="d-flex align-items-center w-100 p-2  ">
            <!-- <span style="display: inline-block; padding-left: 8px; border-left: 2px solid #ddd;">
              <img :src="base_url+'/images/file.png'" alt="">
            </span> -->
            <span class="flex-grow-1">
              <textarea style="height: 76px;" rows="2" v-model="new_message" @keyup.enter="sendMessage"
                        placeholder=".....اكتب تعليقك هنا" class="form-control bg-transparent border-0">
              </textarea>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import OrderRightNavbar from "./Orders/OrderRightNavbar";
import LayoutNavBar from "./partials/LayoutNavBar";
import NewTopNavbar from "./Orders/NewTopNavbar";
import api from "../utils/api";
export default {
  name: "Negotiation",
  props:{
    id:{
      type:String,
      nullable:true,
    }
  },
  components: {LayoutNavBar, OrderRightNavbar,NewTopNavbar},
  data(){
    return {
      new_message:'',
      negotiate:{},
      base_url:base_url,
      cloud_url:cloud_url,
    };
  },
  methods:{
    uploadFile(){
      var file = this.$refs.fileUploader.files[0];
      var formData = new FormData();
      formData.append('negotiate_id',this.$props.id);
      formData.append('user_id',this.$root.auth_user.id);
      formData.append('content',file);
      api.post('/v1/negotiations_messages',formData).then(res=>{
        this.negotiate.messages.push({
          user:this.$root.auth_user,
          created_at:'الان',
          content:res.data.data.content,
          type:res.data.data.type,
        });
      })
    },
    getNegotiations(){
      api.get('/v1/negotiations/'+this.$props.id).then(res=>{
        this.negotiate = res.data.data;
      })
    },
    sendMessage(){
      var data = {negotiate_id:this.$props.id,user_id:this.$root.auth_user.id,content:this.new_message};
      api.post('/v1/negotiations_messages',data).then(res=>{
        data.user = this.$root.auth_user;
        data.created_at = "الأن";
        this.negotiate.messages.push(data);
        this.new_message = '';
      })
    },
  },
  computed:{
    otherUser(){
      this.negotiate.users.forEach(item=>{
        if (item.id != this.$root.auth_user.id){
          return item;
        }
      })
    }
  },
  created() {
    this.getNegotiations();
  }
}
</script>

<style scoped>
.item-chat li.sec-list>span {

}
</style>