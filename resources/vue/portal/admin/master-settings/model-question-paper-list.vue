<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <ul>
            <li>Objective: It contains only mutliple choice questions</li>
            <li>MCQ: It contains both mutilple and writtne type questions</li>
          </ul>
          <div>
            <router-link
              :to="{ name: 'm-question-paper-from'}"
              class="btn swatch-orange"
              data-dismiss="modal"
            >Create New question Paper</router-link>
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
                  <th scope="col">Question Paper Title</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Created / Updated By</th>
                  <th scope="col">Created / Updated on</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Assianment 3</td>
                  <td>Operating systems, intenet and multi media</td>
                  <td>
                    <a href>Ramesh D</a>
                  </td>
                  <td>21 oct 2018</td>
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
                  <td>Assianment 4</td>
                  <td>C, C++</td>
                  <td>
                    <a href>Ramesh D</a>
                  </td>
                  <td>21 oct 2018</td>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Create New Question Paper</h5>
            <a
              href
              class="btn swatch-orange"
              data-toggle="modal"
              data-target="#exampleModalLong"
            >Create New question Paper</a>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInutEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Question Paper Name"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInutEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Subject"
                    >
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-4">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="examleInputEmail1"
                      aria-describedby="emailHelp"
                      v-model="noOfSections"
                      placeholder="No of Sections"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="exmpleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Total marks"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <span
                    class="btn swatch-indigo"
                    v-on:click="getNoOfSections(noOfSections)"
                  >Add Sections</span>
                </div>
              </div>
              <div
                class="form-row border p-3 mb-2"
                v-for="(item,index) in questionPaper"
                :key="index"
              >
                <div class="col-6">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="xampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Section Name"
                    >
                  </div>
                </div>
                <div class="col-6">
                  <div class>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="inlineCheckbox1"
                          value="option1"
                        >
                        <label class="form-check-label" for="inlineCheckbox1">Mcq</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="inlineCheckbox2"
                          value="option2"
                        >
                        <label class="form-check-label" for="inlineCheckbox2">Text</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          placeholder="No of Text Questions"
                        >
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          placeholder="Marks"
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group mb-0">
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          placeholder="No of MCQ Questions"
                        >
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-0">
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          placeholder="Marks"
                        >
                      </div>
                    </div>
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
import staticData from "../../../../js/StaticData.json";
export default {
  name: "vendorView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: "",
      questionPaper: [],
      noOfSections: 0
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  },
  methods: {
    getNoOfSections(noOfSections) {
      for (
        let index = this.questionPaper.length;
        index < noOfSections;
        index++
      ) {
        this.questionPaper.push({
          sectionName: "",
          totlaNoOfQuestions: "",
          MarksForThisSection: ""
        });
        console.log(index, this.questionPaper);
      }
    }
  }
};
</script>