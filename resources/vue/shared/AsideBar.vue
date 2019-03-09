<template>
  <div class="asideView" id="asideView">
    <aside>
      <!-- <div class="user_profile_box">
        <div class="user_profile_view">
          <img
            src="http://vue-dark.vueadmintemplate.com/src/assets/img/authors/avatar1.jpg"
            alt
            class="rounded-circle user_picture"
          >
          <div class="images">
            <p class="mb-2">Addision</p>
            <div class="user_nav">
              <ul class="list-inline m-0">
                <li class="list-inline-item">
                  <a href>
                    <i class="far fa-user" title="user"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href>
                    <i class="fas fa-lock" title="lock"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href>
                    <i class="fas fa-cog" title="settings"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href>
                    <i class="fas fa-arrow-right" title="Logout"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>-->
      <div class="main_aside_nav mt-2">
        <ul class="m-0 list-unstyled">
          <li v-for="(item,index) in menuItems" :key="index" class="text-capitalize dropdown">
            <router-link
              :to="{name:item.routeName}"
              class="nav-link text-capitalize"
              v-if="item.childern===undefined"
            >
              <i class="fas mr-2" v-bind:class="item.iconText"></i>
              {{item.title}}
            </router-link>

            <div v-if="item.childern!==undefined">
              <a
                href
                class="dropdown-toggle d-flex align-items-center"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <span>
                  <i class="fas mr-2" v-bind:class="item.iconText"></i>
                  {{item.title}}
                </span>
                <span class="ml-auto">
                  <i class="fas fa-chevron-right rotat"></i>
                </span>
              </a>
              <div
                class="dropdown-menu"
                aria-labelledby="dropdownMenuButton"
                v-if="item.params===undefined"
              >
                <router-link
                  :to="{name:item.routeName}"
                  class="nav-link text-capitalize"
                  v-for="(item,index) in item.childern"
                  :key="index"
                >
                  <i class="fas mr-2" v-bind:class="item.iconText"></i>
                  {{item.title}}
                </router-link>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" v-else>
                <router-link
                  :to="{name:item.routeName, params:{usersListType:item.params}}"
                  class="nav-link text-capitalize"
                  v-for="(item,index) in item.childern"
                  :key="index"
                >
                  <i class="fas mr-2" v-bind:class="item.iconText"></i>
                  {{item.title}}
                </router-link>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>
  </div>
</template>

<script>
import staticData from "../../js/StaticData.json";
export default {
  name: "asideView",
  data: function() {
    return {
      siteTitle: staticData.siteTitle,
      menuItems: "",
      userType: this.$route.params.userType,
      route: ""
    };
  },
  mounted() {
    this.menuItems = staticData.userMenu[this.userType];
  }
};
</script>
