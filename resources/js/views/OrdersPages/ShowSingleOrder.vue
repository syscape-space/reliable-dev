<template>
  <OrderRightNavbar/>
  <NewTopNavbar/>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="px-3 mb-2">
          <h1 style="font-weight: 300; font-size: 35px">{{ order_title }}</h1>
          <span style="font-size: 15px; color: #636363">
            {{ $root._t("app.home") }} <span class="mx-2">/</span>
            {{ $root._t("app.orders") }} <span class="mx-2">/</span>
            {{ deptname }} <span class="mx-2">/</span> {{ order_title }}
          </span>
        </div>

        <div class="row w-100 mx-0 px-0">
          <div class="col-lg-9">

            <div class="border row w-100 mx-0 px-0"
                  v-if="order && order.order_status !== 'archived'"
                  style="box-shadow: 1px 1px 3px #ddd; margin-bottom: 20px; margin-top: 10px;">
              <div class="col-md-4 my-4" style="color: #aeaeae">
                <div class="cir-prog" style="border-color: #048e81">
                  <img :src="base_url + '/assets/images/o_hand.svg'" alt=""/>
                </div>
                <div class="fw-bold o-num text-center" style="color: #048e81">
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
                  <img :src="base_url + '/assets/images/o_exe.svg'" alt=""/>
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
                  <img :src="base_url + '/assets/images/o_roket.svg'" alt=""/>
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
            <div v-else class="row w-100">
              <div class="col-12 alert alert-primary p-3">
                <h5 class="text-center w-100">
                  الطلب مؤرشف الان يمكنك فتح الطلب عن طريق دفع الاشتراك
                </h5>
                <button class="btn btn-sm btn-success" @click="openOrder" v-if="balanceCovered">
                  فتح الطلب
                  <span>{{$root.settings.minimum_amount_add_order}} $</span>
                </button>
                <button class="btn btn-sm btn-danger" v-else disabled>
                  لا يوجد رصيد كافي
                </button>
              </div>
            </div>
            <div>
              <h5 class="fw-bold g-color border p-2">
                {{ $root._t("app.projectDetails") }}
              </h5>
              <p style="font-size: 12px" v-html="order_details"></p>
            </div>
            <div  class="fw-bold  border p-2" v-if="order">
            <!-- <h6 style="font-size: 13px" class="d-none">اطراف الطلب</h6> -->
            <h6 style="font-size: 13px;background-image: linear-gradient(to bottom, #ff584d14, #802c2710); padding: 10px;" class="d-none">{{ $root._t("app.enemyCard") }}</h6>
            <ul
                class="list-unstyled px-0 f-12 text-end mt-0"
                v-for="item in order.entities"
                :key="item.id"
            >
              <li class="mb-3  d-inline-block">
                    <span style="min-width: 60px" class="d-block mb-2">
                      {{ $root._t("app.fullname") }}
                    </span>
                <span
                    style="margin-right: 0; color: #0995eb"
                    class="fw-bold form-control"
                >
                      {{ item.name }}
                    </span>
              </li>
              <li class="mb-3 mx-3 d-inline-block">
                    <span style="min-width: 60px" class="d-block mb-2">
                      {{ $root._t("app.nationalId") }}
                    </span>
                <span
                    style="margin-right: 0; color: #0995eb"
                    class="fw-bold form-control"
                >
                      {{ item.id_number }}
                    </span>
              </li>
              <li class="mb-3  d-inline-block">
                    <span style="min-width: 60px" class="d-block mb-2">
                      {{ $root._t("app.nationality") }}
                    </span>
                <span
                    style="margin-right: 0; color: #0995eb"
                    class="fw-bold form-control"
                >
                      {{ item.nationality }}
                    </span>
              </li>
            </ul>
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
                        <img
                            :src="base_url + '/assets/images/o_file.svg'"
                            alt=""
                        />
                        <span> {{ $root._t("app.addFiles") }} </span>
                        
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
            <div class="my-4 border btw-flex border p-2">
              <span> {{ $root._t("app.presentation") }} </span>
              <span>
                <button
                    @click="negotiateNow()"
                    v-if="$root.auth_user.membership_type === 'vendor'"
                    class="btn-offer text-white mx-2"
                    style="background-color: #0995eb"
                >
                  تفاوض
                </button>
                <div
                    class="text-center"
                    v-if="$root.auth_user.membership_type === 'user'"
                >
                  <button
                      class="btn-offer text-white mx-2"
                      style="background-color: #0995eb"
                  >
                    {{ $root._t("app.new") }}
                  </button>

                  <button class="btn-offer">{{ $root._t("app.old") }}</button>
                  <router-link
                      v-if="
                      order &&
                      order.negotiable === 'yes' &&
                      $root.auth_user.membership_type === 'user'
                    "
                      :to="{
                      name: 'order_negotiations',
                      params: { id: $props.id },
                    }"
                      class="btn me-2 btn-success btn-sm btn-offer"
                  >
                    مفاوضات
                    <span v-html="order.negotiations.length"> </span>
                  </router-link>
                </div>
              </span>
            </div>
            <offers-list ref="offers_list"/>

            <div
                class="py-2 px-3 my-3 d-inline-block rounded f-14"
                style="color: #2b7b74; background-color: #ebfffd"
            >
              <span class="ms-3 fw-bold">
                {{ $root._t("app.orderFileComplete") }}
              </span>
              <span
              ><img
                  style="width: 70px"
                  :src="base_url + '/assets/images/o_pdf.svg'"
                  alt=""
              /></span>
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
                        v-if="order_status === 'under_review'"
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px; background-color: orange;font-size: 12px; padding: 2px 7px !important;"
                    >
                      {{ $root._t("app." + order_status) }}
                    </button>
                    <button
                        v-else-if="order_status === 'open'"
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px; background-color: green; font-size: 12px; padding: 2px 7px !important;"
                    >
                      {{ $root._t("app." + order_status) }}
                    </button>
                    <button
                        v-else-if="order_status === 'closed'"
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px; background-color: red;font-size: 12px; padding: 2px 7px !important;"
                    >
                      {{ $root._t("app." + order_status) }}
                    </button>
                  </li>
                  <li class="d-flex align-items-center  mb-3 d-inline-block">
                    <span style="min-width: 85px" class="d-block">
                      {{ $root._t("app.publishDate") }}
                    </span>
                    <span
                        style="margin-right: 0; color: #0995eb"
                        class="fw-bold "
                    >
                      {{ created_at }}
                    </span>
                  </li>
                  <li class="d-flex align-items-center  mb-3 f-12">
                    <span style="min-width: 85px" class="d-block">
                      {{ $root._t("app.executionTime") }}
                    </span>
                    <span
                        style="margin-right: 0; color: #0995eb"
                        class="fw-bold "
                    >
                      {{ execution_time_num }} {{ $root._t("app.day") }}
                    </span>
                  </li>
                  <li class="d-flex align-items-center  mb-3 f-12">
                    <span style="min-width: 85px" class="d-block">
                      {{ $root._t("app.offersNum") }}
                    </span>
                    <span
                        style="margin-right: 0; color: #0995eb"
                        class="fw-bold "
                    >
                      {{ offersCount }} عرض
                    </span>
                  </li>
                  <li class="d-flex align-items-center  mb-3 f-12">
                    <span style="min-width: 85px" class="d-block">
                      المدينة
                    </span>
                    <span
                        v-if="order && order.city_id"
                        style="margin-right: 0; color: #0995eb"
                        class="fw-bold "
                    >
                      {{ order.city_id.city_name_ar }}
                    </span>
                    <span
                        v-else
                        style="margin-right: 0; color: #0995eb"
                        class="fw-bold "
                    >
                      غير محدد
                    </span>
                  </li>
                  <li class="d-flex align-items-center  mb-3 d-inline-block">
                    <span style="min-width: 85px" class="d-block">
                      {{ $root._t("app.projectOwner") }}
                    </span>
                  </li>
                  <li class="mb-3 mt-4 text-center">
                    <div class="text-center mb-2" v-if="profile_image === null">
                      <img
                          style="width: 50px; height: 50px"
                          class="uses-img"
                          :src="base_url + '/assets/images/nouser.png'"
                          alt=""
                      />
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
              <!-- <div
                  v-if="order && order.entities.length"
                  class="bg-users d-flex align-items-center f-14 p-3 text-center dataOfDefendant"
                  style="
                  background-image: linear-gradient(
                    to bottom,
                    #ff584d20,
                    #802c2710
                  );
                  border-radius: 8px;
                  background-color: transparent;
                  margin-top: 20px;
                "
              > -->
                <!-- <h6
                    style="font-size: 13px"
                    class=""
                    v-if="order.entities.length === 1"
                >
                  {{ $root._t("app.enemyCard") }}
                </h6> -->

              </div>
              <!-- هنا نهايه بيانات المدعى عليه -->
            <!-- </div> -->
            <div class="div-save p-2 mt-4">
              <div class="d-flex align-items-center">
                <div>
                  <img
                      style="width: 40px; margin-left: 8px"
                      :src="base_url + '/assets/images/o_save.svg'"
                      alt=""
                  />
                </div>
                <div class="text-white">
                  <img
                      :src="base_url + '/assets/images/sm-logo-w.svg'"
                      alt=""
                  />
                  <br/>
                  <span style="font-size: 10px">
                    <span> {{ $root._t("app.guarantee100") }} </span>
                    <span style="margin-top: -3px; display: block">
                      {{ $root._t("app.yourOrderAtTheSameTime") }}
                    </span>
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
  },
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
      list: [],
      offers: [],
      deptname: "",
      order_title: "",
      order_details: "",
      order_status: "",
      execution_time_num: "",
      orderOwnerName: "",
      profile_image: "",
      created_at: "",
      offersCount: "",
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
    openOrder(){
      api.get('/v1/open-order/'+this.order.id).then(res=>{
        this.order.order_status = "under_review";
        this.$root.alertSuccess('تم ارسال الطلب بنجاح وبأنتظار موافقة الادارة');
      });
    },
    myFunction() {
      var txt;
      if (confirm("Are you sure")) {
        this.negotiateNow();
      } else {
        console.log("closed");
      }
    },
    negotiateNow() {
      var data = {
        order_id: this.$props.id,
      };
      api.post("/v1/negotiations", data).then((res) => {
        this.$router.push({
          name: "negotiation",
          params: {id: res.data.data.negotiate.id},
        });
      });
    },
    gettingOrderDetails() {
      api
          .get("v1/orders/" + this.$props.id)
          .then((response) => {
            this.deptname =
                response.data.data["department_id"].department_name_ar;
            this.order_details = response.data.data.order_content;
            this.order_title = response.data.data.order_title;
            this.order_id = response.data.data.id;
            this.order = response.data.data;
            this.order_status = response.data.data.order_status;
            this.created_at = response.data.data.created_at;
            this.offersCount = response.data.data.offers.length;
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
  },
  computed: {
    balanceCovered(){
      var current_balance = parseInt(this.$root.auth_user.current_balance);
      var order_fees  = parseInt(this.$root.settings.minimum_amount_add_order);
      return current_balance >= order_fees;
    },
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


<style scoped>
h1 {
  font-family: "DroidArabicKufiRegular";
}
.add-o-file {
    color: #3e3f40;
    width: 141px;
    background: #ffffff;
    border: 1px solid #dee2e6;
    padding: 6px;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
</style>