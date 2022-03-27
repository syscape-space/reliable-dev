<template>
<NewTopNavbar/>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">

          <span> {{ $root._t("app.home") }} /
             {{ $root._t("app.orders") }} /
              {{ deptname }}   </span>

          <div class="row w-100 mx-0 px-0">
            <div class="col-lg-9">
              <div class="row w-100 mx-0 px-0">
                <div class="col-md-4 my-4" style="color: #AEAEAE;">
                  <div class="cir-prog" style="border-color: #048e81;">
                    <img :src="base_url+'/assets/images/o_hand.svg'" alt="">
                  </div>
                  <div 
                    class="fw-bold o-num text-center"
                    style="color: #048e81;;">
                     {{ $root._t("app.number1") }}
                  </div>
                  <div>
                    <h6 class="o-txt text-center" style="color: #0995EB; ">
                       {{ $root._t("app.deal") }}
                    </h6>
                  </div>
                </div>
                <div class="col-md-4 my-4" style="color: #AEAEAE;">
                  <div class="cir-prog">
                    <img :src="base_url+'/assets/images/o_exe.svg'" alt="">
                  </div>
                  <div class="fw-bold o-num text-center">
                     {{ $root._t("app.number2") }}
                  </div>
                  <div>
                    <h6 class="o-txt text-center" >
                       {{ $root._t("app.execution") }}
                    </h6>
                  </div>
                </div>
                <div class="col-md-4 my-4" style="color: #AEAEAE;">
                  <div class="cir-prog">
                    <img :src="base_url+'/assets/images/o_roket.svg'" alt="">
                  </div>
                  <div class="fw-bold o-num text-center">
                     {{ $root._t("app.number3") }}
                  </div>
                  <div>
                    <h6 class="o-txt text-center" >
                       {{ $root._t("app.ending") }}
                    </h6>
                  </div>
                </div>
              </div>
              <div>
                <h5 class="fw-bold g-color">  {{ $root._t("app.projectDetails") }} </h5>
                <p style="font-size:12px" v-html="order_details">
                </p>
              </div>
              <h6> {{ $root._t("app.attchFile") }} </h6>
              <div 
                class="py-2 px-3 d-inline-block rounded f-14"
                style="color: #2B7B74;background-color: #EBFFFD;">
                <span class="ms-3 fw-bold"> {{ $root._t("app.orderFileComplete") }} </span>
                <span><img style="width: 70px;" :src="base_url+'/assets/images/o_pdf.svg'" alt=""></span>
              </div>
              <h6 class="mt-3"> {{ $root._t("app.addOrder") }} </h6>
                <div class="errors">
                  <div class="alert alert-danger" v-for="error in errors" :key="error">
                    <strong>{{ error }}</strong>
                  </div>
                </div>
              <div class="row w-100 mx-0 px-0 mt-4">
                <div class="col-md-4 mb-3 f-14 ">
                  <label class="mb-2" for=""> {{ $root._t("app.deliveryTime") }} </label>
                  <input placeholder="....مدة التسليم" type="number" v-model="execution_time" class="o_input form-control">
                </div>
                <div class="col-md-4 mb-3 f-14 ">
                  <label class="mb-2" for=""> {{ $root._t("app.oderValue") }} </label>
                  <input placeholder="....قيمة العرض" type="number" v-model="price" class="o_input form-control">
                </div>
                <div class="col-md-4 mb-3 f-14 ">
                  <label class="mb-2" for=""> {{ $root._t("app.dues") }} </label>
                  <input placeholder="....مستحقاتك" type="text" class="o_input form-control">
                </div>
                <div class="col-md-12 mb-3 f-14 ">
                  <label class="mb-2" for=""> {{ $root._t("app.offerDetails") }} </label>
                  <textarea placeholder=".......تفاصيل العرض" type="text" v-model="vendor_comment" class="o_input form-control" rows="6"></textarea>
                </div>
                <div class="col-md-12 mb-3 f-14 ">
                  <label for=""> {{ $root._t("app.files") }} </label>

                  <div class="btw-flex">
                    <div class="position-relative">
                      <input style="width: 141px;" type="file" class="abs-file">
                      <div style="color: #048E81;" class="add-o-file  f-12">
                        <span> {{ $root._t("app.addFiles") }} </span>
                        <img :src="base_url+'/assets/images/o_file.svg'" alt="">
                      </div>
                    </div>
                    <div>
                      <button style="
                      height: 38px;
                        border: 0;
                        background-color: #048e81;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                      " class="rounded"
                      @click.prevent="addNewOffer()">
                      {{ $root._t("app.addOrder") }}
                    </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="my-4 btw-flex">
                <span> {{ $root._t("app.presentation") }} </span>
                <span>
                  <button
                    class="btn-offer text-white mx-2"
                     style="background-color: #0995EB;"> {{ $root._t("app.new") }} </button>
                  <button class="btn-offer"> {{ $root._t("app.old") }} </button>
                </span>
              </div>
              <offers-list :order_id="order_id"/>
            </div>
            <div class="col-md-3">
              <div>
                <div class="bg-users f-14 p-3 text-center" 
                style="background-image: linear-gradient(to bottom, #FF584D20, #802C2710); border-radius: 8px; background-color: transparent;">
                  <h6 style="font-size: 13px;"  class=""> {{ $root._t("app.projectCard") }} </h6>
                  <h6 style="font-size: 13px;" > {{ deptname }} </h6>
                  <ul class="list-unstyled px-0 f-12 text-end mt-4">
                    <li class="mb-3 f-12">
                      <span> {{ $root._t("app.projectStatus") }} </span>
                      <button
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px;"
                        > {{ $root._t("app."+order_status) }} </button>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block"> {{ $root._t("app.publishDate") }} </span>
                     <span 
                        style="margin-right: 15px;color: #0995EB;"
                        class="fw-bold "> {{ $root._t("app.hours20Ago") }} </span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block"> {{ $root._t("app.executionTime") }} </span>
                     <span 
                        style="margin-right: 15px;color: #0995EB;"
                        class="fw-bold ">  {{ execution_time_num }} {{ $root._t("app.day") }} </span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block"> {{ $root._t("app.offersNum") }} </span>
                     <span 
                        style="margin-right: 15px;color: #0995EB;"
                        class="fw-bold "> {{ $root._t("app.count") }} {{ offers_count }} {{ $root._t("app.offer") }} </span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block"> {{ $root._t("app.projectOwner") }} </span>
                    
                    </li>
                    <li class="mb-3 mt-4 text-center">
                      <div class="text-center mb-2">
                        <img style="width: 50px;height: 50px;" class="uses-img" :src="base_url+'/storage'+ profile_image " alt="">
                      </div>
                      <span class="text-center "> {{ orderOwnerName }} </span> <br>
                    
                    </li>
                  </ul>
                </div>
              </div>
              <div class="div-save p-2 mt-4 ">
                <div class="d-flex align-items-center">
                  <div>
                    <img style="width: 40px;margin-left: 8px;" :src="base_url+'/assets/images/o_save.svg'" alt="">
                  </div>
                  <div class="text-white">
                    <img  :src="base_url+'/assets/images/sm-logo-w.svg'" alt=""> <br>
                    <span style="font-size: 10px;">
                      <span> {{ $root._t("app.guarantee100") }} </span> 
                      <span style="margin-top: -3px; display: block;"> {{ $root._t("app.yourOrderAtTheSameTime") }} </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";
