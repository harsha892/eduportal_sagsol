
<template>
    <div class="dhome" id="dhome">
        <div v-if="userType === 'consultant'">
            <ConsultantView></ConsultantView>
        </div>
         <div v-if="userType === 'admin'">
            <adminView></adminView>
        </div>
        <!-- <div v-else>
            <h1>other user</h1>
        </div> -->
    </div>
</template>

<script>
import ConsultantView from "./consultant/Consultant";
import adminView from "./admin/admin";
export default {
  name: "dhome",
  data() {
    return {
      userType: ""
    };
  },
  mounted() {
    this.userType = this.$route.params.userType;
    console.log("Component mounted.");
  },
  components: {
    ConsultantView,
    adminView
  }
};
</script>
