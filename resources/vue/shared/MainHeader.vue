<template>
  <div class="app" id="mainApp">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand border-right pr-2" href="#">
        <img src="../../images/sagsol.png" alt srcset style="height:20px">
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown active">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >Create New</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">User</a>
              <a class="dropdown-item" href="#">Subject</a>
              <a class="dropdown-item" href="#">Topic</a>
              <a class="dropdown-item" href="#">Test</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fas fa-bell"></i>
              <span class="number badge badge-success">2</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                src="http://vue-dark.vueadmintemplate.com/src/assets/img/authors/avatar1.jpg "
                alt
                class="rounded-circle mr-1"
                style="width: 25px; "
              > Addision
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Profile</a>
              <router-link :to="{ name: 'auth'}" class="dropdown-item" href="/portal">Logout</router-link>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg border-0 swatch-indigo bottom_nav">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li
            v-for="(item,index) in menuItems"
            :key="index"
            class="text-capitalize dropdown nav-item"
          >
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
                class="nav-link dropdown-toggle d-flex align-items-center"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <span>
                  <i class="fas mr-2" v-bind:class="item.iconText"></i>
                  {{item.title}}
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
          <!-- <li class="nav-item badge_animate">
            <router-link
              :to="{name:'dashboardHome' , params:{pageType:'home'}}"
              class="nav-link"
            >Home</router-link>
          </li>-->
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
import staticData from "../../js/StaticData.json";
import JQuery from "jquery";
let $ = JQuery;

export default {
  name: "mainApp",
  data: function() {
    return {
      siteTitle: staticData.siteTitle,
      menuItems: "",
      userType: this.$route.params.userType,
      route: ""
    };
  },
  mounted() {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 135) {
        $(".bottom_nav").addClass("fixed-top");
      } else {
        $(".bottom_nav").removeClass("fixed-top");
      }
    });
    this.menuItems = staticData.userMenu[this.userType];
  }
};
</script>

