<template>
  <div id="newUserForm">
    <form @submit="createNewUser" v-if="formData!==undefined">
      <div class="card">
        <div class="card-body">
          <div class="col-12">
            <h4 class="text-uppercase">
              <span v-if="routeName !=='editUser'">New</span>
              <span v-else>Edit</span> User
            </h4>
            <hr>
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
                    v-model="last_name"
                    name="last_name"
                    v-validate="'required'"
                  >
                  <small class="text-danger my-2">{{ errors.first('last name') }}</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="last_name">Date of birth</label>
                  <datepicker v-model="dob" input-class="form-control" format="dd/MM/yyyy"></datepicker>

                  <small class="text-danger my-2">{{ errors.first('dob') }}</small>
                </div>
              </div>
              <!-- <div class="col-3">
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
                </div>
              </div>-->
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
                    v-validate="'required'"
                    disabled
                  >
                  <small class="text-danger my-2" disabled>{{ errors.first('phone') }}</small>
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
                    v-model="email"
                    name="email"
                    v-validate="'required'"
                    disabled
                  >
                  <small class="text-danger my-2" disabled>{{ errors.first('email') }}</small>
                </div>
              </div>
              <div class="col-3" v-if="routeName !=='editUser'">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="password"
                    v-model="password"
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
                    v-model="address"
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
                    v-model="city"
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
                    v-model="state"
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
                    v-model="country"
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
                    v-model="zip"
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
import staticData from "../../../../js/StaticData.json";
import Datepicker from "vuejs-datepicker";
import moment from "moment";
import { mapFields } from "vuex-map-fields";

export default {
  name: "newUserForm",
  data() {
    return {
      rolesLength: 0,
      userId: this.$route.params.id,
      formView: false,
      routeName: this.$route.name
    };
  },
  watch: {
    "$route.params": function() {
      this.routeName = this.$route.name;
    }
  },
  mounted() {},
  computed: {
    formData() {
      return this.$store.getters.SINGLE_USER_INFO;
    },
    ...mapFields([
      "singleUserInfo.email",
      "singleUserInfo.user_detail.first_name",
      "singleUserInfo.user_detail.last_name",
      "singleUserInfo.user_detail.phone",
      "singleUserInfo.user_detail.emergency_phone",
      "singleUserInfo.user_detail.address",
      "singleUserInfo.user_detail.city",
      "singleUserInfo.user_detail.state",
      "singleUserInfo.user_detail.zip",
      "singleUserInfo.user_detail.country",
      "singleUserInfo.user_detail.dob"
    ])
  },
  created() {
    this.$store.dispatch("GET_USER_BY_ID_ACTION", this.userId);
  },
  methods: {
    createNewUser(e) {
      e.preventDefault();
      this.formData.user_detail.dob = moment(this.formData.dob).format(
        "DD/MM/YYYY"
      );
      const data = {
        routeName: this.routeName,
        payload: this.formData
      };
      this.$store.dispatch("POST_USER_DATA", data);
    }
  },
  components: {
    Datepicker
  }
};
</script>