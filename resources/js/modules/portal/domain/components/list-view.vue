<template>
  <div id="domain-list-view">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <form>
              <div class="form-row">
                <div class="col">
                  <div class="form-group m-0">
                    <select class="form-control" id="fbyRole">
                      <option>Filter by Role</option>
                      <option value v-for="(item,index) in roles" :key="index">{{item.name}}</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div>
            <router-link :to="{name:'domain.new'}" class="btn btn-danger">Create new domain</router-link>
          </div>
        </div>
        <div v-if="userByRoles">
          <p
            class="text-capitalize text-danger"
            v-if="!!userByRoles.data"
          >No User found please create new user in create new section</p>
          <table class="table table-hover" v-else>
            <thead class="thead-light">
              <tr>
                <th scope="col">Name
                  <br>Academic years
                </th>
                <th scope="col">Contact Details</th>
                <th scope="col" class="d-none" style="width:110px">Role</th>
                <th scope="col" class="d-none">Academic years</th>
                <th scope="col">Address</th>
                <th scope="col">Created on</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(item,index) in userByRoles.data"
                :key="index"
                :class="item.status === true ? '': 'table-danger'"
              >
                <td>
                  {{item.user_detail.last_name}} {{item.user_detail.first_name}}
                  <br>
                  {{item.user_detail.academic_year_start}} - {{item.user_detail.academic_year_end}}
                </td>
                <td>
                  <ul class="list-unstyled">
                    <li>Email: {{item.email}}</li>
                    <li>Primary Phone: {{item.user_detail.phone}}</li>
                    <li>Emergency phone: {{item.user_detail.emergency_phone}}</li>
                  </ul>
                </td>
                <td class="d-none">
                  {{item.role}}
                  <div>
                    <small>
                      <span
                        class="cursor_pointer"
                        v-on:click="getUpdateRoleForm(item.id)"
                      >Update Role</span>
                    </small>
                    <form
                      v-show="updateRoleFor === item.id"
                      class="m-0"
                      style="width:100px;display: table-caption;"
                    >
                      <select
                        class="custom-select custom-select-sm"
                        v-on:change="updateUserRole(item.id,$event)"
                      >
                        <option selected>-- change role --</option>
                        <option
                          :value="item.id"
                          v-for="(item,index) in roles"
                          :key="index"
                        >{{item.name}}</option>
                      </select>
                    </form>
                    <small>
                      <span
                        class="text-danger cursor_pointer"
                        v-show="updateRoleFor === item.id"
                        v-on:click="getUpdateRoleForm(null)"
                      >Close</span>
                    </small>
                  </div>
                </td>
                <td>
                  <span>
                    {{item.user_detail.address}},
                    {{item.user_detail.city}},
                    <br>
                    {{item.user_detail.state}},
                    {{item.user_detail.zip}},
                    {{item.user_detail.country}}
                  </span>
                </td>
                <td>{{item.created_at}}</td>
                <td>
                  <a
                    data-toggle="modal"
                    data-target="#exampleModal2"
                    class="text-danger d-none"
                  >Update Password |</a>
                  <span href v-on:click="singleUserSelected(item)">
                    <i class="fa fa-edit"></i> Edit
                  </span>
                  <a href class="text-muted d-none">
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
</template>

<script>
export default {
  name: "domain-list-view",
  mounted() {},
  mounted() {},
  computed: {
    roles() {
      return this.$store.getters["GET_ROLES"];
    },
    userByRoles() {
      return this.$store.getters["domain/GET_DOMAIN_INFO_BY_ROLE"];
    }
  },
  created() {
    this.$store.dispatch("domain/DOMAIN_INFO_BY_ROLE");
  }
};
</script>
