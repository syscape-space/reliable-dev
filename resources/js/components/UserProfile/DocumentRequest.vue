<template>
  <section class="main-pc ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 d-none d-lg-block">
          <div class="content text-center pt-1 ">
            <p class="num">{{ $root._t("app.number1") }}</p>
            <img :src="base_url + '/assets/images/logo.svg'" alt="logo" class="mt-5 pt-5">
            <p class="title">{{ $root._t("app.chooseServiceType") }}</p>
            <p class="sup-title"> {{ $root._t("app.addNewRequest") }}</p>
            <p class="dis">
              {{ $root._t("app.thisServiceFeature") }}
              <br> {{ $root._t("app.withVideoBelow") }}
            </p>
            <div class="vid  p-5">
              <p class="vid-title text-right ">
                {{ $root._t("app.watchServiceRequestExplain") }}
              </p>
              <div class="center">
                <div class="img">
                  <img :src="base_url + '/assets/images/man.svg'" alt="#" class="back-man">
                  <div class="overlay">
                    <a href="#">
                      <div class="dis">
                        <img :src="base_url + '/assets/images/play-button.svg'" alt="#">
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="info m-5">
                <div class="row">
                  <div class="col-4">
                    <img :src="base_url + '/assets/images/open-book.svg'" alt="#">
                  </div>
                  <div class="col-8">
                    <p>
                      <a href="#" target="_blank">
                        {{ $root._t("app.guideForServiceRequest") }}
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 ">
          <div class="row">

            <div class="col-lg-7">
              <div class="data  pt-5 text-right ">
                <p class="st">
                  {{ $root._t("app.steps") }} <span class="st-num">{{step}}</span> <span
                    class="color">{{ $root._t("app.from") }}  6</span>
                </p>
                <div class="progress mb-5" dir="rtl">
                  <div class="progress-bar" role="progressbar" :style="'width: '+step*16.667+'%'" aria-valuemin="0"
                       aria-valuemax="100"></div>
                </div>
              </div>
              <div class="data data1  text-right " v-if="step === 1">
                <div class="">
                      <span>
                        ملحق بطلب رقم
                      </span>
                  <input style="width: 80px;" v-model="form.main_order_id" placeholder="#">
                </div>
                <div class="select">
                  <template v-for="type in types.data">
                    <div class="option mt-4">
                      <div class="head">
                        <div class="form-check form-check-inline">
                          <input type="radio" class="form-check-input" v-model="form.type_id" :value="type.id"
                                 :id="'type-input-'+type.id" name="type_id">
                          <label class="form-check-label name  pr-2"
                                 :for="'type-input-'+type.id">{{ type.type_name_ar }}</label>
                        </div>
                        <div class="details  mt-3">
                          <div class="row">
                            <div class="col-10">
                              <p>
                                {{ type.type_desc_ar }}
                              </p>
                            </div>
                            <div class="col-2 text-center">
                              <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </template>
                </div>
                <div class="btns text-center" v-if="form.type_id">
                  <div class="btn page1 btn-primary big cont mb-5" @click="step = 2" data-progress="2" data-page="2">
                    {{ $root._t("app.follow") }}
                  </div>
                </div>
              </div>
              <div class=" " v-if="step === 2">
                <div class="laws">
                  <p>
                    {{ $root._t("app.serviceConditions") }}
                  </p>
                  <ul>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                    <li>
                      {{ $root._t("app.thisServiceFeature") }}
                    </li>
                  </ul>
                </div>
              </div>
              <div class="" v-if="step === 3">
                <p class="red">
                  {{ $root._t("app.chooseYourCategory") }}
                </p>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <select id="inputState" v-model="form.department_id" class="form-control">
                      <option  :value="null" selected>{{ $root._t("app.chooseMainCategory") }}</option>
                      <template v-for="department in departments">
                        <option  v-if="department.parent === null && department.enable_post === 'yes'" :value="department.id">{{department.department_name_ar}}.</option>
                      </template>
                    </select>
                  </div>
                  <div class="form-group col-md-6" v-if="form.department_id">
                    <select id="inputState" v-model="form.sub_department_id" class="form-control">
                      <option :value="null" selected>{{ $root._t("app.chooseSubCategory") }}</option>
                      <template v-for="department in departments">
                        <option  :value="department.id" v-if="department.parent == form.department_id">{{department.department_name_ar}}.</option>
                      </template>
                    </select>
                  </div>
                </div>
                <p class="red mt-3">
                  {{ $root._t("app.selectServiceProducer") }}
                  <span> ( {{ $root._t("app.actionOfSelectionOfServiceProducer") }} )  </span>
                </p>
                <div class="select mb-4">
                  <div class="option selected ">
                    <div class="head ">
                      <div class="details selected bordr mt-3">
                        <div class="row">
                          <div class="col-12">
                            <p class="mt-0 pt-0">
                              <img :src="base_url + '/assets/images/right-mark.svg'" alt="#" class="right-mark">
                              {{ $root._t("app.all") }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <select id="inputState" v-model="form.city_id" class="form-control">
                      <option :value="null">{{ $root._t("app.selectCity") }}</option>
                      <template v-for="city in cities.data">
                        <option  v-if="city.city_name_ar.includes(city_filter)" :value="city.id">{{city.city_name_ar}}.</option>
                      </template>
                    </select>
                  </div>
                  <div class="form-group col-md-12 icon-input">
                    <input class="form-control w-100" v-model="city_filter" type="text" placeholder="ابحث بالاسم........">
                    <i class="fa fa-search"></i>
                  </div>
                </div>
              </div>
              <div class="  mt-3" v-if="step === 4">
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" id="exampleCheck81" name="choos">
                  <label class="form-check-label name red pr-2" for="exampleCheck81">
                    {{ $root._t("app.dataOfPlaintiff") }} </label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" id="exampleCheck80" name="choos">
                  <label class="form-check-label name red pr-2" for="exampleCheck80">
                    {{ $root._t("app.thereIsSides") }} </label>
                </div>
                <div class="row" v-for="(entity,index) in form.entities">
                  <div class="form-group col-md-3">
                    <input class="form-control w-100" v-model="entity.name" type="text" placeholder="الأسم">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input class="form-control w-100" v-model="entity.id_number" type="text" placeholder="رقم الهويه........">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input class="form-control w-100" v-model="entity.nationality" type="text" placeholder=" الجنسيه........">
                  </div>
                  <div v-if="form.entities.length - 1 === index" class="form-group col-md-3 text-center icons">
                    <img style="cursor: pointer" @click="form.entities.push({name:'',id_number:'',nationality:''})" :src="base_url + '/assets/images/icons.svg'" alt="#" class="d-inline-block">
                  </div>
                </div>
                <hr>
                <div class="select mb-4">
                  <div class="option selected ">
                    <div class="head ">
                      <div class="details selected bordr mt-3">
                        <div class="row">
                          <div class="col-12">
                            <p class="mt-0 pt-0">
                              <img :src="base_url + '/assets/images/right-mark.svg'" alt="#" class="right-mark">
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
                  <label class="form-check-label name red pr-2 mb-2" for="exampleCheck81">
                    {{ $root._t("app.suggestTimeForRequest") }} </label>
                  <input type="number" class="form-control" id="exampleCheck81" placeholder="عدد الأيام....">
                </div>
                <p class="red pt-4 mb-0">
                  {{ $root._t("app.Negotiable") }}
                </p>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" id="exampleCheck8000" name="chos">
                  <label class="form-check-label name  pr-2" for="exampleCheck8000"> {{
                      $root._t("app.yes")
                    }} </label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" id="exampleCheck800" name="chos">
                  <label class="form-check-label name  pr-2" for="exampleCheck800"> {{
                      $root._t("app.no")
                    }}
                  </label>
                </div>
                <div class="form-check textare">
                  <label class="form-check-label name red pr-2 mb-2" for="exampleCheck81">
                    {{ $root._t("app.details") }} </label>
                  <textarea class="form-control textare-count" id="exampleCheck81" maxlength="1000"
                            placeholder="اكتب التفاصيل هنا...." rows="4"></textarea>
                  <span class="remain"><span id="totalChars">0</span>/1000</span>
                </div>
                <p class="red mt-3">
                  {{ $root._t("app.attachingFile") }} <span> ( {{ $root._t("app.chooseFile") }} )  </span>
                </p>
                <div class="form-check form-check-inline">
                  <div class="variants">
                    <div class='attach d-inline-block'>
                      <label for='input-file'>
                        {{ $root._t("app.attchments") }}
                        <img :src="base_url + '/assets/images/file.svg'" alt="#">
                      </label>
                      <input id='input-file' type='file'/>
                    </div>
                    <div class='sounds d-inline-block mr-3'>
                      <label for='input-file'>
                        {{ $root._t("app.sendVoiceFile") }}
                        <img :src="base_url + '/assets/images/audio-file.svg'" alt="#">
                      </label>
                      <input id='input-file' type='file'/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-3" v-if="step === 6">
                <div class="row mt-5">
                  <div class="col-8">
                    <p class="red pr-2 mb-2">
                      <img :src="base_url + '/assets/images/22-mobile.svg'" alt="#" class="ml-2">
                      {{ $root._t("app.recharge") }}
                    </p>
                    <p class="red pr-2 mb-2">
                      <img :src="base_url + '/assets/images/money.svg'" alt="#" class="ml-2">
                      {{ $root._t("app.calculateDiscound") }}
                    </p>
                  </div>
                  <div class="col-4">
                    <div class="btn grad btn-primary">
                      حفظ طلبك كمسوده
                      <img :src="base_url + '/assets/images/bookmark.svg'" alt="#" class="mr-2">
                    </div>
                  </div>
                </div>
                <div class="total mt-3">
                  <p> {{ $root._t("app.total") }} : <span>1 $</span></p>
                  <p> {{ $root._t("app.fee") }} : <span>1 $</span></p>
                  <hr>
                  <p> {{ $root._t("app.total") }} : <span class="red">1 $</span></p>
                </div>
                <div class="pay mt-4">
                  <p class="pay-title">
                    {{ $root._t("app.payWithAman") }}
                    <a href="#">
                      {{ $root._t("app.editCardOfShopping") }}
                    </a>
                  </p>
                  <div class="pay-way d-inline-block paypal">
                    <img :src="base_url + '/assets/images/paypal.svg'" alt="#">
                    {{ $root._t("app.paypal") }}
                  </div>
                  <div class="pay-way d-inline-block mr-5 card">
                    <img :src="base_url + '/assets/images/credit-card.svg'" alt="#">
                    {{ $root._t("app.numOfDays") }} ..............
                  </div>
                  <br>
                  <div class="pay-way d-inline-block other">
                    <img :src="base_url + '/assets/images/5.svg'" alt="#">
                    {{ $root._t("app.numOfDays") }} ..............
                  </div>
                  <div class="pay-way d-inline-block mr-5 bank">
                    <img :src="base_url + '/assets/images/bank.svg'" alt="#">
                    {{ $root._t("app.bankTransfer") }}
                  </div>
                </div>
              </div>
              <div class="btns text-center mb-5" v-if="step !== 1">
                <div class="btn btn-primary page1 small cont " v-if="step < 6" @click="step++">
                  {{ $root._t("app.next") }}
                </div>
                <div class="btn btn-success page1 small cont " v-else>
                  أكتمال الطلب
                </div>
                <div class="btn btn-secondary small conta-back" @click="step--">
                  {{ $root._t("app.previous") }}
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <br>
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
      step : 1,
      city_filter : '',
      base_url: base_url,
      departments: [],
      types:[],
      cities:[],
      form:{
        main_order_id:null,
        type_id:null,
        city_id:null,
        sub_department_id:null,
        department_id:null,
        entities :[
            {name:'',id_number:'',nationality:''}
        ],
      }
    };
  },
  methods: {
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
  },
  created() {
    this.getDepartments();
    this.getTypes();
    this.getCities();
  }
}
</script>
<style scoped>

</style>