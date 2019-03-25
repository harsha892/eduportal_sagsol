<template>
  <div id="personal-form-view">
    <h5 class="font-weight-bold my-2">User Profile</h5>
    <div class="row border py-2">
      <div class="col-12">
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">Fist Name</label>
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
              <label for="exampleInputEmail1">Last Name</label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                placeholder="Name"
                :value="formData.user_detail.last_name"
                @input="updateField($event, 'last_name')"
                name="first_name"
              >
            </div>
          </div>
          <div class="col">
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
          <div class="col">
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
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                placeholder="password"
                :value="formData.password"
                @input="updateField($event, 'password')"
                name="phone"
              >
            </div>
          </div>
          <div class="col-12"></div>
          <div class="col-12 d-none">
            <div class="form-group">
              <label for="Descrption">Descrption</label>
              <textarea
                class="form-control"
                id="Descrption"
                rows="3"
                :value="formData.user_detail.phone"
                @input="updateField($event, 'phone')"
              ></textarea>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">address</label>
              <input
                type="text"
                class="form-control"
                id="address"
                placeholder="address"
                :value="formData.user_detail.address"
                @input="updateField($event, 'address')"
                name="address"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">city</label>
              <input
                type="text"
                class="form-control"
                id="city"
                placeholder="city"
                :value="formData.user_detail.city"
                @input="updateField($event, 'city')"
                name="city"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">state</label>
              <input
                type="text"
                class="form-control"
                id="state"
                placeholder="state"
                :value="formData.user_detail.state"
                @input="updateField($event, 'state')"
                name="state"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">zip</label>
              <input
                type="text"
                class="form-control"
                id="zip"
                placeholder="zip"
                :value="formData.user_detail.zip"
                @input="updateField($event, 'zip')"
                name="zip"
              >
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="exampleInputEmail1">country</label>
              <input
                type="text"
                class="form-control"
                id="country"
                placeholder="country"
                :value="formData.user_detail.country"
                @input="updateField($event, 'country')"
                name="country"
              >
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
      return this.$store.getters["user/USER_OBJ"];
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("user/updateField", payload);
    }
  },
  components: {
    Datepicker
  }
};
</script>
