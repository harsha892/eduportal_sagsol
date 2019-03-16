<template>
  <div id="test-template-index-view">
    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Template Name</th>
            <th scope="col">Prepared by</th>
            <th scope="col">Approved by</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody v-if="testModels">
          <tr v-for="(item,index) in testModels.data" :key="index">
            <td scope="row">{{item.name}}</td>
            <td>Mark</td>
            <td>Otto</td>
            <td class="text-success">active</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "test-template-index-view",
  mounted() {},
  mounted() {},
  computed: {
    testModels() {
      return this.$store.getters["testManagement/GET_TEST_MODELS"];
    }
  },
  created() {
    this.$store.dispatch("testManagement/GET_TEST_MODELS_ACTION");
  }
};
</script>
