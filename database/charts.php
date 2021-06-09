<?php
// Prevention for accessing the file through GET request
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: ../countries.php");
}

// Requires for database-connection and time-logic
require_once "config.php";
require_once "time_logic.php";

// Selecting the required data from database
$stmt = $db->query("SELECT confirmed, deaths, recovered, `date` FROM `total` WHERE (date BETWEEN '$lastMonth' AND '$yesterday' AND slug = '$country')");
$monthlyGraphData = $stmt->fetchAll();

$stmt = $db->query("SELECT confirmed, deaths, recovered, `date` FROM `total` WHERE (date BETWEEN '$lastThreeMonths' AND '$yesterday' AND slug = '$country')");
$threeMonthsGraphData = $stmt->fetchAll();

// Function for getting the needed graph data
function getGraphData($cases, $array)
{
    foreach ($array as $key => $value) {
        echo $value[$cases] . ",";
    }
}

// Function for getting the needed graph dates
function getGraphDates($array)
{
    foreach ($array as $key => $value) {
        echo json_encode($value['date']) . ",";
    }
}

?>

<!-- Monthly Charts -->
<div id="monthlyCharts" class="row">
    <div class="col-md-12 mt-5">
        <canvas id="monthlyConfirmedChart"></canvas>
    </div>
    <div class="col-md-12 mt-5">
        <canvas id="monthlyRecoveredChart"></canvas>
    </div>
    <div class="col-md-12 mt-5">
        <canvas id="monthlyDeathsChart"></canvas>
    </div>
</div>

<!-- Three months charts -->
<div id="threeMonthsCharts" class="row">
    <div class="col-md-12 mt-5">
        <canvas id="threeMonthsConfirmedChart"></canvas>
    </div>
    <div class="col-md-12 mt-5">
        <canvas id="threeMonthsRecoveredChart"></canvas>
    </div>
    <div class="col-md-12 mt-5">
        <canvas id="threeMonthsDeathsChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Monthly charts script -->
<script>
    var ctxMonthlyConfirmed = document.getElementById("monthlyConfirmedChart").getContext("2d");
    var myChart = new Chart(ctxMonthlyConfirmed, {
        type: "line",
        data: {
            labels: [<?php getGraphDates($monthlyGraphData); ?>],
            datasets: [{
                fill: {
                    target: 'origin',
                    above: 'rgba(7, 152, 196, 0.1)',
                    below: 'rgb(0, 0, 255)'
                },
                label: "# of Confirmed Cases for the last month",
                data: [<?php getGraphData('confirmed', $monthlyGraphData); ?>],
                backgroundColor: [
                    "rgba(7, 152, 196, 0.1)",
                ],
                borderColor: [
                    "rgb(7, 152, 196)",
                ],
                borderWidth: 2,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

    var ctxMonthlyRecovered = document.getElementById("monthlyRecoveredChart").getContext("2d");
    var myChart = new Chart(ctxMonthlyRecovered, {
        type: "line",
        data: {
            labels: [<?php getGraphDates($monthlyGraphData); ?>],
            datasets: [{
                fill: {
                    target: 'origin',
                    above: 'rgba(3, 163, 3, 0.1)',
                    below: 'rgb(0, 0, 255)'
                },
                label: "# of Recovered Cases for the last month",
                data: [<?php getGraphData('recovered', $monthlyGraphData); ?>],
                backgroundColor: [
                    "rgba(3, 163, 3, 0.1)",
                ],
                borderColor: [
                    "rgb(3, 163, 3)",
                ],
                borderWidth: 2,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

    var ctxMonthlyDeaths = document.getElementById("monthlyDeathsChart").getContext("2d");
    var monthlyDeaths = new Chart(ctxMonthlyDeaths, {
        type: "line",
        data: {
            labels: [<?php getGraphDates($monthlyGraphData); ?>],
            datasets: [{
                fill: {
                    target: 'origin',
                    above: 'rgba(255, 0, 0, 0.1)',
                    below: 'rgb(0, 0, 255)'
                },
                label: "# of Death Cases for the last month",
                data: [<?php getGraphData('deaths', $monthlyGraphData); ?>],
                backgroundColor: [
                    "rgba(255, 0, 0, 0.1)",
                ],
                borderColor: [
                    "rgb(255, 0, 0)",
                ],
                borderWidth: 2,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>
<!-- Three months charts script -->
<script>
    var ctxThreeMonthsConfirmed = document.getElementById("threeMonthsConfirmedChart").getContext("2d");
    var threeMonths = new Chart(ctxThreeMonthsConfirmed, {
        type: "line",
        data: {
            labels: [<?php getGraphDates($threeMonthsGraphData); ?>],
            datasets: [{
                fill: {
                    target: 'origin',
                    above: 'rgba(7, 152, 196, 0.1)',
                    below: 'rgb(0, 0, 255)'
                },
                label: "# of Confirmed Cases for the past three months",
                data: [<?php getGraphData('confirmed', $threeMonthsGraphData); ?>],
                backgroundColor: [
                    "rgba(7, 152, 196, 0.1)",
                ],
                borderColor: [
                    "rgb(7, 152, 196)",
                ],
                borderWidth: 2,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>

<script>
    var ctxThreeMonthsRecovered = document.getElementById("threeMonthsRecoveredChart").getContext("2d");
    var threeMonthsRecovered = new Chart(ctxThreeMonthsRecovered, {
        type: "line",
        data: {
            labels: [<?php getGraphDates($threeMonthsGraphData); ?>],
            datasets: [{
                fill: {
                    target: 'origin',
                    above: 'rgba(3, 163, 3, 0.1)',
                    below: 'rgb(0, 0, 255)'
                },
                label: "# of Recovered Cases for the past three months",
                data: [<?php getGraphData('recovered', $threeMonthsGraphData); ?>],
                backgroundColor: [
                    "rgba(3, 163, 3, 0.1)",
                ],
                borderColor: [
                    "rgb(3, 163, 3)",
                ],
                borderWidth: 2,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

    var threeMonthsDeaths = document.getElementById("threeMonthsDeathsChart").getContext("2d");
    var threeMonthsDeaths = new Chart(threeMonthsDeaths, {
        type: "line",
        data: {
            labels: [<?php getGraphDates($threeMonthsGraphData); ?>],
            datasets: [{
                fill: {
                    target: 'origin',
                    above: 'rgba(255, 0, 0, 0.1)',
                    below: 'rgb(0, 0, 255)'
                },
                label: "# of Death Cases for the past three months",
                data: [<?php getGraphData('deaths', $threeMonthsGraphData); ?>],
                backgroundColor: [
                    "rgba(255, 0, 0, 0.1)",
                ],
                borderColor: [
                    "rgb(255, 0, 0)",
                ],
                borderWidth: 2,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>