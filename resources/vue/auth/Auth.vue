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
                    <h5 class="my-3 text-uppercase text-danger">school management system</h5>
                  </div>
                  <hr>
                  <div class="mb-5">
                    <p class="m-0 text-danger" v-if="error!==''">{{error}}</p>
                    <form @submit="doLogin">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input
                          type="email"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          placeholder="Enter email"
                          v-model="email"
                          name="email"
                          v-validate="'required|email'"
                        >
                        <small class="text-danger my-2">{{ errors.first('email') }}</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input
                          type="password"
                          class="form-control"
                          id="exampleInputPassword1"
                          placeholder="Password"
                          name="password"
                          v-model="password"
                          v-validate="'required|min:6'"
                        >
                        <small class="text-danger my-2">{{ errors.first('password') }}</small>
                      </div>
                      <input
                        type="submit"
                        :disabled="errors.any()"
                        class="btn swatch-green"
                        value="Submit"
                      >
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
import staticData from "../../js/StaticData.json";
import environment from "../../js/environment";
import AppService from "../../js/appservices";
export default {
  name: "authView",
  data: function() {
    return {
      siteTitle: staticData.siteTitle,
      userType: "",
      email: "",
      password: "",
      error: ""
    };
  },
  methods: {
    doLogin(e) {
      e.preventDefault();
      const payload = {
        email: this.email,
        password: this.password
      };
      console.log(payload);
      AppService.doPostWithOutToken("user/login", payload)
        .then(response => {
          this.$session.start();
          const data = response.data || {};
          this.$session.set("token", data.token);
          this.$router.push({
            name: "adminDashboard",
            params: { userType: data.role }
          });
        })
        .catch(error => {
          const {
            status_code,
            message = "Invalid user name / password try again"
          } = error || {};
          switch (status_code) {
            case 401:
              this.error = message;
              break;
            case 500:
              this.error = message;
              break;
            case 403:
              this.error = "Invalid user name / password try again";
              break;
            default:
              this.error = "Something went wrong please try again";
          }
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
