<template>
          <!-- Start Section Orders-->
        <section class="offers overflow-hidden py-5">
            <div class="container">
                <div
                    class="col-12 back mb-5 flex-wrap gap-5 d-flex align-items-center justify-content-between"
                >
                    <div
                        class="link-sections flex-wrap d-flex align-items-center gap-4"
                    >
                        الرئيسية / المشاريع / القسم الرئيسي / القسم الفرعي
                    </div>
                    <a href="" class="icon-back"> اغلاق المشروع </a>
                </div>
                <div class="level-and-status">
                    <div class="row">
                        <div class="col-xl-3">
                            <div
                                class="status-parent text-center text-xl-end py-3"
                            >
                                <div class="status-child">
                                    حالة المشروع:
                                    <span class="open status">مفتوح</span>
                                </div>
                                <div class="order-number">
                                    طلب رقم:
                                    <span>545121</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <ul class="level">
                                <li class="active">
                                    <div class="icon">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    الأطلاع وتقديم العروض
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    الأطلاع وتقديم العروض
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    الأطلاع وتقديم العروض
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="boxes d-flex flex-column mb-5 gap-5">
                    <div class="box-order">
                        <div class="info">
                            <div class="photo">
                                <img
                                    class="img-fluid"
                                    :src="`${base_url}assets/images/person.jpg`"
                                    alt=""
                                />
                            </div>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="name">محمد مصطفي</p>
                            <p class="job">عميل</p>
                        </div>
                        <div class="text">
                            <div
                                class="data flex-wrap d-flex justify-content-between align-items-center"
                            >
                                <div class="order-num mb-3 mb-lg-0">
                                    طلب رقم : <span class="count">545121</span>
                                </div>
                                <div
                                    class="d-flex flex-wrap align-items-center gap-3 gap-md-4"
                                >
                                    <div class="deta">
                                        <i class="fa-solid fa-calendar-day"></i>
                                        4/16/2022
                                    </div>
                                    <div class="view">
                                        <i class="fa-solid fa-eye"></i> 5465
                                        مشاهده
                                    </div>
                                    <div class="deta">
                                        <i class="fa-solid fa-clock"></i>
                                        منذ 4 ساعات
                                    </div>
                                    <div class="deta">
                                        <i class="fa-solid fa-money-bills"></i>
                                        عدد 5 عروض
                                    </div>
                                    <div class="deta">
                                        <i class="fa-solid fa-location-dot"></i>
                                        المكان
                                    </div>
                                    <div class="duration">
                                        <i class="fa-solid fa-clock"></i>

                                        مده التسليم 44 يوم
                                    </div>
                                    <a href="" class="setting">
                                        <i
                                            class="fa-solid fa-ellipsis-vertical"
                                        ></i>
                                        <div class="report">
                                            <i class="fa-solid fa-flag"></i>
                                            ابلاغ عن الطلب
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h5 class="title">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                المساحة
                            </h5>

                            <p class="content">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد
                                من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى
                                يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من
                                الفقرات يتيح لك مولد النص العربى زيادة عدد
                                الفقرات كما تريد
                            </p>
                            <div class="file-parent mt-4">
                                <p>ملف مرفق</p>
                                <a href="" class="file-child">
                                    ملف الطلب بالكامل
                                    <span>PDF File</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="box-search row d-flex align-items-center justify-content-between"
                >
                    <div class="col-xl-8 d-flex align-items-center gap-3">
                        <span class="titl-search">العروص المقدمة</span>
                        <form class="flex-fill" action="">
                            <div class="box-inpt position-relative">
                                <input
                                    type="search"
                                    placeholder="أبحث بالأسم....."
                                    name="search-offers"
                                    id=""
                                />
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </form>
                    </div>
                    <div
                        class="btns mt-3 mt-xl-0 col-xl-4 d-flex align-items-center gap-1 justify-content-between"
                    >
                        <a href="" class="btn new"> الأحدث </a>
                        <a href="" class="btn old"> الأقدم </a>

                        <a href="" class="btn favorite">
                            المفضلة: <span>5</span>
                        </a>
                    </div>
                </div>
                <div class="boxes-offers d-flex flex-wrap">
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>
                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">محمد مصطفي علي</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    21450364102
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    15 يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال 150
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    4/20/2022
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"
                                        :src="`${base_url}assets/images/person.jpg`"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    4.5
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn view">العرض المقدم</a>
                                <a href="" class="btn negotiable">
                                    قابل للتفاوض
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>

                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">محمد مصطفي علي</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    21450364102
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    15 يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال 150
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    4/20/2022
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"
                                        :src="`${base_url}assets/images/person.jpg`"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    4.5
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn view">العرض المقدم</a>
                                <a href="" class="btn non-negotiable">
                                    غير قابل للتفاوض
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>

                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">محمد مصطفي علي</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    21450364102
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    15 يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال 150
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    4/20/2022
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"
                                        :src="base_url+'/img/person.jpg'"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    4.5
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn inquiries"
                                    >أستفسار وتفاوض
                                    <div class="noti">2</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>

                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">محمد مصطفي علي</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    21450364102
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    15 يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال 150
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    4/20/2022
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"
                                        :src="base_url+'/img/person.jpg'"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    4.5
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn view">العرض المقدم</a>
                                <a href="" class="btn non-negotiable">
                                    غير قابل للتفاوض
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>

                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">محمد مصطفي علي</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    21450364102
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    15 يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال 150
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    4/20/2022
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"
                                        :src="base_url+'/img/person.jpg'"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    4.5
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn inquiries"
                                    >أستفسار وتفاوض
                                    <div class="noti">2</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>
                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">محمد مصطفي علي</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    21450364102
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    15 يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال 150
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    4/20/2022
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"
                                        :src="`${base_url}assets/images/person.jpg`"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    4.5
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn view">العرض المقدم</a>
                                <a href="" class="btn negotiable">
                                    قابل للتفاوض
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section Orders-->
</template>
<script>
export default {
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>

<style scoped>
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
/* Start Section Offers */
section.offers .back .icon-back {
    color: black;
    min-width: 252px;
    font-size: 15px;
    color: white;
    font-size: 18px;
    background-color: #ff584d;
    text-decoration: none;
}
section.offers .level-and-status {
    border: 1px solid #b0e1fc;
    border-radius: 11px;
    margin-bottom: 3rem;
    padding: 10px;
}
section.offers .status-parent {
    font-size: 18px;
    position: relative;
    color: #363848;
    display: flex;
    margin-right: -65px;

    flex-direction: column;
    align-items: center;
}
section.offers .status-parent::before {
    font-size: 18px;
    content: "";
    height: 100%;
    width: 2px;
    left: 0;
    background-color: #0491e8;
    top: 0;
    position: absolute;
    color: #363848;
}
section.offers .status-parent .status-child {
    margin-bottom: 1.5rem;
}
section.offers .status-parent .status {
    font-size: 12px;
    height: 26px;
    border-radius: 4px;
    display: inline-flex;
    align-items: center;
    line-height: 4;
    justify-content: center;
    color: white;
    margin-right: 5px;
    width: 83px;
    background-color: #0491e8;
}
section.offers .status-parent .status.open {
    background-color: #2b7b74;
}

section.offers .status-parent .order-number span {
    color: #0491e8;
    margin-right: 5px;
}
@media (max-width: 1199.98px) {
    section.offers .status-parent {
        margin-right: 0;
    }
    section.offers .status-parent::before {
        font-size: 18px;
        content: "";
        width: 100%;
        height: 2px;
        left: 0;
        background-color: #0491e8;
        bottom: 0;
        top: unset;
        position: absolute;
        color: #363848;
    }
}
section.offers ul.level {
    display: flex;
    position: relative;
    justify-content: space-between;
    height: 100%;
    align-items: center;
    text-align: center;
list-style-type: none;
    width: 600px;
    min-height: 119px;
    margin: auto;
}
section.offers ul.level li:first-child .icon:before {
    position: absolute;
    content: "";
    right: 0;
    top: 50%;
    z-index: -1;
    transform: translateY(-50%);
    width: 215px;
    border-bottom: 2px solid #0491e8;
}
section.offers ul.level li:nth-child(2) .icon:before {
    position: absolute;
    content: "";
    right: 0;
    top: 50%;
    z-index: -1;
    transform: translateY(-50%);
    width: 215px;
    border-bottom: 2px dotted #8f8f8f;
}
section.offers ul.level li {
    color: #8f8f8f;
    font-size: 18px;
}
section.offers ul.level li.active {
    color: #0491e8;
}
section.offers ul.level .icon {
    height: 41px;
    position: relative;

    display: flex;
    align-items: center;
    justify-content: center;
    width: 41px;
    background-color: white;
    border-radius: 50%;
    margin: auto;
    margin-bottom: 15px;
    border: 3px solid #8f8f8f;
}
section.offers ul.level .icon svg {
    color: #8f8f8f;
}
section.offers ul.level .active .icon {
    border: 3px solid #0491e8;
}
section.offers ul.level .active .icon svg {
    color: #0491e8;
}
section.offers .box-order {
    border-radius: 19px;
    background-color: #ecf8ff;
    display: flex;
    padding: 20px;
    gap: 50px;
}
@media (max-width: 767.98px) {
    section.offers ul.level {
        width: 250px;
    }
    section.offers ul.level li {
        font-size: 12px !important;
        padding: 1.5px;
    }
    section.offers ul.level li:first-child .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 110px;
        border-bottom: 2px solid #0491e8;
    }
    section.offers ul.level li:nth-child(2) .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 110px;
        border-bottom: 2px dotted #8f8f8f;
    }
}

