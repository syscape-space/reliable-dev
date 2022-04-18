<template>
  
                <div class="boxes d-flex flex-column gap-5">
                    <div class="box-order">
                        <div class="info">
                            <div class="photo">
                                <img
                                    class="img-fluid"
                                    src="../../assets/images/person.jpg"
                                    alt=""
                                />
                            </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="name">محمد مصطفي</p>
                            <p class="job">محامي حر</p>
                        </div>
                        <div class="text">
                            <div
                                class="data flex-wrap d-flex justify-content-between align-items-center"
                            >
                                <div class="order-num mb-3 mb-lg-0">
                                    طلب رقم: <span class="count">545121</span>
                                </div>
                                <div
                                    class="d-flex flex-wrap align-items-center gap-3 gap-md-4"
                                >
                                    <div class="deta">
                                        <i class="fas fa-calendar-day"></i>
                                        4/16/2022
                                    </div>
                                    <div class="view">
                                        <i class="fas fa-eye"></i> 5465
                                        مشاهده
                                    </div>
                                    <div class="deta">
                                        <i class="fas fa-clock"></i>
                                        منذ 4 ساعات
                                    </div>
                                    <div class="deta">
                                        <i class="fa fa-money-bill"></i>
                                        عدد 5 عروض
                                    </div>
                                    <div class="deta">
                                        <i class="fa fa-map-marker"></i>
                                        المكان
                                    </div>
                                    <div class="duration">
                                        <i class="fas fa-clock"></i>

                                        مده التسليم 44 يوم
                                    </div>
                                    <a href="" class="setting">
                                        <i
                                            class="fas fa-ellipsis-vertical"
                                        ></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="title">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                المساحة
                            </h5>
                            <div
                                class="d-flex align-items-center justify-content-between flex-wrap"
                            >
                                <p class="content">
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                    المساحة، لقد تم توليد هذا النص من مولد النص
                                    العربى، حيث يمكنك أن تولد مثل هذا النص أو
                                    العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                    الحروف التى يولدها التطبيق. إذا كنت تحتاج
                                    إلى عدد أكبر من الفقرات يتيح لك مولد النص
                                    العربى زيادة عدد الفقرات كما تريد
                                </p>

                                <div
                                    class="group-btn m-auto m-lg-0 d-flex flex-column gap-3"
                                >
                                    <a href="" class="btn new">طلبات جديدة</a>

                                    <a href="" class="btn negotiate">
                                        التفاوض: 2510</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</template>
<script>
import api from "../../utils/api";

export default {
  props: ['order'],
  name: "OrderCard",
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
    };
  },
  methods: {
    showThisOrderDetails(code) {
      this.$router.push({name: "ShowSingleOrder", params: {code: code}});
    },
    goToThisUserProfile(user_id) {
      this.$router.push({name: "UserProfile",params:{id:user_id}});
    }
  },
  created(){
    console.log(this.order)
  }
}
</script>

<style scoped>

</style>