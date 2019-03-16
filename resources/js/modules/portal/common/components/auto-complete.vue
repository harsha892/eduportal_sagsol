<template>
  <div>
    <div class="form-group">
      <label for="SelectTopic" :class="{'text-danger' : validate === true}">
        {{label}}
        <span class="text-danger">*</span>
      </label>
      <vue-bootstrap-typeahead
        v-model="searchKeyWord"
        :serializer="s => s.name"
        :data="autoCompleteData"
        @hit="selectedValue = $event"
        ref="searchKeyWordTypeHead"
      />
    </div>
  </div>
</template>
<script>
import VueBootstrapTypeahead from "vue-bootstrap-typeahead";

export default {
  name: "autoComplete",
  props: ["label", "source", "inputValue", "validate", "type"],
  data() {
    return {
      searchKeyWord: "",
      autoCompleteBody: false,
      selectedValue: null,
      query: "",
      tags: []
    };
  },
  components: {
    VueBootstrapTypeahead
  },
  watch: {
    searchKeyWord: function() {
      if (this.searchKeyWord.length >= 3) {
        this.autoCompleteSearch();
        this.autoCompleteData;
      }
    },
    selectedValue: function() {
      this.$emit("updateValue", this.selectedValue);
    }
  },
  mounted() {
    this.$refs.searchKeyWordTypeHead.inputValue = this.inputValue;
  },
  computed: {
    autoCompleteData() {
      return this.$store.getters["autoComplete/SEARCH_RESULT"] || [];
    }
  },
  methods: {
    autoCompleteSearch() {
      this.$store.dispatch("autoComplete/SEARCH_BY_KEYWORD", {
        url: this.type,
        keyword: this.searchKeyWord
      });
    }
  }
};
</script>

<style scoped>
.autocomplete_card {
  position: absolute;
  z-index: 9;
  width: 97%;
  width: 97%;
  height: 242px;
  overflow-y: auto;
}
</style>
