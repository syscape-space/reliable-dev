<template>
    <section class="requsts-sec mt-4  ">
      <div class="container text-center pt-5">
        <img style="max-width: 90%;width: 250px;" :src="base_url+'/assets/images/ticket.png'" alt="">
      </div>
      <div>
        <h2 
          class="text-center mt-3"
          style="color:#707070">{{ $root._t("app.donnotHaveTicket") }}
        </h2>
        <div class="text-center mt-5 pt-5">
          <button 
            style=" border: 0;
                    background-color: #048e81;
                    color: #fff; 
                    width: 250px;
                    padding: 8px 40px;
                    margin:auto"
            class="rounded"> {{ $root._t("app.newTicket") }} </button>
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
<style scoped>

</style>