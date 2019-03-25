<template>
  <div id="profile-form-view">
    <!-- <h4 class="font-weight-bold my-2 text-center">Student / Staff Profile</h4> -->
    <div class="row py-2" v-if="formData && masterData">
      <div class="col">
        <div class="form-row">
          <div class="col-3">
            <label for="exampleInputEmail1">Level</label>
            <div class="form-row">
              <div class="form-group col-6">
                <select
                  class="form-control"
                  :value="formData.user_detail.level_year"
                  @input="updateField($event, 'level_year')"
                >
                  <option value>Year</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.course_years"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
              <div class="form-group col-6">
                <select
                  class="form-control"
                  :value="formData.user_detail.level_semester"
                  @input="updateField($event, 'level_semester')"
                >
                  <option value>Semester</option>
                  <option
                    :value="item.id"
                    v-for="(item,index) in masterData.course_semester"
                    :key="index"
                  >{{item.name}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="Father_Name">Father Name</label>
              <input
                type="text"
                class="form-control"
                id="Father_Name"
                placeholder="Father Name"
                :value="formData.user_detail.father_name"
                @input="updateField($event, 'father_name')"
                name="phone"
              >
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="ePhone">Emergency Phone</label>
              <input
                type="text"
                class="form-control"
                id="ePhone"
                placeholder="Emergency Phone"
                :value="formData.user_detail.emergency_phone"
                @input="updateField($event, 'emergency_phone')"
                name="ephone"
              >
            </div>
          </div>
          <div class="col-3">
            <label for>Profile Picture</label>
            <doucment-uploder
              @change="uploadFileToCloudinary"
              :item="{type:'attachment',preset:'topics_documents'}"
              @file="onFileUploadSuccess"
              @error="onFileUploadError"
              :inputType="true"
            ></doucment-uploder>
          </div>
          <div class="col-3">
            <div class="form-grou">
              <label for>DOB</label>
              <date-picker v-model="dob" input-class="form-control"></date-picker>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group mx-2">
              <label for="exampleInputEmail1">Gender</label>
              <div class="form-row">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="male"
                    :value="formData.user_detail.gender"
                    @input="updateField('male', 'gender')"
                  >
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="female"
                    :value="formData.user_detail.gender"
                    @input="updateField('fe-male', 'gender')"
                  >
                  <label class="form-check-label" for="female">Fe male</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="blood_group">Blood Group</label>
              <input
                type="test"
                class="form-control"
                id="blood_group"
                placeholder="Blood Group"
                :value="formData.user_detail.blood_group"
                @input="updateField($event, 'blood_group')"
                name="blood_group"
              >
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="exampleInputEmail1">PAN / AADHAR</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="PAN / AADHAR"
                :value="formData.user_detail.identity_number"
                @input="updateField($event, 'identity_number')"
                name="email"
              >
            </div>
          </div>
          <div class="form-row">
            <div class="col-6">
              <div class="form-group">
                <auto-complete type="group" label="group" @updateValue="getGroup($event)"></auto-complete>
              </div>
            </div>
            <div class="col-6">
              <label for="exampleInputEmail1">Acedamic Year</label>
              <div class="form-row">
                <div class="form-group col">
                  <select
                    class="form-control"
                    :value="formData.user_detail.academic_year"
                    @input="updateField($event, 'academic_year')"
                  >
                    <option value>From</option>
                    <option
                      :value="item.id"
                      v-for="(item,index) in masterData.academic_years"
                      :key="index"
                    >{{item.name}}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DatePicker from "vuejs-datepicker";
import autoComplete from "../../../common/components/auto-complete";
import doucmentUploder from "../../../common/components/document-uploder";
export default {
  name: "profile-form-view",
  data() {
    return {
      dob: null
    };
  },
  watch: {},
  mounted() {},
  computed: {
    roles() {
      return this.$store.getters["GET_ROLES"];
    },
    formData() {
      return this.$store.getters["user/USER_OBJ"];
    },
    masterData() {
      return this.$store.getters["moreMasters/GET_MASTERS"];
    },
    group() {
      return this.$store.getters["groups/GET_GROUPS"];
    }
  },
  created() {
    this.$store.dispatch("groups/GET_GROUPS");
  },
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      console.log("updateField", payload);
      this.$store.commit("user/updateField", payload);
    },
    getGroup(e) {
      this.updateField("group", e.id);
    },
    getData(e) {
      this.updateField("profile_image", e.url);
    },
    // On File Selected upload file to cloudinary
    uploadFileToCloudinary(file) {
      console.log(":: uploadFileToCloudinary ::", file);
    },

    // On File upload success
    onFileUploadSuccess(data) {
      console.log(":: onFileUploadSuccess ::", data);
      this.updateField(data.url, "profile_image");
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
    DatePicker,
    autoComplete,
    doucmentUploder
  }
};
</script>
