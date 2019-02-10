<template>
  <div>
    <div class="authView" id="authView">
      <div class="form">
        <div class="container">
          <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-5">
              <form class="auth_form">
                <div class="auth_box mt-5">
                  <div class="images pt-3 pb-0">
                    <img src="../../images/sagsol.png" id="icon" alt="User Icon">
                    <h5 class="my-3 text-uppercase text-blue">school management system</h5>
                  </div>
                  <hr>
                  <div class="mb-5">
                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input
                          type="email"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          placeholder="Enter email"
                        >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input
                          type="password"
                          class="form-control"
                          id="exampleInputPassword1"
                          placeholder="Password"
                        >
                      </div>
                      <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="userType"
                            id="aaRadio"
                            value="aa"
                            v-model="userType"
                          >
                          <label class="form-check-label" for="aaRadio">AA</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="userType"
                            id="amRadio"
                            value="am"
                            v-model="userType"
                          >
                          <label class="form-check-label" for="amRadio">AM</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="userType"
                            id="aiRadio"
                            value="ai"
                            v-model="userType"
                          >
                          <label class="form-check-label" for="aiRadio">AI</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="userType"
                            id="studentRadio"
                            value="student"
                            v-model="userType"
                          >
                          <label class="form-check-label" for="studentRadio">Student</label>
                        </div>
                      </div>
                      <span class="btn swatch-green" v-on:click="doLogin()">Submit</span>
                    </form>
                    <!-- .form
                    <input type="text" placeholder="login" class="my-2 bg-light">
                    <br>
                    <input type="password" placeholder="password " class="my-2 bg-light">
                    <br>
                    <input type="submit" value="Log In" class="submit" v-on:click="goDashboard()">
                    <br>
                    <a href=""></a>-->
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
import staticData from "../../js/StaticData.json";
import environment from "../../js/environment";
import AppService from "../../js/appservices";
export default {
  name: "authView",
  data: function() {
    return {
      siteTitle: staticData.siteTitle,
      pageType: "",
      userType: "",
      rolesData: ""
    };
  },
  watch: {
    "$route.params": function() {
      this.pageType = this.$route.params.authType;
    }
  },
  created: function() {
    this.pageType = this.$route.params.authType;
  },
  mounted() {
    this.pageType = this.$route.params.authType;
    AppService.doGet("role/all").then(res => {
      this.rolesData = res;
      console.log(this.rolesData, "rolesData");
    });
  },
  methods: {
    goDashboard() {
      this.$router.push({
        name: "adminDashboard",
        params: { userType: this.userType }
      });
    },
    doLogin() {
      const payload = {
        email: "harsha.chayanam@gmail.com",
        password: "Sagsol12"
      };
      AppService.doPost("user/login", payload).then(res => {
        console.log(res);
      });
    }
  }
};
</script>
<style scoped>
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
