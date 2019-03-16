<template>
  <div id="group-table-view">
    <div>
      <div class="row d-flex justify-content-between align-items-center">
        <div v-if="group" class="col">
          <h4 class="text-capitalize">
            {{group.name}}
            <small>{{group.duration}} Years</small>
          </h4>
          <p class="m-0">Description: {{group.description}}</p>
          <p class="m-0">
            Status:
            <span class="badge badge-success" v-if="group.is_active===true">Active</span>
            <span class="badge badge-secondary" v-else>In Active</span>
          </p>
          <ul class="list-inline">
            <li class="list-inline-item">Semesters(Year-semesters):</li>
            <li class="list-inline-item" v-for="index in group.duration" :key="index">
              <h6>
                <span class="badge badge-primary">{{index}} - {{group.semesters[index-1]}}</span>
              </h6>
            </li>
          </ul>
        </div>
        <div class="form-group col-3">
          <auto-complete
            :label="'Search By Group'"
            @updateValue="changeGroup($event)"
            :type="'group'"
          ></auto-complete>
        </div>
      </div>
    </div>

    <div class="card" v-if="mappedSubjects">
      <div class="card-body">
        <!-- <form class="row">
          <div class="form-group col-3">
            <select class="custom-select" v-on:change="sortBy(sortModel)" v-model="sortModel">
              <option value>Sort By</option>
              <option value="semester">Semester</option>
              <option value="year">Year</option>
            </select>
          </div>
        </form> -->
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">Subject Name</th>
              <th scope="col">Year</th>
              <th scope="col">Semister</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,index) in mappedSubjects" :key="index">
              <td class="text-capitalize">{{item.name}}</td>
              <td>{{item.year}}</td>
              <td>{{item.semester}}</td>
              <td>
                <span
                  class="text-muted cursor_pointer"
                  v-on:click="deleteSubjectFromGroup(item.id)"
                >
                  <small>
                    <i class="fa fa-trash"></i> Delete
                  </small>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import autoComplete from "../../../common/components/auto-complete";

export default {
  name: "group-table-view",
  data() {
    return {
      semesters: [],
      sortModel: "",
      is_active: false,
      groupId: this.$route.params.groupId
    };
  },
  watch: {},
  mounted() {},
  computed: {
    group() {
      return this.$store.getters["groups/GET_BY_GROUP_ID"];
    },
    mappedSubjects() {
      return this.$store.getters["mapping/GET_MAPPED_SUBJECTS_BY_GROUP_ID"];
    }
  },
  created() {
    this.$store.dispatch(
      "mapping/GET_MAPPED_SUBJECTS_BY_GROUP_ID",
      this.groupId
    );
    this.$store.dispatch("groups/GET_GROUP_BY_ID", this.groupId);
    // this.$store.dispatch("groups/GET_GROUP_BY_ID", this.$route.params.groupId);
  },
  methods: {
    sortBy(type) {
      this.$store.dispatch("mapping/SORT_MAPPED_SUBJECTS", type);
    },
    changeGroup(e) {
      console.log(e);
      this.$store.dispatch("groups/GET_GROUP_BY_ID", e.id);
      this.$store.dispatch("mapping/GET_MAPPED_SUBJECTS_BY_GROUP_ID", e.id);
      this.$router.push({ name: "mapping.list", params: { groupId: e.id } });
    },
    deleteSubjectFromGroup(id) {
      console.log(id);
      this.$store.dispatch("SG_MAPPING_DELETE_ACTION", {
        groupId: this.is_active,
        subjects: [id]
      });
    }
  },
  components: {
    autoComplete
  }
};
</script>