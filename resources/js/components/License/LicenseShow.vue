<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <h6 class="my-4"> {{ $root._t("app.license") }}</h6>
          <form action="">
            <div class="row w-100 mx-0 px-0">
             
             <div class="col-md-12">
               <table class="table table-bordered ">
                  <thead>
                    <tr style="background-color: #048e81;color: #fff;">
                      <th>{{ $root._t("app.licenseNameOrLicenseNumber") }}</th>
                      <th>{{ $root._t("app.license") }}</th>
                      <th>{{ $root._t("app.licenseExpirdDate") }}</th>
                      <th>{{ $root._t("app.notes") }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>test</td>
                      <td>test</td>
                      <td>test</td>
                      <td>test</td>
                    </tr>
                  </tbody>
               </table>
             </div>
         
              
            </div>
          </form>
        </div>
      </div>
    </section>
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