<template>
  <nav
      class="navbar navbar-expand-xl navbar-dark|light bg-primary|secondary|success|danger|warning|info|light|dark"
  >
    <router-link to="/" class="navbar-brand">
      <img :src="base_url+'/assets/images/logo.svg'" alt="" />
    </router-link>
    <button
        class="navbar-toggler d-xl-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"
    ><i style="color: #048e81;" class="fas fa-bars"></i>  </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav ms-auto mt-2 mt-lg-0 w-100">
        <li class="nav-item active">
          <router-link :to="{name:'home'}" class="nav-link">{{ $root._t("app.home") }}</router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $root._t("app.howToWork") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $root._t("app.whyWe") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $root._t("app.serviceProducers") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $root._t("app.newJobs") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $root._t("app.commonQuestions") }}</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $root._t("app.contactUs") }}</a>
        </li>
        <li class="nav-item me-auto">
          <a class="nav-link btn-1" href="#">{{ $root._t("app.serviceRequest") }}</a>
        </li>
        <li class="nav-item">
          <router-link :to="{name:'Login'}" class="nav-link btn-2">{{ $root._t("app.enter") }}</router-link>
        </li>
        <li class="nav-item">
          <a v-if="$root.lang_loc == 'en'" href="./lang?loc=ar"  class="nav-link btn-2">العربية</a>
          <a v-else href="./lang?loc=en"  class="nav-link btn-2">English</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "LayoutNavBar",
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>

<style scoped>

</style>
