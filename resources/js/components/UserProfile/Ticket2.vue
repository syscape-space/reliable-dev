<template>
    <section class="requsts-sec mt-4">
      <div class="px-5">
        <div class="have-ticket d-flex justify-content-between">
          <div class="count-ticket">
            <img style="width: 50px" :src="base_url + '/assets/images/login-1-logo.svg'" alt="" />
            <span style="color: #048e81; font-size: 14px" class="me-4"
              >{{ $root._t("app.youHave") }} 24 {{ $root._t("app.Tickets") }}</span
            >
          </div>
          <button
            style="
              border: 0;
              background-color: #0995eb;
              color: #fff;
              font-size: 14px;
              padding: 10px 70px;
              border-radius: 7px;
            "
          >
            {{ $root._t("app.newTicket") }}
          </button>
        </div>
        <div class="your-tickets mt-5">
          <ul
            class="your-ticket list-unstyled d-flex rounded m-0 w-100 py-2 px-3"
            style="    background-image: linear-gradient(to right,#048e8114, #0995eb21);align-items: center;"
          >
            <li><img :src="base_url + '/assets/images/time.svg'" alt="" /></li>
            
            <li> <span class="me-3" >{{ $root._t("app.ago") }} {{ $root._t("app.month") }} {{ $root._t("app.almost") }} </span> </li>
            <li><div
              class="mx-3"
              style="
                height: 30px;
                width: 3px;
                background-color: #fff;
                border-radius: 10px;
              ">
            </div></li>
            <li><div
              style="
                
                border-radius: 50%;
                background-color: #e0fffc75;
              "><img style="height: 50px; width: 50px;" :src="base_url + '/assets/images/morning.svg'" alt="" />
            </div></li>
            <li> 
              <span class="mx-3" >{{ $root._t("app.goodMorning") }}</span>
            </li>
            <li style="margin-right: auto;">
              <div class="number-ticket d-flex">
                <img style="width: 20px;" :src="base_url + '/assets/images/morning1.svg'" alt="">
                <span class="mx-3">{{ $root._t("app.ticketNum") }} 1</span>
              </div>
            </li>
          </ul>
          <ul
            class="your-ticket list-unstyled d-flex rounded m-0 w-100 py-2 px-3"
            style="    background-image: linear-gradient(to right,#048e8114, #0995eb21);align-items: center;"
          >
            <li><img :src="base_url + '/assets/images/time.svg'" alt="" /></li>
            
            <li> <span class="me-3" >{{ $root._t("app.ago") }} {{ $root._t("app.month") }} {{ $root._t("app.almost") }} </span> </li>
            <li><div
              class="mx-3"
              style="
                height: 30px;
                width: 3px;
                background-color: #fff;
                border-radius: 10px;
              ">
            </div></li>
            <li><div
              style="
                
                border-radius: 50%;
                background-color: #e0fffc75;
              "><img style="height: 50px; width: 50px;" :src="base_url + '/assets/images/morning.svg'" alt="" />
            </div></li>
            <li> 
              <span class="mx-3" >{{ $root._t("app.goodMorning") }}</span>
            </li>
            <li style="margin-right: auto;">
              <div class="number-ticket d-flex">
                <img style="width: 20px;" :src="base_url + '/assets/images/morning1.svg'" alt="">
                <span class="mx-3">{{ $root._t("app.ticketNum") }} 2</span>
              </div>
            </li>
          </ul>
          <ul
            class="your-ticket list-unstyled d-flex rounded m-0 w-100 py-2 px-3"
            style="    background-image: linear-gradient(to right,#048e8114, #0995eb21);align-items: center;"
          >
            <li><img :src="base_url + '/assets/images/time.svg'" alt="" /></li>
            
            <li> <span class="me-3" >{{ $root._t("app.ago") }} {{ $root._t("app.month") }} {{ $root._t("app.almost") }} </span> </li>
            <li><div
              class="mx-3"
              style="
                height: 30px;
                width: 3px;
                background-color: #fff;
                border-radius: 10px;
              ">
            </div></li>
            <li><div
              style="
                
                border-radius: 50%;
                background-color: #e0fffc75;
              "><img style="height: 50px; width: 50px;" :src="base_url + '/assets/images/morning.svg'" alt="" />
            </div></li>
            <li> 
              <span class="mx-3" >{{ $root._t("app.goodMorning") }}</span>
            </li>
            <li style="margin-right: auto;">
              <div class="number-ticket d-flex">
                <img style="width: 20px;" :src="base_url + '/assets/images/morning1.svg'" alt="">
                <span class="mx-3">{{ $root._t("app.ticketNum") }} 3</span>
              </div>
            </li>
          </ul>
          <ul
            class="your-ticket list-unstyled d-flex rounded m-0 w-100 py-2 px-3"
            style="    background-image: linear-gradient(to right,#048e8114, #0995eb21);align-items: center;"
          >
            <li><img :src="base_url + '/assets/images/time.svg'" alt="" /></li>
            
            <li> <span class="me-3" >{{ $root._t("app.ago") }} {{ $root._t("app.month") }} {{ $root._t("app.almost") }} </span> </li>
            <li><div
              class="mx-3"
              style="
                height: 30px;
                width: 3px;
                background-color: #fff;
                border-radius: 10px;
              ">
            </div></li>
            <li><div
              style="
                
                border-radius: 50%;
                background-color: #e0fffc75;
              "><img style="height: 50px; width: 50px;" :src="base_url + '/assets/images/morning.svg'" alt="" />
            </div></li>
            <li> 
              <span class="mx-3" >{{ $root._t("app.goodMorning") }}</span>
            </li>
            <li style="margin-right: auto;">
              <div class="number-ticket d-flex">
                <img style="width: 20px;" :src="base_url + '/assets/images/morning1.svg'" alt="">
                <span class="mx-3">{{ $root._t("app.ticketNum") }} 4</span>
              </div>
            </li>
          </ul>
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