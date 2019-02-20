<template>
  <div id="adminView">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <ul>
            <li>Objective: It contains only mutliple choice questions</li>
            <li>MCQ: It contains both mutilple and writtne type questions</li>
          </ul>
          <div>
            <a href class="btn swatch-blue">Create New Test</a>
          </div>
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
                  <th scope="col">Subject</th>
                  <th scope="col">Ref Question Paper</th>
                  <th scope="col">Prepared by</th>
                  <th scope="col">Answer Paper</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Hindi</td>
                  <td>
                    <img
                      src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                      alt
                    >
                  </td>
                  <td>sanju</td>
                  <td>
                    <img
                      src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                      alt
                    >
                  </td>
                  <td>MCQ</td>
                  <td>
                    <a href class="text-danger">
                      <i class="fa fa-exclamation-circle"></i> Report
                    </a> |
                    <a href>
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href class="text-muted">
                      <small>
                        <i class="fa fa-trash"></i> Delete
                      </small>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Tamil</td>
                  <td>
                    <img
                      src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                      alt
                    >
                  </td>
                  <td>ganesh</td>
                  <td>
                    <img
                      src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                      alt
                    >
                  </td>
                  <td>Objective</td>
                  <td>
                    <a href class="text-danger">
                      <i class="fa fa-exclamation-circle"></i> Report
                    </a> |
                    <a href>
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href class="text-muted">
                      <small>
                        <i class="fa fa-trash"></i> Delete
                      </small>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div
            class="tab-pane fade"
            id="pills-profile"
            role="tabpanel"
            aria-labelledby="pills-profile-tab"
          >
            <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Image</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Rajesh</td>
                  <td>rajesh123@gmail.com</td>
                  <td>
                    <img
                      src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                      alt
                    >
                  </td>
                  <td>Accountent</td>
                  <td>
                    <a href>
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href class="text-muted">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Nalini</td>
                  <td>nalini@gmail.com</td>
                  <td>
                    <img
                      src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                      alt
                    >
                  </td>
                  <td>Sr. Incharge</td>
                  <td>
                    <a href>
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href class="text-muted">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>
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
import topHeaderView from "../../../shared/MainHeader";
export default {
  name: "adminApp",
  data() {
    return {
      userType: "",
      pageType: ""
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
    }
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path.split(
      "/portal/" + this.userType + "/dashboard/"
    )[1];
    console.log(this.pageType);
  },
  components: {
    topHeaderView,
  },
  methods: {}
};
</script>
<style>
.state-media {
  background: #fff;
  margin: 5px 0;
  padding: 0.5rem;
}
.state-icn {
  height: 60px;
  width: 60px;
  text-align: center;
  border-radius: 50%;
  margin: 5px;
}
.state-icn .fa {
  font-size: 28px;
  line-height: 60px;
}
.state-media {
  padding: 20px;
  margin-bottom: 20px;
  background-clip: padding-box;
  background-color: #ffffff;
}
.box-ws {
  border-radius: 5px;
  background-color: #ffffff;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05);
  border: 0;
}
.state-media h4 {
  color: #455a64;
  font-size: 24px;
  font-weight: 600;
  margin-top: 6px;
  margin-bottom: 4px;
}
</style>
