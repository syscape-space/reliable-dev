<template>
  <section class=" py-4">
    <div class="container" v-if="order">
      <p class="text-secondary mb-3">
        إدارة العقود &#62; إنشاء عقد جديد
      </p>
      <div class="bg-white create p-4">
        <div class="row align-items-center">
          <div
              class="col-md-3 text-center mb-5 mb-md-0 text-md-end"
          >
            <h4 class="text-black-50">إنشاء عقد جديد للطلب رقم (
              {{order.id}}
              )</h4>
          </div>
          <div class="col md-9 text-center">
            <ul>
              <li>1</li>
              <li>2</li>
              <li>3</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="type bg-white p-4">
        <form action="#" methos="get">
          <div class="stage-one" v-if="step === 1">
            <h4 class="text-center text-md-end mt-3 mb-4">حدد نوع العقد</h4>
            <a href="#" class="text-black-50 d-block text-start mb-2"
            >إدارة نماذج العقود؟</a
            >
            <div class="model">
              <h6 class="mb-3">النماذج</h6>
              <div class="box" v-for="template in templates" :key="'template-'+template.id">
                <div>
                  <input
                      type="radio"
                      name="contract_template_id"
                      :value="template.id"
                      v-model="contract.contract_template_id"
                      id="contract_template_id"
                  />
                  <label for="contract_template_id"
                  ><i class="fas check fa-circle-check"></i
                  >{{ template.title }}</label
                  >
                </div>
              </div>
            </div>
            <div class="lang"><h6 class="mb-3">أختر لغة العقد</h6>
              <div class="box">
                <div>
                  <input
                      type="radio"
                      name="lang"
                      value="ar-en"
                      id="ar-en"
                      v-model="contract.lang"

                  />
                  <label for="ar-en"
                  ><i class="fas check fa-circle-check"></i
                  >عربية و إنجليزية</label
                  >
                </div>
                <div>
                  <input
                      type="radio"
                      name="lang"
                      value="ar"
                      id="ar"
                      v-model="contract.lang"

                  />
                  <label for="ar"
                  ><i class="fas check fa-circle-check"></i
                  >العربية فقط</label
                  >
                </div>
              </div>
            </div>
            <div class="date"><h6 class="mb-3">أختار نوع التقويم الرائيسي</h6>
              <div class="box">
                <div>
                  <input
                      type="radio"
                      name="date"
                      v-model="contract.date_type"
                      value="ad"
                      id="ad"

                  />
                  <label for="ad"
                  ><i class="fas check fa-circle-check"></i
                  >ميلادي</label
                  >
                </div>
                <div>
                  <input
                      type="radio"
                      name="date"
                      value="hijri"
                      id="hijri"
                      v-model="contract.date_type"

                  />
                  <label for="hijri"
                  ><i class="fas check fa-circle-check"></i
                  >هجري</label
                  >
                </div>
              </div>
            </div>
            <div class=" buttons flex-column flex-md-row d-flex justify-content-center gap-3">
              <button :disabled="contract.contract_template_id === null" @click="step++" class="next submit">التالي
              </button>
            </div>
          </div>
          <div class="stage-two mb-4" v-if="step === 2">
            <h4 class="text-center text-md-end mt-3 mb-4">أدخل تفاصيل العقد</h4>
            <div class="row">
              <div class="col-12 mb-4">
                <div class="box-one box row">
                  <div class="card-box col-md-6"><h6><span class="char">-</span>بيانات العميل (الطرف الأول) </h6>
                    <div class="box-form">
                      <p class="label">أسم العميل</p>
                      <p class="info customer-name ">{{order.user_id.name}}</p>
                      <span class="d-inline-block ms-4">
                                            <p class="label">رقم الجوال</p>
                                        <p class="info customer-mobile">{{order.user_id.mobile}}</p>
                                        </span>
                      <span class="d-inline-block">
                                            <p class="label">رقم الهوية</p>
                                        <p class="info customer-id">{{order.user_id.id_number}}</p>
                                        </span>
                      <p class="label">عنوان العميل</p>
                      <p class="info customer-address">{{order.user_id.address}}</p>
                    </div>
                  </div>
                  <div class="card-box col-md-6"><h6><span class="char">-</span>بيانات مقدم الخدمة (الطرف الثاني) </h6>
                    <div class="box-form">
                      <p class="label">أسم مقدم الخدمة</p>
                      <p class="info presenter-name">{{order.active_vendor.name}}</p>
                      <span class="d-inline-block ms-4">
                                                <p class="label">رقم السجل التجاري</p>
                                            <p class="info presenter-record">1-2330307</p>
                                            </span>
                      <span class="d-inline-block">
                                                <p class="label">رقم الترخيص</p>
                                            <p class="info presenter-license">1010744867</p>
                                            </span>
                      <span class="d-inline-block ms-4">
                                                <p class="label">رقم الجوال</p>
                                            <p class="info presenter-mobile">{{order.active_vendor.mobile}}</p>
                                            </span>
                      <span class="d-inline-block">
                                                <p class="label">رقم الهوية</p>
                                            <p class="info presenter-id">{{order.active_vendor.id_number}}</p>
                                            </span>
                      <span class="d-inline-block ms-4">
                                                <p class="label">رقم مقدم الخدمة</p>
                                                <p class="info presenter-number">{{order.active_vendor.id}}</p>
                                            </span>
                      <span class="d-inline-block">
                                                <p class="label"> القسم الرئيسي / الفرعي</p>
                                            <p class="info presenter-section">-</p>
                                            </span>
                      <p class="label">عنوان مقدم الخدمة</p>
                      <p class="info presenter-address">{{order.active_vendor.address}}</p>
                    </div>
                  </div>
                  <div class="card-box col-md-6" v-for="judger in order.judgers"><h6><span class="char">-</span>بيانات المحكم (الطرف الثالث) </h6>
                    <div class="box-form">
                      <p class="label">أسم المحكم</p>
                      <p class="info arbitrator-name">{{judger.name}}</p>
                      <span class="d-inline-block ms-4">
                                                    <p class="label">رقم الجوال</p>
                                                <p class="info arbitrator-mobile">{{judger.mobile}}</p>
                                                </span>
                      <span class="d-inline-block">
                                                    <p class="label">رقم الهوية</p>
                                                <p class="info arbitrator-id">{{judger.id_number}}</p>
                                                </span>
                      <span class="d-inline-block ms-4">
                                                    <p class="label">رقم المحكم</p>
                                                    <p class="info arbitrator-number">{{judger.id}}</p>
                                                </span>
                      <span class="d-inline-block">
                                                    <p class="label"> القسم الرئيسي / الفرعي</p>
                                                <p class="info arbitrator-section">-</p>
                                                </span>
                      <p class="label">عنوان المحكم</p>
                      <p class="info arbitrator-address">{{judger.address}}</p>
                    </div>
                  </div>
                  <div class="card-box col-md-6"><h6><span class="char">-</span>بيانات العقد </h6>
                    <div class="box-form">
                      <p class="label">مدة العقد <span>*</span></p>
                      <input class="form-control" type="number" v-model="contract.days">
                      <hr>
                      <p class="label text-black-50">المزايا المالية</p>
                      <p class="label">المبلغ الاساسي<span>*</span></p>
                      <input type="text" v-model="contract.amount" class="mb-0" name="" placeholder="المبلغ الاساسي " id="salary">
                      <p class="label mb-5">لا يقل عن {{order.amount}}</p>
                      <hr>
                      <button class="btn btn-success btn-block w-100" type="button"  @click="$refs.contract_terms_modal.modal('show')">بنود العقد</button>
                      <br>
                      <button class="btn btn-success btn-block w-100" type="button"  @click="$refs.contract_financial_terms_modal.modal('show')">بدلات مالية العقد</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=" buttons flex-column flex-md-row d-flex justify-content-center gap-3">
              <button @click="step--" type="button"  class="next submit">السابق</button>
              <button @click="step++;previewContent()" type="button"  class="next submit">التالي</button>
            </div>
          </div>
          <div class="stage-three" v-if="step === 3">
            <div class="container">
              <div class="col-12">
                <div class="box-two box">
                  <div class="card-box"><h6><span class="char">-</span> مراجعة العقد <span class="zoom"><i
                      class="fa-solid fa-arrow-up-right-from-square"></i></span></h6>
                    <div class="body-box" v-html="preview_content">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=" buttons flex-column flex-md-row d-flex justify-content-center gap-3">
              <button @click="step--" type="button" class="next submit">السابق</button>
              <button @click="saveContract()" type="button" class="next submit">حفظ </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <contract-terms-modal ref="contract_terms_modal"/>
    <contract-financial-terms-modal ref="contract_financial_terms_modal"/>
  </section>
