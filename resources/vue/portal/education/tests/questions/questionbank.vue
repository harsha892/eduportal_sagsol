<template>
  <div id="questionBank">
    <div class="row">
      <div class="col-md-6 px-2" v-for="(item,index) in questions.data" :key="index">
        <div class="card mb-2 text-capitalize">
          <div class="card-body py-3">
            <div>
              <ul class="list-inline m-0">
                <li class="list-inline-item">
                  <small>
                    <span class="text-muted">Subject:</span>
                    {{item.subject_name}}
                  </small>
                </li>
                <li class="list-inline-item">
                  <small>
                    <span class="text-muted">Topic:</span>
                    {{item.topic_name}}
                  </small>
                </li>
              </ul>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="text_truncate m-0" v-html="item.title"></h5>
                <div class="d-flex">
                  <small class="mr-2">{{item.updated_at | fromNow}}</small>
                  <div class="dropdown">
                    <a
                      class="dropdown-toggle hide-chevron"
                      href="#"
                      role="button"
                      id="dropdownMenuLink"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="fas fa-pencil-alt"></i>
                    </a>

                    <div
                      class="dropdown-menu dropdown-menu-right"
                      aria-labelledby="dropdownMenuLink"
                    >
                      <router-link
                        :to="{name:'e-edit-question', params:{qid:item.id}}"
                        class="dropdown-item"
                      >Update Question</router-link>
                      <router-link
                        :to="{name:'e-create-answer-to-question', params:{qid:item.id}}"
                        class="dropdown-item"
                      >Update Answer</router-link>
                      <a class="dropdown-item" href="#">In-active</a>
                    </div>
                  </div>
                  <span class="fas fa-trash ml-2 mt-1"></span>
                </div>
              </div>
              <p class="mb-1 text_truncate">{{item.detail}}</p>
              <ul class="list-inline m-0">
                <li class="list-inline-item">
                  <small>
                    <span class="text-muted">Type:</span>
                    {{item.type}}
                  </small>
                </li>
                <li class="list-inline-item">
                  <small>
                    <span class="text-muted">difficulty:</span>
                    {{item.difficulty}}
                  </small>
                </li>
                <li class="list-inline-item">
                  <small>
                    <span class="text-muted">privacy:</span>
                    {{item.privacy}}
                  </small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <div class="col">
        <span
          class="btn btn-link"
          v-if="questions.last_page!==pageId"
          v-on:click="loadQuestions((pageId += 1))"
        >Load more</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "questionBank",
  data() {
    return {
      userType: "",
      pageType: "",
      pageId: 1
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
    console.log(this.pageType);
  },
  components: {},
  computed: {
    questions() {
      return this.$store.getters["question/GET_ALL_QUESTIONS"];
    }
  },
  created() {
    this.$store.dispatch("question/GET_ALL_QUESTIONS_ACTION", this.pageId);
  },
  methods: {
    getMasterName(key, id) {
      masterData.filter((i, index) => {
        i[key].filter(i => {
          return id === i.id ? i.name : false;
        });
      });
    },
    loadQuestions(pageId) {
      return this.$store.dispatch("question/GET_ALL_QUESTIONS_ACTION", pageId);
    }
  }
};
</script>
<style>
.text_truncate,
.text_truncate * {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  max-width: 350px;
}
.text_truncate * {
  font-size: 18px !important;
}
</style>
