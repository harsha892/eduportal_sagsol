<template>
  <div>
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-chart-line mr-2"></i> Payment Monthly Statistics
          </div>
          <div class="card-body">
            <canvas id="planet-chart"></canvas>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-chart-line mr-2"></i> User Statistics
          </div>
          <div class="card-body">
            <canvas id="pie-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">Recently Paid users</div>
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
    </div>
  </div>
</template>

<script>
import Chart from "chart.js";
import staticData from "../../../js/StaticData.json";
import {
  planetChartData,
  pieChartData
} from "../../../js/charts/chart-data.js";
export default {
  name: "consultantView",
  data() {
    return {
      pieChartData: pieChartData,
      planetChartData: planetChartData
    };
  },
  mounted() {
    this.createChart("planet-chart", this.planetChartData);
    this.createChart("pie-chart", this.pieChartData);
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