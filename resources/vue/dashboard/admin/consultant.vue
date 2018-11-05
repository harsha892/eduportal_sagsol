<template>
    <div class="consultantView recruiter_cards_view content_wrap" id="recruiterView">
            <div class="jumbotron jumbotron-fluid py-5 bg-light">
            <div class="container">
                <h4 class="display-5">Consultant Activities</h4>
                <div class="row">
                    <div class="card bg-dark text-white col mr-2 p-0">
                        <div class="card-body">
                            <h6 class="card-title">Vendor Submissions</h6>
                            <p class="card-text">45</p>
                        </div>
                    </div>
                    <div class="card col mr-2 p-0">
                        <div class="card-body">
                            <h6 class="card-title">Requirement Submissions</h6>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                    <div class="card bg-dark text-white col mr-2 p-0">
                        <div class="card-body">
                            <h6 class="card-title">Job Board Submissions</h6>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                    <div class="card col mr-2 p-0">
                        <div class="card-body">
                            <h6 class="card-title">Client Submissions</h6>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                    <div class="card bg-dark text-white col mr-2 p-0">
                        <div class="card-body">
                            <h6 class="card-title">Interviews</h6>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                    <div class="card col mr-2 p-0">
                        <div class="card-body">
                            <h6 class="card-title">Placements</h6>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <table class="table table-sm table-hover">
            <thead class="thead-light">
                <tr>
                <th scope="col">Consultant Name</th>
                <th scope="col">Vendor Submissions</th>
                <th scope="col">Requirement Submissions</th>
                <th scope="col">Internal Submissions</th>
                <th scope="col">Job Board Submissions</th>
                <th scope="col">Client Submissions</th>
                <th scope="col">Interviews</th>
                <th scope="col">Placements</th>
                <th scope="col">Activites</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Pavan</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <th><router-link class="btn btn-info btn-sm" :to="{name:'forms' , params:{formType:'update',userId:'1'}}"><i class="fas fa-user-edit"></i></router-link> | <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></th>
                </tr>
                <tr>
                <td>Ganesh</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <th><button class="btn btn-info btn-sm text-white"><i class="fas fa-user-edit"></i></button> | <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
export default {
  name: "consultantView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: ""
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  }
};
</script>