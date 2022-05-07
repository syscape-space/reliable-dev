@extends('front.orders.show-layout')
@section('order-page')
    <section id="negotiate-app" class="requsts-sec mt-4" v-if="negotiate && negotiate.order">
        <div class="boxes d-flex flex-column gap-5" id="negotiate-app" v-if="negotiate && negotiate.order">
            <div class="box-order" :class="{'sec-list':message.user.membership_type === 'user'}" v-for="message in negotiate.messages">
                <div class="info">
                    <div class="photo">
                        <img
                                class="img-fluid"
                                :src="cloud_url+message.user.photo_profile"
                                alt=""
                        />
                    </div>
                    <a class="name d-block" style="text-decoration:none" :href="base_url+'/u_profile'"> @{{ message.user.first_name }} </a>
                </div>
                <div class="text">
                    <div
                            class="data flex-wrap d-flex justify-content-between align-items-center"
                    >
                        <div class="order-num mb-3 mb-lg-0">
                            طلب رقم : <span class="count">@{{ negotiate.order.id }}</span>
                        </div>
                        <div
                                class="d-flex flex-wrap align-items-center gap-3 gap-md-4"
                        >

                            <div class="deta">
                                <i class="fa-solid fa-clock"></i>
                                @{{ message.created_at }}
                            </div>
                        </div>
                    </div>
                    <h5 class="title">
                        @{{ negotiate.order.order_title }}
                    </h5>
                    <div
                            class="d-flex align-items-top justify-content-between flex-wrap"
                    >
                        <div class="text-wrapper-div msg__body copy wb " style="    font-size: 16px;">
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

                        <div
                                class="group-btn m-auto m-lg-0 d-flex flex-column gap-3"
                        >

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-clinet" style="margin: auto;">


            <div style="background-color: #ECF8FF;border-radius: 10px;border: 1px solid #0491E8;" class="p-2">
                    <div class="d-flex">
                       <span style="display: flex; align-items: center; justify-content: space-around; min-width: 70px;">
                        <span class="position-relative">
                            <i style="color: rgb(111, 111, 111);" class="fas fa-folder"></i>
                            <input @change="uploadFile" ref="fileUploader" style="width: 28px; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0;"
                                   type="file" name="" id="">
                        </span>
                        <span>
                            <i style="color: rgb(111, 111, 111);" class="fas fa-microphone"></i>
                        </span>
                       </span>
                       <textarea v-model="new_message" @keyup.enter="sendMessage" style="padding: 12px 10px 0; height: 50px;" placeholder="اكتب تعليقك هنا" name="" id="" cols="30" rows="2" class="form-control bg-transparent border-0"></textarea>
                       <div style="display: flex; align-items: center; justify-content: space-around; min-width: 70px;">
                        <span><i class="fas fa-ellipsis-v"></i></span>
                        <img @click="sendMessage" style="width: 40px;height:40px;" :src="base_url+'/images/telegram.png'" alt="">
                       </div>

                    </div>
            </div>

        </div>
    </section>
    @push('page_scripts')
        <script>
            var negotiate_app = new Vue({
                el:'#negotiate-app',
                data:{
                    new_message:'',
                    negotiate:{},
                    base_url:'{{asset('/')}}',
                    cloud_url:'{{it()->url('/')}}',
                },
                methods:{
                    uploadFile(){
                        var file = this.$refs.fileUploader.files[0];
                        var formData = new FormData();
                        formData.append('negotiate_id','{{$active_negotiation->id}}');
                        formData.append('user_id','{{auth()->id()}}');
                        formData.append('content',file);
                        api.post('/v1/negotiations_messages',formData).then(res=>{
                            this.getNegotiations();
                        })
                    },
                    getNegotiations(){
                        api.get('/v1/negotiations/'+'{{$active_negotiation->id}}').then(res=>{
                            this.negotiate = res.data.data;
                        })
                    },
                    sendMessage(){
                        var data = {
                            negotiate_id:'{{$active_negotiation->id}}',
                            user_id:'{{auth()->id()}}',
                            content:this.new_message
                        };
                        api.post('/v1/negotiations_messages',data).then(res=>{
                            this.getNegotiations();
                            this.new_message = '';
                        })
                    },
                },
                computed:{

                },
                created() {
                    this.getNegotiations();
                }
            });
        </script>
    @endpush
@endsection
