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
      
    };
  }
}
</script>

<style scoped>

</style>