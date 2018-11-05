
<template>
    <div class="fhome" id="fhome">
        <createUser></createUser>
    </div>
</template>

<script>
import createUser from "./createUser";
export default {
  name: "fhome",
  data() {
    return {
      userType: "",
      formType: ""
    };
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.formType = this.$route.params.formType;
    console.log("Component mounted.");
  },
  components: {
    createUser
  }
};
</script>