section.offers .box-order .duration {
    border: 0.5px solid #048e81 !important;
    color: #048e81 !important;
    display: flex;
    background-color: #dffffc !important;
    padding: 5px 9px;
    border-radius: 5px;
    margin-right: 0 !important;
    align-items: center;
    gap: 2px;
}
section.offers .box-order .duration svg {
    color: #048e81 !important;
}

section.offers .box-order .setting {
    left: 0 !important;
    transform: translateY(-50%);
    top: 50% !important;
}
@media (max-width: 1199.98px) {
    section.offers .box-order .setting {
        left: 15px !important;
        transform: translateY(0);
        top: 15px !important;
    }
}

section.offers .box-order .info {
    text-align: center !important;
    margin-top: 86px;
    min-width: unset !important;
    position: unset !important;
}
@media (max-width: 1199.98px) {
    section.offers .box-order .info {
        margin-top: 0 !important;
    }
}
section.offers .text .file-parent p {
    font-size: 18px;
    font-weight: bolder;
    margin-bottom: 0;
}

section.offers .text .file-child {
    background: #dffffc;
    border: 0.5px solid #048e81;
    border-radius: 7px;
    padding: 10px;
    margin-top: 7px;
    display: block;
    max-width: fit-content;
    color: #048e81;
    text-decoration: none;
}

