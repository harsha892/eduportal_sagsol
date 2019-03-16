<template>
  <div id="group-table-view">
    <div class="btn_fixed_bottom">
      <a href class="btn swatch-pink rounded-circle" data-toggle="modal" v-on:click="openModal">
        <i class="fa fa-plus"></i>
      </a>
    </div>
    <div class="card" v-if="groups">
      <div class="card-body">
        <div v-if="!!groups.length">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Years-Semesters</th>
                <th>Mapping</th>
                <th scope="col">Is Active</th>
                <th scope="col">Created At</th>
                <!-- <th scope="col">Actions</th> -->
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,index) in groups" :key="index">
                <td>{{item.name}}</td>
                <td>{{item.slug}}</td>
                <td>{{item.description}}</td>
                <td>
                  <ul class="list-inline m-0">
                    <li class="list-inline-item" v-for="index in item.duration" :key="index">
                      <h6>
                        <span class="badge badge-primary">{{index}} - {{item.semesters[index-1]}}</span>
                      </h6>
                    </li>
                  </ul>
                </td>
                <td>
                  <ul class="list-unstyled">
                    <li>
                      <router-link
                        :to="{name:'mapping.form', params:{groupId:item.id}}"
                      >Start Mapping</router-link>
                    </li>
                    <li>
                      <router-link
                        :to="{name:'mapping.list', params:{groupId:item.id}}"
                      >View Mapped Subjects</router-link>
                    </li>
                  </ul>
                </td>
                <td>
                  <span class="badge badge-success" v-if="item.is_active===true">Active</span>
                  <span class="badge badge-secondary" v-else>In Active</span>
                </td>
                <td>{{item.created_at | dateFormat}}</td>
                <!-- <td>
                  <a href class="text-muted">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </td>-->
              </tr>
            </tbody>
          </table>
        </div>
        <div v-else>
          <p class="text-danger mb-0">
            No Groups found
            <a
              href
              data-toggle="modal"
              v-on:click="openModal"
            >Click here to add Groups</a>
          </p>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="groupCreatinModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="groupCreatinModal"
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
          <form @submit="createNewGroup" v-if="formData">
            <div class="modal-body">
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      :class="{'is-invalid' : formErrors.name.length > 0}"
                      :value="formData.name"
                      @input="updateField($event, 'name')"
                      placeholder="Name"
                    >
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="duration">Years</label>
                    <input
                      type="number"
                      class="form-control"
                      id="duration"
                      :class="{'is-invalid' : formErrors.duration.length > 0}"
                      :value="formData.duration"
                      @input="updateField($event, 'duration')"
                      placeholder="Years"
                    >
                  </div>
                </div>
              </div>
              <div class="form-row" v-if="formData.duration>1">
                <p class="col-12 m-0 font-weight-bold">Semesters</p>
                <div class="col-1" v-for="index in JSON.parse(formData.duration)" :key="index">
                  <div class="form-group">
                    <label for="semesters">{{index}}</label>
                    <input
                      type="number"
                      class="form-control"
                      id="semesters"
                      v-model="semesters[index-1]"
                      placeholder="Years"
                    >
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Group Description</label>
                    <textarea
                      rows="3"
                      class="form-control"
                      :class="{'is-invalid' : formErrors.description.length > 0}"
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
    return {
      semesters: []
    };
  },
  watch: {
    groups: function() {}
  },
  mounted() {},
  computed: {
    groups() {
      return this.$store.getters["groups/GET_GROUPS"];
    },
    formErrors: {
      get() {
        return this.$store.getters["groups/errors"];
      }
    },
    formData: {
      get() {
        return this.$store.getters["groups/GET_GROUP_OBJ"];
      }
    },
    isFromValid() {
      return this.$store.getters["groups/isFormValid"];
    }
  },
  created() {
    this.$store.dispatch("groups/GET_GROUPS");
  },
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("groups/updateField", payload);
    },
    createNewGroup(e) {
      e.preventDefault();
      // if (!this.formData.name)
      this.updateField(this.semesters, "semesters");
      this.updateField(this.formData.name.replace(/ /g, "-"), "slug");
      this.$store.dispatch("groups/POST_GROUP", this.formData);
      if (!!this.isFromValid) $("#groupCreatinModal").modal("hide");
    },
    openModal() {
      if (this.isFromValid === false) this.$store.commit("groups/clearForm");
      $("#groupCreatinModal").modal("show");
    }
  }
};
</script>