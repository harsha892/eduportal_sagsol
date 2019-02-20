<template>
  <div id="adminView">
    <header>
      <top-header-view></top-header-view>
    </header>
    <div class="wrapper">
      <div class="mt-2 container-fluid">
        <div class="row">
          <div class="col-12">
            <ol class="breadcrumb">
              <li class="text-capitalize">&nbsp;{{pageType}}</li>
            </ol>
          </div>
        </div>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import topHeaderView from "../../shared/MainHeader";
import AdminHome from "./home";
import UsersList from "./user/userslist";
import mapState from "vuex";
export default {
  name: "adminApp",
  data() {
    return {
      userType: "",
      pageType: ""
    };
  },
  computed: {
    doneTodosCount() {
      console.log("Store", this.$store);
      return 4; //this.$store.role;
    }
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
      this.pageType = this.$route.path.split(
        "/portal/" + this.userType + "/dashboard/"
      )[1];
      this.pageType = this.pageType.replace(/\//g, " > ");
    }
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path
      .split("/portal/" + this.userType + "/dashboard/")[1]
      .replace(/\//g, " > ");
    this.pageType = this.pageType.replace(/\//g, " > ");
  },
  components: {
    topHeaderView,
    AdminHome,
    UsersList
  }
};
</script>