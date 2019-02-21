<template>
  <div class="row" id="subjectGruopMaping">
    <div class="col-3">
      <!-- <form>
        <div class="form-group">
          <input
            type="test"
            class="form-control"
            id="subjectName"
            aria-describedby="emailHelp"
            placeholder="Search by subject"
          >
        </div>
      </form>-->
      <div class="list-group">
        <label
          :for="item.id"
          class="list-group-item list-group-item-action cursor_pointer"
          :class="is_active===item.id?'active':''"
          v-for="(item,index) in groups"
          :key="index"
        >
          <div class="d-flex w-100 justify-content-between">
            <span>
              <input
                type="radio"
                :id="item.id"
                class="d-none"
                :value="item.id"
                v-model="checkedGroup"
                v-on:click="getSubjects(item.id)"
              >
              {{item.name}}
              <br>
              <small>Created on: {{item.created_at | dateFormat}}</small>
            </span>
            
            <span>
              <small>{{item.semesters}} semesters</small>
              <br>
              <small v-if="item.duration>1">{{item.duration}} years</small>
              <small v-else>{{item.duration}} year</small>
            </span>
          </div>
        </label>
      </div>
    </div>
    <div class="col">
      <div class="text-right">
        <router-link :to="{name:'subjectGroupMapping'}" class="btn btn-danger mb-2">
          <i class="fas fa-object-group"></i> Map Subject-Group
        </router-link>
      </div>
      <div class="card" v-if="!!mappedSubjects.length">
        <div class="card-body">
          <form class="row">
            <div class="form-group col-3">
              <select class="custom-select" v-on:change="sortBy(sortModel)" v-model="sortModel">
                <option value>Sort By</option>
                <option value="semester">Semester</option>
                <option value="year">Year</option>
              </select>
            </div>
          </form>
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
      <div class="card" v-else>
        <div class="card-body bg-dark">
          <p class="m-0 text-warning">No Subjects were found / click on group to get subjects</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import staticData from "../../../../../js/StaticData.json";
export default {
  name: "subjectGruopMaping",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: "",
      studentsAssined: true,
      checkedGroup: "",
      is_active: "",
      subjectSelected: false,
      sortModel: ""
    };
  },
  watch: {},
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  },
  computed: {
    groups() {
      return this.$store.getters.GET_GROUPS;
    },
    mappedSubjects() {
      if (this.subjectSelected === true) {
        return this.$store.getters.GET_SUBJECTS_INFO_BY_GROUP_ID;
      } else {
        return [];
      }
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
  },
  methods: {
    assaignNew() {
      this.studentsAssined === true
        ? (this.studentsAssined = false)
        : (this.studentsAssined = true);
    },
    getSubjects(groupId) {
      this.is_active = groupId;
      this.$store.dispatch("GET_SUBJECTS_BY_GROUP_ID", groupId);
      this.subjectSelected = true;
    },
    sortBy(type) {
      if (type === "semester") {
        this.mappedSubjects
          .sort()
          .sort((a, b) => (a.semester > b.semester ? 1 : -1));
      } else if (type === "year") {
        this.mappedSubjects.sort().sort((a, b) => (a.year > b.year ? 1 : -1));
      }
    },
    deleteSubjectFromGroup(id) {
      console.log(id);
      this.$store.dispatch("SG_MAPPING_DELETE_ACTION", {
        groupId: this.is_active,
        subjects: [id]
      });
    }
  }
};
</script>