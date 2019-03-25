<template>
  <div id="hobbies-form-view">
    <div class="row" v-if="formData">
      <div class="form-row col pr-1">
        <div class="col">
          <div class="form-row">
            <div class="col px-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Hobbies</label>
                <input
                  type="text"
                  class="form-control"
                  id="hobbies"
                  placeholder="Hobbies"
                  :value="formData.user_detail.hobbies"
                  @input="updateField($event, 'hobbies')"
                  name="hobbies"
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-row">
            <div class="col px-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Language Learnt</label>
                <input
                  type="text"
                  class="form-control"
                  id="languages"
                  placeholder="languages"
                  :value="formData.user_detail.languages"
                  @input="updateField($event, 'languages')"
                  name="languages"
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="skills">Skills</label>
                <input
                  type="text"
                  class="form-control"
                  id="skills"
                  placeholder="Skills"
                  :value="formData.user_detail.skills"
                  @input="updateField($event, 'skills')"
                  name="skills"
                >
              </div>
            </div>
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
  name: "hobbies-form-view",
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
      const payload = { key, value: value.split(",") };
      this.$store.commit("user/updateField", payload);
    }
  },
  components: {
    Datepicker,
    documentUploder
  }
};
</script>
