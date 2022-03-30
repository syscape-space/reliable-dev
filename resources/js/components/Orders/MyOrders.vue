<template>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="btw-flex">
          <div class="position-relative">
            
          </div>
          <div>
            <div class="btn-group">
              <button
                style="background-color: #0995eb; border-color: #0995eb"
                type="button"
                class="f-14 collapsed btn btn-danger dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-filter"></i>
                {{ $root._t("app.filter") }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">الاقدم</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">الاحدث</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- <div class="p-3 mt-3" style="background-color: #f9f9f9" v-for="item in  filterdList" :key="item.id">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px">
               <span class="ms-3">
                <span>{{ $root._t("app.present") }} 0 {{ $root._t("app.offers") }}</span>
                <img
                  style="width: 20px"
                  class="ms-1"
                  :src="base_url+'/assets/images/o_offer.svg'"
                  alt=""
                />
              </span>

              <span class="my-2" style="font-size: 12px">
                <span class="o-box ms-2">
                  <img
                    style="width: 15px"
                    class="ms-1"
                    :src="base_url+'/assets/images/o_delever.svg'"
                    alt=""
                  />
                  <span> {{ $root._t("app.deliveryTime") }} :</span>
                  <span class="me-2"> 0 {{ $root._t("app.day") }}</span>
                </span>
                <span>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
              </span>
            </div>
          </div>
          <div class="row w-100 mx-0 px-0">
            <div
              class="
                col-md-3
                text-center
                d-flex
                align-items-center
                justify-content-center
              "
            >
              <div style="border-left: 3px solid #ddd" class="px-3">
                <img
                  style="width: 60px; height: 60px; border-radius: 50%;"
                   :src="base_url+'/assets/images/user.svg'"
                  alt=""
                />
                <div>
                  <span
                    style="color: #2b7b74"
                    class="f-14  d-inline-block text-center"
                    >{{ item.user_id["name"] }}
                  </span>
                </div>

                <div>
                  <span
                    style="color: #2b7b74"
                    class="f-14 mb-2 d-inline-block text-center"
                    >{{ item.department_id["department_desc_ar"] }}
                  </span>
                </div>
                <div>
                  <p class="m-0 bg-transparent px-3" style="width: auto">
                    <b>نوع العضوية:</b> عميل
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div
                class="clicker"
                @click.prevent="showThisOrderDetails(item.id)" 
                style="cursor: pointer"
              >
                <div style="display: flex; align-items: center; justify-content: space-between;">
                  <h6 style="color: #048e81">
                    {{ $root._t("app.orderTitleHere") }}
                  </h6>
                  <div class="">
                    <div class="mb-2 text-start" style="font-size: 12px">
                      <span class="ms-3">
                        <span
                          >{{ $root._t("app.present") }} 0
                          {{ $root._t("app.offers") }}</span
                        >
                        <img
                          style="width: 20px"
                          class="ms-1"
                          :src="base_url + '/public/assets/images/o_offer.svg'"
                          alt=""
                        />
                      </span>

                      <span class="my-2" style="font-size: 12px">
                        <span class="o-box ms-2">
                          <img
                            style="width: 15px"
                            class="ms-1"
                            :src="
                              base_url + '/public/assets/images/o_delever.svg'
                            "
                            alt=""
                          />
                          <span> {{ $root._t("app.deliveryTime") }} :</span>
                          <span class="me-2"> 0 {{ $root._t("app.day") }}</span>
                        </span>
                        <span  data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel"> هل انت متأكد من رغبتك فى طلب غلق المشروع </h6>
                                <button type="button" class="ms-0 btn-close me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-end">
                                <ul class="">
                                  <li class="fw-bold mb-2">   ستلامك للمشروع يعني بأن الموثوق أنهى الاتّفاق الذي بينكما وسلّمك المشروع بشكل كامل وسيتم تحويل المبلغ مُباشرة إلى حسابه على الموقع. قبل استلام المشروع، تأكّد من الأمور التالية:</li>
                                  <li class="fw-bold mb-2">سلّمك الموثوق المشروعَ الذي طلبته حسب الاتّفاق بشكلٍ كاملٍ</li>
                                  <li class="fw-bold mb-2">إن كان المشروع بحاجة للاختبار، فتأكّد من تجربته جيدًا ومن عمل جميع خصائصه</li>
                                  <li class="fw-bold mb-2">لا تستلم المشروع إن كانت هناك أمورٌ ناقصةٌ أو غير مُكتملة بعد</li>
                                  <li class="fw-bold mb-2">لا تقلق، حتى بعد استلام المشروع ستبقى قادرًا على التواصل مع الموثوق</li>
                                  <li class="fw-bold mb-2">لا تتردّد في التّواصل معنا. إن احتجت إلى أية مُساعدة، فسنكون سُعداءَ بمُساعدتك.</li>
                                </ul>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                <button type="button" class="btn btn-danger">إغلاق</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </span>
                    </div>
                  </div>
                </div>
                <h6 style="color: #048e81"> {{ item.order_title }} </h6>
                <h6 style="color: #048e81"> {{ $root._t("app.orderContent") }} </h6>
                <p class="pb-3 f-12" v-html="item.order_content.substring(0,100)+'..' ">
                  {{ item.order_content.substring(0, 40) + ".." }}
                </p>
              </div>
              <div class=" btw-flex">
                <div></div>
                <div class="text-center">
                  <button
                    style="
                      border: 0;
                      background-color: #048e81;
                      color: #fff;
                      font-size: 12px;
                      padding: 0px 30px;
                      height: 30px;
                    "
                    class="rounded"
                  >
                    {{ $root._t("app.negotiateNow") }}
                  </button>
                </div>
                <div class="text-center">
                  <button
                    style="
                      border: 0;
                      background-color: #4ac272;
                      color: #fff;
                      font-size: 12px;
                      padding: 0px 30px;
                      height: 30px;
                    "
                    class="rounded"
                  >
                  المفاوضات <span class="badge bg-light mx-2">30</span>
                  </button>
                  <button
                    style="
                      border: 0;
                      background-color: #4ac272;
                      color: #fff;
                      font-size: 12px;
                      padding: 0px 30px;
                      height: 30px;
                    "
                    class="rounded"
                  >
                    {{ $root._t("app." + item.order_status) }}
                  </button>
                </div>
              </div>
            </div>
          </div> -->
        <div class="p-3 mt-3" style="background-color: #f9f9f9" v-for="item in  list" :key="item.id">
          <order-card :order="item"/>
        </div>

        <nav aria-label="Page navigation example" id="pagesCount">
          <ul class="pagination justify-content-center mt-2">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
</template>
<script>
import api from "../../utils/api";
import OrderCard from "./OrderCard";
export default {
  components: {OrderCard},
  data() {
    return {
      base_url: base_url,
      cloud_url:cloud_url,
      list : [] ,
      id : "" ,
      search : '' ,
      filter : '' ,
      checking : []
    };
  },
  mounted() {
    this.getMyOrders();
    document.getElementById('pagesCount').style.display = "none";
      
  },
  methods: {
    getMyOrders() {
      api
        .get("v1/orders?my=1")
        .then((response) => {
          this.list = response.data.data.data;

          if (this.list.length === 0) {
            document.getElementById("pagesCount").style.display = "none";
          } else {
            document.getElementById("pagesCount").style.display = "block";
          }

          console.log(response);
        })
        .catch((e) => {
          console.log(e.response);
        });
    },
    showThisOrderDetails(id){
      this.$router.push({ name: "ShowSingleOrder" , params:{id:id} });
    },
    getCategory(e) {
      this.filter = e.target.value;
      console.log(this.filter)
    },
    checkIfThereApprovedOffers($id){
      api
          .get("v1/check_if_there_approved_offers/" + $id)
          .then((response) => {
            this.checking = response.data.checking
            
            if( this.checking.length > 0 ){
              let offerOwnerData = response.data.checking[0].id ;
              
              this.$router.push({ name: "offerOrder2Page" , params:{id:offerOwnerData} });
            }else{
              this.showThisOrderDetails( $id );
            }
            console.log(response.data.checking);
          })
          .catch((e) => {
            console.log(e.response);
          });
    }
  },
};
</script>