<template>
  <div class="app" id="mainDashboard">
    <div class="wrapper">
      <div class="w-100">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import topHeaderView from "./shared/MainHeader";
export default {
  name: "mainDashboard",
  data() {
    return {};
  },
  mounted() {
    console.log("dash board Component mounted.");
  },
  components: {
    topHeaderView
  }
};
</script>
