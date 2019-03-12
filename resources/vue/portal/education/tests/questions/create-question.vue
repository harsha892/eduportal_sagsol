<template>
  <div id="adminView">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="postQuestion" v-if="question">
          <div class="form-row">
            <div class="col-3">
              <auto-complete label="topic" @value="getTopic"></auto-complete>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="inputAddress">Question Type</label>
                <select
                  class="custom-select"
                  :value="question.type"
                  @input="updateField($event, 'type')"
                >
                  <option value>Select Question Type</option>
                  <option
                    :value="item.type"
                    v-for="(item,index) in StaticData.questionTypes"
                    :key="index"
                  >{{item.title}}</option>
                </select>
              </div>
            </div>
            <div class="col-3" v-if="!!masterData">
              <div class="form-group">
                <label for="inputAddress">Level of difficulty</label>
                <select
                  class="custom-select"
                  :value="question.difficulty_id"
                  @input="updateField($event, 'difficulty_id')"
                >
                  <option value>Select Difficulty Level</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.difficulty_levels"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
            </div>
            <div class="col-3" v-if="!!masterData">
              <div class="form-group">
                <label for="inputAddress">Privacy Type</label>
                <select
                  class="custom-select"
                  :value="question.privacy_id"
                  @input="updateField($event, 'privacy_id')"
                >
                  <option value>Select Question Type</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.privacy"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="detail">Short Descreption about Question</label>
              <input
                type="text"
                class="form-control"
                id="detail"
                placeholder="detail"
                :value="question.detail"
                @input="updateField($event, 'detail')"
              >
            </div>
          </div>
          <div class="form-row">
            <div class="col-12">
              <div class="form-group">
                <label>Question area</label>
                <vue-editor :value="question.title" @input="updateField($event, 'title')"></vue-editor>
              </div>
            </div>

            <div class="col-12 text-right">
              <span class="btn btn-info text-white" v-on:click="postQuestion()">Submit Question</span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import environment from "../../../../../js/environment";
import StaticData from "../../../../../js/StaticData";
import autoComplete from "../../../../shared/auto-complete";
import documentUploder from "../../../../shared/document-uploder/document-uploder";
import loder from "../../../../shared/loder";
export default {
  name: "adminApp",
  data() {
    return {
      difficultyLevelType: null,
      StaticData: StaticData,
      qid: this.$route.params.qid
    };
  },
  watch: {
    qid: function() {}
  },
  mounted() {
    console.log("mounted", this.$route.name);
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path.split(
      "/portal/" + this.userType + "/dashboard/"
    )[1];
    this.qid
      ? this.$store.dispatch("question/GET_QUESTION_BY_ID", this.qid)
      : this.$store.dispatch("question/CLEAR_QUESTION_OBJ");
  },
  computed: {
    checkIsFormReadyToSubmit() {
      const question = this.question;
      const hasFiles = !!Object.keys(this.question).length;
      return !this.uploading && (!!notes || hasFiles);
    },
    question: {
      get() {
        console.log(this.qid);
        return !this.qid
          ? this.$store.getters["question/GET_QUESTION_OBJ"]
          : this.$store.getters["question/GET_QUESTION_BY_ID"];
      }
    },
    masterData() {
      return this.$store.getters.GET_MASTERS;
    }
  },
  created() {},
  components: {
    VueEditor,
    autoComplete,
    documentUploder,
    loder
  },
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("question/UPDATE_QUESTION_FIELD", payload);
    },
    getTopic(topic) {
      this.updateField(topic.id, "topic_id");
      this.updateField(topic.subject_id, "subject_id");
    },
    postQuestion() {
      // e.preventDefault();
      console.log(this.question);
      this.$store.dispatch("question/POST_QUESTION", this.question);
    }
  }
};
</script>