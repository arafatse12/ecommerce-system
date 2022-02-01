<template>
  <div id="page-content" class="p20 clearfix">
    <div class="row">
      <div class="col-md-3 col-sm-6 widget-container">
        <div class="panel" style="background: #fd9d39">
          <a href="#" class="white-link">
            <div class="panel-body">
              <div class="widget-icon">
                <i class="fa fa-industry"></i>
              </div>
              <div class="widget-details">
                <h1>11</h1>
                Total Projects
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 widget-container">
        <div class="panel panel-sky">
          <a href="#" class="white-link">
            <div class="panel-body">
              <div class="widget-icon">
                <i class="fa fa-bullhorn"></i>
              </div>
              <div class="widget-details">
                <h1>11</h1>
                Inprogress Projects
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 widget-container">
        <div class="panel panel-primary">
          <a href="#" class="white-link">
            <div class="panel-body">
              <div class="widget-icon">
                <i class="fa fa-thumbs-o-up"></i>
              </div>
              <div class="widget-details">
                <h1>0</h1>
                Completed Projects
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 widget-container">
        <div class="panel panel-success">
          <a href="#" class="white-link">
            <div class="panel-body">
              <div class="widget-icon">
                <i class="fa fa-paper-plane-o"></i>
              </div>
              <div class="widget-details">
                <h1>9</h1>
                Total IE
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 widget-container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-clock-o"></i>&nbsp; Project Status
          </div>
          <div class="panel-body">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>

            <canvas
              id="myChart"
              style="display: block; width: 495px; height: 247px"
              class="chartjs-render-monitor"
              width="495"
              height="247"
            ></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6 widget-container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-clock-o"></i>&nbsp; Project Pogress
          </div>
          <div class="panel-body">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <canvas
              id="mystaff_status"
              style="display: block; width: 495px; height: 247px"
              class="chartjs-render-monitor"
              width="495"
              height="247"
            ></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "misDashboard",
  mounted() {
    //Pie
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "pie",
      data: {
        labels: ["In-Pogress", "Timeout", "Completed"],
        datasets: [
          {
            label: "# of Votes",
            data: [11, 0, 0],
            backgroundColor: ["#ffc107", "#dc3545", "#28a745"],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
            ],
            borderWidth: 1,
          },
        ],
      },
    });

    //Bar
    var ctx = document.getElementById("mystaff_status").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "horizontalBar",

      data: {
        labels: [
          "NDP, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "TMSS, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "Padakhep, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "POPI, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "TMSS, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "NAZIR (Natun Zibon Rochi), SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "NDP, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "SHARP, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "ESDO, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "GBK, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
          "SSS, SAP008 “Extended Community Climate Change Project-Flood (ECCCP-Flood)”",
        ],
        datasets: [
          {
            label: "Project Pogress",
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            backgroundColor: [
              "#007bff",
              "#fd7e14",
              "#28a745",
              "#6610f2",
              "#ffc107",
              "#e83e8c",
            ],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
            ],

            borderWidth: 1,
          },
        ],
      },
      options: {
        legend: {
          display: false,
        },
        scales: {
          yAxes: [
            {
              ticks: {
                // mirror: true,
                fontColor: "black",
                beginAtZero: true,
              },
            },
          ],
        },
      },
    });
  },
};
</script>

<style scoped>
</style>
