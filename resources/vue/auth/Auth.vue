<template>
    <div class="authView" id="authView">
          <div class="form">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-5    ">
                    <form class="auth_form">
                        <div class="auth_box mt-5">
                            <div class="images">
                                <img src="https://cdn.dribbble.com/users/321983/screenshots/2262084/ui-engine-icon.gif" id="icon" alt="User Icon" />
                            </div>
                            <div class="my-2">
                                <input type="text" placeholder="login" class="my-2 bg-light"><br>
                                <input type="password" placeholder="password " class="my-2 bg-light"><br>
                                <input type="submit" value="Log In" class="submit " v-on:click="goDashboard()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    </div>
</template>

<script>
import staticData from "../../js/StaticData.json";
export default {
  name: "authView",
  data: function() {
    return {
      siteTitle: staticData.siteTitle,
      pageType: ""
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
    console.log("Component mounted.", this.$route.params);
    this.pageType = this.$route.params.authType;
  },
  methods: {
    goDashboard() {
      this.$router.push({
        name: "dashboardHome",
        params: { userType: "admin", pageType: "home" }
      });
    }
  }
};
</script>
<style scoped>
.auth_form {
  width: 100%;
  min-height: 100%;
  padding: 20px;
  min-height: 100%;
  width: 100%;
}
.auth_form input {
  padding: 12px 50px;
  border-radius: 5px;
  border: none;
}

.auth_box {
  border-radius: 10px;
  padding: 22px;
  width: 100%;
  position: relative;
  box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
  text-align: center;
  background: #fff;
}
.submit {
  text-align: right;
  padding: 20px 60px;
  margin-bottom: 30px;
  background-color: #56baed;
  box-shadow: 3px 5px 10px 0px rgba(0, 0, 0, 0.3);
  color: #fff;
  margin: 10px 0;
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
