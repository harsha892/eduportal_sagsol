<template>
  <div id="masters-list-view" v-if="mastersData">
    <div class="card">
      <div class="card-body">
        <b-tabs size="is-small" class="block mb-0" v-model="activeTab" @change="clearForm()">
          <b-tab-item
            :label="item | remove_ | capitalize"
            v-for="(item,index) in Object.keys(mastersData)"
            :key="index"
            class="pt-0"
          >
            <ul class="list-unstyled m-0">
              <li
                v-for="(mitem,index) in mastersData[item]"
                :key="index"
                class="text-capitalize"
              >{{mitem.name}}</li>
              <li class="mt-2 row">
                <form class="col-6">
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="'Add New ' + item | remove_ | capitalize"
                      :value="formData.name"
                      @input="updateField($event, 'name')"
                    >
                    <div class="input-group-append">
                      <span
                        class="btn input-group-text"
                        id="basic-addon2"
                        v-on:click="createMasterData(item)"
                      >Add New {{item| remove_ | capitalize}}</span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
          </b-tab-item>
        </b-tabs>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "masters-list-view",
  data() {
    return {
      activeTab: 0,
      showBooks: false
    };
  },
  watch: {},
  mounted() {},
  computed: {
    mastersData() {
      return this.$store.getters["moreMasters/GET_MASTERS"];
    },
    formData: {
      get() {
        return this.$store.getters["moreMasters/FORM_OBJ"];
      }
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("moreMasters/updateField", payload);
    },
    clearForm() {
      this.$store.commit("moreMasters/clearForm");
    },
    createMasterData(key) {
      let url = key === "difficulty_levels" ? key.split("_")[0] : key;
      this.$store.dispatch("moreMasters/POST_MASTER", {
        url: url,
        data: this.formData
      });
    }
  }
};
</script>