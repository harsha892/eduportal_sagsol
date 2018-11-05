<template>
<div>
    <div class="vendorModalView">
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="vendorModalView" tabindex="-1" role="dialog" aria-labelledby="vendorModalView"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vendorModalView">{{title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search by Consultant Name" aria-label="Username" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon1">Search</span>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Consultant</th>
                                <th scope="col">Joinned On</th>
                                <th scope="col">Assaine</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>21 oct 2018</td>
                                <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>10 oct 2018</td>
                                <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>1 Oct 2018</td>
                                <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
export default {
  name: "vendorModalView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: ""
    };
  },
  props: ["title", "id"],
  watch: {
    "$route.params": function() {
      this.title;
    }
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
  }
};
</script>


</template>

<script>
import staticData from "../../../js/StaticData.json";
export default {
  name: "vendorModalView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: ""
    };
  },
  props: ["title", "id"],
  watch: {
    "$route.params": function() {
      this.title;
    }
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
  }
};
</script>