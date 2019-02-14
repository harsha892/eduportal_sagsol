<template>
  <div>
    <div class="card">
      <div class="card-body">
        <p class="text-capitalize text-danger" v-if="userByRoles.length ===0">No User found please create new user in create new section</p>
        <table class="table table-hover" v-if="userByRoles.length !==0">
          <thead class="thead-light">
            <tr>
              <th scope="col">Name
                <br>Academic years
              </th>
              <th scope="col">Contact Details</th>
              <th scope="col" style="width:110px">Role</th>
              <th scope="col">Academic years</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item,index) in userByRoles"
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
              <td>
                {{item.role}}
                <div>
                  <small>
                    <span class="cursor_pointer" v-on:click="getUpdateRoleForm(item.id)">Update Role</span>
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
                  class="text-danger"
                >Update Password</a> |
                <span href v-on:click="singleUserSelected(item)">
                  <i class="fa fa-edit"></i> Edit
                </span>|
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
</template>

<script>
import staticData from "../../../../js/StaticData.json";
import AppService from "../../../../js/appservices";
import serverBus from "../../../../js/app";
export default {
  name: "userView",
  props: ["user"],
  data() {
    return {
      roleId: "",
      rolesLength: 0,
      updateRole: false,
      updateRoleFor: ""
    };
  },
  watch: {
    "$route.params": function() {
      this.$store.dispatch("GET_ROLES_ACTION");
      this.featchUserByRoleId();
    },
    roles: function() {},
    rolesLength: function() {
      this.featchUserByRoleId();
    }
  },
  mounted() {
    if (this.rolesLength === 0) {
      this.$store.getters.GET_ROLES;
    }
    this.featchUserByRoleId();
  },
  computed: {
    users() {
      return this.$store.getters.GET_USERS;
    },
    userByRoles() {
      return this.$store.getters.GET_USERS_BY_ROLES;
    },
    roles() {
      this.rolesLength = this.$store.getters.GET_ROLES.length;
      return this.$store.getters.GET_ROLES;
    }
  },
  created() {
    this.$store.dispatch("GET_ROLES_ACTION");
    this.$store.dispatch("GET_USER_ACTION");
  },
  methods: {
    featchUserByRoleId() {
      console.log(this.rolesLength);
      this.useRoleId =
        this.roles.length !== 0
          ? this.roles.filter(e => {
              return e.slug === this.$route.params.usersListType ? e : false;
            })[0]
          : false;
      this.useRoleId !== false
        ? this.$store.dispatch("GET_USER_BY_ROLE_ACTION", this.useRoleId)
        : false;
    },
    singleUserSelected: function(item) {
      this.$router.push({
        name: "editUser",
        params: { id: item.id }
      });
      // });
    },
    getUpdateRoleForm(id) {
      this.updateRoleFor = id;
    },
    updateUserRole(item, event) {
      console.log("item", item, "event", event.target.value);
      this.updateRoleFor = "";
    }
  }
};
</script>