<template>
  <div id="newUserForm">
    <form @submit="createNewUser" v-if="rolesLength!==0">
      <div class="card mb-2">
        <div class="card-body">
          <div class="col-12">
            <h4 class="text-uppercase mb-0">
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
          <!-- <div class="text-right">
            <input
              type="submit"
              value="submit"
              :disabled="errors.any()"
              class="my-3 btn btn-danger"
            >
          </div>-->
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h4 class="text-uppercase mb-0">Personal Information</h4>
          <hr>
          <div class="row">
            <div class="col-9">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="first_name"
                      placeholder="Full name"
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
                    <label for="exampleInputEmail1">Father name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="Father Name"
                      v-model="last_name"
                      name="last_name"
                    >
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
                    <label for="last_name">Date of birth</label>
                    <datepicker v-model="dob" input-class="form-control" :format="customFormatter"></datepicker>

                    <span class="text-danger my-2" v-if="apiError.errors">
                      <span v-if="apiError.errors['user_detail.dob']">DOB is required</span>
                    </span>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blood group</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Phone"
                      placeholder="Blood group"
                      v-model="phone"
                      name="phone"
                    >
                  </div>
                </div>
                <div class="col-6">
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
                <div class="col-6">
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
                    <label for="exampleFormControlSelect1">Group</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Select Group</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Acedamic year</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Select Acedamic Year</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Level</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Select Year</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1" class="invisible">Semister</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Select Semister</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3 text-center d-flex align-items-center">
              <div>
                <img
                  src="http://cdn.onlinewebfonts.com/svg/img_448427.png"
                  alt="..."
                  class="rounded-circle w-50 p-2"
                >
                <p class="text-capitalize">Click here to upload profile picture</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="text-uppercase mb-0">Educational Qualification</h4>
            <button class="btn btn-danger">Add New</button>
          </div>
          <hr>

          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">School/College</label>
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="School/College"
                  v-model="last_name"
                  name="last_name"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Year</label>
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="Year"
                  v-model="last_name"
                  name="last_name"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Marks / Percentage</label>
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="Year"
                  v-model="last_name"
                  name="last_name"
                >
              </div>
            </div>
            <div class="col-3">
              <label for="exampleInputEmail1">Upload Certificate</label>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input
                    type="file"
                    class="custom-file-input"
                    id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01"
                    name="Certificate"
                  >
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="text-uppercase mb-0">Hobbies</h5>
              <span>Add COMA for multiple</span>
              <hr>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="Hobbies"
                  v-model="last_name"
                  name="last_name"
                >
              </div>
            </div>
            <div class="col">
              <h5 class="text-uppercase mb-0">Languages Known</h5>
              <span>Add COMA for multiple</span>
              <hr>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="Languages Known"
                  v-model="last_name"
                  name="last_name"
                >
              </div>
            </div>
            <div class="col">
              <h5 class="text-uppercase mb-0">Skills</h5>
              <span>Add COMA for multiple</span>
              <hr>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  id="last_name"
                  placeholder="Skills"
                  v-model="last_name"
                  name="last_name"
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-uppercase mb-0">Work Experience</h5>
                <button class="btn btn-danger">Add New</button>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Name of the institute</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="Name of the institute"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Joined Year</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="Joined Year"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Last Year</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="Last Year"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="text-uppercase mb-0">Bank account details</h5>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Bank Name</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Select Bank</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Account number</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="Account number"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>IFSC Code</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="IFSC Code"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="text-uppercase mb-0">reference by</h5>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Name of the person</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="Name of the person"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>phone</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="phone"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>email</label>
                    <input
                      type="text"
                      class="form-control"
                      id="last_name"
                      placeholder="phone"
                      v-model="last_name"
                      name="last_name"
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center my-3">
        <!-- <input
          type="submit"
          value="Save User Info"
          :disabled="errors.any()"
          class="my-3 btn btn-info"
        > -->
        <input
          type="submit"
          value="Create New User"
          :disabled="errors.any()"
          class="my-3 btn btn-danger"
        >
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