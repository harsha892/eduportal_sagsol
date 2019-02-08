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
            <a
              href
              class="btn swatch-blue"
              data-toggle="modal"
              data-target="#exampleModalLong"
            >Create New Subject</a>
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
                  <th scope="col">Prepared by</th>
                  <th scope="col">Modal Paper</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Hindi</td>
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
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalLong"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create New Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">
                  Group
                  <small>For multiple groups use coma " , " and continue</small>
                </label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Group"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Subject Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Subject Name"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">
                  Upload
                  <small>Pdf's, Word Docs, Jpg / png only</small>
                </label>
                <input
                  type="file"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Password"
                >
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I Accept Tearms &amp; Conditions</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import topHeaderView from "../../../../shared/MainHeader";
import asideBar from "../../../../shared/AsideBar";
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
    asideBar
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
