<?php
// Prevention for accessing the file through GET request
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: countries.php");
}
// Requires for database-connection and time-logic
require_once "database/config.php";
require_once "database/time_logic.php";
// The selected country from the country selection menu
$country = $_POST['country'];
// Selecting the data required from database
$getTodaySql = $db->query("SELECT * FROM total WHERE slug = '$country' AND date = '$yesterday'");
$todayData = $getTodaySql->fetch(PDO::FETCH_ASSOC);

$getYesterdaySql = $db->query("SELECT * FROM total WHERE slug = '$country' AND date = '$ereyesterday'");
$yesterdayData = $getYesterdaySql->fetch(PDO::FETCH_ASSOC);

$getLastMonthSql = $db->query("SELECT * FROM total WHERE slug = '$country' AND date = '$lastMonth'");
$lastMonthData = $getLastMonthSql->fetch(PDO::FETCH_ASSOC);

$getLastThreeMonthsSql = $db->query("SELECT * FROM total WHERE slug = '$country' AND date = '$lastThreeMonths'");
$lastThreeMonthsData = $getLastThreeMonthsSql->fetch(PDO::FETCH_ASSOC);

$countryNew = [];

$countryNew['daily']['confirmed'] = $todayData['confirmed'] - $yesterdayData['confirmed'];
$countryNew['daily']['recovered'] = $todayData['recovered'] - $yesterdayData['recovered'];
$countryNew['daily']['deaths'] = $todayData['deaths'] - $yesterdayData['deaths'];

$countryNew['monthly']['confirmed'] = $todayData['confirmed'] - $lastMonthData['confirmed'];
$countryNew['monthly']['recovered'] = $todayData['recovered'] - $lastMonthData['recovered'];
$countryNew['monthly']['deaths'] = $todayData['deaths'] - $lastMonthData['deaths'];

$countryNew['threeMonths']['confirmed'] = $todayData['confirmed'] - $lastThreeMonthsData['confirmed'];
$countryNew['threeMonths']['recovered'] = $todayData['recovered'] - $lastThreeMonthsData['recovered'];
$countryNew['threeMonths']['deaths'] = $todayData['deaths'] - $lastThreeMonthsData['deaths'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Tracker | <?php echo ucfirst($country) ?></title>
    <?php require_once "./components/links.php" ?>

</head>

<body>
    <?php require_once "./components/navbar.php" ?>

    <div class="container">
        <h2 class="mt-5">Covid-19 Tracker | Country: <?php echo "<span class='text-capitalize'>" . $country . "</span>" ?></h2>
        <hr>
        <div class="filters">
            <button id="dailyBtn" class="filterBtn clickedBtn">Daily Report</button>
            <button id="monthlyBtn" class="filterBtn">Monthly Report</button>
            <button id="threeMonthsBtn" class="filterBtn">3 months report</button>
        </div>
        <hr>
        <h2 id="globalDataTitle" class="mb-3">Daily data:</h2>
        <div id="dailyData" class="allData row">
            <div class="dataStyle col-md-4">
                <p>New Confirmed:</p>
                <div>
                    <ion-icon class="confirmed" name="person-add-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['daily']['confirmed']);
                        ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['daily']['recovered']);  ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['daily']['deaths']); ?>
                    </span>
                </div>
            </div>
        </div>

        <div id="monthlyData" class="allData row">
            <div class="dataStyle col-md-4">
                <p>New Confirmed:</p>
                <div>
                    <ion-icon class="confirmed" name="person-add-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['monthly']['confirmed']);
                        ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['monthly']['recovered']);  ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['monthly']['deaths']); ?>
                    </span>
                </div>
            </div>
        </div>

        <div id="threeMonthsData" class="allData row">
            <div class="dataStyle col-md-4">
                <p>New Confirmed:</p>
                <div>
                    <ion-icon class="confirmed" name="person-add-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['threeMonths']['confirmed']);
                        ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['threeMonths']['recovered']);  ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($countryNew['threeMonths']['deaths']); ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="row allData">
            <div class="dataStyle col-md-4">
                <p>Total Confirmed:</p>
                <div>
                    <ion-icon class="confirmed" name="person-add-outline"></ion-icon>
                    <span>
                        <?php echo number_format($todayData['confirmed']);
                        ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>Total Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($todayData['recovered']);  ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>Total Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($todayData['deaths']); ?>
                    </span>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="container mt-5">
        <?php require_once "database/charts.php" ?>
    </div>

    <?php require_once "./components/scripts.php" ?>
</body>

</html>