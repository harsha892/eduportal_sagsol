<template>
  <div id="content-to-topic">
    <loder :isLoading="uploading>0?true:false"></loder>
    <div class="jumbotron" v-if="question">
      <article class="display-6" v-html="question.title"></article>
      <p class="lead">{{question.detail}}</p>
      <hr class="my-4">
      <ul class="list-inline text-capitalize">
        <li class="list-inline-item">subject: {{question.subject_id}}</li>
        <li class="list-inline-item">topic: {{question.topic_id}}</li>
        <li class="list-inline-item">type: {{question.type}}</li>
      </ul>
    </div>
    <div class="card">
      <!-- <div class="card-header">
        <p>{{item.name}}</p>
        <p>{{item.subject_id}}</p>
      </div>-->
      <div class="card-body">
        <div>
          <form v-if="question">
            <div class="form-row form-group" v-if="question.type==='objective'">
              <div class="col-12">
                <label for>Answer</label>
                <vue-editor v-model="answer"></vue-editor>
              </div>
            </div>
            <div class="form-row form-group" v-if="question.type==='descriptive'">
              <div class="col-12">
                <label for>answer</label>
                <vue-editor v-model="answer"></vue-editor>
              </div>
            </div>
            <div class="form-row form-group" v-if="question.type==='orative'">
              <div class="col" v-for="(item,index) in topicsMediaPresets" :key="index">
                <document-uploader
                  :tags="'item.tags'"
                  @change="uploadFileToCloudinary"
                  :item="item"
                  @file="onFileUploadSuccess"
                  @error="onFileUploadError"
                ></document-uploader>
              </div>
            </div>
            <div class="col-12 text-right" v-if="checkIsFormReadyToSubmit">
              <span class="btn btn-info text-white" v-on:click="submitAnswerContent()">Submit Answer</span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import vSelect from "vue-select";
import documentUploader from "../../../../shared/document-uploder/document-uploder";
import staticData from "../../../../../js/StaticData.json";
import loder from "../../../../shared/loder";

export default {
  name: "content-to-topic",
  data() {
    return {
      topicsMediaPresets: staticData.filePresets.topic,
      tags: "",
      answer: null,
      qId: this.$route.params.qid,
      uploading: 0,
      content: {}
    };
  },
  watch: {
    uploadedFileStore: function() {
      this.uploadedFileStore;
    },
    filesUploadCompleted: function() {
      this.filesUploadCompleted;
    }
  },
  mounted() {
    console.log(this.qId);
  },
  computed: {
    topic() {
      return this.$store.getters.GET_UPLOADED_FILES;
    },
    uploadedFileStore() {
      return this.$store.getters.GET_UPLOADED_FILES;
    },
    checkIsFormReadyToSubmit() {
      const answer = this.answer;
      const hasFiles = !!Object.keys(this.content).length;
      return !this.uploading && (!!answer || hasFiles);
    },
    question() {
      console.log(this.$store.getters["question/GET_QUESTION_BY_ID"]);
      return this.$store.getters["question/GET_QUESTION_BY_ID"];
    }
  },
  created() {
    this.$store.dispatch("question/GET_QUESTION_BY_ID", this.qId);
    this.$store.dispatch("GROUP_GLOBE_ACTION");
  },
  methods: {
    submitAnswerContent() {
      const { answer } = this;
      const content = { ...this.content, answer };
      console.log(content);
      this.$store.dispatch("answer/POST_ANSWER", {
        qId: this.qId,
        content: { answer: content }
      });
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
      this.content[type] = url;
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
  },
  components: {
    VueEditor,
    vSelect,
    documentUploader,
    loder
  }
};
</script>