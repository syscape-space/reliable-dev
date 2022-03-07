<template>
  <home-header/>
  <search-service-section/>
</template>

<script>
import HomeHeader from "./partials/home/HomeHeader";
import SearchServiceSection from "./partials/home/SearchServiceSection";
export default {
  name: "Home",
  components: {SearchServiceSection, HomeHeader},
  data(){
    return{
      base_url:base_url,
    };
  }
}
</script>

<style scoped>

</style>