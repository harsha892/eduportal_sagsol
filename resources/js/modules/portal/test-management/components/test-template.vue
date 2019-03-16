<template>
  <div id="test-template">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="generateSections" v-if="formErrors && formData">
          <div class="form-row">
            <div class="col-12">
              <div class="form-row">
                <div class="col-10">
                  <div class="form-row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="qpname">
                          Test template Name
                          <span class="text-danger">*</span>
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="qpname"
                          placeholder="Test template Name"
                          :class="{'is-invalid' : formErrors.name.length > 0}"
                          :value="formData.name"
                          @input="updateField($event, 'name')"
                        >
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="totalSections">
                          No of Sections
                          <span class="text-danger">*</span>
                        </label>
                        <input
                          type="number"
                          class="form-control"
                          id="totalSections"
                          placeholder="Total Sections"
                          min="1"
                          max="10"
                          :class="{'is-invalid' : formErrors.no_of_sections.length > 0}"
                          :value="formData.no_of_sections"
                          @input="updateField($event, 'no_of_sections')"
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center mt-4">
                  <div class>
                    <div class="form-group">
                      <a
                        v-on:click="generateSections()"
                        class="btn btn-success text-white"
                      >Generate Sections</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="sections.length>0" class="form-row">
              <div class="col-12 mb-2" v-for="(item,index) in sections" :key="index">
                <div class="border p-2">
                  <div class="form-row">
                    <div
                      class="d-flex justify-content-center align-items-center text-capitalize px-2"
                    >
                      <small class="font-weight-bold">Section {{item.sectionTitle}}</small>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="totalquestions" class="text-capitalize">No of items</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalquestions"
                          placeholder="Total Sections"
                          :value="sections[index].questions"
                          @input="updateFieldWithIndex($event, 'questions',index)"
                        >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="totalquestions" class="text-capitalize">Marks/ items</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalquestions"
                          placeholder="Total Sections"
                          :value="sections[index].marks"
                          @input="updateFieldWithIndex($event, 'marks',index)"
                        >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="totalquestions" class="text-capitalize">optional Qns</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalquestions"
                          placeholder="Total Sections"
                          :value="sections[index].options"
                          @input="updateFieldWithIndex($event, 'options',index)"
                        >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="totalquestions" class="text-capitalize">Time / Items</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalquestions"
                          placeholder="Time / Items"
                          :value="sections[index].time"
                          @input="updateFieldWithIndex($event, 'time',index)"
                        >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="questionTypes">Type of Qns</label>
                        <select
                          class="custom-select"
                          id="questionTypes"
                          :value="sections[index].question_type"
                          @input="updateFieldWithIndex($event, 'question_type',index)"
                        >
                          <option value>Choose...</option>
                          <option
                            :value="item.id"
                            v-for="(item,index) in masterData.question_type"
                            :key="index"
                          >{{item.name}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right col">
                <a
                  v-on:click="createTestModel()"
                  class="btn btn-danger text-white"
                >Create Test Model</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";

export default {
  name: "test-template",
  data() {
    return {
      userType: "",
      pageType: "",
      qModelSection: {
        totalSections: 0,
        sectionType: ""
      },
      totalMarks: 0
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
    }
  },
  mounted() {},
  components: {
    Datepicker
  },
  computed: {
    masterData() {
      return this.$store.getters["moreMasters/GET_MASTERS"];
    },
    formData() {
      return this.$store.getters["testManagement/GET_TEST_MODEL_FORM"];
    },
    formErrors() {
      return this.$store.getters["testManagement/errors"];
    },
    sections() {
      return this.$store.getters["testManagement/GET_SECTIONS_FOR_MODEL"];
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("testManagement/updateField", payload);
    },
    updateFieldWithIndex(event, key, index) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value, index };
      this.$store.commit("testManagement/updateFieldWithIndex", payload);
    },
    generateSections() {
      this.$store.commit("testManagement/clearSectionForm");
      this.$store.dispatch("testManagement/GENERATE_TEST_MODEL", this.formData);
    },
    createTestModel() {
      let time = 0,
        marks = 0;
      this.sections.map((item, index) => {
        console.log(item);
        time = time + JSON.parse(item.time);
        marks = marks + JSON.parse(item.marks);
      });
      this.updateField(time, "time");
      this.updateField(marks, "marks");
      this.$store.dispatch("testManagement/POST_TEST_MODEL", {
        question: this.formData,
        sections: this.sections
      });
    }
  }
};
</script>