<?php
// Requires for database-connection and time-logic
require_once "config.php";
require_once 'time_logic.php';

// Selecting data from database according to the date needed and the logic
$getGlobalDaily = $db->prepare("SELECT SUM(confirmed), SUM(deaths), SUM(recovered) FROM `total` WHERE date = :date");
$getGlobalDaily->execute([
    "date" => $yesterday
]);
$globalDailyData = $getGlobalDaily->fetch(PDO::FETCH_ASSOC);

$getGlobalYesterday = $db->prepare("SELECT SUM(confirmed), SUM(deaths), SUM(recovered) FROM `total` WHERE date = :date");
$getGlobalYesterday->execute([
    "date" => $ereyesterday
]);
$globalYesterdayData = $getGlobalYesterday->fetch(PDO::FETCH_ASSOC);

$getGlobalLastMonth = $db->prepare("SELECT SUM(confirmed), SUM(deaths), SUM(recovered) FROM `total` WHERE date = :date");
$getGlobalLastMonth->execute([
    "date" => $lastMonth
]);
$globalLastMonthData = $getGlobalLastMonth->fetch(PDO::FETCH_ASSOC);

$getGlobalLastThreeMonth = $db->prepare("SELECT SUM(confirmed), SUM(deaths), SUM(recovered) FROM `total` WHERE date = :date");
$getGlobalLastThreeMonth->execute([
    "date" => $lastThreeMonths
]);
$globalLastThreeMonthData = $getGlobalLastThreeMonth->fetch(PDO::FETCH_ASSOC);

$globalNew = [];

$globalNew['daily']['confirmed'] = $globalDailyData['SUM(confirmed)'] - $globalYesterdayData['SUM(confirmed)'];
$globalNew['daily']['deaths'] = $globalDailyData['SUM(deaths)'] - $globalYesterdayData['SUM(deaths)'];
$globalNew['daily']['recovered'] = $globalDailyData['SUM(recovered)'] - $globalYesterdayData['SUM(recovered)'];

$globalNew['monthly']['confirmed'] = $globalDailyData['SUM(confirmed)'] - $globalLastMonthData['SUM(confirmed)'];
$globalNew['monthly']['deaths'] = $globalDailyData['SUM(deaths)'] - $globalLastMonthData['SUM(deaths)'];
$globalNew['monthly']['recovered'] = $globalDailyData['SUM(recovered)'] - $globalLastMonthData['SUM(recovered)'];

$globalNew['threeMonths']['confirmed'] = $globalDailyData['SUM(confirmed)'] - $globalLastThreeMonthData['SUM(confirmed)'];
$globalNew['threeMonths']['deaths'] = $globalDailyData['SUM(deaths)'] - $globalLastThreeMonthData['SUM(deaths)'];
$globalNew['threeMonths']['recovered'] = $globalDailyData['SUM(recovered)'] - $globalLastThreeMonthData['SUM(recovered)'];
