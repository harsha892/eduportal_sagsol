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
          <div>
            <a
              href
              class="btn swatch-blue"
              data-toggle="modal"
              data-target="#exampleModalLong"
            >Assian Roles</a>
            <a
              href
              class="btn swatch-red"
              data-toggle="modal"
              data-target="#exampleModalLong1"
            >Edit Roles</a>
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
                  <th scope="col">Role Title</th>
                  <th scope="col">User Details</th>
                  <th scope="col">Created / Updated By</th>
                  <th scope="col">Created / Updated on</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>AM</td>
                  <td>
                    <ul class="list-unstyled">
                      <li>Ravikumar</li>
                      <li class="text-muted">CSC Group</li>
                      <li class="text-muted">Created on: 21 feb 2019</li>
                    </ul>
                  </td>
                  <td>
                    <a href>Karthik U</a>
                  </td>
                  <td>21 oct 2018</td>
                  <td>
                    <a href class="text-muted">
                      <small>
                        <i class="fa fa-trash"></i> Delete
                      </small>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>AI</td>
                  <td>Neeraja</td>
                  <td>
                    <a href>Naveen M</a>
                  </td>
                  <td>21 oct 2018</td>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Assian Role To User
              <br>
              <small
                class="text-danger text-capitalize"
              >Here you will get user who has group. please check users view if you not found user</small>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">User Details</th>
                  <th scope="col">Group</th>
                  <th scope="col">Role</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <ul class="list-unstyled">
                      <li>Naveen</li>
                      <li class="text-muted"></li>
                      <li class="text-muted">Created on: 21 feb 2019</li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-unstyled">
                      <li>CSC Group</li>
                      <li>Group Head: Ramesh</li>
                    </ul>
                  </td>
                  <td>
                    <form action>
                      <select class="custom-select">
                        <option >Assign Role</option>
                        <option value="am" selected>AM</option>
                        <option value="ai">AI</option>
                      </select>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>
                    <ul class="list-unstyled">
                      <li>Ravali</li>
                      <li class="text-muted">Created on: 21 feb 2019</li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-unstyled">
                      <li>CSC Group</li>
                      <li>Group Head: NA</li>
                    </ul>
                  </td>
                  <td>
                    <form action>
                      <select class="custom-select">
                        <option selected>Assign Role</option>
                        <option value="am">AM</option>
                        <option value="ai" selected>AI</option>
                      </select>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>
                    <ul class="list-unstyled">
                      <li>Ravikumar</li>
                      <li class="text-muted">Created on: 21 feb 2019</li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-unstyled">
                      <li>CSC Group</li>
                      <li>Group Head: NA</li>
                    </ul>
                  </td>
                  <td>
                    <form action>
                      <select class="custom-select">
                        <option selected>Assign Role</option>
                        <option value="am">AM</option>
                        <option value="ai">AI</option>
                      </select>
                    </form>
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
      id="exampleModalLong1"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Assianed Roles To User
              <br>
              <small
                class="text-danger text-capitalize"
              >Here you will get user who has allready roles</small>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">User Details</th>
                  <th scope="col">Group</th>
                  <th scope="col">Role</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <ul class="list-unstyled">
                      <li>Ravikumar</li>
                      <li class="text-muted"></li>
                      <li class="text-muted">Created on: 21 feb 2019</li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-unstyled">
                      <li>CSC Group</li>
                      <li>Group Head: Ramesh</li>
                    </ul>
                  </td>
                  <td>
                    <form action>
                      <select class="custom-select">
                        <option >Assign Role</option>
                        <option value="am" selected>AM</option>
                        <option value="ai">AI</option>
                      </select>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>
                    <ul class="list-unstyled">
                      <li>Neeraja</li>
                      <li class="text-muted">Created on: 21 feb 2019</li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-unstyled">
                      <li>CSC Group</li>
                      <li>Group Head: NA</li>
                    </ul>
                  </td>
                  <td>
                    <form action>
                      <select class="custom-select">
                        <option selected>Assign Role</option>
                        <option value="am">AM</option>
                        <option value="ai" selected>AI</option>
                      </select>
                    </form>
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
import staticData from "../../../../js/StaticData.json";
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
    console.log("Component mounted.", this.tabs);
  }
};
</script>