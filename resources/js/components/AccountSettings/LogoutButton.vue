<template>
   <a class="dropdown-item" @click="handleLogout()" style="color: #dd0047">
      تسجيل الخروج
    </a>
</template>


<script>
export default {
  methods: {
    handleLogout() {

      this.$root.alertSuccess("Logout in progress");
      localStorage.setItem("token", "");
      localStorage.removeItem("token");
      this.$router.push({ name: "Login"});

    },
  },
};
</script>
