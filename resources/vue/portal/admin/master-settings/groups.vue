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
            <a
              href
              class="btn swatch-blue"
              data-toggle="modal"
              data-target="#exampleModalLong"
            >Create New Group</a>
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
                  <th scope="col">Group Title</th>
                  <th scope="col" style="width:300px">Descrepition</th>
                  <th scope="col">Created / Updated By</th>
                  <th scope="col">Created / Updated on</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CSC</td>

                  <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam maxime asperiores obcaecati atque molestias, tempora expedita voluptate! Illo asperiores accusantium, aperiam enim, sunt modi cum similique corporis incidunt maxime dolores.</td>
                  <td>
                    <a href>Ramesh D</a>
                  </td>
                  <td>21 oct 2018</td>
                  <td>
                    <a href data-toggle="modal" data-target="#exampleModalLong">
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
                  <td>ECE</td>

                  <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam maxime asperiores obcaecati atque molestias, tempora expedita voluptate! Illo asperiores accusantium, aperiam enim, sunt modi cum similique corporis incidunt maxime dolores.</td>
                  <td>
                    <a href>Ramesh D</a>
                  </td>
                  <td>21 oct 2018</td>
                  <td>
                    <a href data-toggle="modal" data-target="#exampleModalLong">
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
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create New Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="formGroupExampleInput">Group Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput"
                  placeholder="Group Name"
                >
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Group Description</label>
                <textarea rows="3" class="form-control"></textarea>
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
      userType: ""
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  }
};
</script>