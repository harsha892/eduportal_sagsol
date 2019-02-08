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
              data-toggle="modal"
              data-target="#exampleModal"
              class="btn btn-primary text-white"
            >Create New Test</a>
            <router-link
              :to="{ name: 'm-question-paper-from'}"
              class="btn swatch-orange"
            >Create New question Paper</router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">Category/Subject</th>
              <th scope="col">Created on</th>
              <th scope="col">Approve By / Created By</th>
              <th scope="col">Modal Paper</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Hindi</td>
              <td>24 jan 2019</td>
              <td>
                <a href class="text-success">
                  <i class="fa fa-check-circle"></i> Approve
                </a> / Naveen
              </td>
              <td>
                <img
                  src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                  alt
                >
              </td>

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
              <td>24 jan 2019</td>
              <td>
                <a href class="text-success">
                  <i class="fa fa-check-circle"></i> Approve
                </a> / Naveen
              </td>
              <td>
                <img
                  src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                  alt
                >
              </td>

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
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Modal Paper
              <br>
              <small class="text-info">Available question papers</small>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="customRadioInline1"
                name="customRadioInline1"
                class="custom-control-input"
              >
              <label class="custom-control-label" for="customRadioInline1">Question paper model 1</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="customRadioInline2"
                name="customRadioInline1"
                class="custom-control-input"
              >
              <label class="custom-control-label" for="customRadioInline2">Question paper model 2</label>
            </div>
          </div>
          <div class="modal-footer">
            <router-link
              :to="{ name: 'e-create-tests'}"
              class="btn swatch-blue"
              data-dismiss="modal"
            >Create test</router-link>
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
