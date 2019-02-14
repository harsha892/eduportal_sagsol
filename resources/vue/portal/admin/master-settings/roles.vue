<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <ul class="m-0">
            <li class="text-danger">Role managment is only for staff</li>
            <li>AM: Skill test/ Exams, Learning Mangment System</li>
            <li>AI: Learning Mangment System</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-home"
            role="tabpanel"
            aria-labelledby="pills-home-tab"
          >
            <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Role Title</th>
                  <th scope="col">User Details</th>
                  <th scope="col">Created on</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in roles" :key="index">
                  <td>{{item.name}}</td>
                  <td>{{item.slug}}</td>
                  <td>{{item.created_at | dateFormat}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import staticData from "../../../../js/StaticData.json";
import AppService from "../../../../js/appservices";
export default {
  name: "rolesView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: ""
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
  },
  computed: {
    roles() {
      return this.$store.getters.GET_ROLES;
    }
  },
  created() {
    this.$store.dispatch("GET_ROLES_ACTION");
  }
};
</script>