<template>
  <div>
    <div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link active"
            id="subjectGroup-tab"
            data-toggle="tab"
            href="#subjectGroup"
            role="tab"
            aria-controls="subjectGroup"
            aria-selected="true"
          >
            <i class="fas fa-object-group"></i> Subject-Group
          </a>
        </li>
        <!-- <li class="nav-item">
          <a
            class="nav-link"
            id="group_subject2-tab"
            data-toggle="tab"
            href="#group_subject2"
            role="tab"
            aria-controls="group_subject2"
            aria-selected="false"
          >group_subject2</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="contact-tab"
            data-toggle="tab"
            href="#contact"
            role="tab"
            aria-controls="contact"
            aria-selected="false"
          >Contact</a>
        </li>-->
      </ul>
      <div class="tab-content py-3" id="myTabContent">
        <subject-gruop></subject-gruop>
        <div
          class="tab-pane fade"
          id="group_subject2"
          role="tabpanel"
          aria-labelledby="group_subject2-tab"
        >...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>
    </div>
  </div>
</template>

<script>
import staticData from "../../../../js/StaticData.json";
import subjectGruop from "./mapping/subject-group";
export default {
  name: "rolesView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: "",
      studentsAssined: true
    };
  },
  components: {
    subjectGruop
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  },
  methods: {
    assaignNew() {
      this.studentsAssined === true
        ? (this.studentsAssined = false)
        : (this.studentsAssined = true);
    }
  }
};
</script>