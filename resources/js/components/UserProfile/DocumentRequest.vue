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
              <form dir="rtl">
                <div class="data  pt-5 text-right ">
                  <p class="st">
                    {{ $root._t("app.steps") }} <span class="st-num">1</span> <span
                      class="color">{{ $root._t("app.from") }}  6</span>
                  </p>
                  <div class="progress mb-5" dir="rtl">
                    <div class="progress-bar" role="progressbar" style="width: 16.667%" aria-valuemin="0"
                         aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="data data1  text-right ">
                  <div class="">
                      <span>
                        ملحق بطلب رقم
                      </span>
                      <input  style="width: 80px;" placeholder="#">
                  </div>
                  <div class="select">
                    <template v-for="department in departments">
                      <div class="option mt-4" v-if="department.enable_post === 'yes' && department.department_status === 'show'" >
                        <div class="head">
                          <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" :value="department.id" :id="'department-input-'+department.id" name="department_id">
                            <label class="form-check-label name  pr-2" :for="'department-input-'+department.id">{{department.department_name_ar}}</label>
                          </div>
                          <div class="details  mt-3">
                            <div class="row">
                              <div class="col-10">
                                <p>
                                  {{ department.department_desc_ar }}
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
                  <div class="btns text-center">
                    <div class="btn page1 btn-primary big cont mb-5" data-progress="2" data-page="2">
                      {{ $root._t("app.follow") }}
                    </div>
                  </div>
                </div>
                <div class="data data2  text-right d-none">
                  <div class="select">
                    <div class="option selected">
                      <div class="head">
                        <div class="form-check form-check-inline">
                          <input type="radio" class="form-check-input" id="exampleCheck8" name="chose" checked>
                          <label class="form-check-label name selected pr-2" for="exampleCheck8">طلب توثيق </label>
                        </div>
                        <div class="details selected mt-3">
                          <div class="row">
                            <div class="col-10">
                              <p>
                                {{ $root._t("app.thisServiceFeature") }}
                              </p>
                            </div>
                            <div class="col-2 text-center">
                              <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="page2 page d-none">
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
                    <div class="select">
                      <div class="option selected ">
                        <div class="head ">
                          <div class="details selected bordr mt-3">
                            <div class="row">
                              <div class="col-12">
                                <p class="mt-0 pt-0">
                                  <img :src="base_url + '/assets/images/right-mark.svg'" alt="#" class="right-mark">
                                  {{ $root._t("app.thisServiceFeature") }}
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="page3 page mt-3 d-none">
                    <p class="red">
                      {{ $root._t("app.chooseYourCategory") }}
                    </p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <select id="inputState" class="form-control">
                          <option selected>{{ $root._t("app.chooseMainCategory") }}</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <select id="inputState" class="form-control">
                          <option selected>{{ $root._t("app.chooseSubCategory") }}</option>
                          <option>...</option>
                        </select></div>
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
                        <select id="inputState" class="form-control">
                          <option selected>{{ $root._t("app.selectCity") }}</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-12 icon-input">
                        <input class="form-control w-100" type="text" placeholder="ابحث بالاسم........">
                        <i class="fa fa-search"></i>
                      </div>
                    </div>
                  </div>
                  <div class="page4  page mt-3 d-none">
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
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <input class="form-control w-100" type="text" value="أحمد ياسر على">
                      </div>
                      <div class="form-group col-md-3 ">
                        <input class="form-control w-100" type="text" placeholder="رقم الهويه........">
                      </div>
                      <div class="form-group col-md-3 ">
                        <input class="form-control w-100" type="text" placeholder=" الجنسيه........">
                      </div>
                      <div class="form-group col-md-3 text-center icons">
                        <img :src="base_url + '/assets/images/icons.svg'" alt="#" class="d-inline-block">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <input class="form-control w-100" type="text" value="أحمد ياسر على">
                      </div>
                      <div class="form-group col-md-3 ">
                        <input class="form-control w-100" type="text" placeholder="رقم الهويه........">
                      </div>
                      <div class="form-group col-md-3 ">
                        <input class="form-control w-100" type="text" placeholder=" الجنسيه........">
                      </div>
                      <div class="form-group col-md-3 text-center icons">
                        <img :src="base_url + '/assets/images/icons.svg'" alt="#" class="d-inline-block">
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
                  <div class="page5 page mt-3 d-none">
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
                        }} </label>
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
                  <div class="page6 page mt-3 d-none">
                    <div class="row mt-5">
                      <div class="col-8">
                        <p class="red pr-2 mb-2">
                          <img :src="base_url + '/assets/images/22-mobile.svg'" alt="#" class="ml-2">
                          {{ $root._t("app.recharge") }}
                        </p>
                        <p class="red pr-2 mb-2">
                          <img :src="base_url + '/assets/images/  money.svg'" alt="#" class="ml-2">
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
                  <div class="btns text-center mb-5">
                    <div class="btn btn-primary page1 small cont " data-progress="2" data-page="2">
                      {{ $root._t("app.next") }}
                    </div>
                    <div class="btn btn-secondary small conta-back">
                      {{ $root._t("app.previous") }}
                    </div>
                  </div>
                </div>
              </form>
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
      base_url: base_url,
      departments: [],
    };
  },
  methods: {
    getDepartments() {
      api.get('/v1/departments').then(res => {
        this.departments = res.data.data;
      })
    }
  },
  created() {
    this.getDepartments();
  }
}
</script>
<style scoped>

</style>