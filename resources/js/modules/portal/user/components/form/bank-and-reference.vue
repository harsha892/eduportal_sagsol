<template>
  <div id="personal-form-view">
    <div class="row">
      <div class="col">
        <h5 class="my-2">Bank account Details</h5>
      </div>
    </div>
    <div class="row py-2" v-if="formData">
      <div class="form-row col pr-1">
        <div class="col-12">
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="bank">Bank</label>
                <input
                  type="text"
                  class="form-control"
                  id="bank"
                  placeholder="bank"
                  :value="formData.bank_account.bank"
                  @input="updateField($event, 'bank')"
                  name="bank"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="ifsc">IFSC</label>
                <input
                  type="text"
                  class="form-control"
                  id="ifsc"
                  placeholder="ifsc"
                  :value="formData.bank_account.ifsc"
                  @input="updateField($event, 'ifsc')"
                  name="ifsc"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">A/C no</label>
                <input
                  type="text"
                  class="form-control"
                  id="ac_no"
                  placeholder="A/C no"
                  :value="formData.bank_account.ac_no"
                  @input="updateField($event, 'ac_no')"
                  name="ac_no"
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <h5 class="my-2">Reference</h5>
        </div>
        <div class="col-12">
          <div
            class="form-row"
            v-for="(item,index) in formData.user_detail.references"
            :key="index"
          >
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder="Name"
                  :value="formData.user_detail.references[index].name"
                  @input="updateFieldWithIndex($event, 'name',index)"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input
                  type="text"
                  class="form-control"
                  id="first_name"
                  placeholder
                  :value="formData.user_detail.references[index].Phone"
                  @input="updateFieldWithIndex($event, 'Phone',index)"
                  name="first_name"
                >
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  placeholder="email"
                  :value="formData.user_detail.references[index].email"
                  @input="updateFieldWithIndex($event, 'email',index)"
                  name="email"
                >
              </div>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center">
              <a
                class="btn btn-danger btn-sm text-white mt-3"
                v-if="formData.user_detail.references[index].isRemove === true"
                v-on:click="remove(index)"
              >
                <i class="fas fa-plus"></i> Remove
              </a>
              
              <a
                class="btn btn-primary text-white btn-sm mt-3"
                v-if="formData.user_detail.references[index].isRemove === false"
                v-on:click="addNew(index)"
              >
                <i class="fas fa-plus"></i> Add
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import documentUploder from "../../../common/components/document-uploder";
export default {
  name: "domain-list-view",
  watch: {},
  mounted() {},
  computed: {
    roles() {
      return this.$store.getters["GET_ROLES"];
    },
    formData() {
      return this.$store.getters["user/USER_OBJ"];
    }
  },
  created() {},
  methods: {
    updateField(event, key) {
      const value = !!event.target ? event.target.value : event;
      const payload = { key, value };
      this.$store.commit("user/updateField", payload);
    },
    updateFieldWithIndex(event, key, index) {
      console.log(event, key, index);

      const value = !!event.target ? event.target.value : event;
      const payload = { key, value, index, type: "references" };
      console.log(payload);
      this.$store.commit("user/updateFieldWithIndex", payload);
    },
    addNew(index) {
      const payload = { type: "references", index };
      this.$store.commit("user/ADD_NEW_OBJ_TO_USER_OBJ", payload);
    },
    remove(index) {
      const payload = { type: "references", index };
      this.$store.commit("user/REMOVE_OBJ_TO_USER_OBJ", payload);
    }
  },
  components: {
    Datepicker,
    documentUploder
  }
};
</script>
