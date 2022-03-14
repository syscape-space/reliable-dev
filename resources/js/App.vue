<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  setup: () => ({
    title: "welcome to vue page <3",
    _t:(key) => {
      return _.get(window.trans, key, key);
    },
    lang_loc:window.lang_loc,
  })
}
</script>

<style scoped>

</style>