</template>

<script>
import api from "../../utils/api";
import ContractTermsModal from "../../components/Modals/ContractTermsModal";
import ContractFinancialTermsModal from "../../components/Modals/ContractFinancialTermsModal";

export default {
  name: "Create",
  components: {ContractFinancialTermsModal, ContractTermsModal},
  props: ['hash_code'],
  data() {
    return {
      templates: [],
      order: null,
      step: 1,
      contract: {
        contract_template_id: null,
        order_id: null,
        date_type: 'hijri',
        lang: 'ar',
        content:'',
        amount:0,
        days:0,
        terms:[],
        financial_terms:[],
      },
      preview_content:'',
    };
  },
  methods: {
    getTemplates() {
      api.get('/v1/contract-templates').then(res => {
        this.templates = res.data.data;
        this.getOrder();
      })
    },
    getOrder() {
      api.get('/v1/orders/' + this.$props.hash_code).then(res => {
        this.order = res.data.data;
        this.contract.order_id = res.data.data.id;
      })
    },
    previewContent(){
      if (this.contract.contract_template_id){
        this.contract.terms = this.$refs.contract_terms_modal.terms;
        this.contract.financial_terms = this.$refs.contract_financial_terms_modal.terms;
        api.post('/v1/contract/preview/'+this.contract.contract_template_id,this.contract).then(res=>{
          this.preview_content = res.data.content;
          this.$forceUpdate();
        })
      }
    },
    saveContract(){
      this.contract.content = this.preview_content;
      api.post('/v1/contracts',this.contract).then(res=>{
        this.$root.alertSuccess('تم الحفظ بنجاح');
        this.$router.push({name:'ShowSingleOrder',params:{code:this.$props.hash_code}});
      })
    }
  },
  mounted() {
    this.getTemplates();
  }
}
</script>

<style scoped>

</style>