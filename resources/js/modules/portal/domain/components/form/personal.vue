<template>
  <div id="personal-form-view">
    <h4 class="font-weight-bold my-2 text-center">Domain Profile</h4>
    <div class="row border py-2">
      <div class="col-12">
        <div class="form-row">
          <div class="col-4">
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
          <div class="col-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Email"
                :value="formData.email"
                @input="updateField($event, 'email')"
                name="email"
              >
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input
                type="text"
                class="form-control"
                id="Phone"
                placeholder="Phone"
                :value="formData.phone"
                @input="updateField($event, 'phone')"
                name="phone"
              >
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="Descrption">Descrption</label>
              <textarea class="form-control" id="Descrption" rows="3"></textarea>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="Descrption">Address</label>
              <textarea class="form-control" id="Descrption" rows="3"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
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
    Datepicker
  }
};
</script>
