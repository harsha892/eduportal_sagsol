<template>
  <div id="education-form-view">
    <h5 class="font-weight-bold my-2">Education Qualification</h5>
    <div class="row py-2" v-if="formData">
      <div class="col-12">
        <div class="form-row" v-for="(item,index) in formData.qualifications" :key="index">
          <div class="col">
            <div class="form-group">
              <label for="college">School/collage</label>
              <input
                type="text"
                class="form-control"
                id="college"
                placeholder="School"
                :value="formData.qualifications[index].college"
                @input="updateFieldWithIndex($event, 'college',index)"
                name="college"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="year">Year</label>
              <input
                type="text"
                class="form-control"
                id="year"
                placeholder="Year"
                :value="formData.qualifications[index].year"
                @input="updateFieldWithIndex($event, 'year',index)"
                name="year"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="marks">marks</label>
              <input
                type="text"
                class="form-control"
                id="marks"
                placeholder="marks"
                :value="formData.qualifications[index].marks"
                @input="updateFieldWithIndex($event, 'marks',index)"
                name="marks"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="percentage">Percentege</label>
              <input
                type="text"
                class="form-control"
                id="percentage"
                placeholder="percentage"
                :value="formData.qualifications[index].percentage"
                @input="updateFieldWithIndex($event, 'percentage',index)"
                name="percentage"
              >
            </div>
          </div>
          <div class="col-3">
            <label for>Attachment</label>
            <document-uploder
              @change="uploadFileToCloudinary"
              :item="{type:'attachment',preset:'topics_documents',}"
              @file="onFileUploadSuccess"
              @error="onFileUploadError"
              :inputType="true"
            ></document-uploder>
          </div>
          <div class="col-1 d-flex justify-content-center align-items-center">
            <a
              class="btn btn-danger btn-sm text-white mt-3"
              v-if="formData.qualifications[index].isRemove === true"
              v-on:click="remove(index)"
            >
              <i class="fas fa-plus"></i> Remove
            </a>

            <a
              class="btn btn-primary text-white btn-sm mt-3"
              v-if="formData.qualifications[index].isRemove === false"
              v-on:click="addNew(index)"
            >
              <i class="fas fa-plus"></i> Add
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import documentUploder from "../../../common/components/document-uploder";
export default {
  name: "education-form-view",
  watch: {},
  mounted() {},
  computed: {
    roles() {
      return this.$store.getters["GET_ROLES"];
    },
    formData() {
      return this.$store.getters["user/USER_OBJ"];
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("user/updateField", payload);
    },
    updateFieldWithIndex(event, key, index) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value, index, type: "qualifications" };
      this.$store.commit("user/updateFieldWithIndex", payload);
    },
    addNew(index) {
      const payload = { type: "qualifications", index };
      this.$store.commit("user/ADD_NEW_OBJ_TO_USER_OBJ", payload);
    },
    remove(index) {
      const payload = { type: "qualifications", index };
      this.$store.commit("user/REMOVE_OBJ_TO_USER_OBJ", payload);
    },
    // On File Selected upload file to cloudinary
    uploadFileToCloudinary(file, index) {
      console.log(":: uploadFileToCloudinary ::", file, index);
    },

    // On File upload success
    onFileUploadSuccess(data) {
      console.log(":: onFileUploadSuccess ::", data);
      this.updateField(data.url, "qualifications.attachment");
    },

    // File upload error
    onFileUploadError({ error }) {
      console.log(":: onFileUploadSuccess ::", error);
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
    Datepicker,
    documentUploder
  }
};
</script>
