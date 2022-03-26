<template>
  <section class="main-pc ">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-4 d-none d-lg-block">
          <div class="content text-center pt-1 ">
            <p class="num">{{ $root._t("app.number1") }}</p>
            <img style="width: 60px;" :src="base_url + '/assets/images/white-logo.svg'" alt="logo" class="mt-5 pt-5">
            <p 
              class="title mt-0 fw-normal"
              style="font-size: 17px; margin-top: 5px !important;">{{ $root._t("app.chooseServiceType") }}</p>
            <p class="sup-title"> {{ $root._t("app.addNewRequest") }}</p>
            <p class="dis" style="font-size: 14px;font-weight: 300;">
              {{ $root._t("app.thisServiceFeature") }}
              <br> {{ $root._t("app.withVideoBelow") }}
            </p>
            <div class="vid  px-5 py-2">
              <p class="vid-title text-end px-0 fw-normal ">
                {{ $root._t("app.watchServiceRequestExplain") }}
              </p>
              
              <a href="">
                <img class="w-100" 
                  style="max-width:300px"
                :src="base_url + '/assets/images/order-user.png'" alt="">
              </a>
              <div class="info m-5">
                <div class="pb-2 px-3 h-100 d-flex align-items-center justify-content-center">
                    <p class="my-0">
                      <a href="#" target="_blank">
                        {{ $root._t("app.guideForServiceRequest") }}
                      </a>
                    </p>
                    <img style="top: 3px; margin-left: 5px; vertical-align: middle;margin-right:auto" :src="base_url + '/assets/images/open-book.svg'" alt="#">

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 ">
          <div v-if="has_membership == false" class="mt-3 alert alert-warning d-flex justify-content-between">
              <p class="p-0 m-0">يجب اختيار العضوية قبل انشاء طلب</p>
              <a :href="base_url+'/u_profile'">تعديل العضوية</a>
          </div>
          <div class="row">
		  <div class="col-lg-1"><br></div>
            <div class="col-lg-10">
              <div class="data  pt-5 text-right ">
                <p class="st fw-normal">
                  {{ $root._t("app.steps") }} <span class="st-num">{{ step }}</span> <span
                    class="color">{{ $root._t("app.from") }}  6</span>
                </p>
                <div class="progress mb-5" dir="rtl" style="height: 10px;">
                  <div class="progress-bar" role="progressbar" :style="'background-color:#0995EB; width: '+step*16.667+'%'" aria-valuemin="0"
                       aria-valuemax="100"></div>
                </div>
              </div>
              <div class="data data1  text-right " v-if="step === 1">
                <div class="">
                      <span>
                        ملحق بطلب رقم
                      </span>
                  <input style="width: 78px;height:33px; margin-right: 10px;"
                         v-model="form.main_order_id" placeholder="#"
                         class="border">
                </div>
                <div class="select">
                  <template v-for="type in types.data">
                    <div class="option mt-4" >
                      <div class="head">
                        <div class="form-check form-check-inline mb-2">
                          <input type="radio" class="form-check-input" v-model="form.type_id" :value="type.id"
                                 :id="'type-input-'+type.id" name="type_id" :disabled="has_membership != true">
                          <label class="form-check-label name  pr-2"
                                 :for="'type-input-'+type.id">{{ type.type_name_ar }}</label>
                        </div>
                        <div class="details  mt-3 py-2">
                          <div class="row">
                            <div class="col-10">
                              <div v-html="type.type_desc_ar"></div>
                              <!-- <p>
                                {{ type.type_desc_ar }}
                              </p> -->
                            </div>
                            <div class="col-2 text-start">
                              <img style="width:22px" :src="base_url + '/assets/images/Page.svg'" alt="#">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </template>
                </div>
                <div class="btns text-center" v-if="form.type_id">
                  <div class="btn page1 btn-primary big cont mb-5"
                    style="    padding: 12px;border-color: #048E81 !important;"
                   @click="step = 2" data-progress="2" data-page="2">
                    {{ $root._t("app.follow") }}
                  </div>
                </div>
              </div>
              <div class=" " v-if="step === 2">
                <div class="laws">
                  <p>
                    {{ $root._t("app.serviceConditions") }}
                  </p>

                      <div v-if="form.type_id" v-html="typeOf(form.type_id).type_desc_ar"></div>

                </div>
              </div>
              <div class="" v-if="step === 3">
                <p class="red" style="color: #FF584D; font-size:14px">
                  {{ $root._t("app.chooseYourCategory") }}
                </p>
                <div class="form-row">
                  <div class="form-group col-md-6 mb-3">
                    <select id="inputState" v-model="form.department_id" class="form-control" style="color: #048E81; font-size: 14px; padding: 10px;">
                      <option :value="null" selected>{{ $root._t("app.chooseMainCategory") }}</option>
                      <template v-for="department in departments">
                        <option v-if="department.parent === null && department.enable_post === 'yes'"
                                :value="department.id">{{ department.department_name_ar }}
                        </option>
                      </template>
                    </select>
                  </div>
                  <div class="form-group col-md-6 mb-3" v-if="form.department_id">
                    <select id="inputState" v-model="form.sub_department_id" class="form-control" style="color: #048E81; font-size: 14px; padding: 10px;">
                      <option :value="null" selected>{{ $root._t("app.chooseSubCategory") }}</option>
                      <template v-for="department in departments">
                        <option :value="department.id" v-if="department.parent == form.department_id">
                          {{ department.department_name_ar }}
                        </option>
                      </template>
                    </select>
                  </div>
                </div>
                <p class="red mt-3" style="color: #FF584D; font-size:14px">
                  {{ $root._t("app.selectServiceProducer") }}
                  <span> ( {{ $root._t("app.actionOfSelectionOfServiceProducer") }} )  </span>
                </p>
                <div class="select mb-4">
                  <div class="option selected ">
                    <div class="head ">
                      <div class="details selected bordr mt-3">
                        <div class="row">
                          <div class="col-12">
                            <p class="w-100 mt-0 pt-0" style="max-width:550px; cursor: pointer; background-color: #E2FFFC; padding: 13px !important; display: inline-block; border-radius: 8px;" @click="form.choose_service_provider = 'all'">
                              <i class="fa fa-check-circle text-success"
                                 v-if=" form.choose_service_provider  === 'all'"></i>
                              {{ $root._t("app.all") }}
                              <span class="text-success" v-if=" form.choose_service_provider  === 'all'">سيتم اختيار مقدمي الخدمة من كل التخصصات و المدن</span>
                            </p>
                            <p class="w-100 mt-0 pt-0" style="max-width:550px; cursor: pointer; background-color: #E2FFFC; padding: 13px !important; display: inline-block; border-radius: 8px;"
                               @click="form.choose_service_provider = 'by_city'">
                              <i class="fa fa-check-circle text-success"
                                 v-if=" form.choose_service_provider  === 'by_city'"></i>
                              بالمدينة
                              <span class="text-success" v-if=" form.choose_service_provider  === 'by_city'">سيتم اختيار مقدمي الخدمة من المدينة المحددة</span>
                              <b class="text-danger"
                                 v-if=" form.choose_service_provider  === 'by_city' && form.city_id  === null">الرجاء
                                اختيار مدينة</b>
                            </p>
                            <p class="w-100 mt-0 pt-0" style="max-width:550px; cursor: pointer; background-color: #E2FFFC; padding: 13px !important; display: inline-block; border-radius: 8px;"
                               @click="form.choose_service_provider = 'by_filter'">
                              <i class="fa fa-check-circle text-success"
                                 v-if=" form.choose_service_provider  === 'by_filter'"></i>
                              مقدم خدمة
                              <span class="text-success" v-if=" form.choose_service_provider  === 'by_filter'">سيتم اختيار مقدم واحد محدد</span>
                              <b class="text-danger"
                                 v-if=" form.choose_service_provider  === 'by_filter' && form.filter_id  === null">الرجاء
                                اختيار مقدم الخدمة</b>
                            </p>
                            <p class="w-100 mt-0 pt-0" style="max-width:550px; cursor: pointer; background-color: #E2FFFC; padding: 13px !important; display: inline-block; border-radius: 8px;"
                               @click="form.choose_service_provider = 'by_occupation'">
                              <i class="fa fa-check-circle text-success"
                                 v-if=" form.choose_service_provider  === 'by_occupation'"></i>
                              بالتخصص
                              <span class="text-success" v-if=" form.choose_service_provider  === 'by_occupation'">سيتم اختيار مقدمي الخدمة من نفس تخصص القسم المحدد</span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row" v-if="form.choose_service_provider === 'by_city'">
                  <div class="form-group col-md-6 mb-3">
                    <select id="inputState" v-model="form.city_id" class="form-control " style="color: #048E81; font-size: 14px; padding: 10px;">
                      <option :value="null">{{ $root._t("app.selectCity") }}</option>
                      <template v-for="city in cities.data">
                        <option v-if="city.city_name_ar.includes(city_filter)" :value="city.id">
                          {{ city.city_name_ar }}.
                        </option>
                      </template>
                    </select>
                  </div>
                  <div class="form-group col-md-6 mb-3 icon-input">
                    <input class="form-control w-100" v-model="city_filter" type="text"
                           placeholder="ابحث بالاسم........">
                    <i class="fa fa-search"></i>
                  </div>
                </div>
              </div>
              <div class="form-row" v-if="form.choose_service_provider === 'by_filter'">
                <div class="form-group col-md-12">
                  <select id="inputState" v-model="form.filter_id" class="form-control " style="color: #048E81; font-size: 14px; padding: 10px;">
                    <option :value="null">أختر مقدم خدمة</option>
                    <template v-for="vendor in vendors.data">
                      <option v-if="vendor.name.includes(vendor_filter)" :value="vendor.id">{{ vendor.name }}.
                      </option>
                    </template>
                  </select>
                </div>
                <div class="form-group col-md-12 icon-input">
                  <input class="form-control w-100" v-model="vendor_filter" type="text" placeholder="ابحث بالاسم........">
                  <i class="fa fa-search"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-1">
              <br>
            </div>
            <div class="mt-3" v-if="step === 4">
              <div class="form-check form-check-inline mb-2">
                <input type="radio" class="form-check-input" id="exampleCheck8s1" v-model="form.entities_count"
                       value="1" name="choos">
                <label class="form-check-label name red pr-2" style="color: #FF584D; font-size:14px" for="exampleCheck8s1">
                  {{ $root._t("app.dataOfPlaintiff") }} </label>
              </div>
              <div class="form-check form-check-inline mb-2">
                <input type="radio" class="form-check-input" id="exampleCheck80" v-model="form.entities_count" value="2"
                       name="choos">
                <label class="form-check-label name red pr-2" style="color: #FF584D; font-size:14px" for="exampleCheck80">
                  {{ $root._t("app.thereIsSides") }} </label>
              </div>
              <div class="row mb-3" v-for="(entity,index) in form.entities">
                <div class="form-group col-md-3">
                  <input class="form-control w-100"  v-model="entity.name" type="text" placeholder="الأسم">
                </div>
                <div class="form-group col-md-3 ">
                  <input class="form-control w-100" v-model="entity.id_number" type="text"
                         placeholder="رقم الهويه........">
                </div>
                <div class="form-group col-md-3 ">
                  <input class="form-control w-100" v-model="entity.nationality" type="text"
                         placeholder=" الجنسيه........">
                </div>
                <div v-if="form.entities.length - 1 === index && form.entities_count > 1"
                     class="form-group col-md-3 text-center icons">
                  <img style="cursor: pointer" @click="form.entities.push({name:'',id_number:'',nationality:''})"
                       :src="base_url + '/assets/images/icons.svg'" alt="#" class="d-inline-block">
                </div>
              </div>
              <hr>
              <div class="select mb-4">
                <div class="option selected ">
                  <div class="head ">
                    <div class="details selected bordr mt-3">
                      <div class="row">
                        <div class="col-12">
                          <p class="w-100 mt-0 pt-0" style="max-width:550px; cursor: pointer; background-color: #E2FFFC; padding: 13px !important; display: inline-block; border-radius: 8px;"
                             @click="form.check_invalid_entities_data =! form.check_invalid_entities_data">
                            <i class="fa fa-times-circle text-danger" v-if="! form.check_invalid_entities_data"></i>
                            <i class="fa fa-check-circle text-success" v-else></i>
                            {{ $root._t("app.acceptDataAndMakeSure") }}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="mt-3" v-if="step === 5">
              <div class="form-check">
                <label class="form-check-label name red pr-2 mb-2" style="color: #FF584D; font-size:14px" for="exampleCheckss81">
                  {{ $root._t("app.suggestTimeForRequest") }} </label>
                <input type="number" v-model="form.execution_time" class="form-control" id="exampleCheckss81"
                       placeholder="مدة الانجاز....">
              </div>
              <div class="form-check">
                <label class="form-check-label name red pr-2 mb-2" style="color: #FF584D; font-size:14px" for="order_title_input">
                  عنوان الطلب </label>
                <input type="text" v-model="form.order_title" class="form-control" id="order_title_input"
                       placeholder="...">
              </div>
              <p class="red pt-4 mb-0" style="color: #FF584D; font-size:14px" >
                {{ $root._t("app.Negotiable") }}
              </p>
              <div class="form-check form-check-inline mb-2">
                <input type="radio" class="form-check-input" v-model="form.negotiable" value="yes" id="exampleCheck8000"
                       name="chos">
                <label class="form-check-label name  pr-2" for="exampleCheck8000"> {{
                    $root._t("app.yes")
                  }} </label>
              </div>
              <div class="form-check form-check-inline mb-2">
                <input type="radio" class="form-check-input" v-model="form.negotiable" value="no" id="exampleCheck800"
                       name="chos">
                <label class="form-check-label name  pr-2" for="exampleCheck800"> {{
                    $root._t("app.no")
                  }}
                </label>
              </div>
              <div class="form-check textare">
                <label class="form-check-label name red pr-2 mb-2" for="exampleCheck81">
                  {{ $root._t("app.details") }} </label>
                <textarea class="form-control textare-count" v-model="form.order_content" id="exampleCheck81"
                          maxlength="1000"
                          placeholder="اكتب التفاصيل هنا...." rows="4"></textarea>
                <span class="remain"><span id="totalChars">{{ form.order_content.length }}</span>/1000</span>
              </div>
              <p class="red mt-3" style="color: #FF584D; font-size:14px" >
                {{ $root._t("app.attachingFile") }} <span> ( {{ $root._t("app.chooseFile") }} )  </span>
              </p>
              <div class="form-check form-check-inline mb-2">
                <div class="variants">
                  <div class='attach d-inline-block '>
                    <label for='input-file' class="add-o-file">
                      {{ $root._t("app.attchments") }}
                      <img :src="base_url + '/assets/images/file.svg'" alt="#">
                    </label>
                    <input id='attachments_input' class="abs-file  " style="    width: 155px;" ref="attachments_input" multiple @change="uploadAttachments()"
                           type='file'/>
                  </div>
                  <div class='sounds d-inline-block mr-3'>
                    <label for='input-file' class="add-o-file">
                      {{ $root._t("app.sendVoiceFile") }}
                      <img :src="base_url + '/assets/images/audio-file.svg'" alt="#">
                    </label>
                    <input id='input-file'  class="abs-file  "  style="    width: 155px;" ref="audio_file_input" @change="uploadAudioFile()" type='file'/>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-3" v-if="step === 6">
              <div class="row mt-5">
                <div class="col-8">
                  <p class="red pr-2 mb-2" style="color: #FF584D; font-size:14px" >
                    <img :src="base_url + '/assets/images/22-mobile.svg'" alt="#" class="ml-2">
                    سيتم الخصم من رصيدك رسوم اشترك اضافة طلب جديد
                  </p>
                </div>
                <div class="col-4">
                  <div class="btn mx-2 grad " 
                  style=" padding: 7px;border-color: #048E81 !important;background-color: #048E81 !important;min-width:120px;">
                    حفظ طلبك كمسوده
                    <img :src="base_url + '/assets/images/bookmark.svg'" alt="#" class="mr-2">
                  </div>
                </div>
              </div>
              <div class="total mt-3">
                <p> {{ $root._t("app.fee") }} : <span>{{ $root.settings.minimum_amount_add_order }} $</span></p>
              </div>
            </div>
            <div class="btns text-center mb-5" v-if="step !== 1">
              <div class="btn mx-2  page1 small cont " v-if="step < 6" @click="step++" 
              style=" padding: 7px;border-color: #048E81 !important;background-color: #048E81 !important;min-width:120px;">
                {{ $root._t("app.next") }}
              </div>
              <div class="btn btn-success page1 small cont "  style=" padding: 7px;border-color: #048E81 !important;background-color: #048E81 !important;min-width:120px;" @click="submitOrder()" v-else>
                أكتمال الطلب
              </div>
              <div class="btn btn-secondary small conta-back mx-3"
                style=" padding: 7px;border-color: #048E81 !important;background-color: ##707070 !important;min-width:120px;"
               @click="step--">
                {{ $root._t("app.previous") }}
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

