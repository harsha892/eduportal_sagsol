<template>
  <div class="asideView" id="navigation-aside">
    <aside>
      <div class="main_aside_nav mt-2">
        <ul class="m-0 list-unstyled d-flex justify-content-start align-content-start flex-column">
          <li v-for="(item,index) in menuItems" :key="index" class="text-capitalize dropdown">
            <div class="w-100">
              <router-link
                :to="{name:item.routeName}"
                class="nav-link text-capitalize"
                v-if="item.children===undefined"
              >
                <i class="fas mr-2" v-bind:class="item.iconText"></i>
                {{item.title}}
              </router-link>

              <div v-if="item.children!==undefined">
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
                    v-for="(item,index) in item.children"
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
                    v-for="(item,index) in item.children"
                    :key="index"
                  >
                    <i class="fas mr-2" v-bind:class="item.iconText"></i>
                    {{item.title}}
                  </router-link>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>
  </div>
</template>

<script>
import staticData from "../../../../../js/StaticData.json";
export default {
  name: "navigation-aside",
  data() {
    return {
      userType: this.$route.params.userType,
      menuItems: null
    };
  },
  mounted() {
    console.log(this.userType, staticData.userMenu);
    this.menuItems = staticData.userMenu[this.userType];
  },
  components: {}
};
</script>
<style scoped>
.dropdown + .dropdown {
  margin: 0;
}
</style>
