<template>
  <div id="personal-form-view">
    <div class="row">
      <div class="col">
        <h4 class="font-weight-bold my-2">Bank account Details</h4>
      </div>
      <div class="col">
        <h4 class="font-weight-bold my-2">Reference</h4>
      </div>
    </div>
    <div class="row border border-left-0 border-right-0 py-2" v-if="formData">
      <div class="form-row col pr-1">
        <div class="col-6 border-right">
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Bank</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="Company"
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">IFSC</label>
                
                <select class="custom-select">
                  <option>Year</option>
                  <option value="1">2018</option>
                  <option value="2">2019</option>
                  <option value="3">2020</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">A/C no</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="A/C no"
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="Name"
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder
                  :value="formData.user_detail.first_name"
                  @input="updateField($event, 'first_name')"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center">
              <button class="btn btn-danger mt-3">
                <i class="fas fa-plus"></i>
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
