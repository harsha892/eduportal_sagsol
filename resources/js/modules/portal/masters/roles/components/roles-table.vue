<template>
  <div id="roles-table-view">
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
// import AppService from "../../../../js/appservices";
export default {
  name: "roles-table-view",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: ""
    };
  },
  mounted() {},
  computed: {
    roles() {
      return this.$store.getters["roles/GET_ROLES"];
    }
  },
  created() {}
};
</script>