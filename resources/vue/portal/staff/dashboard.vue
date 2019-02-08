<template>
  <div class="app">
    <header>
      <top-header-view></top-header-view>
    </header>
    <div class="wrapper">
      <div class="w-100">
        <h1>Staff portal</h1>
      </div>
    </div>
  </div>
</template>

<script>
import topHeaderView from "../../shared/MainHeader";
import asideBar from "../../shared/AsideBar";
export default {
  name: "staffApp",
  data() {
    return {
      userType: ""
    };
  },
  mounted() {
    this.userType = this.$route.params.userType;
  },
  components: {
    topHeaderView,
    asideBar
  }
};
</script>
