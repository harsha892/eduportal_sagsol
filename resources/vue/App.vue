<template>
  <div class="app" id="mainApp">
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "mainApp",
  mounted() {},
  components: {},
  mounted() {
    // this.$store.dispatch("GET_ROLES_ACTION");
  }
};
</script>
