<template>
  <div class="app" id="appView">
    <!-- <loder :isLoading="true"></loder> -->
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "appView",
  mounted() {},
  components: {},
  mounted() {
    // this.$store.dispatch("GET_ROLES_ACTION");
  }
};
</script>
