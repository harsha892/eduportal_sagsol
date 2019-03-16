<template>
  <div id="group-table-view">
    <div class="btn_fixed_bottom">
      <a href class="btn swatch-pink rounded-circle" data-toggle="modal" v-on:click="openModal">
        <i class="fa fa-plus"></i>
      </a>
    </div>
    <div class="card" v-if="subjects">
      <div class="card-body">
        <div v-if="!!subjects.length">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Is Active</th>
                <th scope="col">Created At</th>
                <!-- <th scope="col">Actions</th> -->
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
                <!-- <td>
                  <a href class="text-muted">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </td> -->
              </tr>
            </tbody>
          </table>
        </div>
        <div v-else>
          <p class="text-danger mb-0">
            No Subjects found
            <a
              href
              data-toggle="modal"
              data-target="#subjectCreatingModal"
            >Click here to add subject</a>
          </p>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="subjectCreatingModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="subjectCreatingModal"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create New subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit="createNewSubject" v-if="formData">
            <div class="modal-body">
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      :class="{'is-invalid' : formerrors.name.length > 0}"
                      :value="formData.name"
                      @input="updateField($event, 'name')"
                      placeholder="Name"
                    >
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="Subject">Subject Description</label>
                    <textarea
                      rows="3"
                      :class="{'is-invalid' : formerrors.description.length > 0}"
                      class="form-control"
                      :value="formData.description"
                      @input="updateField($event, 'description')"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn swatch-green" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "group-table-view",
  data() {
    return {};
  },
  watch: {
    groups: function() {}
  },
  mounted() {},
  computed: {
    subjects() {
      return this.$store.getters["subjects/GET_SUBJECTS"];
    },
    formData: {
      get() {
        return this.$store.getters["subjects/GET_SUBJECT_OBJ"];
      }
    },
    formerrors: {
      get() {
        return this.$store.getters["subjects/errors"];
      }
    },
    isFromValid() {
      return this.$store.getters["subjects/isFormValid"];
    }
  },
  created() {
    this.$store.dispatch("subjects/GET_SUBJECTS");
  },
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("subjects/updateField", payload);
    },
    createNewSubject(e) {
      e.preventDefault();
      this.updateField(this.formData.name.replace(/ /g, "-"), "slug");
      this.$store.dispatch("subjects/POST_SUBJECT", this.formData);
      if (!!this.isFromValid) $("#subjectCreatingModal").modal("hide");
    },
    openModal() {
      if (this.isFromValid === false) this.$store.commit("subjects/clearForm");
      $("#subjectCreatingModal").modal("show");
    }
  }
};
</script>