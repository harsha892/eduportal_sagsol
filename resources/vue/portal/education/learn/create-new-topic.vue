<template>
  <div id="topicView">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="createNewTopic">
          <small class="text-danger">** Please select induviduvals to create topic</small>
          <div class="form-row">
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Group</label>
                <v-select label="name" :options="groups" id="cst_select" v-model="selectedGroup"></v-select>
              </div>
            </div>

            <div class="col-3" v-if="selectedGroup!==null">
              <div class="form-group">
                <label for="Year">Year</label>
                <select class="custom-select" id="Year" v-model="selectedYear">
                  <option value>Open this select menu</option>
                  <option
                    :value="item"
                    v-for="(item,index) in selectedGroup.duration"
                    :key="index"
                  >{{item}}</option>
                </select>
              </div>
            </div>

            <div class="col-3" v-if="selectedGroup!==null && selectedYear!==null">
              <div class="form-group">
                <label for="inputAddress">Semester</label>
                <select class="custom-select" v-model="selectedSemester">
                  <option value>Semester</option>
                  <option
                    :value="item.semester"
                    v-for="(item,index) in getSemester"
                    :key="index"
                  >{{item.semester}}</option>
                </select>
              </div>
            </div>
            <div
              class="col-3"
              v-if="selectedGroup!==null && selectedYear!==null&&selectedSemester!==null"
            >
              <div class="form-group">
                <label for="exampleInputPassword1">Subject Name</label>
                <p class="text-danger" v-if="subjects_error_message">{{subjects_error_message}}</p>
                <v-select label="name" :options="getSubjects" v-model="selectedSubject" v-else></v-select>
              </div>
            </div>
          </div>
          <div
            v-if="selectedGroup!==null && selectedYear!==null&&selectedSemester!==null&&selectedSubject!==null"
          >
            <div class="form-group">
              <label for="exampleInputEmail1">Topic Name</label>
              <input
                type="text"
                class="form-control"
                id="topic_name"
                aria-describedby="emailHelp"
                placeholder="Topic Name"
                v-model="formdata.name"
              >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Topic Short Descreption</label>
              <vue-editor v-model="formdata.short_description"></vue-editor>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Full Descreption</label>
              <vue-editor v-model="formdata.long_description"></vue-editor>
            </div>
            <div class="form-group">
              <input type="submit" class="btn swatch-green" value="Submit">
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
import staticData from "../../../../js/StaticData.json";

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
      selectedSemester: null,
      is_subjects_dispached: false,
      subjects_error_message: null,
      selectedYear: null,
      formdata: {
        name: "",
        short_description: "",
        long_description: ""
      }
      // fileToUpload[ppt] = [file];
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
    },
    getPostedTopicData: function() {
      this.getPostedTopicData;
    }
  },
  mounted() {},
  computed: {
    groups() {
      return this.$store.getters.GET_GROUPS;
    },
    subjects() {
      if (this.$store.getters.GET_SUBJECTS_INFO_BY_GROUP_ID.length !== 0) {
        return this.$store.getters.GET_SUBJECTS_INFO_BY_GROUP_ID;
      }
      this.is_subjects_dispached = false;
    },
    getSubjects() {
      const subjects = this.getSemester;
      const { selectedSemester } = this;
      return subjects.filter(subject => subject.semester == selectedSemester);
    },

    getSemester() {
      if (!this.selectedGroup || !this.selectedGroup.id) {
        return [];
      }
      const subjects = this.subjects || [];
      const { selectedYear } = this;
      return subjects.filter(subject => subject.year == selectedYear);
    },
    getPostedTopicData() {
      console.log(
        "computed GET_POSTED_TOPIC",
        this.$store.getters.GET_POSTED_TOPIC
      );
      if (this.$store.getters.GET_POSTED_TOPIC) {
        this.$router.push({
          name: "topicContent",
          params: { topicId: this.$store.getters.GET_POSTED_TOPIC[0].id }
        });
      }
      return this.$store.getters.GET_POSTED_TOPIC;
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
  },
  methods: {
    createNewTopic(e) {
      e.preventDefault();
      this.$store.dispatch("TOPIC_GLOBE_ACTION", {
        subjectId: this.selectedSubject.id,
        topics: { topics: [this.formdata] },
        method: "post"
      });
    }
  },
  components: {
    VueEditor,
    vSelect
  }
};
</script>