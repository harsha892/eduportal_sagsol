<template>
  <div>
    <div class="form-group">
      <label for="SelectTopic">{{label}}</label>
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
  props: ["label", "source", "inputValue"],
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
      this.$emit("value", this.selectedValue);
    }
  },
  mounted() {
    this.$refs.searchKeyWordTypeHead.inputValue = this.inputValue;
  },
  computed: {
    autoCompleteData() {
      switch (this.label) {
        case "topic":
          return ["topic"];
          //   this.$store.getters.GET_TOPICS.data !== undefined
          //     ? this.$store.getters.GET_TOPICS.data
          break;

        default:
          return [];
          break;
      }
    }
  },
  methods: {
    handleOnChange() {},
    autoCompleteSearch() {
      switch (this.label) {
        case "topic":
          return [];
          //   this.$store.dispatch("GET_TOPICS_LIST", {
          //     url: "topic?&search=" + this.searchKeyWord
          //   });
          break;
        default:
          return [];
          break;
      }
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