export default {
  data() {
    return {
      step: 1,
      city_filter: '',
      vendor_filter: '',
      base_url: base_url,
      departments: [],
      has_membership: null,
      types: [],
      cities: [],
      vendors: [],
      form: {
        main_order_id: null,
        execution_time: null,
        type_id: null,
        city_id: null,
        negotiable: "no",
        sub_department_id: null,
        department_id: null,
        order_content: '',
        order_title: '',
        choose_service_provider: 'all', // can be by_city - all - by_occupation - by_filter
        entities: [
          {name: '', id_number: '', nationality: ''}
        ],
        entities_count: 1,
        check_invalid_entities_data: false,
        attachments: [],
        audio_file: null,
        filter_id: null,
      }
    };
  },
  components: {},
  methods: {
    uploadAttachments() {
      this.form.attachments = this.$refs.attachments_input.files;
      this.$forceUpdate();
    },
    uploadAudioFile() {
      this.form.audio_file = this.$refs.audio_file_input.files[0];
      this.$forceUpdate();
    },
    getDepartments() {
      api.get('/v1/departments').then(res => {
        this.departments = res.data.data;
      })
    },
    getTypes() {
      api.get('/v1/ordertypes').then(res => {
        this.types = res.data.data;
      })
    },
    getCities() {
      api.get('/v1/cities').then(res => {
        this.cities = res.data.data;
      })
    },
    getVendors() {
      api.get('/v2/vendors').then(res => {
        this.vendors = res.data.data;
      })
    },
    getMembership() {
      api.get('/profile/membership')
      .then((response) => {
        console.log(response);
        this.has_membership = response.data.has_membership;
        console.log('has_membership', this.has_membership);
      })
      .catch((response) => {
        console.log('check membership error: ', response);
      });
    },
    typeOf(id) {
      return this.types.data.find((t) => t.id == id);
    },
    submitOrder() {
      var formData = new FormData();
      if (this.form.main_order_id)
        formData.append('main_order_id', this.form.main_order_id);
      formData.append('amount', this.$root.settings.minimum_amount_add_order);
      formData.append('execution_time', this.form.execution_time);
      formData.append('order_type_id', this.form.type_id);
      if (this.form.city_id)
        formData.append('city_id', this.form.city_id);
      formData.append('negotiable', this.form.negotiable);
      formData.append('department_id', this.form.sub_department_id);
      formData.append('order_content', this.form.order_content);
      formData.append('order_title', this.form.order_title);
      formData.append('choose_service_provider', this.form.choose_service_provider);
      formData.append('entities', this.form.entities);
      formData.append('entities_count', this.form.entities_count);
      formData.append('check_invalid_entities_data', this.form.check_invalid_entities_data);
      formData.append('attachments', this.form.attachments);
      formData.append('filter_id', this.form.filter_id);
      formData.append('audio_file', this.form.audio_file);
      api.post('/v1/orders', formData).then(res => {
        this.$root.alertSuccess('تم الارسال بنجاح');
        console.log(res);
        this.$router.push({name: "ShowAllOrders"});
      }).catch(e => {
        this.$root.alertErrors(e.response.data.errors_messages);
      })
    }
  },
  created() {
    this.getMembership();
    this.getDepartments();
    this.getTypes();
    this.getCities();
    this.getVendors();
  }
}
</script>
<style scoped>
  .main-pc .col-lg-4 .content {
    background-size: cover;
    height: 100vh;
  }
  .main-pc .data1 .head .form-check-input {
    height: 15px !important;
    width: 15px;
}
.form-check .form-check-input {
    float: revert;
    margin-left: 6px;
}
.main-pc .col-lg-4 .content .center .img .overlay img {
    position: relative;
    top: 0;
}
.main-pc .col-lg-4 .content .center .img {
    position: relative;
    width: 400px;
    height: 67px;
    border-radius: 100px;
    overflow: hidden;
}
.main-pc .data .select .option .details {
    background-color: #F3F3F3;
    padding: 14px 12px 13px !important;
    font-size: 13px;
    border-radius: 5px;
}

