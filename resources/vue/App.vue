<template>
  <div class="app" id="mainApp">
    <!-- <loder :isLoading="true"></loder> -->

    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import loder from "./shared/loder";
export default {
  name: "mainApp",
  mounted() {},
  components: {
    loder
  },
  mounted() {
    // this.$store.dispatch("GET_ROLES_ACTION");
  }
};
</script>
