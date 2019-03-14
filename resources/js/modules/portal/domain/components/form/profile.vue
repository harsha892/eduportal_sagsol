<template>
  <div id="personal-form-view">
    <h4 class="font-weight-bold my-2 text-center">Student / Staff Profile</h4>
    <div class="row py-2" v-if="formData">
      <div class="col-9">
        <div class="form-row">
          <div class="col-4">
            <label for="exampleInputEmail1">Level</label>
            <div class="form-row">
              <div class="form-group col-6">
                <select class="form-control">
                  <option>Year</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group col-6">
                <select class="form-control">
                  <option>Semester</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="Father_Name">Father Name</label>
              <input
                type="text"
                class="form-control"
                id="Father_Name"
                placeholder="Father Name"
                :value="formData.user_detail.emergency_phone"
                @input="updateField($event, 'emergency_phone')"
                name="phone"
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
                :value="formData.user_detail.emergency_phone"
                @input="updateField($event, 'emergency_phone')"
                name="phone"
              >
            </div>
          </div>
          <div class="col-3">
            <div class="form-group mx-2">
              <label for="exampleInputEmail1">Gender</label>
              <div class="form-row">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="male"
                    :value="formData.user_detail.gender"
                    @input="updateField($event, 'gender')"
                  >
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="female"
                    :value="formData.user_detail.gender"
                    @input="updateField($event, 'gender')"
                  >
                  <label class="form-check-label" for="female">Fe male</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
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
          <div class="col-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Blood Group</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Blood Group"
                :value="formData.email"
                @input="updateField($event, 'email')"
                name="email"
              >
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="exampleInputEmail1">PAN / AADHAR</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="PAN / AADHAR"
                :value="formData.email"
                @input="updateField($event, 'email')"
                name="email"
              >
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="Descrption">Address</label>
              <textarea class="form-control" id="Descrption" rows="1"></textarea>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Group</label>
              <select class="form-control">
                <option>Year</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-3">
            <label for="exampleInputEmail1">Acedamic Year</label>
            <div class="form-row">
              <div class="form-group col">
                <select class="form-control">
                  <option>From</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group col">
                <select class="form-control">
                  <option>To</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 text-center d-flex">
        <div>
          <img
            src="http://cdn.onlinewebfonts.com/svg/img_448427.png"
            alt="..."
            class="rounded-circle w-50 p-2"
          >
          <p class="text-capitalize">Photo</p>
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
