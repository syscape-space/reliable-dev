<template>
  <OrderRightNavbar/>
  <NewTopNavbar/>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <span>
          {{ $root._t("app.home") }} / {{ $root._t("app.orders") }} /
          {{ deptname }}
        </span>

        <div class="row w-100 mx-0 px-0">
          <div class="col-lg-9">
            <div class="row w-100 mx-0 px-0">
              <div class="col-md-4 my-4" style="color: #AEAEAE;">
                <div class="cir-prog" style="border-color: #048e81;">
                  <img :src="base_url+'/assets/images/o_hand.svg'" alt="">

                </div>
                <div class="fw-bold o-num text-center" style="color: #048e81 ;">
                  {{ $root._t("app.number1") }}
                </div>
                <div>
                  <h6 class="o-txt text-center" style="color: #0995eb">
                    {{ $root._t("app.deal") }}
                  </h6>
                </div>
              </div>
              <div class="col-md-4 my-4" style="color: #aeaeae">
                <div class="cir-prog">
                  <img :src="base_url+'/assets/images/o_exe.svg'" alt="">

                </div>
                <div class="fw-bold o-num text-center">
                  {{ $root._t("app.number2") }}
                </div>
                <div>
                  <h6 class="o-txt text-center">
                    {{ $root._t("app.execution") }}
                  </h6>
                </div>
              </div>
              <div class="col-md-4 my-4" style="color: #aeaeae">
                <div class="cir-prog">
                  <img :src="base_url+'/assets/images/o_roket.svg'" alt="">

                </div>
                <div class="fw-bold o-num text-center">
                  {{ $root._t("app.number3") }}
                </div>
                <div>
                  <h6 class="o-txt text-center">
                    {{ $root._t("app.ending") }}
                  </h6>
                </div>
              </div>
            </div>
            <div>
              <h5 class="fw-bold g-color">
                {{ $root._t("app.projectDetails") }}
              </h5>
              <p style="font-size: 12px" v-html="order_details"></p>
            </div>
            
            <template
                v-if="
                order &&
                order.user_id.id != $root.auth_user.id &&
                !summitedOffer
              "
            >
              <h6 class="mt-3">{{ $root._t("app.addOrder") }}</h6>
              <div class="errors">
                <div
                    class="alert alert-danger"
                    v-for="error in errors"
                    :key="error"
                >
                  <strong>{{ error }}</strong>
                </div>
              </div>
              <div class="row w-100 mx-0 px-0 mt-4">
                <div class="col-md-4 mb-3 f-14">
                  <label class="mb-2" for="">
                    {{ $root._t("app.deliveryTime") }}
                  </label>
                  <input
                      placeholder="....مدة التسليم"
                      type="number"
                      v-model="execution_time"
                      class="o_input form-control"
                  />
                </div>
                <div class="col-md-4 mb-3 f-14">
                  <label class="mb-2" for="">
                    {{ $root._t("app.oderValue") }}
                  </label>
                  <input
                      placeholder="....قيمة العرض"
                      type="number"
                      v-model="price"
                      class="o_input form-control"
                  />
                </div>
                <div class="col-md-4 mb-3 f-14">
                  <label class="mb-2" for="">
                    {{ $root._t("app.dues") }}
                  </label>
                  <input
                      placeholder="....مستحقاتك"
                      type="text"
                      class="o_input form-control"
                  />
                </div>
                <div class="col-md-12 mb-3 f-14">
                  <label class="mb-2" for="">
                    {{ $root._t("app.offerDetails") }}
                  </label>
                  <textarea
                      placeholder=".......تفاصيل العرض"
                      type="text"
                      v-model="vendor_comment"
                      class="o_input form-control"
                      rows="6"
                  ></textarea>
                </div>
                <div class="col-md-12 mb-3 f-14">
                  <label for=""> {{ $root._t("app.files") }} </label>

                  <div class="btw-flex">
                    <div class="position-relative">
                      <input
                          style="width: 141px"
                          type="file"
                          class="abs-file"
                      />
                      <div style="color: #048e81" class="add-o-file f-12">
                        <span> {{ $root._t("app.addFiles") }} </span>
                        <img :src="base_url+'/assets/images/o_file.svg'" alt="">
                      </div>
                    </div>
                    <div>
                      <button
                          style="
                          height: 38px;
                          border: 0;
                          background-color: #048e81;
                          color: #fff;
                          font-size: 12px;
                          padding: 0 40px;
                        "
                          class="rounded"
                          @click.prevent="addNewOffer()"
                      >
                        {{ $root._t("app.addOrder") }}
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </template>
            <div class="my-4 btw-flex">
              <span> {{ $root._t("app.presentation") }} </span>
              <span>
                  <div class="text-center" v-if="$root.auth_user.membership_type === 'vendor'">
                    <button
                        style="
                                border: 0;
                                background-color: #048e81;
                                color: #fff;
                                font-size: 12px;
                                padding: 0 40px;
                                height: 40px;
                              "
                        class="rounded"
                        @click="negotiateNow()"
                    >
                      {{ $root._t("app.negotiateNow") }}
                    </button>
                  </div>
                  <button
                      class="btn-offer text-white mx-2"
                      style="background-color: #0995EB;"> {{ $root._t("app.new") }} </button>
                  <button class="btn-offer"> {{ $root._t("app.old") }} </button>
                  <router-link v-if="order && $root.auth_user.membership_type === 'user'" :to="{name:'order_negotiations',params:{id:$props.id}}" class="btn me-2 btn-success btn-sm btn-offer">
                    مفاوضات
                    <span v-html="order.negotiations.length">

                    </span>
                  </router-link>
                </span>
            </div>
            <offers-list ref="offers_list"/>
            <div
                class="py-2 px-3 d-inline-block rounded f-14"
                style="color: #2B7B74;background-color: #EBFFFD;">
              <span class="ms-3 fw-bold"> {{ $root._t("app.orderFileComplete") }} </span>
              <span><img style="width: 70px; height: 70px; border-radius: 50%;" :src="base_url+'/assets/images/o_pdf.svg'" alt=""></span>
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
                <h6 style="font-size: 13px" class="">
                  {{ $root._t("app.projectCard") }}
                </h6>
                <h6 style="font-size: 13px">{{ deptname }}</h6>
                <ul class="list-unstyled px-0 f-12 text-end mt-4">
                  <li class="mb-3 f-12">
                    <span> {{ $root._t("app.projectStatus") }} </span>
                    <button
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px"
                    >
                      {{ $root._t("app." + order_status) }}
                    </button>
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.publishDate") }}
                    </span>
                    <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                    >
                      {{ $root._t("app.hours20Ago") }}
                    </span>
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.executionTime") }}
                    </span>
                    <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                    >
                      {{ execution_time_num }} {{ $root._t("app.day") }}
                    </span>
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.offersNum") }}
                    </span>
                    <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                    >
                      {{ $root._t("app.num15Offer") }}
                    </span>
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.projectOwner") }}
                    </span>
                  </li>
                  <li class="mb-3 mt-4 text-center">
                    <div class="text-center mb-2" v-if="profile_image === null">
                      <img style="width: 50px;height: 50px;" class="uses-img"
                           :src="base_url+'/assets/images/nouser.png' " alt="">

                    </div>
                    <div class="text-center mb-2" v-else>
                      <img
                          style="width: 50px; height: 50px"
                          class="uses-img"
                          :src="cloud_url + profile_image"
                          alt=""
                      />
                    </div>
                    <span class="text-center"> {{ orderOwnerName }} </span>
                    <br/>
                  </li>
                </ul>
              </div>
              <!-- هنا بدايه بيانات المدعى عليه -->
              <div
                  v-for="item in  defendantList" :key="item.id"
                  class="bg-users f-14 p-3 text-center dataOfDefendant"
                  style="
                  background-image: linear-gradient(
                    to bottom,
                    #ff584d20,
                    #802c2710
                  );
                  border-radius: 8px;
                  background-color: transparent;
                  margin-top : 20px ;
                "
              >
                <h6 style="font-size: 13px" class="">
                  {{ $root._t("app.enemyCard") }}
                </h6>
                <ul class="list-unstyled px-0 f-12 text-end mt-4">
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.fullname") }}
                    </span>
                    <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                    >
                      {{ item.name }}
                    </span>
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.nationalId") }}
                    </span>
                    <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                    >
                      {{ item.id_number }}
                    </span>
                  </li>
                  <li class="mb-3">
                    <span style="min-width: 60px" class="d-inline-block">
                      {{ $root._t("app.nationality") }}
                    </span>
                    <span
                        style="margin-right: 15px; color: #0995eb"
                        class="fw-bold"
                    >
                      {{ item.nationality }}
                    </span>
                  </li>
                </ul>
              </div>
              <!-- هنا نهايه بيانات المدعى عليه -->
            </div>
            <div class="div-save p-2 mt-4">
              <div class="d-flex align-items-center">
                <div>
                  <img style="width: 40px;margin-left: 8px;" :src="base_url+'/assets/images/o_save.svg'" alt="">
                </div>
                <div class="text-white">
                  <img :src="base_url+'/assets/images/sm-logo-w.svg'" alt=""> <br>
                  <span style="font-size: 10px;">
                    <span> {{ $root._t("app.guarantee100") }} </span>
                    <span style="margin-top: -3px; display: block;"> {{
                        $root._t("app.yourOrderAtTheSameTime")
                      }} </span>
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
import NewTopNavbar from "../../components/Orders/NewTopNavbar.vue";
import OrderRightNavbar from "../../components/Orders/OrderRightNavbar";
import OffersList from "../../components/Orders/OffersList";
import OrderNegotiations from "./OrderNegotiations";

