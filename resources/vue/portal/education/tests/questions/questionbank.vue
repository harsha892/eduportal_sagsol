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
            <router-link
              :to="{ name: 'e-create-new-question'}"
              class="btn btn-primary"
            >Add New Question</router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">Question</th>
              <th scope="col">Category/Subject</th>
              <th scope="col">Approve By / Created By</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <router-link
                  :to="{ name: 'single-question-view'}"
                >A ES6 module with with multiple exports including a default export</router-link>
              </td>
              <td>Hindi</td>
              <td>
                <a href class="text-success">
                  <i class="fa fa-check-circle"></i> Approve
                </a> / Naveen
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
              <td>[Feature request] Pluggable TypeScript compiler modules</td>
              <td>Tamil</td>
              <td>
                <a href class="text-success">
                  <i class="fa fa-check-circle"></i> Approve
                </a> / Naveen
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
    <div
      class="modal fade"
      id="exampleModalLong"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create New Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <small
                class="text-danger"
              >** For multiple groups use coma " , " and continue &amp; Leave empty for all groups</small>
              <div class="form-row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Group</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Group"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Subject Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Subject Name"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Topic</label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Topic Name"
                    >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Question Type</label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                  <input
                    type="radio"
                    id="Objective"
                    name="customRadioInline1"
                    class="custom-control-input"
                  >
                  <label class="custom-control-label" for="Objective">Objective</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input
                    type="radio"
                    id="Descriptive"
                    name="customRadioInline1"
                    class="custom-control-input"
                  >
                  <label class="custom-control-label" for="Descriptive">Descriptive</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input
                    type="radio"
                    id="Descriptive"
                    name="customRadioInline1"
                    class="custom-control-input"
                  >
                  <label class="custom-control-label" for="Descriptive">Orative</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input
                    type="radio"
                    id="Descriptive"
                    name="customRadioInline1"
                    class="custom-control-input"
                  >
                  <label class="custom-control-label" for="Descriptive">MCQ</label>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Question</label>
                <vue-editor v-model="questionContent" :editorToolbar="customToolbar"></vue-editor>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Answer</label>
                <vue-editor v-model="answerContent"></vue-editor>
              </div>
              <div class="form-row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Option A</label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Option A"
                    >
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Option B</label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Option B"
                    >
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Option C</label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Option C"
                    >
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Option D</label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Option D"
                    >
                  </div>
                </div>
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
import { VueEditor } from "vue2-editor";
import topHeaderView from "../../../../shared/MainHeader";
import asideBar from "../../../../shared/AsideBar";
export default {
  name: "adminApp",
  data() {
    return {
      userType: "",
      pageType: "",
      questionContent: "<h1>Some initial question Content</h1>",
      answerContent: "<h1>Some initial answer Content</h1>",
      customToolbar: [
        ["bold", "italic", "underline"],
        [{ list: "ordered" }, { list: "bullet" }],
        ["image", "code-block"]
      ]
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
    asideBar,
    VueEditor
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
