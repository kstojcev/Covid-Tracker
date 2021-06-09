<?php

require_once "database/list_global.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Tracker</title>
    <?php require_once "./components/links.php" ?>

</head>

<body>
    <?php require_once "./components/navbar.php" ?>

    <div class="container">
        <h2 class="mt-5">Covid-19 Tracker | Global Data</h2>
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
                        <?php echo number_format($globalNew['daily']['confirmed']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalNew['daily']['recovered']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalNew['daily']['deaths']); ?>
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
                        <?php echo number_format($globalNew['monthly']['confirmed']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalNew['monthly']['recovered']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalNew['monthly']['deaths']); ?>
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
                        <?php echo number_format($globalNew['threeMonths']['confirmed']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalNew['threeMonths']['recovered']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>New Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalNew['threeMonths']['deaths']); ?>
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
                        <?php echo number_format($globalDailyData['SUM(confirmed)']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>Total Recovered:</p>
                <div>
                    <ion-icon class="recovered" name="bandage-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalDailyData['SUM(recovered)']); ?>
                    </span>
                </div>
            </div>
            <div class="dataStyle col-md-4">
                <p>Total Deaths:</p>
                <div>
                    <ion-icon class="deaths" name="skull-outline"></ion-icon>
                    <span>
                        <?php echo number_format($globalDailyData['SUM(deaths)']); ?>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <?php require_once "./database/table.php" ?>
    </div>

    <?php require_once "./components/scripts.php" ?>
</body>

</html>