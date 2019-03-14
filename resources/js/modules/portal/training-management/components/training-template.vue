<template>
  <div id="test-template">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="getFormData">
          <div class="form-row">
            <div class="col-12">
              <div class="form-row">
                <div class="col-10">
                  <div class="form-row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="qpname">
                          Traning template Name
                          <span class="text-danger">*</span>
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="qpname"
                          aria-describedby="emailHelp"
                          placeholder="Test template Name"
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
                          v-model="qModelSection.totalSections"
                          type="number"
                          class="form-control"
                          id="totalSections"
                          placeholder="Total Sections"
                          min="1"
                          max="10"
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
                        class="btn btn-danger text-white"
                      >Generate Sections</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 mb-2" v-for="(item,index) in sections" :key="index">
              <div class="border p-2">
                <div class="form-row">
                  <div class="d-flex justify-content-center align-items-center text-capitalize px-2">
                    <small class="font-weight-bold">{{item.sectionTitle}}</small>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="totalquestions" class="text-capitalize">No of items</label>
                      <input
                        type="text"
                        class="form-control"
                        id="totalquestions"
                        placeholder="Total Sections"
                        v-model="item.noOfQuestions"
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
                        v-model="item.noOfQuestions"
                      >
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="totalSectionMarks">Total Time</label>
                      <input
                        type="text"
                        class="form-control"
                        id="totalSectionMarks"
                        placeholder="Total Time"
                      >
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="questionTypes">Type of Content</label>
                      <select class="custom-select" id="questionTypes">
                        <option>Choose...</option>
                        <option value="1">MCQ</option>
                        <option value="2">Orative</option>
                      </select>
                    </div>
                  </div>
                </div>
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
      formData: {
        questionContent: "<h1>Some initial question Content</h1>",
        answerContent: "<h1>Some initial answer Content</h1>"
      },
      qModelSection: {
        totalSections: 0,
        sectionType: ""
      },
      sections: []
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
    }
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path.split(
      "/portal/" + this.userType + "/dashboard/"
    )[1];
  },
  components: {
    Datepicker
  },
  methods: {
    generateSections() {
      this.sections = [];
      for (let index = 0; index < this.qModelSection.totalSections; index++) {
        this.sections.push({
          sectionTitle: "section " + this.getSectionTypes(index),
          noOfQuestions: 0
        });
      }
    },
    getFormData(e) {
      e.preventDefault();
      console.log(this.formData);
    },
    getSectionTypes(index) {
      switch (this.qModelSection.sectionType) {
        case "alphabets":
          return String.fromCharCode(97 + index);
          break;
        case "numaric":
          return index + 1;
          break;
        case "romanLetters":
          let digits = String(index + 1).split(""),
            key = [
              "",
              "C",
              "CC",
              "CCC",
              "CD",
              "D",
              "DC",
              "DCC",
              "DCCC",
              "CM",
              "",
              "X",
              "XX",
              "XXX",
              "XL",
              "L",
              "LX",
              "LXX",
              "LXXX",
              "XC",
              "",
              "I",
              "II",
              "III",
              "IV",
              "V",
              "VI",
              "VII",
              "VIII",
              "IX"
            ],
            roman = "",
            i = 3;
          while (i--) {
            roman = (key[+digits.pop() + i * 10] || "") + roman;
            return roman;
          }
          // code block
          break;
        default:
          return String.fromCharCode(97 + index);
        // code block
      }
    }
  }
};
</script>