<template>
  <div id="newUserForm">
    <form @submit="createNewUser" v-if="rolesLength!==0">
      <div class="card">
        <div class="card-body">
          <div class="col-12">
            <h4 class="text-uppercase">
              <span v-if="routeName !=='editUser'">New</span>
              <span v-else>Edit</span> User
            </h4>
            <hr>
            <div class="form-group">
              <label for="user_role">User role</label>
              <select class="custom-select" name="user_role" id="user_role" v-model="role_id">
                <option value>-- Open this select menu --</option>
                <option :value="item" v-for="(item,index) in roles" :key="index">{{item.name}}</option>
              </select>
              <span class="text-danger my-2" v-if="apiError.errors">
                <span v-if="apiError.errors['role_id']">Role is required</span>
              </span>
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
                    v-model="first_name"
                    name="first_name"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.first_name']">First name is required</span>
                  </span>
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
                    v-model="last_name"
                    name="last_name"
                  >
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="last_name">Date of birth</label>
                  <datepicker v-model="dob" input-class="form-control" :format="customFormatter"></datepicker>

                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.dob']">DOB is required</span>
                  </span>
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
                        v-model="gender"
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
                        v-model="gender"
                      >
                      <label class="form-check-label" for="female">Fe male</label>
                    </div>
                  </div>
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.gender']">Gender is required</span>
                  </span>
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
                    v-model="phone"
                    name="phone"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span
                      v-if="apiError.errors['user_detail.phone']"
                    >{{apiError.errors['user_detail.phone'][0]}}</span>
                  </span>
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
                    v-model="emergency_phone"
                    name="emergency phone"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span
                      v-if="apiError.errors['user_detail.emergency_phone']"
                    >Emergency number is required</span>
                  </span>
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
                    v-model="email"
                    name="email"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['email']">{{apiError.errors['email'][0]}}</span>
                  </span>
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
                    v-model="password"
                    name="password"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['password']">Password is required</span>
                  </span>
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
                    v-model="address"
                    name="address"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.address']">Address is required</span>
                  </span>
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
                    v-model="city"
                    name="city"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.city']">City is required</span>
                  </span>
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
                    v-model="state"
                    name="state"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.state']">State is required</span>
                  </span>
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
                    v-model="country"
                    name="country"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.country']">Country is required</span>
                  </span>
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
                    v-model="zip"
                    name="zip"
                  >
                  <span class="text-danger my-2" v-if="apiError.errors">
                    <span v-if="apiError.errors['user_detail.zip']">Zipcode is required</span>
                  </span>
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
import staticData from "../../../../js/StaticData.json";
import Datepicker from "vuejs-datepicker";
import moment from "moment";
import { mapFields } from "vuex-map-fields";

export default {
  name: "newUserForm",
  data() {
    return {
      rolesLength: 0,
      formView: false,
      routeName: this.$route.name
    };
  },
  watch: {
    "$route.params": function() {
      this.routeName = this.$route.name;
    },
    roles: function() {}
  },
  mounted() {},
  computed: {
    apiError() {
      return this.$store.getters.GET_ERRORS;
    },
    roles() {
      this.rolesLength = this.$store.getters.GET_ROLES.length;
      return this.$store.getters.GET_ROLES.filter(e => {
        return e.id !== 1 ? e : false;
      });
    },
    formData() {
      return this.$store.getters.NEW_USER_INFO;
    },
    ...mapFields([
      "newUserFormObj.email",
      "newUserFormObj.role_id",
      "newUserFormObj.user_detail.first_name",
      "newUserFormObj.user_detail.last_name",
      "newUserFormObj.user_detail.gender",
      "newUserFormObj.user_detail.phone",
      "newUserFormObj.user_detail.emergency_phone",
      "newUserFormObj.password",
      "newUserFormObj.user_detail.address",
      "newUserFormObj.user_detail.city",
      "newUserFormObj.user_detail.state",
      "newUserFormObj.user_detail.zip",
      "newUserFormObj.user_detail.country",
      "newUserFormObj.user_detail.dob"
    ])
  },
  created() {
    this.$store.dispatch("GET_ROLES_ACTION");
  },
  methods: {
    customFormatter(date) {
      return moment(date).format("DD/MM/YYYY");
    },
    createNewUser(e) {
      e.preventDefault();
      const newUserObj = this.$store.state.user.newUserFormObj;
      this.$store.dispatch("POST_USER_DATA", {
        method: "post",
        type: "new",
        data: newUserObj
      });
    }
  },
  components: {
    Datepicker
  }
};
</script>