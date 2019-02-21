<template>
  <div id="content-to-topic">
    <loder :isLoading="uploading>0?true:false"></loder>
    <div class="card">
      <!-- <div class="card-header">
        <p>{{item.name}}</p>
        <p>{{item.subject_id}}</p>
      </div>-->
      <div class="card-body">
        <div>
          <form>
            <form>
              <div class="form-row form-group">
                <div class="col-12">
                  <label for>Notes</label>
                  <vue-editor v-model="notes"></vue-editor>
                </div>
              </div>
              <div class="form-row form-group">
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
                <span
                  class="btn btn-info text-white"
                  v-on:click="submitTopicContent()"
                >Upload &amp; Submit Notes</span>
              </div>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import vSelect from "vue-select";
import documentUploader from "../../../shared/document-uploder/document-uploder";
import staticData from "../../../../js/StaticData.json";
import loder from "../../../shared/loder";

export default {
  name: "content-to-topic",
  data() {
    return {
      topicsMediaPresets: staticData.filePresets.topic,
      tags: "",
      notes: null,
      topicId: this.$route.params.topicId,
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
    console.log(this.topicId);
  },
  computed: {
    topic() {
      return this.$store.getters.GET_UPLOADED_FILES;
    },
    uploadedFileStore() {
      return this.$store.getters.GET_UPLOADED_FILES;
    },
    checkIsFormReadyToSubmit() {
      const notes = this.notes;
      const hasFiles = !!Object.keys(this.content).length;
      return !this.uploading && (!!notes || hasFiles);
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
  },
  methods: {
    submitTopicContent() {
      const { notes } = this;
      const content = { ...this.content, notes };
      console.log(content);
      this.$store.dispatch("ADD_CONTENT_TO_TOPIC", {
        topicId: this.topicId,
        content
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