export default {
  name: "ShowSingleOrder",
  props: ["id"],
  components: {OrderNegotiations, NewTopNavbar, OrderRightNavbar, OffersList},
  mounted() {
    this.gettingOrderDetails();
    this.getDataOfDefendant();
  },
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
      list: [],
      offers: [],
      deptname: "",
      order_details: "",
      order_status: "",
      execution_time_num: "",
      orderOwnerName: "",
      profile_image: "",
      // vars for add offers on specific orders
      vendor_comment: "",
      price: "",
      execution_time: "",
      OrderRequestOwnerId: "",
      order_id: null,
      order: null,
      errors: null,
      // vars of defendant
      defendantList: [],
    };
  },
  methods: {
    negotiateNow(){
      var data = {
        order_id:this.$props.id,
      };
      api.post('/v1/negotiations',data).then(res=>{
        this.$router.push({name:'negotiation',params:{id:res.data.data.negotiate.id}});
      })
    },
    gettingOrderDetails() {
      api
          .get("v1/orders/" + this.$props.id)
          .then((response) => {
            this.deptname =
                response.data.data["department_id"].department_name_ar;
            this.order_details = response.data.data.order_content;
            this.order_id = response.data.data.id;
            this.order = response.data.data;
            this.order_status = response.data.data.order_status;
            this.execution_time_num = response.data.data.execution_time;
            this.orderOwnerName = response.data.data["user_id"].name;
            this.profile_image = response.data.data["user_id"].photo_profile;
            this.OrderRequestOwnerId = response.data.data["user_id"].id;

            //  let splittingOrderContent = response.data.data.data[1].order_content.split(" ") ;
            this.getOffers();
            console.log(response.data.data);
          })
          .catch((e) => {
            console.log(e.response);
          });
    },
    addNewOffer() {
      // check if offer requester is same user who loggined
      if (
          localStorage.getItem("logginedUser") ===
          this.OrderRequestOwnerId.toString()
      ) {
        alert("you cannot make order , you are order owner");
      } else {
        let formData = new FormData();
        formData.append("order_id", this.$props.id);
        formData.append("vendor_id", this.$root.auth_user.id);
        formData.append("vendor_comment", this.vendor_comment);
        formData.append("price", this.price);
        formData.append("execution_time", this.execution_time);
        formData.append("offer_status", "pending");

        api
            .post("v1/orderoffers", formData)
            .then((response) => {
              console.log(response);
              this.$root.alertSuccess("Offer Added Successfully");
              // this.$router.push({ name: "Ticket2" });
            })
            // error.response.data.errors
            .catch((e) => {
              this.errors = e.response.data.errors;
              console.log(e.response.data.errors);
            });
      }
    },
    getOffers() {
      api.get("/v1/orderoffers?order_id=" + this.$props.id).then((res) => {
        this.offers = res.data.data;
      });
    },
    getDataOfDefendant() {

      api
          .get("v1/getting_defendant_data/" + this.$props.id)
          .then((response) => {
            this.defendantList = response.data.defendant
            console.log(response.data.defendant);
          })
          .catch((e) => {
            console.log(e.response);
          });
    }
  },
  computed: {
    summitedOffer() {
      var summited = false;
      if (this.offers.data) {
        this.offers.data.forEach((item) => {
          if (item.vendor && item.vendor.id == this.$root.auth_user.id) {
            summited = true;
          }
        });
      }
      return summited;
    },
  },
};
</script>