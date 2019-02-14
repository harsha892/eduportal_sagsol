<template>
  <div class="app" id="mainApp">
    <nav class="navbar navbar-expand-lg topbar">
      <a class="navbar-brand border-right pr-2" href="#">
        <img src="../../images/sagsol.png" alt srcset style="height:15px">
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
          <li class="nav-item dropdown">
            <a
              class="nav-link waves-dark waves-effect"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fas fa-bell"></i>
              <div class="notify">
                <span class="heartbit"></span>
                <span class="point"></span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
              <ul class="list-unstyled">
                <li>
                  <div class="drop-title border-bottom">You have 4 new messanges</div>
                </li>
                <li>
                  <div class="message-center message-body">
                    <!-- Message -->
                    <a href="javascript:void(0)" class="message-item">
                      <span class="user-img">
                        <img
                          src="https://www.ampleadmin.wrappixel.com/assets/images/users/3.jpg"
                          alt="user"
                          class="rounded-circle"
                        >
                        <span class="profile-status online pull-right"></span>
                      </span>
                      <span class="mail-contnet">
                        <h5 class="message-title">Pavan kumar</h5>
                        <span class="mail-desc">Just see the my admin!</span>
                        <span class="time">9:30 AM</span>
                      </span>
                    </a>
                    <!-- Message -->
                    <a href="javascript:void(0)" class="message-item">
                      <span class="user-img">
                        <img
                          src="https://www.ampleadmin.wrappixel.com/assets/images/users/3.jpg"
                          alt="user"
                          class="rounded-circle"
                        >
                        <span class="profile-status busy pull-right"></span>
                      </span>
                      <span class="mail-contnet">
                        <h5 class="message-title">Sonu Nigam</h5>
                        <span class="mail-desc">I've sung a song! See you at</span>
                        <span class="time">9:10 AM</span>
                      </span>
                    </a>
                    <!-- Message -->
                    <a href="javascript:void(0)" class="message-item">
                      <span class="user-img">
                        <img
                          src="https://www.ampleadmin.wrappixel.com/assets/images/users/3.jpg"
                          alt="user"
                          class="rounded-circle"
                        >
                        <span class="profile-status away pull-right"></span>
                      </span>
                      <span class="mail-contnet">
                        <h5 class="message-title">Arijit Sinh</h5>
                        <span class="mail-desc">I am a singer!</span>
                        <span class="time">
                          9:08
                          AM
                        </span>
                      </span>
                    </a>
                    <!-- Message -->
                    <a href="javascript:void(0)" class="message-item">
                      <span class="user-img">
                        <img
                          src="https://www.ampleadmin.wrappixel.com/assets/images/users/3.jpg"
                          alt="user"
                          class="rounded-circle"
                        >
                        <span class="profile-status offline pull-right"></span>
                      </span>
                      <span class="mail-contnet">
                        <h5 class="message-title">Pavan kumar</h5>
                        <span class="mail-desc">Just see the my admin!</span>
                        <span class="time">9:02 AM</span>
                      </span>
                    </a>
                  </div>
                </li>
                <li class="dropdown-item">
                  <a class="nav-link text-center link text-dark" href="javascript:void(0);">
                    <b>See all Notifications</b>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </li>
              </ul>
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
              <i class="fas fa-cogs"></i>
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
              class="nav-link dropdown-toggle waves-dark waves-effect"
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
            <div
              class="dropdown-menu user_dropdown animated dropdown-menu-right zoomIn"
              aria-labelledby="navbarDropdown"
            >
              <div class="media px-3 py-2 bg-light">
                <img
                  src="http://vue-dark.vueadmintemplate.com/src/assets/img/authors/avatar1.jpg"
                  class="rounded-circle align-self-center mr-3"
                  alt="..."
                  style="width:60px;height:60px"
                >
                <div class="media-body">
                  <p class="m-0">Addision</p>
                  <small class="text-muted">harsha.chayanam@gmail.com</small>
                  <small>Ph: 9491122118</small>
                  <br>
                  <small>ID: ARRPC7455K</small>
                </div>
              </div>
              <a class href="#">Profile</a>
              <a href="#" v-on:click="doLogout">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg border-0 bg-dark p-0 bottom_nav">
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
          <li class="nav-item text-uppercase dropdown">
            <div>
              <a
                href
                class="nav-link dropdown-toggle hide-chevron waves-dark waves-effect active"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-folder-plus"></i> Create New
              </a>
              <div class="dropdown-menu animated flipInX" aria-labelledby="navbarDropdown">
                <router-link :to="{name:'newUser'}" class="nav-link text-capitalize">User</router-link>
                <a class="nav-link" href="#">Group</a>
                <a class="nav-link" href="#">Subject</a>
                <a class="nav-link" href="#">Topic</a>
                <a class="nav-link" href="#">Test</a>
              </div>
            </div>
          </li>
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
              <i class="fas" v-bind:class="item.iconText"></i>
              {{item.title}}
            </router-link>

            <div v-if="item.childern!==undefined">
              <a
                href
                class="nav-link dropdown-toggle waves-dark waves-effect"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <span>
                  <i class="fas" v-bind:class="item.iconText"></i>
                  {{item.title}}
                </span>
              </a>
              <div
                class="dropdown-menu animated flipInX"
                aria-labelledby="dropdownMenuButton"
                v-if="item.params===undefined"
              >
                <router-link
                  :to="{name:item.routeName}"
                  class="nav-link text-capitalize waves-dark waves-effect"
                  v-for="(item,index) in item.childern"
                  :key="index"
                >
                  <i class="fas" v-bind:class="item.iconText"></i>
                  {{item.title}}
                </router-link>
              </div>
              <div
                class="dropdown-menu animated flipInX"
                aria-labelledby="dropdownMenuButton"
                v-else
              >
                <router-link
                  :to="{name:item.routeName, params:{usersListType:item.params}}"
                  class="nav-link text-capitalize"
                  v-for="(item,index) in item.childern"
                  :key="index"
                >
                  <i class="fas" v-bind:class="item.iconText"></i>
                  {{item.title}}
                </router-link>
              </div>
            </div>
          </li>
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
  },
  methods: {
    doLogout() {
      this.$session.destroy();
      sessionStorage.clear();
      this.$router.push({
        name: "auth"
      });
    }
  }
};
</script>

