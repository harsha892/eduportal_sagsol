<template>
    <div class="recruiterView recruiter_cards_view content_wrap" id="recruiterView">
        <div class="container-fluid">
            <div class="user_widget">
                <div class="row">
                     <div class="col-12 col-md user_widget_container bg-white py-3">
                        <div class="">
                            <div class="user_widget_head text-center">
                                <h5 class="user_widget_heading">Activities</h5>
                            </div>
                            <div class="user_widget_body">
                                <div class="card border mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg_primary_set text-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                             Recruitment Activity
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled m-0 info_list">
                                            <li class="d-flex justify-content-between">Applicants <span>0</span></li>
                                            <li class="d-flex justify-content-between">Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Active Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Client Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">No Show <span>0</span></li>
                                            <li class="d-flex justify-content-between">Placements <span>0</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card border mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg_primary_set text-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                             Consultant Activity
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled m-0 info_list">
                                            <li class="d-flex justify-content-between">Total Consultants <span>0</span></li>
                                            <li class="d-flex justify-content-between">Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Placements <span>0</span></li>
                                            <li class="d-flex justify-content-between">Interviews <span>0</span></li>
                                            <li class="d-flex justify-content-between">Inactive Consultants <span>0</span></li>
                                            <li class="d-flex justify-content-between">Closed Consultants <span>0</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card border mb-3" style="max-width: 18rem;">
                                    <div class="card-header bg_primary_set text-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                             Vendor Activity
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled m-0 info_list">
                                            <li class="d-flex justify-content-between">Total Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Active Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Hold Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Filled Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Inactive Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Closed Jobs <span>0</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md user_widget_container">
                        <div class="">
                            <div class="user_widget_head text-center">
                                <h5 class="user_widget_heading">Recruiter</h5>
                                <p class="user_widget_subheading">6 Recruiter</p>
                                <router-link class="btn btn-primary btn-block" :to="{name:'forms' , params:{formType:'addnew'}}">+</router-link>
                            </div>
                            <div class="user_widget_body">
                                <div class="card border-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> Pavan </span><span class="text-ex-small text-right">Added in 2years
                                                ago</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <router-link class="btn bg_primary_set btn-sm" :to="{name:'profile' , params:{userIs:'recruiter',userId:'1'}}">Full Profile</router-link>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#recruiterModalView" v-on:click="assignNewToRecruiter(4)">Assian New</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled m-0 info_list">
                                            <li class="d-flex justify-content-between">Assigned Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Internal Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Awaiting Feedback <span>0</span></li>
                                            <li class="d-flex justify-content-between">Submitted to Client <span>0</span></li>
                                            <li class="d-flex justify-content-between">Interviews <span>0</span></li>
                                            <li class="d-flex justify-content-between">Placements <span>0</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md user_widget_container">
                        <div class="">
                            <div class="user_widget_head text-center">
                                <h5 class="user_widget_heading">Consultants</h5>
                                <p class="user_widget_subheading">4 Consultants</p>
                                <router-link class="btn btn-primary btn-block" :to="{name:'forms' , params:{formType:'addnew'}}">+</router-link>
                            </div>
                            <div class="user_widget_body">
                                <div class="card border-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> Ramesh </span><span class="text-ex-small text-right">Added in 2years
                                                ago</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <router-link class="btn bg_primary_set btn-sm" :to="{name:'profile' , params:{userIs:'consultant',userId:'1'}}">Full Profile</router-link>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#consultantModalView" v-on:click="createNewConsultant(4)">New Submit</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled m-0 info_list">
                                            <li class="d-flex justify-content-between">Vendor Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Requirement Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Job Board Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Client Submissions <span>0</span></li>
                                            <li class="d-flex justify-content-between">Interviews <span>0</span></li>
                                            <li class="d-flex justify-content-between">Placements <span>0</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md user_widget_container">
                        <div class="">
                            <div class="user_widget_head text-center">
                                <h5 class="user_widget_heading">Vendors</h5>
                                <p class="user_widget_subheading">25 Vendors</p>
                                <router-link class="btn btn-primary btn-block" :to="{name:'forms' , params:{formType:'addnew'}}">+</router-link>
                            </div>
                            <div class="user_widget_body">
                                <div class="card border-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> Google </span><span class="text-ex-small text-right">Contact person:
                                                Santosh K</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <router-link class="btn bg_primary_set btn-sm" :to="{name:'profile' , params:{userIs:'vendor',userId:'1'}}">Full Profile</router-link>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#vendorModalView" v-on:click="createNewVendor(4)">New Submit</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled m-0 info_list">
                                            <li class="d-flex justify-content-between">Total Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Active Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Hold Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Filled Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Inactive Jobs <span>0</span></li>
                                            <li class="d-flex justify-content-between">Closed Jobs <span>0</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <recruiterModalView v-bind:title="recruiterObj.title" v-bind:id="recruiterObj.id"/>
        <consultantModalView v-bind:title="consultantObj.title" v-bind:id="consultantObj.id"/>
        <vendorModalView v-bind:title="vendorObj.title" v-bind:id="vendorObj.id"/>
    </div>
</template>
<script>
import staticData from "../../../js/StaticData.json";
import recruiterModalView from "../../shared/modals/recuitermodal";
import consultantModalView from "../../shared/modals/consultantmodal";
import vendorModalView from "../../shared/modals/vendormodal";
export default {
  name: "recruiterView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: "",
      recruiterObj: {
        id: 1,
        title: "Pavan"
      },
      consultantObj: {
        id: 1,
        title: "Ramesh"
      },
      vendorObj: {
        id: 1,
        title: "Google"
      }
    };
  },
  components: {
    recruiterModalView,
    consultantModalView,
    vendorModalView
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  },
  methods: {
    assignNewToRecruiter: function(userId) {
      this.recruiterObj.id = userId;
    },
    createNewConsultant: function(userId) {
      this.consultantObj.id = userId;
    },
    createNewVendor: function(userId) {
      this.vendorObj.id = userId;
    }
  }
};
</script>
<style scoped>
.user_widget .user_widget_container {
  border-right: 1px solid #eee;
  min-height: 100vh;
  padding: 8px;
}
.user_widget .user_widget_container:last-child {
  border: none;
}
.user_widget_head {
  margin-bottom: 12px;
  border-bottom: 1px solid #eee;
}
.user_widget_heading {
  font-size: 1em;
  color: #282828;
}
.user_widget_body .card-title small {
  font-size: 10px;
  margin-left: 2.5rem;
}
.user_widget_subheading {
  font-size: 0.9em;
  color: #ccc;
}
.user_widget_body {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}
.user_widget_body .card {
  width: 100%;
  background-color: #fff;
}
.info_list li {
  font-size: 12px;
  margin-bottom: 4px;
}
.text-ex-small {
  font-size: 70%;
}
</style>
