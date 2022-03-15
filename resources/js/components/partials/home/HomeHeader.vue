<template>
  <header
      class="text-center text-white d-flex align-items-center justify-content-center flex-column"
  >
    <h4 style="font-weight: 300">{{ $root._t("app.appName") }}</h4>
    <h2 class="title">
      {{ $root._t("app.JudicialAndLegalServices") }}
      <br />
      {{ $root._t("app.electronic") }}
    </h2>
  </header>
</template>

<script>
export default {
  name: "HomeHeader",
  data(){
    return{
      base_url:base_url ,
    };
  },
}
</script>

<style scoped>

</style>