section.offers .box-order .title {
    margin-bottom: 1rem;
}
@media (max-width: 1199.98px) {
    section.offers .box-order {
        flex-direction: column;
        position: relative;
    }
}

section.offers .box-order .info .photo {
    overflow: hidden;
    width: 74px;
    height: 74px;
    background-color: white;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
section.offers .box-order .stars {
    margin-bottom: 10px;
        text-align: center !important;

}
section.offers .box-order .stars i {
    font-size: 14px;
    color: #e3ab00;
}
section.offers .box-order .name {
    color: #363848;
    font-size: 18px;
    margin-bottom: 3px;
    font-weight: 600;
}
section.offers .box-order .job {
    color: #2b7b74;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 0;
    text-align: center !important;
}
section.offers .box-order .text {
    flex: 1;
}
section.offers .box-order .data {
    font-size: 14px;
    color: #363848;
    margin-bottom: 1rem;
    position: relative;
}
section.offers .box-order .data .order-num {
    font-weight: bold;
}

section.offers .box-order .data .order-num .count {
    color: #0491e8;
}
section.offers .box-order .data i {
    color: #0491e8;
    font-size: 16px;
    margin-left: 2px;
}
section.offers .box-order .duration {
    border: 0.5px solid #048e81 !important;
    color: #0491e8;
    display: flex;
    background-color: #dffffc !important;
    padding: 5px 9px;
    border-radius: 5px;
    margin-left: 1.5rem;
    margin-right: 10px;
    align-items: center;
    gap: 2px;
}
@media (min-width: 1400px) {
    section.offers .box-order .duration {
        margin-right: 25px;
    }
}
section.offers .box-order .setting {
    left: 0;
    top: 20px;
    position: absolute;
}

section.offers .box-order .setting > i {
    font-size: 20px;
    color: #363848;
}
section.offers .box-order .setting > .report {
    border-radius: 3px;
    background-color: #eee;
    font-size: 14px;
    display: flex;
    align-items: center;
    position: absolute;
    right: -21px;
    min-width: 135px;
    box-shadow: #777 0 0 5px 0;
    bottom: calc(100% + 13px);
    color: var(--color-text);
    gap: 7px;
    transition: var(--main-transition);
    justify-content: center;
    transform: translateX(-30px);
    opacity: 0;
    pointer-events: none;
    padding: 5px 7px;
}
section.offers .box-order .setting:hover .report {
    transform: translateX(0);
    opacity: 1;
    pointer-events: unset;
}
section.offers .box-order .setting > .report::before {
    content: "";
    position: absolute;
    border-width: 10px;
    width: 0;
    height: 0;
    right: 12px;
    top: calc(100%);
    border-style: solid;
    border-color: #eee transparent transparent transparent;
}
section.offers .box-order .setting > .report > svg {
    color: var(--dark-red-color);
}
@media (max-width: 1199.98px) {
    section.offers .box-order .setting {
        left: 20px;
        top: 20px;
    }
    section.offers .box-order .data {
        position: unset;
    }
    section.offers .box-order .setting > .report {
        left: -21px;
        right: unset;
    }
    section.offers .box-order .setting > .report::before {
        left: 15px;
        right: unset;
    }
}
section.offers .box-order .title {
    font-weight: bold;
    font-size:19px;
    color: #0491e8;
}
section.offers .box-order .content {
    max-width: 65%;
    font-size: 16px;
    line-height: 28px;
    margin-bottom: 0;
    color: var(--color-text);
}
@media (max-width: 991.98px) {
    section.offers .box-order .content {
        max-width: 100%;
        margin-bottom: 1rem;
    }
}

section.offers .box-order .group-btn .btn {
    border-radius: 5px;

    color: white;
    text-align: center;
    min-width: 170px;
    font-size: 16px;
    outline: none;
    font-weight: normal;
    border: none;
    padding: 11px;
}
section.offers .box-order .group-btn .btn.new {
    background-color: var(--green-new);
}
section.offers .box-order .group-btn .btn.negotiate {
    background-color: #0491e8;
}
section.offers .box-order .group-btn .btn.under-review {
    background-color: #ffbe26;
}
section.offers .box-order .group-btn .btn.finished {
    background-color: var(--red-color-two);
}
section.offers .box-order .group-btn .btn.offered-orders {
    background-color: var(--dark-grey-color);
}
section.offers .box-order .group-btn .btn.underway {
    background-color: var(--dark-green-three);
}
section.offers .box-search {
    margin-bottom: 5rem;
}
section.offers .box-search .titl-search {
    font-size: 18px;
}
section.offers .box-search .box-inpt input {
    width: 100%;
    border: 0.5px solid #a5a5a5;
    border-radius: 12px;
    padding: 20px;
}
section.offers .box-search .box-inpt svg {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 20px;
    font-size: 20px;
    color: #0491e8;
}
section.offers .btns .btn {
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 109px;
    font-size: 16px;
    color: white;
    height: 50px;
}
section.offers .btns .btn.new {
    background-color: #0995eb;
}
section.offers .btns .btn.old {
    background-color: #d2d2d2;
    color: black;
}
section.offers .btns .btn.favorite {
    background-color: #ffc107;
}
section.offers .boxes-offers {
    column-gap: 100px;
    row-gap: 50px;
}
section.offers .boxes-offers .box-offer {
    width: calc(100% / 3 - 67px);
    min-width: 100px;
    position: relative;
    border: 1px solid #0491e8;
    padding: 15px;
    border-radius: 18px;
}
@media (max-width: 1199.98px) {
    section.offers .boxes-offers .box-offer {
        width: 100%;
    }
}
section.offers .boxes-offers .box-offer .star-box {
    position: absolute;
    font-size: 27px;
    left: -11px;
    top: -15px;
    color: #ffbe26;
}
section.offers .boxes-offers .box-offer .name {
    font-size: 16px;
    color: #0491e8;
    font-weight: bold;
    text-align: center;
}
section.offers .boxes-offers .box-offer .photo {
    text-align: center;
}
section.offers .boxes-offers .box-offer .photo .img-cont {
    position: relative;
    border-radius: 11px;
    margin: auto;
    margin-bottom: 16px;
    max-width: 100px;
}
section.offers .boxes-offers .box-offer .photo .img-cont .active {
    position: absolute;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    background-color: #50c950;
    right: -5px;
    border: 1px solid white;
    top: -5px;
}
section.offers .boxes-offers .box-offer .photo .img-cont img {
    border-radius: 11px;
}
section.offers .boxes-offers .box-offer .photo .star {
    margin-bottom: 0px;
    text-align: center !important;
}
section.offers .boxes-offers .box-offer .photo .star i {
    color: #ffbe26;
}
section.offers .boxes-offers .box-offer .photo .profile {
    text-decoration: underline;
    color: #363848;
}
@media (max-width: 1399.98px) {
    section.offers .boxes-offers .box-offer .photo .profile {
        font-size: 13px;
        text-decoration: underline;
        color: #363848;
    }
}
section.offers .boxes-offers .box-offer .info p:not(.name) {
    color: #363848;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 5px;
}
section.offers .boxes-offers .box-offer .info p .color {
    color: #0491e8;
}
section.offers .boxes-offers .box-offer .info .duration {
    color: #346842 !important;
}
section.offers .boxes-offers .box-offer .info .price {
    color: #ff4b4b !important;
}
section.offers .boxes-offers .box-offer .info .price {
    color: #ff4b4b !important;
}
section.offers .boxes-offers .box-offer .controll {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 1.5rem;
    gap: 1rem;
}
section.offers .boxes-offers .box-offer .controll .btn {
    border-radius: 5px;
    position: relative;
    width: calc(100% / 2 - 1rem);
    height: 40px;
    padding: 5px 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
section.offers .boxes-offers .box-offer .controll .btn .noti {
    position: absolute;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 3;
    left: -15px;
    top: -15px;
    color: white;
    border-radius: 50%;
    background-color: #ff5a5a;
}
section.offers .boxes-offers .box-offer .controll .btn.view {
    border: 0.5px solid #a5ddff;
    color: #0491e8;
    background-color: #b9e6ff;
}
section.offers .boxes-offers .box-offer .controll .btn.negotiable {
    border: 0.5px solid #90d8d1;
    color: #048e81;
    background-color: #e9fffd;
}
section.offers .boxes-offers .box-offer .controll .btn.non-negotiable {
    border: 0.5px solid #ffd18b;
    color: #ff9900;
    background-color: #ffeacb;
}
section.offers .boxes-offers .box-offer .controll .btn.inquiries {
    border: 0.5px solid #46cec1;
    color: #048e81;
    background-color: #defcf9;
}
/* End Section Offers */

</style>