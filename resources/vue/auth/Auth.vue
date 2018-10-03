<template>
    <div class="authView" id="authView">
        <p>login view</p>
            <button class="btn btn-danger" v-on:click="goDashboard()"> go to dashboard</button>
    </div>
</template>

<script>
import staticData from "../../js/StaticData.json";
export default {
  name: "authView",
  data: function() {
    return {
      siteTitle: staticData.siteTitle,
      pageType: ""
    };
  },
  watch: {
    "$route.params": function() {
      this.pageType = this.$route.params.authType;
    }
  },
  created: function() {
    this.pageType = this.$route.params.authType;
  },
  mounted() {
    console.log("Component mounted.", this.$route.params);
    this.pageType = this.$route.params.authType;
  },
  methods: {
    goDashboard() {
      this.$router.push({
        name: "dashboardHome",
        params: { userType: "consultant", pageType: "profile" }
      });
    }
  }
};
</script>
