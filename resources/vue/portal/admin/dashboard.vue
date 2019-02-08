<template>
  <div id="adminView">
    <header>
      <top-header-view></top-header-view>
    </header>
    <div class="wrapper">
      <!-- <aside-bar></aside-bar> -->
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
import asideBar from "../../shared/AsideBar";
import AdminHome from "./home";
import UsersList from "./user/userslist";
export default {
  name: "adminApp",
  data() {
    return {
      userType: "",
      pageType: ""
    };
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
    asideBar,
    AdminHome,
    UsersList
  },
  methods: {}
};
</script>
<style>
.state-media {
  background: #fff;
  margin: 5px 0;
  padding: 0.5rem;
}
.state-icn {
  height: 60px;
  width: 60px;
  text-align: center;
  border-radius: 50%;
  margin: 5px;
}
.state-icn .fa {
  font-size: 28px;
  line-height: 60px;
}
.state-media {
  padding: 20px;
  margin-bottom: 20px;
  background-clip: padding-box;
  background-color: #ffffff;
}
.box-ws {
  border-radius: 5px;
  background-color: #ffffff;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05);
  border: 0;
}
.state-media h4 {
  color: #455a64;
  font-size: 24px;
  font-weight: 600;
  margin-top: 6px;
  margin-bottom: 4px;
}
</style>
