
<template>
    <div class="phome" id="phome">
        <div v-if="userType === 'consultant'">
            <consultantView></consultantView>
        </div>
         <div v-if="userType === 'recruiter'">
            <recruiterView></recruiterView>
        </div>
        <div v-if="userType === 'vendor'">
            <vendorView></vendorView>
        </div>
        <!-- <div v-else>
            <h1>other user</h1>
        </div> -->
    </div>
</template>

<script>
import consultantView from "./consultant/consultantView";
import recruiterView from "./recruiter/recruiterView";
import vendorView from "./vendor/vendorView";
export default {
  name: "phome",
  data() {
    return {
      userType: "",
    };
  },
  mounted() {
    this.userType = this.$route.params.userIs;
    console.log("Component mounted.");
  },
  components: {
    consultantView,
    recruiterView,
    vendorView
  }
};
</script>
