<template>
  <div class="app" id="auth-component">
    <!-- <loder :isLoading="true"></loder> -->
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "auth-component",
  mounted() {},
  components: {},
  mounted() {
    // this.$store.dispatch("GET_ROLES_ACTION");
  }
};
</script>
