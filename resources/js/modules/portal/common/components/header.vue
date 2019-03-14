<template>
  <div class="app" id="navigation-header">
    <nav class="navbar navbar-expand-lg topbar">
      <a class="navbar-brand border-right pr-2" href="javascript:void(0)" @click="$router.go(-1)">
        <img src="../../../../../images/sagsol.png" alt srcset style="height:15px">
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
        <ul class="navbar-nav ml-auto" v-if="user">
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
              >
              {{user.user_detail.first_name}}
            </a>
            <div
              class="dropdown-menu user_dropdown dropdown-menu-left"
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
                  <p class="m-0">{{user.user_detail.first_name}}</p>
                  <small class="text-muted">{{user.email}}</small>
                  <br>
                  <small>Ph: {{user.user_detail.phone}}</small>
                </div>
              </div>
              <a class="d-none" href="#">Profile</a>
              <a href="#" v-on:click="doLogout">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "navigation-header",
  mounted() {},
  components: {},
  mounted() {
    // this.$store.dispatch("GET_ROLES_ACTION");
  },
  computed: {
    user() {
      return this.$store.getters["header/GET_USER_INFO"];
    }
  },
  created() {
    this.$store.dispatch("header/SET_USER_INFO");
  },
  methods: {
    doLogout(e) {
      e.preventDefault();
      this.$store.dispatch("header/DO_LOGOUT");
    }
  }
};
</script>
