<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <ul>
            <li>Subject: Unable to edit subject information</li>
            <li>Delete: Ii you want edit in subject you have to delete subject and create new subject</li>
          </ul>
          <div>
            <a
              href
              class="btn swatch-blue"
              data-toggle="modal"
              data-target="#exampleModalLong"
            >Create New Subject</a>
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
                <th scope="col">Is Active</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,index) in subjects" :key="index">
                <td>{{item.name}}</td>
                <td>{{item.slug}}</td>
                <td>{{item.description}}</td>
                <td>
                  <span class="badge badge-success" v-if="item.is_active===true">Active</span>
                  <span class="badge badge-secondary" v-else>In Active</span>
                </td>
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
                      v-model="createSubject.name"
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
                      v-model="createSubject.slug"
                      placeholder="Slug"
                    >
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Subject Description</label>
                    <textarea rows="3" class="form-control" v-model="createSubject.description"></textarea>
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
      createSubject: ""
    };
  },
  watch: {
    subjects: function() {}
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
  },
  computed: {
    subjects() {
      return this.$store.getters.GET_SUBJECTS;
    }
  },
  created() {
    this.$store.dispatch("SUBJECT_GLOBE_ACTION", {
      url: "subject",
      method: "get"
    });
    this.createSubject = { ...this.$store.getters.GET_GROUP_OBJ };
  },
  methods: {
    createNewGroup(e) {
      e.preventDefault();
      this.$store.dispatch("SUBJECT_GLOBE_ACTION", {
        url: "subject",
        method: "post",
        data: this.createSubject
      });
    }
  }
};
</script>