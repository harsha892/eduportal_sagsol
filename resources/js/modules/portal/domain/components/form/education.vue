<template>
  <div id="personal-form-view">
    <h4 class="font-weight-bold my-2">Education Qualification</h4>
    <div class="row border border-left-0 border-right-0 py-2" v-if="formData">
      <div class="col-12">
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">School/collage</label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                placeholder="School"
                :value="formData.user_detail.first_name"
                @input="updateField($event, 'first_name')"
                name="first_name"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">Year</label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                placeholder="Year"
                :value="formData.user_detail.first_name"
                @input="updateField($event, 'first_name')"
                name="first_name"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">Marks</label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                placeholder="School"
                :value="formData.user_detail.first_name"
                @input="updateField($event, 'first_name')"
                name="first_name"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">Percentege</label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                placeholder="School"
                :value="formData.user_detail.first_name"
                @input="updateField($event, 'first_name')"
                name="first_name"
              >
            </div>
          </div>
          <div class="col">
            <label for="exampleInputEmail1">Attachment</label>
            <input
              type="file"
              class="form-control"
              id="first_name"
              placeholder="School"
              :value="formData.user_detail.first_name"
              @input="updateField($event, 'first_name')"
              name="first_name"
            >
          </div>
          <div class="col-1 d-flex justify-content-center align-items-center">
            <button class="btn btn-danger mt-3">
              <i class="fas fa-plus"></i> Add
            </button>
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
