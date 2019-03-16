<template>
  <div id="mapping-view">
    <div v-if="group">
      <h4 class="text-capitalize">
        {{group.name}}
        <small>{{group.duration}} Years</small>
      </h4>
      <p class="m-0">Description: {{group.description}}</p>
      <p class="m-0">
        Status:
        <span class="badge badge-success" v-if="group.is_active===true">Active</span>
        <span class="badge badge-secondary" v-else>In Active</span>
      </p>
      <ul class="list-inline">
        <li class="list-inline-item">Semesters(Year-semesters):</li>
        <li class="list-inline-item" v-for="index in group.duration" :key="index">
          <h6>
            <span class="badge badge-primary">{{index}} - {{group.semesters[index-1]}}</span>
          </h6>
        </li>
      </ul>
      <form>
        <div v-for="yindex in group.duration" :key="yindex">
          <div class="form-row">
            <div class="col-1 d-flex justify-content-center align-items-center">
              <label for="exampleInputEmail1">Year {{yindex}}</label>
            </div>
            <div
              class="form-group col mb-0"
              v-for="sindex in JSON.parse(group.semesters[yindex-1])"
              :key="sindex"
            >
              <!-- <label for="exampleInputEmail1">semesters {{sindex}}</label> -->
              <!-- <input
                type="test"
                class="form-control"
                :id="'semesters'+sindex"
                aria-describedby="emailHelp"
                :placeholder="'semesters '+sindex"
              >-->
              <multi-select
                :label="'semester '+sindex"
                :type="['subject',yindex,sindex]"
                :validate="isSubjectId"
                @selected="getSubject($event, yindex, sindex)"
              ></multi-select>
            </div>
          </div>
        </div>
        <div class="col text-right my-2">
          <a class="btn btn-primary text-white" v-on:click="mapSubjects()">Map subjects</a>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import multiSelect from "../../../common/components/multi-select";
export default {
  name: "mapping-view",
  data() {
    return {
      isSubjectId: false
    };
  },
  mounted() {
    // this.$store.dispatch("GET_ROLES_ACTION");
  },
  computed: {
    group() {
      console.log(this.$store.getters["groups/GET_BY_GROUP_ID"]);
      return this.$store.getters["groups/GET_BY_GROUP_ID"];
    },
    mappedSubjects() {
      console.log(this.$store.getters["mapping/GET_MAPPED_SUBJECTS"]);
    }
  },
  created() {
    this.$store.dispatch("groups/GET_GROUP_BY_ID", this.$route.params.groupId);
  },
  methods: {
    getSubject(subjects, yindex, sindex) {
      this.$store.dispatch("mapping/MAP_SUBJECTS", {
        subjects,
        yindex,
        sindex
      });
    },
    mapSubjects() {
      //   e.preventDefault();
      this.$store.dispatch("mapping/POST_SUBJECTS", this.$route.params.groupId);
    }
  },
  components: {
    multiSelect
  }
};
</script>
