<template>
    <div class="recruiterModalView">
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="recruiterModalView" tabindex="-1" role="dialog" aria-labelledby="recruiterModalView"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="recruiterModalView">{{title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="assigne-job" data-toggle="tab" href="#assigneJob" role="tab"
                                    aria-controls="assigneJob" aria-selected="true">Assigne Job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="assigne-consultant" data-toggle="tab" href="#assigneConsultant" role="tab"
                                    aria-controls="assigneConsultant" aria-selected="false">Assigne Consultant</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="assigneJob" role="tabpanel" aria-labelledby="home-tab">
                                <form action="">
                                     <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by Job / Vendor Name" aria-label="Username" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">Search</span>
                                        </div>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Job details</th>
                                        <th scope="col">Posted on</th>
                                        <th scope="col">Assain</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Java Developer <br>
                                                <small>
                                                    Company: Google
                                                </small><br>
                                                <small>
                                                    Contact Person: Santosh K
                                                </small><br>
                                                
                                            </td>
                                            <td>10 oct 2018</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger">Assain</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Angular Developer <br>
                                                <small>
                                                    Company: TCS
                                                </small><br>
                                                <small>
                                                    Contact Person: Manoj K
                                                </small><br>
                                                
                                            </td>
                                            <td>12 oct 2018</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger">Assain</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="assigneConsultant" role="tabpanel" aria-labelledby="assigne-consultant-tab">
                                 <form action="">
                                     <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by consultant Name" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <td><button class="btn btn-sm btn-danger">Assain</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>10 oct 2018</td>
                                        <td><button class="btn btn-sm btn-danger">Assain</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>1 Oct 2018</td>
                                        <td><button class="btn btn-sm btn-danger">Assain</button></td>
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