.main-pc .col-lg-4 .content .info p a {
    font-weight: bold;
    font-size: 12px;
}
.main-pc .data .select .option .details {
    background-color: #F3F3F3;
    padding: 14px 12px 13px !important;
    font-size: 13px;
    border-radius: 5px;
}
.main-pc .col-lg-4 .content .info {
    background-color: #fff;
    border-radius: 8px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 50px;
    -ms-border-radius: 50px;
    -o-border-radius: 50px;
    height: 48px;
    width: 100%;
    margin: 30px 0 !important;
}
.main-pc .col-lg-4 .content p.vid-title {
    font-size: 13px;
}
.main-pc .col-lg-4 .content .center .img[data-v-6a84a0f0] {
    position: relative;
    width: 400px;
    height: 200px;
    border-radius: 19px;
    overflow: hidden;
}
.main-pc .col-lg-4 .content .center .img .overlay img[data-v-6a84a0f0] {
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 50%;
}
.form-control {
   font-size: 14px;
    padding: 10px;
}
.form-check-inline {
    display: inline-block;
    margin-right: 0 !important;
}
.form-check .form-check-input {
    float: revert !important;
    margin-left: 4px !important;
}
.abs-file {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 38px;
    opacity: 0;
    cursor: pointer;
}
.add-o-file {
    color: #048e81;
    width: 141px;
    background: #ecfffd;
    border: 1px solid #048e81;
    padding: 6px;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
</style>
