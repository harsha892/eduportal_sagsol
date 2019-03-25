<template>
  <div id="skills-work-form-view" v-if="formData">
    <div class="row">
      <div class="col-8">
        <h5 class="font-weight-bold my-2">Work experience</h5>
      </div>
    </div>
    <div class="form-row" v-for="(item,index) in formData.experiences" :key="index">
      <div class="col">
        <div class="form-group">
          <label for="exampleInputEmail1">Job title</label>
          <input
            type="text"
            class="form-control"
            id="first_name"
            placeholder="Job title"
            :value="formData.experiences[index].title"
            @input="updateField($event, 'title',index)"
            name="first_name"
          >
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="exampleInputEmail1">Company</label>
          <input
            type="text"
            class="form-control"
            id="first_name"
            placeholder="Company"
            :value="formData.experiences[index].company"
            @input="updateField($event, 'company',index)"
            name="first_name"
          >
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="exampleInputEmail1">Year</label>
          <select
            class="custom-select"
            :value="formData.experiences[index].year"
            @input="updateField($event, 'year',index)"
          >
            <option>Year</option>
            <option value="1">2018</option>
            <option value="2">2019</option>
            <option value="3">2020</option>
          </select>
        </div>
      </div>
      <div class="col-1 d-flex justify-content-center align-items-center">
        <a
          class="btn btn-danger btn-sm text-white mt-3"
          v-if="formData.experiences[index].isRemove === true"
          v-on:click="remove(index)"
        >
          <i class="fas fa-plus"></i> Remove
        </a>
        
        <a
          class="btn btn-primary text-white btn-sm mt-3"
          v-if="formData.experiences[index].isRemove === false"
          v-on:click="addNew(index)"
        >
          <i class="fas fa-plus"></i> Add
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import documentUploder from "../../../common/components/document-uploder";
export default {
  name: "skills-work-form-view",
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
      const payload = { key, value };
      this.$store.commit("user/updateField", payload);
    },
    updateFieldWithIndex(event, key, index) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value, index, type: "experiences" };
      this.$store.commit("user/updateFieldWithIndex", payload);
    },
    addNew(index) {
      const payload = { type: "experiences", index };
      this.$store.commit("user/ADD_NEW_OBJ_TO_USER_OBJ", payload);
    },
    remove(index) {
      const payload = { type: "experiences", index };
      this.$store.commit("user/REMOVE_OBJ_TO_USER_OBJ", payload);
    }
  },
  components: {
    Datepicker,
    documentUploder
  }
};
</script>
