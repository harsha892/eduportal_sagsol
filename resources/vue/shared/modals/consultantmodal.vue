<template>
<div>


    <div class="consultantModalView">
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="consultantModalView" tabindex="-1" role="dialog" aria-labelledby="consultantModalView"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="consultantModalView">{{title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="assigento-recruiter" data-toggle="tab" href="#assigentoRecruiter" role="tab"
                                    aria-controls="assigentoRecruiter" aria-selected="true">Assigne to Recruiter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="submitto-vendor" data-toggle="tab" href="#submittoVendor" role="tab"
                                    aria-controls="submitto-vendor" aria-selected="false">Submit to Vendor</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="assigentoRecruiter" role="tabpanel" aria-labelledby="assigen-recruiter">
                                <form action="">
                                     <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by recruiter Name" aria-label="Username" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">Search</span>
                                        </div>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Recruiter</th>
                                        <th scope="col">Assigned Jobs</th>
                                        <th scope="col">Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>12</td>
                                        <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>10</td>
                                        <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>4</td>
                                        <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="submittoVendor" role="tabpanel" aria-labelledby="submitto-vendor">
                                <form action="">
                                     <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by Company / Vendor Name" aria-label="Username" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">Search</span>
                                        </div>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Vendor</th>
                                        <th scope="col">Comapny</th>
                                        <th scope="col">Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>google</td>
                                        <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>tcs</td>
                                        <td><button class="btn btn-sm btn-danger">Submit</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>intex</td>
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
    </div>
    </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
export default {
  name: "recruiterModalView",
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
  name: "recruiterModalView",
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