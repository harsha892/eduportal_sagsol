<template id="subjectGroupForm">
  <div class="col-3">
    <p class="text-capitalize">semester {{semesterInfo}}</p>
    <ul class="list-group list-group-flush mb-3">
      <li class="list-group-item pl-0">
        <div class="form-group">
          <vue-tags-input
            v-model="list"
            :autocomplete-items="subjects"
            :quick-mode="false"
            :tags="tags"
            :add-only-from-autocomplete="true"
            @tags-changed="update"
          />
        </div>
      </li>
    </ul>
  </div>
</template>
<script lang="ts">
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  name: "SemesterSubject",
  props: ["year", "semester"],
  data() {
    return {
      list: "",
      tag: [],
      tags: [],
      selectedTags: [],
      semesterInfo: this.semester
    };
  },
  components: {
    VueTagsInput
  },
  watch: {
    tags: function() {
      console.log(this.selectedTags, "selectedTags");
    }
  },
  mounted() {},
  computed: {
    subjects() {
      return this.$store.getters.GET_SUBJECTS.map((item, index) => {
        return { id: item.id, text: item.name };
      });
    }
  },
  created() {
    this.$store.dispatch("GROUP_GLOBE_ACTION");
  },
  methods: {
    update(newTags) {
      this.tags = newTags;
      const { semester, year } = this;
      const selected = (newTags || []).map(tag => ({
        id: tag.id,
        text: tag.text,
        semester,
        year
      }));
      this.$emit("selected", { selected, semester, year });
    }
  }
};
</script>
