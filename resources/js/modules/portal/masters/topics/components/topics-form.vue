<template>
  <div id="topicView">
    <div class="card">
      <div class="card-body">
        <form id="app" @submit="createNewTopic" v-if="formdata && formErrors">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">
                Topic Name
                <span class="text-danger">*</span>
              </label>
              <input
                type="text"
                class="form-control"
                id="Topic_Name"
                :class="{'is-invalid' : formErrors.name.length > 0}"
                :value="formdata.name"
                @input="updateField($event, 'name')"
                placeholder="Topic Name"
              >
            </div>
            <div class="form-row">
              <div class="col">
                <auto-complete
                  :label="'subject'"
                  :type="'subject'"
                  :validate="isSubjectId"
                  @updateValue="getSubject($event)"
                ></auto-complete>
              </div>
              <div class="col" v-if="masters">
                <label for="exampleInputEmail1">Semister</label>
                <select class="custom-select">
                  <option selected>Semister</option>
                  <option
                    :value="semister.id"
                    v-for="(semister,index) in masters.course_semester"
                    :key="index"
                  >{{semister.name}}</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group">
                <label :class="{'text-danger' : formErrors.short_description.length > 0}">
                  short Descrption
                  <span class="text-danger">*</span>
                </label>
                <vue-editor
                  :value="formdata.short_description"
                  @input="updateField($event, 'short_description')"
                ></vue-editor>
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group">
                <label>long Descrption</label>
                <vue-editor
                  :value="formdata.long_description"
                  @input="updateField($event, 'long_description')"
                ></vue-editor>
              </div>
            </div>
            <div class="text-right">
              <button class="btn btn-primary" v-on:click="createNewTopic">Create New Topic</button>
            </div>
          </form>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import vSelect from "vue-select";
import autoComplete from "../../../common/components/auto-complete";
export default {
  name: "topicView",
  data() {
    return {
      subjectId: null,
      isSubjectId: false
    };
  },
  watch: {},
  mounted() {},
  computed: {
    formErrors() {
      return this.$store.getters["topics/ERRORS"];
    },
    masters() {
      return this.$store.getters["moreMasters/GET_MASTERS"];
    },
    formdata() {
      return this.$store.getters["topics/TOPICS_FORM_OBJ"];
    },
    isFromValid() {
      return this.$store.getters["topics/IS_FORM_VALID"];
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("topics/updateField", payload);
    },
    createNewTopic(e) {
      e.preventDefault();

      this.$store.dispatch("topics/CREATE_TOPIC", {
        subjectId: this.subjectId,
        topics: { topics: [this.formdata] },
        method: "post"
      });
      if (this.subjectId === null) {
        this.isSubjectId = true;
      }
    },
    getSubject(e) {
      this.subjectId = e.id;
    }
  },
  components: {
    VueEditor,
    vSelect,
    autoComplete
  }
};
</script>