<template>
  <div class="container">
    <layout-nav-bar/>
  </div>
  <div class="main-layout-window">
    <router-view></router-view>
  </div>
  <layout-footer/>


</template>

<script>
import LayoutNavBar from "./partials/LayoutNavBar";
import LayoutFooter from "./partials/LayoutFooter";
export default {
  name: "Layout",
  components: {LayoutFooter, LayoutNavBar},
  data(){
    return{
      base_url:this.$parent.$parent.base_url,
    };
  }
}
</script>

<style scoped>
  .main-layout-window{
    min-height: 750px;
  }
</style>