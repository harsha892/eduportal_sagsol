<template>
  <div id="new-domain">
    <form @submit="createNewUser">
      <div class="card mb-2">
        <div class="card-body">
          <div class="col-12">
            <personal-form></personal-form>
            <div class="row">
              <div class="border col-12 mt-3">
                <profile-form></profile-form>
                <education-form></education-form>
                <hobbies-form></hobbies-form>
                <skills-work-experience-form></skills-work-experience-form>
                <bank-and-reference></bank-and-reference>
              </div>
            </div>
            <div class="text-center my-2">
              <span class="btn btn-danger" v-on:click="createNewUser">Create New User</span>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import moment from "moment";
import personalForm from "./form/personal";
import profileForm from "./form/profile";
import educationForm from "./form/education";
import hobbiesForm from "./form/hobbies";
import skillsWorkExperienceForm from "./form/skills-work-experience";
import bankAndReference from "./form/bank-and-reference";
export default {
  name: "new-domain",
  data() {
    return {};
  },
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
    },
    createNewUser(e) {
      e.preventDefault();
      console.log(this.formData);
      this.$store.dispatch("user/CREATE_NEW_USER");
    }
  },
  components: {
    personalForm,
    profileForm,
    educationForm,
    hobbiesForm,
    skillsWorkExperienceForm,
    bankAndReference
  }
};
</script>