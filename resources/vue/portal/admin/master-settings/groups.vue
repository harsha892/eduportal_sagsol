<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <ul>
            <li>Group: Unable to edit group information</li>
            <li>Delete: Ii you want edit in group you have to delete group and create new group</li>
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
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Years</th>
                <th scope="col">Is Active</th>
                <th scope="col">Semesters</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,index) in groups" :key="index">
                <td>{{item.name}}</td>
                <td>{{item.slug}}</td>
                <td>{{item.description}}</td>
                <td>{{item.duration}}</td>
                <td>
                  <span class="badge badge-success" v-if="item.is_active===true">Active</span>
                  <span class="badge badge-secondary" v-else>In Active</span>
                </td>
                <td>{{item.semesters}}</td>
                <td>{{item.created_at | dateFormat}}</td>
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
          <form @submit="createNewGroup">
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      v-model="createGroup.name"
                      placeholder="Name"
                    >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input
                      type="text"
                      class="form-control"
                      id="slug"
                      v-model="createGroup.slug"
                      placeholder="Slug"
                    >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="durations">Years</label>
                    <input
                      type="number"
                      class="form-control"
                      id="durations"
                      v-model="createGroup.duration"
                      placeholder="Durations"
                    >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="Slug">Semesters</label>
                    <input
                      type="number"
                      class="form-control"
                      id="semesters"
                      v-model="createGroup.semesters"
                      placeholder="semesters"
                    >
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Group Description</label>
                    <textarea rows="3" class="form-control" v-model="createGroup.description"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn swatch-green" value="Submit">
            </div>
          </form>
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
      createGroup: ""
    };
  },
  watch: {
    groups: function() {}
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
  },
  computed: {
    groups() {
      return this.$store.getters.GET_GROUPS;
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
    this.createGroup = { ...this.$store.getters.GET_GROUP_OBJ };
  },
  methods: {
    createNewGroup(e) {
      e.preventDefault();
      this.$store.dispatch("GROUP_GLOBE_ACTION", this.createGroup);
      setTimeout(function() {
        return this.$store.dispatch("GROUP_GLOBE_ACTION");
      }, 2000);
    }
  }
};
</script>