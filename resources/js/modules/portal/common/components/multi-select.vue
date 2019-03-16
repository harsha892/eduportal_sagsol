<template id="subjectGroupForm">
  <div class="col">
    <div class="form-group multi_select mb-1">
      <label for class="mb-1">{{label}}</label>
      <vue-tags-input
        v-model="searchKeyWord"
        :autocomplete-items="autoCompleteData"
        :quick-mode="false"
        :tags="tags"
        :add-only-from-autocomplete="true"
        :avoid-adding-duplicates="true"
        @tags-changed="update"
      />
    </div>
  </div>
</template>
<script lang="ts">
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  name: "SemesterSubject",
  props: ["label", "type", "year", "semester", "isValid"],
  data() {
    return {
      searchKeyWord: "",
      tag: [],
      tags: [],
      selectedTags: []
    };
  },
  components: {
    VueTagsInput
  },
  watch: {
    searchKeyWord: function() {
      if (this.searchKeyWord.length >= 3) {
        this.autoCompleteSearch();
        this.autoCompleteData;
      }
    }
  },
  mounted() {},
  computed: {
    autoCompleteData() {
      let data = this.$store.getters["autoComplete/SEARCH_RESULT"];
      if (data) {
        let newAutoCompleteArray = data.map((item, index) => {
          return { id: item.id, text: item.name };
        });
        return newAutoCompleteArray;
      }
    }
  },
  created() {},
  methods: {
    autoCompleteSearch() {
      this.$store.dispatch("autoComplete/SEARCH_BY_KEYWORD", {
        url: this.type[0],
        keyword: this.searchKeyWord
      });
    },
    update(newTags) {
      this.tags = newTags;
      const selected = (newTags || []).map(tag => ({
        year: this.type[1],
        semester: this.type[2],
        id: tag.id
      }));
      this.$emit("selected", selected);
    }
  }
};
</script>
<style scoped>
.ti-tag {
  display: flex;
}
.multi_select .ti-input {
  display: block;
  width: 100%;
  height: calc(2.19rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
