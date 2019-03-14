<template>
  <div id="personal-form-view">
    <div class="row">
      <div class="col">
        <h4 class="font-weight-bold my-2">Hobbies</h4>
      </div>
      <div class="col">
        <h4 class="font-weight-bold my-2">Language Learnt</h4>
      </div>
    </div>
    <div class="row border border-left-0 border-right-0 py-2" v-if="formData">
      <div class="form-row col pr-1">
        <div class="col-6">
          <div class="form-row">
            <div class="col-10 px-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Hobbies</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="Hobbies"
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
              <button class="btn btn-danger mt-3">
                <i class="fas fa-plus"></i> Add
              </button>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="form-row">
            <div class="col-10 px-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Language Learnt</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="Hobbies"
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col-2 px-1 d-flex justify-content-center align-items-center">
              <button class="btn btn-danger mt-3">
                <i class="fas fa-plus"></i> Add
              </button>
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
  name: "domain-list-view",
  watch: {},
  mounted() {},
  computed: {
    roles() {
      return this.$store.getters["GET_ROLES"];
    },
    formData() {
      return this.$store.getters["domain/USER_OBJ"];
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("domain/updateField", payload);
    }
  },
  components: {
    Datepicker,
    documentUploder
  }
};
</script>
