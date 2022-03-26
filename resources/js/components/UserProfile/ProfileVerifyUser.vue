<template>

    
    <div v-if="success" class="alert alert-success">
        <p class="m-0 p-0" v-text="success"></p>
    </div>

    <div v-if="errorMsg" class="alert alert-danger">
        <p class="m-0 p-0" v-text="errorMsg"></p>
    </div>


    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><span class="p-l-5">تحقق الهوية </span></h5>
            </div>
                <div class="card-body">
                   <div v-if="loading" class="w-100 h-100 d-flex justify-content-center align-items-center">
                     <div class="spinner-border spinner-secondary" role="status"></div>
                  </div>
                   <upload-identity v-if="!loading && status == 'unset' || status == 'rejected'" :identity="identity" @refresh="handleRefresh" @error="handleError"></upload-identity>
                   <pending-identity v-if="!loading && status == 'pending'"></pending-identity>
                   <verified-identity v-if="!loading && status == 'verified'"></verified-identity>
                   <div class="col-12 my-3 py-2" v-if="!loading && status == null">
                     <div class="col-12 px-0 row mb-4">
                        <div class="col-12 px-0">
                           <div class="col-12 px-0 d-flex text-center justify-content-center">
                              <!-- <img src="https://nafezly.com/site_images/verification/id-verify-front-side.nafezly.svg" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block"> -->
                           </div>
                           <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                              اعد المحاولة ...
                           </div>

                        </div>
                     </div>   
                  </div>
                </div>
                <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check"
                        value="" /></div>
        </div>
    </div>

</template>
<script>
import api from '../../utils/api';
import uploadIdentity from '../VerifyUser/create.vue';
import pendingIdentity from '../VerifyUser/pending.vue';
import verifiedIdentity from '../VerifyUser/verified.vue';

    export default {
       emits: ['refresh', 'error'],
       components: {
          'upload-identity': uploadIdentity,
          'pending-identity': pendingIdentity,
          'verified-identity': verifiedIdentity,
       },
        
        data() {
            return {
                errorMsg: null,
                success: null,
                status: null,
                identity: null,
                loading: false,
            };
        },

        mounted() {
           this.checkIdentityStatus();
        },

        methods: {
            handleRefresh() {
               console.log('refresh------------------');
               this.checkIdentityStatus();
            },

            handleError(errMsg) {
               console.log('error------------------');
               this.success = null;
               this.errorMsg = errMsg;
            },

           checkIdentityStatus() {
              this.loading = true;
              api.get("/v1/identity/check")
                    .then((response) => {
                       console.log(response.data);
                       this.status = response.data.identity_status;
                       this.identity = response.data.identity;
                       this.loading = false;
                       this.errorMsg = null;
                       console.log('identity.status: ', this.status);
                    })
                    .catch((response) => {
                        console.log(response.data);
                        this.loading = false;
                        this.success = null;
                        this.errorMsg = response.data.message; 
               });
           },

            
        }
    }
</script>
<style scoped>

</style>
