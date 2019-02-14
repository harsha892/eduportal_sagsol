<template>
  <div id="formsView">
    <header>
      <top-header-view></top-header-view>
    </header>
    <div class="wrapper">
      <!-- <aside-bar></aside-bar> -->
      <div class="mt-2 container-fluid">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import topHeaderView from "../../shared/MainHeader";
export default {
  name: "formsView",
  data() {
    return {
      userType: "",
      pageType: "",
      formType: ""
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
      this.pageType = this.$route.path.split(
        "/portal/" + this.userType + "/"
      )[1];
      this.pageType = this.pageType.replace(/\//g, " > ");
      this.formType = this.$route.params.form;
    }
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path
      .split("/portal/" + this.userType + "/")[1]
      .replace(/\//g, " > ");
    this.pageType = this.pageType.replace(/\//g, " > ");
    this.formType = this.$route.params.form;
  },
  components: {
    topHeaderView,
  },
  methods: {}
};
</script>