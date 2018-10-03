<template>
    <div class="app" id="mainApp">
 <header>
     <top-header-view></top-header-view>
 </header>
     <div class="wrapper">
         <aside-bar v-if="userType !== 'consultant'" class="bg-white"></aside-bar>
                 <div v-bind:class="{container:userType === 'consultant'}" class="w-100">
                    <router-view></router-view>
                 </div>
     </div>
    </div>
</template>

<script>
import topHeaderView from "./shared/MainHeader";
import asideBar from "./shared/AsideBar";
export default {
  name: "mainApp",
  data() {
    return {
      userType: ""
    };
  },
  mounted() {
    this.userType = this.$route.params.userType;
    console.log(this.userType);
    console.log("dash board Component mounted.");
  },
  components: {
    topHeaderView,
    asideBar
  }
};
</script>
