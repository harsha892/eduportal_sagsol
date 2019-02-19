<template id="subjectGroupForm">
  <form class="row mt-3 align-items-start">
    <div class="col-3 sticky-top">
      <h5>Choose Group</h5>
      <hr>
      <div class="list-group">
        <label
          :for="item.id"
          class="list-group-item list-group-item-action"
          :class="is_active===item.id?'active':''"
          v-on:click="activeGroup(item)"
          v-for="(item,index) in groups"
          :key="index"
        >
          <div class="d-flex w-100 justify-content-between">
            <span>
              <input
                type="radio"
                name="group-name"
                :id="item.id"
                class="d-none"
                :value="item"
                v-model="checkedGroup"
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
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="text-capitalize">Map Subjects to selected group</h5>
        <span class="btn btn-danger" v-on:click="submitSemSubjects()" v-if="!!semSubjectes.length">Assign Subjects</span>
      </div>
      <hr>
      <div class="row">
        <div class="col-12 mb-2" v-for="yearIndex in checkedGroup.duration" :key="yearIndex">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div>
                <h5 class="m-0 text-capitalize">year {{yearIndex}}</h5>
                <small
                  class="text-danger"
                >Type subject names and press "ENTER / RETURN" and it continues...</small>
              </div>
              <div class="form-group">
                <select
                  class="custom-select custom-select-sm mt-2"
                  v-model="selectedSem[yearIndex]"
                  v-on:change="noOfSems(selectedSem[yearIndex], yearIndex)"
                >
                  <option value>Open this select menu</option>
                  <option :value="index" v-for="index in totalSemesters" :key="index">{{index}}</option>
                </select>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <semester-subject
                  :key="semIndex"
                  v-for="(item,semIndex) in selectedSem[yearIndex] || []"
                  :year="yearIndex"
                  :semester="item"
                  v-on:selected="onTagSelect"
                ></semester-subject>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>
<script lang="ts">
import VueTagsInput from "@johmun/vue-tags-input";
import SemesterSubject from "./semester-subject.vue";

export default {
  name: "subjectGroupForm",
  data() {
    return {
      is_active: "",
      checkedSubjects: [],
      checkedGroup: [],
      selectedSem: [],
      semSubjectes: [],
      tag: [],
      tags: []
    };
  },
  components: {
    VueTagsInput,
    SemesterSubject
  },
  watch: {
    semSubjectes: function() {
      this.semSubjectes;
    }
  },
  mounted() {},
  computed: {
    groups() {
      return this.$store.getters.GET_GROUPS;
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
    this.$store.dispatch("SUBJECT_GLOBE_ACTION", {
      url: "subject",
      method: "get"
    });
  },
  methods: {
    onTagSelect(data) {
      const { selected = [], semester = 0, year = 0 } = data || {};
      this.semSubjectes[year][semester] = selected;
    },
    activeGroup(group) {
      this.is_active = group.id;
      console.log(this.is_active);
      this.totalSemesters = group.semesters;
      this.selectedSem = [];
      this.semSubjectes = [];
    },
    noOfSems(selectedSem, index) {
      this.semSubjectes[index] = new Array(selectedSem);
    },
    submitSemSubjects(e) {
      const subjectsToSubmited = this.semSubjectes
        .reduce(
          (prev, cur) => [...prev, ...cur.reduce((p, c) => [...p, ...c], [])],
          []
        )
        .sort((a, b) => (a.year > b.year ? 1 : -1));
      console.log(subjectsToSubmited);
      this.$store.dispatch("SG_MAPPING_GLOBE_ACTION", {
        url: "group/" + this.is_active + "/subjects",
        data: { subjects: subjectsToSubmited }
      });
    }
  }
};
</script>
