<template>
  <div id="topicView">
    <div class="card">
      <div class="card-body">
        <form id="app">
          <small
            class="text-danger"
          >** For multiple groups use coma " , " and continue &amp; Leave empty for all groups</small>
          <div class="form-row">
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Group</label>
                <v-select label="name" :options="groups" id="cst_select" v-model="selectedGroup"></v-select>
              </div>
            </div>
            <div class="col-3" v-if="selectedGroup!==null">
              <div class="form-group">
                <label for="exampleInputPassword1">Subject Name</label>
                <p class="text-danger" v-if="subjects_error_message">{{subjects_error_message}}</p>
                <v-select
                  label="subject_title"
                  :options="subjects"
                  v-model="selectedSubject"
                  v-else
                ></v-select>
              </div>
            </div>
            <div class="col-3" v-if="selectedGroup!==null && selectedSubject!==null">
              <div class="form-group">
                <label for="Year">Year</label>
                <select class="custom-select" id="Year">
                  <option selected>Open this select menu</option>
                  <option
                    value="1"
                    v-for="(item,index) in yearBySubject(subjects)"
                    :key="index"
                  >{{item}}</option>
                </select>
              </div>
            </div>
            <div class="col-3" v-if="selectedGroup!==null && selectedSubject!==null">
              <div class="form-group">
                <label for="inputAddress">Type of content</label>
                <select class="custom-select">
                  <option value>Select Type of content</option>
                  <option
                    :value="item.value"
                    v-for="(item,index) in typeOfContent"
                    :key="index"
                  >{{item.title}}</option>
                </select>
              </div>
            </div>
          </div>
          <div v-if="selectedGroup!==null && selectedSubject!==null">
            <div class="form-row">
              <div class="form-group w-100">
                <label
                  for
                >Semesters for this topic (for multiple semesters hold on "ctrl" and select multiple )</label>
                <select class="custom-select" multiple>
                  <option>Open this select menu</option>
                  <option value="1">semester One</option>
                  <option value="2">semester Two</option>
                  <option value="3">semester Three</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Topic Short Descreption</label>
              <vue-editor></vue-editor>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Full Descreption</label>
              <vue-editor></vue-editor>
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">I Accept Tearms &amp; Conditions</label>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import vSelect from "vue-select";
export default {
  name: "topicView",
  data() {
    return {
      typeOfContent: [
        {
          title: "private",
          value: "private"
        },
        {
          title: "public",
          value: "public"
        }
      ],
      selectedGroup: null,
      selectedSubject: null,
      is_subjects_dispached: false,
      subjects_error_message: null,
      selectedYear: null
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
    },
    selectedGroup: function() {
      if (this.is_subjects_dispached === false) {
        this.$store.dispatch("GET_SUBJECTS_BY_GROUP_ID", this.selectedGroup.id);
        this.is_subjects_dispached = true;
      }
    },
    subjects: function() {
      this.subjects;
    }
  },
  mounted() {},
  computed: {
    groups() {
      return this.$store.getters.GET_GROUPS;
    },
    subjects() {
      console.log(this.$store.getters.GET_SUBJECTS_INFO_BY_GROUP_ID);
      if (this.$store.getters.GET_SUBJECTS_INFO_BY_GROUP_ID.length !== 0) {
        return this.$store.getters.GET_SUBJECTS_INFO_BY_GROUP_ID;
      }
      this.is_subjects_dispached = false;
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
  },
  components: {
    VueEditor,
    vSelect
  },
  methods: {
    yearBySubject(subjects) {
      this.subjects.filter((item, index) => {
        return item.year;
      });
    },
    semesterByYear(subjects) {
      this.subjects.filter((item, index) => {
        return item.year === this.selectedYear;
      });
    }
  }
};
</script>