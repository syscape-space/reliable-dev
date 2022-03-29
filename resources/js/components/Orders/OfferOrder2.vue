<template>
    <NewTopNavbar/>
    <section class="container mt-2">
      <div class="personal">
        <div class="personal-info">
          <div class="row w-100 mt-4 mx-0 px-0">
            <div class="col-md-3">
              <div>
                <div
                  class="bg-users f-14 p-3 text-center"
                  style="
                    background-image: linear-gradient(
                      to bottom,
                      #ff584d20,
                      #802c2710
                    );
                    border-radius: 8px;
                    background-color: transparent;
                  "
                >
                  <h6 style="font-size: 13px" class=""> {{ $root._t("app.projectCard") }} </h6>
                  <h6 style="font-size: 13px"> {{ list.department_name_ar }}  </h6>
                  <ul class="list-unstyled px-0 f-12 text-end mt-4">
                    <li class="mb-3 f-12">
                      <span> {{ $root._t("app.projectStatus") }} </span>
                      <button
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px; background-color: #0995eb"
                      >
                        {{ $root._t("app." + list.order_status) }}
                      </button>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        > {{ $root._t("app.publishDate") }} </span
                      >
                      <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                        > {{ list.created_at }} </span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        > {{ $root._t("app.executionTime") }} </span
                      >
                      <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                        > {{ list.execution_time }} يوم</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        > {{ $root._t("app.offersNum") }} </span
                      >
                      <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                        > {{ offersCount }} عرض</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        > {{ $root._t("app.projectOwner") }} </span
                      >
                    </li>
                    <li class="mb-3 mt-4 text-center">
                      <div class="text-center mb-2">
                        <img
                          style="width: 50px; height: 50px"
                          class="uses-img"
                          :src="cloud_url+list.photo_profile"
                          alt=""
                        />
                      </div>
                      <span class="text-center"> {{ list.name }} </span> <br />
                    </li>
                    <li class="text-center">
                      <button
                        style="
                          background-color: #ff584d;
                          color: #fff;
                          font-size: 12px;
                          padding: 15px 40px;
                        "
                        class="border-0 rounded"
                      >
                        {{ $root._t("app.closeProject") }}
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row w-100 mx-0 px-0">
                <span>{{ $root._t("app.home") }} /
                   {{ $root._t("app.projects") }} / 
                  {{ list.department_name_ar }} </span>
                <div class="col-md-4 my-4" style="color: #aeaeae">
                  <div class="cir-prog" style="border-color: #048e81">
                    <img :src="base_url+'/assets/images/o_hand.svg'" alt="" />
                  </div>
                  <div class="fw-bold o-num text-center" style="color: #048e81">
                    {{ $root._t("app.number1") }}
                  </div>
                  <div>
                    <h6 class="o-txt-steps text-center" style="color: #0995eb">
                      {{ $root._t("app.negotiatePhase") }}
                    </h6>
                  </div>
                </div>
                <div class="col-md-4 my-4" style="color: #aeaeae">
                  <div class="cir-prog">
                    <img :src="base_url+'/assets/images/o_exe.svg'" alt="" />
                  </div>
                  <div class="fw-bold o-num text-center"> {{ $root._t("app.number2") }} </div>
                  <div>
                    <h6 class="o-txt-steps text-center"> {{ $root._t("app.executionPhase") }} </h6>
                  </div>
                </div>
                <div class="col-md-4 my-4" style="color: #aeaeae">
                  <div class="cir-prog">
                    <img :src="base_url+'/assets/images/o_roket.svg'" alt="" />
                  </div>
                  <div class="fw-bold o-num text-center">{{ $root._t("app.number3") }}</div>
                  <div>
                    <h6 class="o-txt-steps text-center"> {{ $root._t("app.ending") }} </h6>
                  </div>
                </div>
              </div>
              <div>
                <h5 class="fw-bold g-color"> {{ $root._t("app.projectDetails") }} </h5>
                <p style="font-size: 12px" v-html=" list.order_content ">
                  
                </p>
                <div
                class="mt-4"
                  style="
                    background-color: #ebfffd;
                    max-width: 250px;
                    padding: 8px;
                    color: #2b7b74;
                    border-radius: 4px; "
                ><p class="m-0">
                    {{ $root._t("app.projectPudget") }}  : <span class="me-4"> {{ list.price }} $ </span>
                  </p>
                </div>
                <div class="discuss-deal mt-4">
                  <h5> {{ $root._t("app.discuss") }} </h5>
                  <div class="notes-discuss my-3 me-3 d-flex">
                    <div class="btn-discuss position-relative">
                      <button
                      style="border:solid 1px #048e81;
                      color: #048e81;
                      padding: 9px 50px;
                      background-color: transparent;
                      font-size: 12px; " 
                      class=" "> {{ $root._t("app.bargainTalk") }} </button>
                      <img 
                      style="top: 50%;
                      right: 0;
                      transform: translate(-50%, -50%);
                      position: absolute; width: 30px;"
                      :src="base_url+'/assets/images/discuss.svg'" alt="" srcset="">
                    </div>
                    <div class="btn-discuss position-relative">
                      <button
                      style="border:solid 1px #a8a8a8;
                      color: #616060;
                      padding: 9px 50px;
                      background-color: transparent;
                      font-size: 12px; " 
                      class=" "> {{ $root._t("app.notes") }} </button>
                      <img 
                      style="top: 50%;
                      right: 0;
                      width: 20px;
                      transform: translate(-50%, -50%);
                      position: absolute;"
                      :src="base_url+'/assets/images/notes.svg'" alt="" srcset="">
                    </div>
                    
                  </div>
                  <div class="comments position-relative">
                    <p><span class="ms-3"> {{ $root._t("app.time") }} </span> {{ $root._t("app.howAreU") }} </p>
                    <img :src="base_url+'/assets/images/comment1_1.png'" alt="">
                  </div>
                  <div class="comments position-relative">
                    <p><span class="ms-3"> {{ $root._t("app.time") }} </span>{{ $root._t("app.howAreU") }} </p>
                    <img :src="base_url+'/assets/images/comment1_2.png'" alt="">
                  </div>
                  <div class="comments position-relative">
                    <p><span class="ms-3"> {{ $root._t("app.time") }} </span>{{ $root._t("app.howAreU") }} </p>
                    <img :src="base_url+'/assets/images/comment1_1.png'" alt="">
                  </div>
                </div>
                <div 
                    style="background-color: #FAFAFA;"
                    class="mt-3 d-flex align-items-center mb-3">
                  <div class="d-flex align-items-center w-100 p-2  ">
                    <span style="display: inline-block; padding-left: 8px; border-left: 2px solid #ddd;">
                      <img :src="base_url+'/assets/images/file.png'" alt="">
                    </span>
                    <span class="flex-grow-1" >
                      <input type="text" placeholder=".....اكتب تعليقك هنا" class="form-control bg-transparent border-0">
                    </span>
                    <span>
                      <img :src="base_url+'/assets/images/Frame2.png'" alt="">
                    </span>
                    <span>
                      <button class="bg-transparent border-0">
                        <img :src="base_url+'/assets/images/telegram.png'" alt="">
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div>
                <div
                  class="bg-users f-14 p-3 text-center"
                  style="
                    background-image: linear-gradient(
                      to bottom,
                      #ff584d20,
                      #802c2710
                    );
                    border-radius: 8px;
                    background-color: transparent;
                  "
                >
                  <h6 style="font-size: 13px" class=""> {{ $root._t("app.serviceProducerData") }} </h6>

                  <ul class="list-unstyled px-0 f-12 text-end mt-4">
                    <li class="mb-3 mt-4 text-center">
                      <div class="text-center mb-2" >
                        <img style="width: 50px;height: 50px;" class="uses-img" :src="cloud_url  +  orderOwnerProfile " alt="">
                      </div>
                      <span class="text-center">{{ orderOwner }} </span>
                    </li>
                    <li class="mb-3 f-12">
                      <span> {{ $root._t("app.projectStatus") }} </span>
                      <button
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px"
                      >
                        {{ $root._t("app." + list.order_status) }}
                      </button>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        >{{ $root._t("app.budget") }}
                      </span>
                      <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                        > {{ list.price }} $ </span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        >{{ $root._t("app.executionTime") }}</span
                      >
                      <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                        >{{ list.execution_time }} يوم</span
                      >
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px" class="d-inline-block"
                        > {{ $root._t("app.startingExecutionAge") }} </span
                      >
                      <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                      >
                        {{ list.created_at }} </span
                      >
                    </li>
                  </ul>
                </div>
                <div
                  class="btn-rceive-report d-flex justify-content-between mt-3"
                >
                  <div class="recive-report position-relative">
                    <button
                    style=" background-color: #048e81;"
                      class="border-0 rounded"
                    >
                    <img
                    :src="base_url+'/assets/images/contract.svg'"
                    alt=""
                    srcset=""
                  /> <br>
                      {{ $root._t("app.contract") }}
                    </button>
                  </div>
                  <div class="recive-report position-relative">
                    <button
                      style=" background-color: #0995eb;"
                      class="border-0 rounded"
                    >
                    <img
                    :src="base_url+'/assets/images/recive.svg'"
                    alt=""
                    srcset=""
                  />
                    <br>
                      {{ $root._t("app.recieve") }}
                    </button>
                   
                  </div>
                  <div class="recive-report position-relative">
                    <button
                      style="
                        background-color: #ff584d;
                     
                      "
                      class="border-0 rounded"
                    >
                    <img
                      :src="base_url+'/assets/images/report.svg'"
                      alt=""
                      srcset=""
                    /> <br>
                    {{ $root._t("app.report") }}
                    </button>
                    
                  </div>
                </div>
                <button class="mohkam-btn">
                  {{ $root._t("app.tightOrder") }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import NewTopNavbar from '../../components/Orders/NewTopNavbar'
import api from "../../utils/api";
export default {
    components : { NewTopNavbar },
    name: "afterAccept",
    props:['id'],
    mounted(){
      this.gettingDataOfOrderAndOffer();
      this.currentUser();
    },
  data(){
    return{
      base_url:base_url,
      cloud_url:cloud_url,
      list : [] ,
      orderOwner : '' ,
      orderOwnerProfile : '' ,
      offersCount : ''
    }
  },
  methods:{
    gettingDataOfOrderAndOffer(){
      let order_id = this.$props.id ;
      api
        .get("v1/getting_add_data_of_order_offer_owners/"+order_id)
        .then((response) => {
          this.list = response.data.allOffersAndOrdersOwners[0];
          this.offersCount = response.data.offersCount ;
          console.log(response.data.offersCount);
        })
        .catch((e) => {
          console.log(e.response.data.allOffersAndOrdersOwners[0]);
        });
    },
    currentUser() {
      api
        .get("/v1/account")
        .then((response) => {
          this.orderOwner = response.data.data.name
          this.orderOwnerProfile = response.data.photo_profile
          console.log(response.data.data.photo_profile)
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
  },
  computed:{

  },
}
</script>