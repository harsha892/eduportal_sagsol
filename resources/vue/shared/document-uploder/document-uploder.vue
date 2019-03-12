<template>
  <div class="row">
    <div class="col d-flex justify-content-center text-center flex-column">
      <label :for="item.type" class="w-100">
        <div class="card">
          <div class="card-body p-5 mx-5">
            <i class="fa fa-cloud-upload-alt fa-5x"></i>
            <p>{{item.type}} file</p>
          </div>
        </div>
        <input
          type="file"
          class="custom-file-input d-none"
          :id="item.type"
          ref="fileToUpload"
          v-on:change="handleFileUpload()"
        >
      </label>
      <div v-if="item.type==='audio' && fileURL">
        <img :src="fileURL" alt="audio" class="w-100">
      </div>
      <div v-if="item.type==='video' && fileURL">
        <img :src="fileURL" alt="video" class="w-100">
      </div>
      <div v-if="item.type==='attachment'&& fileURL">
        <img :src="fileURL" alt="attachment" class="w-100">
      </div>
    </div>
    <!-- <div class="form-group col">
      <label :for="item.type">{{item.type}} file</label>
      <div class="custom-file">
        <input
          type="file"
          class="custom-file-input"
          :id="item.type"
          ref="fileToUpload"
          v-on:change="handleFileUpload()"
        >
        <label class="custom-file-label" :for="item.type">{{item.type}} file</label>
      </div>
    </div>-->
  </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
const cloudName = "dl9ns0hby";
const url = `https://api.cloudinary.com/v1_1/${cloudName}/upload/`;
const config = {
  headers: { "X-Requested-With": "XMLHttpRequest" }
};
const formData = new FormData();

export default {
  name: "asideView",
  props: ["item", "tags", "change"],
  data: function() {
    return {
      uploadFile: "",
      fileType: "",
      fileURL: null
    };
  },
  mounted() {},
  methods: {
    handleFileUpload() {
      const file = this.$refs.fileToUpload.files[0];
      const { item } = this;
      if (!file) {
        return;
      }
      this.$emit("change", file);
      this.uploadFile = this.$refs.fileToUpload.files[0];
      formData.append("file", file);
      formData.append("tags", item.tags);
      if (item.type !== "document") {
        formData.append("resource_type", "video");
      }
      formData.append("upload_preset", item.preset); // Replace the preset name with your own
      formData.append("api_key", "764818791572767"); // Replace API key with your own Cloudinary key
      formData.append("timestamp", (Date.now() / 1000) | 0);
      // Make an AJAX upload request using Axios (replace Cloudinary URL below with your own)
      return axios
        .post(url, formData, config)
        .then(response => {
          const data = response.data;
          this.fileURL = data.secure_url; // You should store this URL for future references in your app
          this.$emit("file", {
            url: this.fileURL,
            item: this.item
          });
        })
        .catch(e => {
          this.$emit("error", e.response.data);
        });

      // console.log(this.uploadFile);
    }
  }
};
</script>
