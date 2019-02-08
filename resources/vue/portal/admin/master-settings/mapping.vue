<template>
  <div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">User Details</th>
              <th scope="col">Role</th>
              <th scope="col">Group</th>
              <th scope="col">Created on</th>
              <th scope="col">No Of Students</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ravikumar</td>
              <td>AI</td>
              <td>CSC</td>
              <td>21 feb 2019</td>
              <td>
                <a href data-toggle="modal" data-target="#exampleModalCenter">3</a>
              </td>
              <td>
                <a href class="text-muted">
                  <small>
                    <i class="fa fa-trash"></i> Delete
                  </small>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nerraja</td>
              <td>AI</td>
              <td>ECE</td>
              <td>14 nov 2018</td>
              <td>
                <a href data-toggle="modal" data-target="#exampleModalCenter">30</a>
              </td>
              <td>
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
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header" v-if="studentsAssined">
            <div>
              <h5 class="modal-title" id="exampleModalCenterTitle">Rajesh students</h5>
            </div>
            <div>
              <a v-on:click="assaignNew" class="btn btn-warning">Assaign New</a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          <div class="modal-header" v-else>
            <div>
              <h5 class="modal-title" id="exampleModalCenterTitle">Add students to Rajesh</h5>
            </div>
            <div>
              <a v-on:click="assaignNew" class="btn btn-warning">Students List</a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          <div class="modal-body">
            <table class="table" v-if="studentsAssined">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Group</th>
                  <th scope="col">Assigned on</th>
                  <th scope="col">Acadamic Year</th>
                  <th scope="col">Last attended</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>CSC</td>
                  <td>2018-19</td>
                  <td>10 feb 2018</td>
                  <td>4 jan 2018</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>CSC</td>
                  <td>2018-19</td>
                  <td>Thornton</td>
                  <td>10 feb 2018</td>
                  <td>6 jan 2018</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>CSC</td>
                  <td>2018-19</td>
                  <td>the Bird</td>
                  <td>10 jan 2018</td>
                  <td>16 jan 2018</td>
                </tr>
              </tbody>
            </table>
            <div v-else>
              <form class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="stName">Student Name</label>
                    <input type="text" class="form-control" id="stName" placeholder="Student Name">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="stId">Student ID</label>
                    <input type="text" class="form-control" id="stId" placeholder="Student ID">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="sGroup">Group</label>
                    <input type="text" class="form-control" id="sGroup" placeholder="Group">
                  </div>
                </div>
                <div class="col-3 d-flex align-items-end">
                  <div class="form-group">
                    <button class="btn btn-primary">Search</button>
                  </div>
                </div>
              </form>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Group</th>
                    <th scope="col">Acadamic Year</th>
                    <th scope="col">Last attended</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>CSC</td>
                    <td>2018-19</td>
                    <td>4 jan 2018</td>
                    <td>
                      <button class="btn btn-sm btn-danger">Add</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>CSC</td>
                    <td>2018-19</td>
                    <td>Thornton</td>
                    <td>6 jan 2018</td>
                    <td>
                      <button class="btn btn-sm btn-danger">Add</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>CSC</td>
                    <td>2018-19</td>
                    <td>the Bird</td>
                    <td>10 jan 2018</td>
                    <td>
                      <button class="btn btn-sm btn-danger">Add</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer" v-if="studentsAssined===false">
            <button type="button" class="btn btn-primary">Add &amp; Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import staticData from "../../../../js/StaticData.json";
export default {
  name: "rolesView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: "",
      studentsAssined: true
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  },
  methods: {
    assaignNew() {
      this.studentsAssined === true
        ? (this.studentsAssined = false)
        : (this.studentsAssined = true);
    }
  }
};
</script>