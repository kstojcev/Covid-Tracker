<?php
// Requires for database-connection
require_once "./database/config.php";
// Selecting all country names from database for select menu
$stmt = $db->query("SELECT DISTINCT country, slug FROM total ORDER BY country");
$countries = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Tracker | Countries</title>
    <?php require_once "./components/links.php" ?>

</head>

<body>
    <?php require_once "./components/navbar.php" ?>
    <div class="container">
        <h2 class="mt-5">Countries data</h2>
        <hr>
        <form action="list_country.php" method="POST">
            <select class="form-control" name="country" id="countrySelect" required>
                <option value="" hidden>Select a country:</option>
                <?php foreach ($countries as $key => $value) {
                    echo "<option value='" . $value["slug"] . "'>" . $value["country"] . "</option>";
                } ?>
            </select>
            <button id="countryBtn" type="submit" class="btn mt-3 pe-4 ps-4">Get data</button>
        </form>
    </div>
    <?php require_once "./components/scripts.php" ?>
</body>

</html>