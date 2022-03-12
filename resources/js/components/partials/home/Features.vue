<template>
    <section class="position-relative ">
      <img class="h2-it" :src="base_url+'/assets/images/h2.png'" alt="">
      <div class="container">
        <h3 class="text-center mb-5">لماذا تختار موثوق لقضيتك</h3>
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-4 mb-4">
            <div class="d-sec">
              <img style="width: 50px" :src="base_url+'/assets/images/s1.svg'" alt="" />
              <h5 style="color: #048e81" class="mb-2 mt-3">امان وسرية تامة</h5>
              <p style="font-size: 14px">
                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
                دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                يوت
              </p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-sec">
              <img style="width: 50px" :src="base_url+'/assets/images/s2.svg'" alt="" />
              <h5 style="color: #048e81" class="mb-2 mt-3">سهل الاستخدام</h5>
              <p style="font-size: 14px">
                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
                دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                يوت
              </p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-sec">
              <img style="width: 50px" :src="base_url+'/assets/images/s3.svg'" alt="" />
              <h5 style="color: #048e81" class="mb-2 mt-3">ضمان حقوق الطرفين</h5>
              <p style="font-size: 14px">
                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
                دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                يوت
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
  export  default {
    name:"Features",
    data(){
      return{
        base_url:base_url
      };
    },
  }
</script>