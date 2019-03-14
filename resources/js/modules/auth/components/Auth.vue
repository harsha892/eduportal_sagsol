<template>
  <div>
    <div class="authView" id="authView">
      <div class="form">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-5">
              <form class="auth_form">
                <div class="auth_box mt-5">
                  <div class="images pt-3 pb-0">
                    <img src="../../../../images/sagsol.png" id="icon" alt="User Icon">
                    <h5 class="my-3 text-uppercase text-danger">school management system</h5>
                  </div>
                  <hr>
                  <div class="mb-5">
                    <form v-if="login">
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input
                          type="email"
                          class="form-control"
                          :class="{'is-invalid' : formerrors.email.length > 0}"
                          id="email"
                          placeholder="Enter email"
                          :value="login.email"
                          @input="updateField($event, 'email')"
                          name="email"
                        >
                        <div class="invalid-feedback" v-if="formerrors.email.length > 0">
                          <span v-for="(item,index) in formerrors.email" :key="index">{{item}}</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password</label>
                        <input
                          type="password"
                          class="form-control"
                          :class="{'is-invalid' : formerrors.password.length > 0}"
                          id="pwd"
                          placeholder="Password"
                          name="password"
                          :value="login.password"
                          @input="updateField($event, 'password')"
                        >
                        <div class="invalid-feedback" v-if="formerrors.password.length > 0">
                          <span v-for="(item,index) in formerrors.password" :key="index">{{item}}</span>
                        </div>
                      </div>
                      <button class="btn btn-success" v-on:click="doLogin">Login</button>
                    </form>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import staticData from "../../../js/StaticData.json";
// import environment from "../../../js/environment";
export default {
  name: "authView",
  data: function() {
    return {
      siteTitle: "staticData.siteTitle"
    };
  },
  created() {
    // this.$store.dispatch("Auth/loginForm");
    // this.$store.dispatch("Auth/errors");
  },
  computed: {
    login() {
      return this.$store.getters["Auth/loginForm"];
    },
    formerrors() {
      return this.$store.getters["Auth/errors"];
    },
    isLoginFormValid() {
      return this.$store.getters["Auth/isLoginFormValid"];
    }
  },
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("Auth/updateField", payload);
    },
    doLogin(e) {
      e.preventDefault();
      this.$store.commit("Auth/checkFormValidation");
      !!this.isLoginFormValid ? this.$store.dispatch("Auth/login") : false;
    }
  }
};
</script>
<style scoped>
#authView{
  min-height: 100vh
}
.auth_form {
  width: 100%;
  min-height: 100%;
  min-height: 100%;
  padding: 30px;
  width: 100%;
}
/* .auth_form input {
  padding: 12px 25px;
  border-radius: 5px;
  width: 80%;
  border: none;
} */

.auth_box {
  border-radius: 10px;
  padding: 40px;
  width: 100%;
  position: relative;
  box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
  background: #fff;
}
.submit {
  text-align: right;
  padding: 20px 60px;
  margin-bottom: 30px;
  background-color: #56baed;
  box-shadow: 3px 5px 10px 0px rgba(0, 0, 0, 0.3);
  color: #fff;
  margin: 20px 0 10px 0;
  text-align: center;
}
.forgot {
  background-color: #f6f6f6;
  text-decoration: none;
  list-style-type: none;
  padding: 15px;
  width: 22em;
  text-align: center;
  border-radius: 0 0 10px 10px;
  border-top: 1px solid red;

  margin-top: 5px;
}

.images img {
  width: 60%;
}
.forgot a {
  color: #92badd;
  display: inline-block;
  text-decoration: none;
  font-weight: 400;
}
</style>
