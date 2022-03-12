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
  })
}
</script>

<style scoped>

</style>