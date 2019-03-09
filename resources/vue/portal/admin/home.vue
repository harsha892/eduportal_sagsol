<template>
  <div id="adminView">
    <div class="mt-2 container-fluid">
      <div class="row mb-3">
        <!-- <div class="col-12">
          <ul class="list-group">
            <li
              class="list-group-item d-flex justify-content-between align-items-center"
              v-for="(item,index) in analyticsData"
              :key="index"
            >
              <span>
                <i class="fa" v-bind:class="item.icon"></i>
                {{item.title}}
              </span>
              
              <span class="badge badge-default badge-pill">{{item.resultData}}</span>
            </li>
          </ul>
        </div>
        <div class="col-10">
          <div class="row">
            <div class="col-5">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-chart-line mr-2"></i> User Statistics
                </div>
                <div class="card-body p-0 py-2">
                  <canvas id="pie-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-chart-line mr-2"></i> Up coming events
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Event Name</th>
                        <th scope="col">Created By / Approved By</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Mathes Test for CSC Group</td>
                        <td>Ramesh / Vanisri</td>
                        <td>10 Feb 2019</td>
                      </tr>
                      <tr>
                        <td>Praticles Test for ECE Group</td>
                        <td>Ramesh / Vanisri</td>
                        <td>10 Feb 2019</td>
                      </tr>
                      <tr>
                        <td>Mathes Test for CSC Group</td>
                        <td>Ramesh / Vanisri</td>
                        <td>11 Feb 2019</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-3 col-sm-6" v-for="(item,index) in analyticsData" :key="index">
          <div class="media state-media box-ws">
            <div class="media-left">
              <router-link
                :to="{name:item.routeName}"
                href="http://phpstack-127383-482309.cloudwaysapps.com/users"
              >
                <div class="state-icn" v-bind:class="item.bg_class">
                  <i class="fa" v-bind:class="item.icon"></i>
                </div>
              </router-link>
            </div>
            <div class="media-body">
              <h4 class="card-title">{{item.resultData}}</h4>
              <a href="http://phpstack-127383-482309.cloudwaysapps.com/users">{{item.title}}</a>
            </div>
          </div>
        </div>-->
      </div>

      <!-- <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">Recently Added users</div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>student</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>staff</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry</td>
                    <td>student</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</template>
<script>
import Chart from "chart.js";
import topHeaderView from "../../shared/MainHeader";
import {
  planetChartData,
  pieChartData
} from "../../../js/charts/chart-data.js";
import staticData from "../../../js/StaticData";
export default {
  name: "adminView",
  data() {
    return {
      planetChartData: planetChartData,
      analyticsData: staticData.AdminAnalyticsInfo,
      pieChartData: pieChartData
    };
  },
  components: {
    topHeaderView,
  },
  mounted() {
    // this.createChart("pie-chart", this.pieChartData);
    //    this.createChart("planet-chart", this.planetChartData);
  },
  methods: {
    createChart(chartId, chartData) {
      const ctx = document.getElementById(chartId);
      const myChart = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options
      });
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
