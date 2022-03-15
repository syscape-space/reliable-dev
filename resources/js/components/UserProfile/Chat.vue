<template>
    <section class="requsts-sec mt-4">
      <div class="chat-clinet" style="max-width: 1000px;margin: auto;">
        <ul class="chat-list list-unstyled d-flex ">
          <li class="me-2">{{ $root._t("app.ticketDetails") }}</li>
          <li class="d-flex me-5">
            <img style="width:40px" :src="base_url + '/assets/assets/images/morning.svg'" alt="">
            <p style="font-size: 13px;" class="me-1 m-0">أحمد اسلام <br>
               <span style="color: rgb(165, 164, 164);" >{{ $root._t("app.appName") }} </span> </p>
          </li>
          <li class="d-flex me-auto ms-3" >
            <img class="mx-4" :src="base_url + '/assets/assets/images/chate2.svg'" alt="">
            <img :src="base_url + '/assets/assets/images/chate.svg'" alt="">
          </li>
        </ul>
        <div class=" text-center " style=" font-size: 13px;
         "> <p class="m-0"  > <span style="background-color:#F8FAFC;
          color: rgb(177, 177, 177);
          padding: 10px;
         border-radius: 20px; "
         >may 21</span></p> 
        </div>
        <ul class="item-chat list-unstyled text-start px-0" >
          <li > 
            <div class="d-flex mb-3">
               <p class="m-0" >أحمد اسلام</p>  
              <img style="width: 30px; margin-right: 5px;" :src="base_url + '/assets/assets/images/morning.svg'" alt=""> <br>
            </div>  
            <span>
              <br>              
              <small>05:12</small>

            </span>
          </li>
          <li class="sec-list" > 
            <div class="d-flex mb-3">
              <img style="width: 30px;" :src="base_url + '/assets/assets/images/morning.svg'" alt=""> <br>
               <p class="m-0 me-2"  >أحمد اسلام</p>  
            </div>  
            <span>{{ $root._t("app.welcomeToday") }} 😁
              <br>              
              <small>05:12</small>

            </span>
          </li>
          <li > 
            <div class="d-flex mb-3">
               <p class="m-0" >أحمد اسلام</p>  
              <img style="width: 30px; margin-right: 5px;" :src="base_url + '/assets/assets/images/morning.svg'" alt=""> <br>
            </div>  
            <span>{{ $root._t("app.canIHelpYou") }}
              <br>                
              <small>05:12</small>
            </span>
          </li>
          <li class="sec-list" > 
            <div class="d-flex mb-3">
              <img style="width: 30px;" :src="base_url + '/assets/assets/images/morning.svg'" alt=""> <br>
               <p class="m-0 me-2"  >أحمد اسلام</p>  
            </div>  
            <span>{{ $root._t("app.reply") }}
              <br>                
              <small>05:12</small>
            </span>
          </li>
          
        </ul>
        <div style="background-color: #FAFAFA;" class="mt-3 d-flex align-items-center mb-3">
          <div class="d-flex align-items-center w-100 p-2  ">
            <span style="display: inline-block; padding-left: 8px; border-left: 2px solid #ddd;">
              <img :src="base_url + '/assets/assets/images/file.png'" alt="">
            </span>
            <span class="flex-grow-1">
              <input type="text" placeholder=".....اكتب تعليقك هنا" class="form-control bg-transparent border-0">
            </span>
            <span>
              <img :src="base_url + '/assets/assets/images/Frame2.png'" alt="">
            </span>
            <span>
              <button class="bg-transparent border-0">
                <img :src="base_url + '/assets/assets/images/telegram.png'" alt="">
              </button>
            </span>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>
<style scoped>

</style>