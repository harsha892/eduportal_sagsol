<template>
  <div id="adminView">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="getFormData">
          <small
            class="text-danger"
          >** For multiple groups use coma " , " and continue &amp; Leave empty for all groups</small>
          <div class="form-row">
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Group</label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Group"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Subject Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Subject Name"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Topic</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Topic Name"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="inputAddress">Question Type</label>
                <select
                  class="custom-select"
                  v-model="questionType"
                  v-on:change="getQuestionType(questionType)"
                >
                  <option value>Select Question Type</option>
                  <option
                    :value="item.value"
                    v-for="(item,index) in mcqQuestionModels"
                    :key="index"
                  >{{item.text}}</option>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="inputAddress">Difficulty level</label>
                <select class="custom-select">
                  <option value>Select Difficulty level</option>
                  <option
                    :value="item.value"
                    v-for="(item,index) in difficultyLevel"
                    :key="index"
                  >{{item.title}}</option>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="inputAddress">Type of content</label>
                <select class="custom-select">
                  <option value>Select Type of content</option>
                  <option
                    :value="item.value"
                    v-for="(item,index) in typeOfContent"
                    :key="index"
                  >{{item.title}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Question</label>
            <vue-editor v-model="formData.mcq_option_a" :editorToolbar="customToolbar"></vue-editor>
          </div>
          <div class="form-group" v-if="questionType==='orative'">
            <label for="exampleInputPassword1">Answer</label>
            <vue-editor v-model="answerContent"></vue-editor>
          </div>
          <div class="form-row mb-2" v-else>
            <div class="col-12" v-for="(item,key,index) in mcqQuestionModels" :key="index">
              <div class="row" v-if="item.value === questionType">
                <div class="col-3" v-for="(value, key) in item[questionType]" :key="key">
                  <div class="form-check mb-2">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value
                      :id="formData[value.modelName]"
                    >
                    <label
                      class="form-check-label text-capitalize"
                      :for="formData[value.modelName]"
                    >
                      <span class="text-danger">{{value.title}}</span> is right answer
                    </label>
                  </div>
                  <!-- <input type="text" class="form-control"> -->
                  <vue-editor
                    :v-model="item.model"
                    :editorToolbar="customAnswerToolbar"
                    v-model="formData[value.modelName]"
                  ></vue-editor>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I Accept Tearms &amp; Conditions</label>
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
  name: "adminApp",
  data() {
    return {
      userType: "",
      pageType: "",
      formData: {
        questionContent: "<h1>Some initial question Content</h1>",
        answerContent: "<h1>Some initial answer Content</h1>",
        mcq_option_a: "sample mcq answer a",
        mcq_option_b: "sample mcq answer b",
        mcq_option_c: "sample mcq answer c",
        mcq_option_d: "sample mcq answer d"
      },
      customToolbar: [
        ["bold", "italic", "underline"],
        [{ list: "ordered" }, { list: "bullet" }],
        ["image", "code-block"]
      ],
      questionType: "",
      customAnswerToolbar: [
        ["bold", "italic", "underline"],
        [{ list: "ordered" }, { list: "bullet" }]
      ],
      mcqQuestionModels: [
        {
          value: "orative",
          text: "Orative"
        },
        {
          value: "mcq_alphabets",
          text: "MCQ Alphabets",
          mcq_alphabets: [
            {
              title: "A",
              modelName: "mcq_option_a"
            },
            {
              title: "B",
              modelName: "mcq_option_b"
            },
            {
              title: "C",
              modelName: "mcq_option_c"
            },
            {
              title: "D",
              modelName: "mcq_option_d"
            }
          ]
        },
        {
          value: "mcq_numbers",
          text: "MCQ Numbers",
          mcq_numbers: [
            {
              title: "1",
              modelName: "mcq_option_a"
            },
            {
              title: "2",
              modelName: "mcq_option_b"
            },
            {
              title: "3",
              modelName: "mcq_option_c"
            },
            {
              title: "4",
              modelName: "mcq_option_d"
            }
          ]
        },
        {
          value: "mcq_roman_letters",
          text: "MCQ Romal Letters",
          mcq_roman_letters: [
            {
              title: "I",
              modelName: "mcq_option_a"
            },
            {
              title: "II",
              modelName: "mcq_option_b"
            },
            {
              title: "III",
              modelName: "mcq_option_c"
            },
            {
              title: "IV",
              modelName: "mcq_option_d"
            }
          ]
        }
      ],
      difficultyLevel: [
        {
          title: "high",
          value: "high"
        },
        {
          title: "medium",
          value: "medium"
        },
        {
          title: "low",
          value: "low"
        }
      ],
      typeOfContent: [
        {
          title: "private",
          value: "private"
        },
        {
          title: "public",
          value: "public"
        }
      ]
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
    VueEditor
  },
  methods: {
    getQuestionType(QueationType) {
      this.questionType = QueationType;
      console.log(this.questionType);
    },
    getFormData(e) {
      e.preventDefault();
      console.log(this.formData);
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
