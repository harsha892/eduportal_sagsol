<template>
  <div id="adminView">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <ul class="border-bottom text-capitalize mb-4 pb-3 px-3">
              <li class="text-danger">* Mark fields are manditory</li>
              <li class="text-danger">Maximum no of sections are 10</li>
              <li class="text-danger">by default section type is numaric format</li>
              <li class="text-danger">by default question type is numaric format</li>
              <li class="text-danger">for no optional questions set as 0</li>
            </ul>
          </div>
        </div>
        <form id="app" @submit="getFormData">
          <div class="form-row">
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="qpname">Question Paper Name
                      <span class="text-danger">*</span>
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      id="qpname"
                      aria-describedby="emailHelp"
                      placeholder="Question Paper Name"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="group">Group</label>
                    <input
                      type="email"
                      class="form-control"
                      id="group"
                      aria-describedby="emailHelp"
                      placeholder="Group"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="subjectName">Subject Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="subjectName"
                      placeholder="Subject Name"
                    >
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="pvTo">Model Valid from</label>
                    <datepicker input-class="form-control"></datepicker>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="pvFrom">Model Valid to</label>
                    <datepicker input-class="form-control"></datepicker>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="totlaMarks">Total Marks
                      <span class="text-danger">*</span>
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      id="totlaMarks"
                      placeholder="Total Marks"
                    >
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="totalTimeinHours">Total Time in hours
                      <span class="text-danger">*</span>
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      id="totalTimeinHours"
                      placeholder="Total Time in hours"
                    >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="totalSections">No of Sections
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
                <div class="col-4">
                  <div class="form-group">
                    <label for="sectionTypes">Section type</label>
                    <select
                      class="custom-select"
                      id="sectionTypes"
                      v-model="qModelSection.sectionType"
                    >
                      <option value>Choose...</option>
                      <option value="alphabets">Alphabets</option>
                      <option value="numaric">Numaric</option>
                      <option value="romanLetters">Roman letters</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="qNameType">Question Name type</label>
                    <select class="custom-select" id="qNameType">
                      <option value>Choose...</option>
                      <option value="alphabets">Alphabets</option>
                      <option value="numaric">Numaric</option>
                      <option value="romanLetters">Roman letters</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class>
                <div class="form-group">
                  <a
                    v-on:click="generateSections()"
                    class="btn btn-danger text-white"
                  >Generate Sections</a>
                </div>
              </div>
            </div>
            <div class="col-12 mb-2" v-for="(item,index) in sections" :key="index">
              <div class="card">
                <div class="card-header">
                  <div class="text-uppercase">{{item.sectionTitle}}</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label
                          for="totalquestions"
                          class="text-capitalize"
                        >No of Questions in {{item.sectionTitle}}</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalquestions"
                          placeholder="Total Sections"
                          v-model="item.noOfQuestions"
                        >
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label
                          for="totalquestions"
                          class="text-capitalize"
                        >No of optional Questions in {{item.sectionTitle}}</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalquestions"
                          placeholder="Total Sections"
                          v-model="item.noOfQuestions"
                        >
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="questionTypes">Questions type</label>
                        <select class="custom-select" id="questionTypes">
                          <option>Choose...</option>
                          <option value="1">MCQ</option>
                          <option value="2">Orative</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="totalSectionMarks">Total Marks for this Section</label>
                        <input
                          type="text"
                          class="form-control"
                          id="totalSectionMarks"
                          placeholder="Total Sections"
                        >
                      </div>
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
  name: "adminApp",
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
          return index + 1;
        // code block
      }
    }
  }
};
</script>
<style>
.state-media {
  background: #fff;
  margin: 5px 0;
  padding: 0.5rem;
}
.state-icn {
  height: 60px;
  width: 60px;
  text-align: center;
  border-radius: 50%;
  margin: 5px;
}
.state-icn .fa {
  font-size: 28px;
  line-height: 60px;
}
.state-media {
  padding: 20px;
  margin-bottom: 20px;
  background-clip: padding-box;
  background-color: #ffffff;
}
.box-ws {
  border-radius: 5px;
  background-color: #ffffff;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05);
  border: 0;
}
.state-media h4 {
  color: #455a64;
  font-size: 24px;
  font-weight: 600;
  margin-top: 6px;
  margin-bottom: 4px;
}
</style>
