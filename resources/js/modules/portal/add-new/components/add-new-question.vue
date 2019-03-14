<template>
  <div id="add-new-question">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="postQuestion" v-if="question">
          <div class="form-row">
            <div class="col-12">
              <div class="form-group">
                <label>Question</label>
                <vue-editor :value="question.title" @input="updateField($event, 'title')"></vue-editor>
              </div>
            </div>
            <div class="col-4" v-for="(item,index) in topicsMediaPresets" :key="index">
              <div class="form-group mb-0">
                <document-uploder
                  :tags="'item.tags'"
                  @change="uploadFileToCloudinary"
                  :item="item"
                  @file="onFileUploadSuccess"
                  @error="onFileUploadError"
                ></document-uploder>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="inputAddress">Answer Type</label>
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
            <div class="col">
              <div class="form-group" v-if="question.type==='mcq'">
                <label for="inputAddress">Option Name</label>
                <select
                  class="custom-select"
                  :value="question.type"
                  @input="updateField($event, 'type')"
                >
                  <option value>Option Type</option>
                  <option
                    :value="item.type"
                    v-for="(item,index) in StaticData.questionTypes"
                    :key="index"
                  >{{item.title}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row" v-if="question.type==='mcq'">
            <div class="col-3">
              <div class="form-group">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <small for="detail">Option a</small>
                  <div class="d-flex justify-content-between align-items-center">
                    <small for="exampleInputEmail1" class="mb-0 mr-3">Correct / not</small>
                    <div class="form-row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male">
                        <label class="form-check-label" for="male">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female">
                        <label class="form-check-label" for="female">No</label>
                      </div>
                    </div>
                  </div>
                </div>
                <Vue-editor></Vue-editor>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <small for="detail">Option b</small>
                  <div class="d-flex justify-content-between align-items-center">
                    <small for="exampleInputEmail1" class="mb-0 mr-3">Correct / not</small>
                    <div class="form-row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male">
                        <label class="form-check-label" for="male">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female">
                        <label class="form-check-label" for="female">No</label>
                      </div>
                    </div>
                  </div>
                </div>
                <Vue-editor></Vue-editor>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <small for="detail">Option c</small>
                  <div class="d-flex justify-content-between align-items-center">
                    <small for="exampleInputEmail1" class="mb-0 mr-3">Correct / not</small>
                    <div class="form-row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male">
                        <label class="form-check-label" for="male">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female">
                        <label class="form-check-label" for="female">No</label>
                      </div>
                    </div>
                  </div>
                </div>
                <Vue-editor></Vue-editor>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <small for="detail">Option d</small>
                  <div class="d-flex justify-content-between align-items-center">
                    <small for="exampleInputEmail1" class="mb-0 mr-3">Correct / not</small>
                    <div class="form-row">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male">
                        <label class="form-check-label" for="male">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female">
                        <label class="form-check-label" for="female">No</label>
                      </div>
                    </div>
                  </div>
                </div>
                <Vue-editor></Vue-editor>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12">
              <div class="form-group">
                <label for="detail">Explantion</label>
                <Vue-editor></Vue-editor>
              </div>
            </div>
            <div class="col-4" v-for="(item,index) in topicsMediaPresets" :key="index">
              <div class="form-group mb-0">
                <document-uploder
                  :tags="'item.tags'"
                  @change="uploadFileToCloudinary"
                  :item="item"
                  @file="onFileUploadSuccess"
                  @error="onFileUploadError"
                ></document-uploder>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12">
              <h4 class="font-weight-bold my-2">Tagging</h4>
            </div>
            <div class="col">
              <auto-complete label="subject" @value="getTopic"></auto-complete>
            </div>
            <div class="col">
              <auto-complete label="topic" @value="getTopic"></auto-complete>
            </div>
          </div>
          <div class="form-row">
            <div class="col" v-if="!!masterData">
              <div class="form-group">
                <label for="inputAddress">Level of difficulty</label>
                <select
                  class="custom-select"
                  :value="question.difficulty_id"
                  @input="updateField($event, 'difficulty_id')"
                >
                  <option value>Difficulty Level</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.difficulty_levels"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
            </div>
            <div class="col" v-if="!!masterData">
              <div class="form-group">
                <label for="inputAddress">Type of question</label>
                <select
                  class="custom-select"
                  :value="question.privacy_id"
                  @input="updateField($event, 'privacy_id')"
                >
                  <option value>Question Type</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.privacy"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
            </div>
            <div class="col" v-if="!!masterData">
              <div class="form-group">
                <label for="inputAddress">Type Content</label>
                <select
                  class="custom-select"
                  :value="question.privacy_id"
                  @input="updateField($event, 'privacy_id')"
                >
                  <option value>Content Type</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.privacy"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
            </div>
            <div class="col" v-if="!!masterData">
              <div class="form-group">
                <label for="inputAddress">Privacy of question</label>
                <select
                  class="custom-select"
                  :value="question.privacy_id"
                  @input="updateField($event, 'privacy_id')"
                >
                  <option value>Privacy Type</option>
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
import StaticData from "../../../../StaticData.json";
import autoComplete from "../../common/components/auto-complete";
import documentUploder from "../../common/components/document-uploder";
import loder from "../../common/components/loder";
export default {
  name: "add-new-question",
  data() {
    return {
      topicsMediaPresets: StaticData.filePresets.topic,
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
      ? this.$store.dispatch("addNew/GET_QUESTION_BY_ID", this.qid)
      : this.$store.dispatch("addNew/CLEAR_QUESTION_OBJ");
  },
  computed: {
    checkIsFormReadyToSubmit() {
      const question = this.question;
      const hasFiles = !!Object.keys(this.question).length;
      return !this.uploading && (!!notes || hasFiles);
    },
    question: {
      get() {
        return !this.qid
          ? this.$store.getters["addNew/GET_QUESTION_OBJ"]
          : this.$store.getters["addNew/GET_QUESTION_BY_ID"];
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
      this.$store.commit("addNew/UPDATE_QUESTION_FIELD", payload);
    },
    getTopic(topic) {
      this.updateField(topic.id, "topic_id");
      this.updateField(topic.subject_id, "subject_id");
    },
    postQuestion() {
      // e.preventDefault();
      console.log(this.question);
      this.$store.dispatch("addNew/POST_QUESTION", this.question);
    },
    // On File Selected upload file to cloudinary
    uploadFileToCloudinary(file) {
      console.log(":: uploadFileToCloudinary ::", file);
      this.uploading++;
    },

    // On File upload success
    onFileUploadSuccess(data) {
      console.log(":: onFileUploadSuccess ::", data);
      const { url, item = {} } = data;
      const { type } = item;
      this.uploading--;
      this.updateField(url, type);
    },

    // File upload error
    onFileUploadError({ error }) {
      console.log(":: onFileUploadSuccess ::", error);
      this.uploading--;
      swal({
        text: error.message,
        icon: "warning",
        dangerMode: true,
        buttons: false,
        timer: 2000
      });
    }
  }
};
</script>