<template>
  <div id="portal-view">
    <header>
      <nav-header></nav-header>
    </header>
    <div class="wrapper">
      <nav-aside></nav-aside>
      <div class="mt-2 container-fluid">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import navAside from "./common/components/aside";
import navHeader from "./common/components/header";
export default {
  name: "portal-view",
  mounted() {},
  components: { navAside, navHeader },
  mounted() {
    this.$store.dispatch("roles/GET_ROLES_ACTION");
    this.$store.dispatch("moreMasters/GET_MASTERS_ACTION");
  }
};
</script>
