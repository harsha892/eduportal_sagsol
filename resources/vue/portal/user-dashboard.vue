
<template>
  <div class="app" id="homeView">
    <div v-if="userType === 'admin'">
      <admin-app></admin-app>
    </div>
    <div v-if="userType === 'student'">
      <student-app></student-app>
    </div>
    <div v-if="userType === 'AI'">
      <staff-app></staff-app>
    </div>
  </div>
</template>
 
<script>
import AdminApp from "./admin/dashboard";
import StudentApp from "./student/dashboard";
import StaffApp from "./staff/dashboard";
export default {
  name: "homeView",
  data() {
    return {
      userType: ""
    };
  },
  mounted() {
    this.userType = this.$route.params.userType;
    console.log(this.userType);
  },
  components: {
    AdminApp,
    StudentApp,
    StaffApp
  }
};
</script>
