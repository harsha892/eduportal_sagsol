<template>
  <div id="adminView">
    <div class="card">
      <div class="card-body">
        <form id="app">
          <small
            class="text-danger"
          >** For multiple groups use coma " , " and continue &amp; Leave empty for all groups</small>
          <div class="form-row">
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Group</label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Group"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Subject Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Subject Name"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Topic Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Topic Name"
                >
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="inputAddress">Type of content</label>
                <select class="custom-select">
                  <option value>Select Type of content</option>
                  <option
                    :value="item.value"
                    v-for="(item,index) in typeOfContent"
                    :key="index"
                  >{{item.title}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group w-100">
              <label for="">Semesters for this topic (for multiple semesters hold on "ctrl" and select multiple )</label>
              <select class="custom-select" multiple>
                <option>Open this select menu</option>
                <option value="1">semester One</option>
                <option value="2">semester Two</option>
                <option value="3">semester Three</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Topic Short Descreption</label>
            <vue-editor></vue-editor>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Full Descreption</label>
            <vue-editor></vue-editor>
          </div>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I Accept Tearms &amp; Conditions</label>
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
  name: "adminApp",
  data() {
    return {
      typeOfContent: [
        {
          title: "private",
          value: "private"
        },
        {
          title: "public",
          value: "public"
        }
      ]
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
    }
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path.split(
      "/portal/" + this.userType + "/dashboard/"
    )[1];
  },
  components: {
    VueEditor
  },
  methods: {}
};
</script>