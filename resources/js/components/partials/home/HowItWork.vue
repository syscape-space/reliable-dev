<template>
    <section class="mt-5 position-relative ">
      <img class="h1-it" :src="base_url+'/assets/images/h1.png'" alt="">
      <div class="container py-5">
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-6">
            <h6>كيف يعمل</h6>
            <h3 style="max-width: 500px" class="mb-5">
              قم بالاشتراك واطلب الخدمة بشكل امن وسريع مع السرية التامة
            </h3>
            <div class="d-flex mb-3 pos-rel">
              <span class="number ms-4"> 1 </span>
              <div>
                <h5 class="add-order-gr">أضف طلبك</h5>
                <p style="font-size: 12px">
                  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج
                  أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار
                  ماجنا أليكيوا . يوت
                </p>
              </div>
            </div>
            <div class="d-flex mb-3 pos-rel">
              <span class="number ms-4"> 2 </span>
              <div>
                <h5 class="add-order-gr">أضف طلبك</h5>
                <p style="font-size: 12px">اختر العرض المناسب</p>
              </div>
            </div>
            <div class="d-flex mb-3 pos-rel">
              <span class="number ms-4"> 3 </span>
              <div>
                <h5 class="add-order-gr">ناقش المستشارين والخبراء</h5>
                <p style="font-size: 12px">
                  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج
                  أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار
                  ماجنا أليكيوا . يوت
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 text-start">
            <img 
                class="w-100"
                style="max-width: 60px;" :src="base_url+'/assets/images/circleElement.svg'" alt="">
            <iframe
              class="w-100"
              height="315"
              src="https://www.youtube.com/embed/Aq8IXh67hdE"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
  name:"HotItWork",
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>