<template>
    <div class="cprofile" id="cprofile">
        <div class="col">
            <div class="row">
                <div class="col-12 my-3">
                    <div class="user_profile_widget w-100">
                        <div class="">
                            <div class="card p-3 w-100 border-none">
                                <div class="card-body row">
                                    <div class="col-3 user_profile_box px-3">
                                        <div class="user_info">
                                            <div class="text-center mbl m-t-10">
                                                <img src="http://vue-dark.vueadmintemplate.com/images/avatar1.jpg?5f71842c4bfa5c53ef5991e9625326d5" alt="img"
                                                    class="rounded-circle img-bor">
                                                <div class="user_profile_text my-3">
                                                    <h4 class="user_name_max m-0">Addison</h4>
                                                    <p>Addisone@sf.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile_user">
                                            <h5>Technical Skills</h5>
                                            <hr>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div>
                                                        <p class="d-flex justify-content-between"><strong>Html5 &amp; Css3</strong> <small class="text-muted">
                                                                40% Complete
                                                            </small></p>
                                                        <div class="progress progress-xs progress-striped active">
                                                            <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-success"
                                                                style="width: 40%;"><span class="sr-only">
                                                                    40% Complete (success)
                                                                </span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div>
                                                        <p><strong>Javascript</strong> <small class="float-right text-muted">
                                                                60% Complete
                                                            </small></p>
                                                        <div class="progress progress-xs progress-striped active">
                                                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-warning"
                                                                style="width: 60%;"><span class="sr-only">
                                                                    60% Complete (warning)
                                                                </span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div>
                                                        <p><strong>Angular 2+</strong> <small class="float-right text-muted">
                                                                80% Complete
                                                            </small></p>
                                                        <div class="progress progress-xs progress-striped active">
                                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-info"
                                                                style="width: 80%;"><span class="sr-only">
                                                                    80% Complete (info)
                                                                </span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="user_profile_activities px-3">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" v-for="(item,index) in tabs" :key=index>
                                                    <a class="nav-link" :id="'v-profile-'+index+'-tab'" v-bind:class="{ active: tabIndex==index }"
                                                        data-toggle="tab" :href="'#v-profile-'+ index" role="tab"
                                                        aria-selected="true">{{item.title}}</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content my-3" id="myTabContent">
                                                <div class="tab-pane fade show" v-bind:class="{ active: tabIndex==index }"
                                                    :id="'v-profile-'+index" :aria-controls="'v-profile-' + index" role="tabpanel"
                                                    :aria-labelledby="'v-profile-' + index" v-for="(item,index) in tabs"
                                                    :key=index>
                                                    <table class="table border-top-0">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th scope="col">Recruiter Info</th> -->
                                                                <th scope="col">Message</th>
                                                                <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(subItem,index) in item.tabsContent" :key=index>
                                                                <!-- <td>
                                                                    <ul class="list-unstyled">
                                                                        <li>Company: Prohire</li>
                                                                        <li>Name: Raghava</li>
                                                                        <li> <i class="fas fa-mobile-alt"></i> +91 9999 999 999</li>
                                                                        <li><i class="far fa-envelope"></i> raghava@prohires.com</li>
                                                                        <li><i class="fas fa-map-marker-alt"></i> Newyork</li>
                                                                    </ul>
                                                                </td> -->
                                                                <td><p class="m-0">{{subItem.activityTitle}}</p> <small class="text-muted"><i class="far fa-calendar"></i> {{subItem.createdOn}}</small></td>
                                                                <td>Today</td>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import staticData from "../../../js/StaticData.json";
export default {
  name: "cprofile",
  data() {
    return {
      tabs: "",
      tabIndex: 0
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    console.log("Component mounted.", this.tabs);
  }
};
</script>
<style>
.user_profile_widget {
  box-shadow: 0 0 14px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}

.user_profile_box {
  border-right: 1px solid #eee;
}

.user_name_max {
  font-size: 1rem;
  margin: 0;
  font-weight: 700;
}
.user_profile_activities {
  font-size: 13px;
}
.user_profile_box .progress {
  height: 5px;
}
.user_profile_activities .nav-tabs .nav-link {
  background: transparent;
  border-radius: 0;
}

.user_profile_activities .nav-tabs .nav-link:hover,
.user_profile_activities .nav-tabs .nav-link.active {
  border: 0;
  border-top: 3px solid #6699cc;
}

.user_profile_activities .nav-tabs .nav-link.active {
  border-right: 1px solid #eee;
  border-left: 1px solid #eee;
}
</style>