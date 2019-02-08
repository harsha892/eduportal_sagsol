<template>
  <div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Contact Details</th>
              <th scope="col">Group</th>
              <th scope="col" style="width:300px">Address</th>
              <th scope="col">Created by</th>
              <th scope="col">Created on</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img
                  src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                  alt
                > Rajesh
              </td>
              <td>
                <ul class="list-unstyled">
                  <li>Email: rajesh123@gmail.com</li>
                  <li>Primary Phone: 9494941122</li>
                  <li>Emergency phone: 9494941122</li>
                </ul>
              </td>
              <td>CSC
                <br>
                <small>
                  <a class="text-info" href data-toggle="modal" data-target="#exampleModal3">Change group</a>
                </small>
              </td>
              <td>
                <address>Plotno: 105, pallavi sudha homes a, ankereddy palem, guntur</address>
              </td>
              <td>Rajesh</td>
              <td>11 feb 2018</td>
              <td>
                <a data-toggle="modal" data-target="#exampleModal2" class="text-danger">
                 Update Password
                </a> |
                <a data-toggle="modal" data-target="#exampleModal1">
                  <i class="fa fa-edit"></i> Edit
                </a> |
                <a href class="text-muted">
                  <i class="fa fa-trash"></i> Delete
                </a>
              </td>
            </tr>
            <tr>
              <td>
                <img
                  src="http://phpstack-127383-482309.cloudwaysapps.com/public/uploads/users/thumbnail/default.png"
                  alt
                > Nalini
              </td>
              <td>
                <ul class="list-unstyled">
                  <li>Email: rajesh123@gmail.com</li>
                  <li>Primary Phone: 9494941122</li>
                  <li>Emergency phone: 9494941122</li>
                </ul>
              </td>
              <td>CSC
                <br>
                <small>
                  <a class="text-info" href data-toggle="modal" data-target="#exampleModal3">Change group</a>
                </small>
              </td>
              <td>
                <address>Plotno: 105, pallavi sudha homes a, ankereddy palem, guntur</address>
              </td>
              <td>Rajesh</td>
              <td>11 feb 2018</td>
              <td>
                <a data-toggle="modal" data-target="#exampleModal2" class="text-danger">
                  Update Password
                </a> |
                <a data-toggle="modal" data-target="#exampleModal1">
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
            <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="inputAddress">User Type</label>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="gridRadios"
                        id="gridRadios1"
                        value="option1"
                        checked
                      >
                      <label class="form-check-label" for="gridRadios1">Student</label>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="gridRadios"
                        id="gridRadios2"
                        value="option2"
                      >
                      <label class="form-check-label" for="gridRadios2">Staff</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">First Name</label>
                  <input
                    type="email"
                    class="form-control"
                    id="inputEmail4"
                    placeholder="First name"
                  >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Last name / surname"
                  >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Password"
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Role</label>
                <select class="custom-select" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option value="1">Leader</option>
                  <option value="2">Attend</option>
                  <option value="3">XYZ</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputAddress2"
                  placeholder="Apartment, studio, or floor"
                >
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Create User</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal1"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">First Name</label>
                  <input
                    type="email"
                    class="form-control"
                    id="inputEmail4"
                    placeholder="First name"
                  >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Last name / surname"
                  >
                </div>
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Role</label>
                <select class="custom-select" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option value="1">Leader</option>
                  <option value="2">Attend</option>
                  <option value="3">XYZ</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputAddress2"
                  placeholder="Apartment, studio, or floor"
                >
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Update User</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal2"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update password of Nalini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">New Password</label>
                  <input
                    type="email"
                    class="form-control"
                    id="inputEmail4"
                    placeholder="New Password"
                  >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Re-type New Password</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Re-type New Password"
                  >
                </div>
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Enter your password</label>
                  <input
                    type="email"
                    class="form-control"
                    id="inputEmail4"
                    placeholder="Enter your password"
                  >
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Update Password</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal3"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div>
                <div class="form-group">
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inlineCheckbox1"
                      value="option1"
                      name="groupName"
                    >
                    <label class="form-check-label" for="inlineCheckbox1">CSC</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inlineCheckbox2"
                      name="groupName"
                      value="option2"
                    >
                    <label class="form-check-label" for="inlineCheckbox2">ECE</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inlineCheckbox3"
                      name="groupName"
                      value="option3"
                    >
                    <label class="form-check-label" for="inlineCheckbox3">Mechanical</label>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Update Group</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import staticData from "../../../../js/StaticData.json";
export default {
  name: "userView",
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