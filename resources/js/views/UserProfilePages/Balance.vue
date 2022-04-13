<template>
  <RightNavbar/>
  <TopNavbar/>
  <section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
        <div class="btw-flex">
          <h6 class="my-4">{{ $root._t("app.accountCharge") }}</h6>
          <div class="">
            <button class="bl-btn mx-2">{{ $root._t("app.balanceWithdrawal") }}</button>
            <recharge-balance-modal/>
          </div>
        </div>
        <div class="row w-100 mx-0 px-0 mt-5">
          <div class="col-md-3 mb-2">
            <div class="bl-money p-4">
              
              <div>
                <h6 class="text-center">
                  {{ $root._t("app.balanceAbleToWithdrawal") }}
                </h6>
                <div style="color: #3BB234;font-size: 25px;" class="text-center" v-if="user">
                  {{ parseFloat(user.current_balance) - parseFloat(user.suspended_balance) }} $
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-2">
            <div class="bl-money p-4">
           
              <div>
                <h6 class="text-center">
                  {{ $root._t("app.suspendedBalance") }}
                </h6>
                <div style="color: #3BB234;font-size: 25px;" class="text-center">
                  {{ user.suspended_balance }} $
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-2">
            <div class="bl-money p-4">
              <div>
                <h6 class="text-center">
                  {{ $root._t("app.availableBalance") }}
                </h6>
                <div style="color: #3BB234;font-size: 25px;" class="text-center">
                  {{ user.current_balance }} $
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-2">
            <div class="bl-money p-4">
              <div class="">
                <div class="text-center">
                  <div class="mb-2">{{ $root._t("app.totalBalace") }}</div>
                  <span style="font-size: 28px;color: #339858;">{{ user.current_balance }} $</span>
                </div>
              </div>
              </div>
            </div>
        </div>
       
     
        <div class="d-flex align-items-center justify-content-between my-2">
          <span> {{ $root._t("app.fawaterkAccount") }}</span>
          <a href="" style="color: #2B7B74;">مشاهده كل فواتيري</a>
        </div>
        <div>
          <template v-for="charge in charges">
            <div class="bl-money py-2 btw-flex px-2 mb-2" style="    min-height: 100px;" v-if="charge.charge_status === 'done' " >
              <span>
                <span class=" text-white inv-c" style="min-width: 90px">
                  {{ parseInt( charge.amount ) }} $
                </span>
                <span class="me-3">
                  {{ $root._t("app.rechargingSuccessfully") }}
                  بتاريخ
                  {{ charge.date }}
                  عن طريق
                  {{charge.charge_by === 'bank_transfer' ? 'تحويل بنكي' : 'دفع الكتروني'}}
                </span>
              </span>
              <span class="" style="min-width: 90px;padding: 16px;border-left: 1px solid #ddd;font-weight: bold;font-size: 25px;color: #3bb234;">
                <img class="" :src="base_url+'/public/assets/images/balance-paypal.svg'" alt="">
              </span>
            </div>
          </template>
        </div>
      </div>
    </div>
  </section>

</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import api from "../../utils/api";
import RechargeBalanceModal from "../../components/RechargeBalanceModal";

export default {
  data() {
    return {
      user: {},
      base_url: base_url,
      charges: [],
    };
  },
  components: {RechargeBalanceModal, RightNavbar, TopNavbar},
  mounted() {
    this.$root.getAuthUser();
  },
  methods: {
    rechargeRequests() {
      api.get('/v1/balancerecharges').then(res => {
        this.user = this.$root.auth_user;
        this.charges = res.data.data;
      }).catch(e => {
        //  TODO
      })
    }
  },
  created() {
    this.rechargeRequests();
  }
}
</script>