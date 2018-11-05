<template>
    <div>
        <div v-if="pageType === 'home'">
            <AdminHome></AdminHome>
        </div>
        <div v-if="pageType === 'recruiter_list'">
            <RecruiterView></RecruiterView>
        </div>
        <div v-if="pageType === 'consultant_list'">
            <consultantView></consultantView>
        </div>
        <div v-if="pageType === 'vendor_list'">
            <vendorView></vendorView>
        </div>
    </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
import AdminHome from "./home";
import RecruiterView from "./recruiter";
import consultantView from "./consultant";
import vendorView from "./vendor";
export default {
  name: "recruiterView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: "",
      pageType: ""
    };
  },
  components: {
    AdminHome,
    RecruiterView,
    consultantView,
    vendorView
  },
  watch: {
    "$route.params": function() {
      this.pageType = this.$route.params.pageType;
    }
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.params.pageType;
    console.log("Component mounted.", this.tabs);
  }
};
</script>