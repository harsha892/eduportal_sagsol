<template>
  <div id="newUserForm">
    <form @submit="createNewUser" v-if="formData!==undefined && rolesLength!==0">
      <div class="card">
        <div class="card-body">
          <div class="col-12">
            <h4 class="text-uppercase">
              <span v-if="routeName !=='editUser'">New</span>
              <span v-else>Edit</span> User
            </h4>
            <hr>
            <div class="form-group" v-if="routeName !=='editUser'">
              <label for="user_role">User role</label>
              <select
                class="custom-select"
                name="user_role"
                id="user_role"
                v-model="formData.role_id"
              >
                <option value="">-- Open this select menu --</option>
                <option :value="item.id" v-for="(item,index) in roles" :key="index">{{item.name}}</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">first name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    placeholder="Firstname"
                    v-model="formData.user_detail.first_name"
                    name="first_name"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('first name') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">last name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    placeholder="lastname"
                    v-model="formData.user_detail.last_name"
                    name="last_name"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('last name') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="last_name">Date of birth</label>
                  <datepicker
                    v-model="formData.user_detail.dob"
                    input-class="form-control"
                    format="dd/MM/yyyy"
                  ></datepicker>

                  <small class="text-danger my-2">{{ errors.first('dob') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Gender</label>
                  <div class="form-row">
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="gender"
                        id="male"
                        value="male"
                        v-model="formData.user_detail.gender"
                      >
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="gender"
                        id="female"
                        value="female"
                        v-model="formData.user_detail.gender"
                      >
                      <label class="form-check-label" for="female">Fe male</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Phone"
                    placeholder="Phone"
                    v-model="formData.user_detail.phone"
                    name="phone"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('phone') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Emergency Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="emergency_phone"
                    placeholder="Emergency Phone"
                    v-model="formData.user_detail.emergency_phone"
                    name="emergency phone"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('emergency phone') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Email"
                    v-model="formData.email"
                    name="email"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('email') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="password"
                    v-model="formData.password"
                    name="password"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('password') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Address"
                    placeholder="Address"
                    v-model="formData.user_detail.address"
                    name="address"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('address') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">city</label>
                  <input
                    type="text"
                    class="form-control"
                    id="city"
                    placeholder="city"
                    v-model="formData.user_detail.city"
                    name="city"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('city') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">state</label>
                  <input
                    type="text"
                    class="form-control"
                    id="state"
                    placeholder="state"
                    v-model="formData.user_detail.state"
                    name="state"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('state') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">country</label>
                  <input
                    type="text"
                    class="form-control"
                    id="country"
                    placeholder="country"
                    v-model="formData.user_detail.country"
                    name="country"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('country') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">zip code</label>
                  <input
                    type="text"
                    class="form-control"
                    id="zip"
                    placeholder="zip"
                    v-model="formData.user_detail.zip"
                    name="zip"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('zip') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="text-right">
            <input
              type="submit"
              value="submit"
              :disabled="errors.any()"
              class="my-3 btn btn-danger"
            >
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
import AppService from "../../../js/appservices";
import Datepicker from "vuejs-datepicker";
import serverBus from "../../../js/app";
import moment from "moment";
export default {
  name: "newUserForm",
  data() {
    return {
      rolesLength: 0,
      userId: this.$route.params.userId,
      formView: false,
      routeName: this.$route.name
    };
  },
  watch: {
    "$route.params": function() {
      this.routeName = this.$route.name;
    },
    roles: function() {}
    // formData: function() {}
  },
  mounted() {},
  computed: {
    roles() {
      this.rolesLength = this.$store.getters.GET_ROLES.length;
      return this.$store.getters.GET_ROLES.filter(e => {
        return e.id !== 1 ? e : false;
      });
    },
    formData() {
      const { roles } = this;
      const { id } = this.$route.params;
      const { getters = {} } = this.$store;
      return roles && !!roles.length && !!id
        ? { ...(getters.SINGLE_USER_INFO || {}) }
        : staticData.newUserFormObj;
    },
    singleUserInfo() {
      console.log(this.$store.getters.SINGLE_USER_INFO);
    }
  },
  created() {
    this.$store.dispatch("GET_ROLES_ACTION");
  },
  methods: {
    createNewUser(e) {
      e.preventDefault();
      this.formData.user_detail.dob = moment(this.formData.dob).format(
        "DD/MM/YYYY"
      );
      AppService.doPost("user", this.formData).then(response => {
        if (response.status === 200) {
          const usersListType = this.roles.data.find(item => {
            return item.id === this.formData.role_id ? item.id : false;
          });
          this.$router.push({
            name: "users",
            params: {
              userType: this.$route.params.userType,
              usersListType: this.formData.role_id
            }
          });
        }
      });
    }
    // getSingleUser() {
    //   if (this.$route.params.userId === undefined) {
    //     return this.$store.getters.NEW_USER_OBJ;
    //   } else {
    //     this.$store.dispatch(
    //       "GET_USER_BY_ID_ACTION",
    //       this.$route.params.userId
    //     );
    //     console.log("store", this.$store.getters.SET_USER_INFO_BY_ID);
    //     return this.$store.getters.SET_USER_INFO_BY_ID;
    //   }
    //   console.log(this.$route.params.userId);
    // }
  },
  components: {
    Datepicker
  }
};
</script>