import OffersList from "./OffersList";
export default {
  components: {OffersList},
  mounted(){
    this.gettingOrderDetails();
    this.getOffers();
  },
  props:['id'],
  data(){
    return{
      base_url:base_url ,
      list : [] ,
      deptname : '' ,
      order_details : '' ,
      order_status : '' ,
      execution_time_num : '' ,
      orderOwnerName : '' ,
      profile_image : '' ,
      // vars for add offers on specific orders
      vendor_comment : '' ,
      price : '' ,
      execution_time : '' ,
      OrderRequestOwnerId : '' ,
      order_id : null,
      errors: null,
      // all offers which related to this order
      offers_count : '' ,
      country : '' ,
      offersList : [] ,
    };
  },
  methods:{
    gettingOrderDetails(){
      // let thisorderId = localStorage.getItem("thisOrderId"); 
      api
          .get("v1/orders/" + this.$props.id)
          .then((response) => {
           this.deptname = response.data.data['department_id'].department_name_ar 
           this.order_details = response.data.data.order_content 
           this.order_id = response.data.data.id;
           this.order_status = response.data.data.order_status
           this.execution_time_num = response.data.data.execution_time
           this.orderOwnerName = response.data.data['user_id'].name
           this.profile_image = response.data.data['user_id'].photo_profile
           this.OrderRequestOwnerId = response.data.data['user_id'].id
            
          //  let splittingOrderContent = response.data.data.data[1].order_content.split(" ") ;
            console.log( response.data.data);
          })
          .catch((e) => {
            console.log(e.response);
          });
    },
    addNewOffer(){
      // vars => order_id  , vendor_id , vendor_comment , price , execution_time
        // check if offer requester is same user who loggined 
        if( localStorage.getItem("logginedUser") === this.OrderRequestOwnerId.toString() ){
          alert('you cannot make order , you are order owner');
        }else{
          let formData = new FormData();
          formData.append("order_id", localStorage.getItem("thisOrderId"));
          formData.append("vendor_id", localStorage.getItem("logginedUser"));
          formData.append("vendor_comment", this.vendor_comment );
          formData.append("price", this.price);
          formData.append("execution_time", this.execution_time);
          formData.append("offer_status" , "pending");

            api
              .post("v1/orderoffers" , formData)
              .then((response) => {
                console.log(response)
                alert("Offer Added Successfully");
                this.getOffers();
                // this.$router.push({ name: "Ticket2" });
              })
              // error.response.data.errors
              .catch((e) => {
                this.errors = e.response.data.errors;
                console.log(e.response.data.errors);
              });
        }

        
    },
    getOffers(){
      api
        .get("v1/get_offers/" + localStorage.getItem("thisOrderId") )
        .then((response) => {
          this.offersList = response.data.allOffers;

          this.offers_count = response.data.offersCount ;
          
          console.log(response.data.allOffers);
        })
        .catch((e) => {
          console.log(e.response);
        });
    }
  }
}
</script>