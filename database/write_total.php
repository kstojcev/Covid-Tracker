<?php

function writeTotal($conn, $slug)
{

    $today = date("Y-m-d");
    $yesterday = date("Y-m-d", strtotime($today . "-1 day"));

    // Get the dayone for all dates on country from the API.
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.covid19api.com/total/country/' . $slug . '?from=2021-01-01&to=' . $yesterday);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $dayone = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    // Json decode them.
    $dayone = json_decode($dayone, true);

    try {
        // Create pdo insert query. 
        $sql = "INSERT INTO 
        total (id, slug, country, confirmed, deaths,
        recovered, active, date) 
     
        VALUES (:id, :slug, :country,
        :confirmed, :deaths, :recovered,
        :active, :date)
        
        ON DUPLICATE KEY UPDATE confirmed=:confirmed, deaths=:deaths
        , recovered=:recovered, active=:active, date=:date";

        $stmt = $conn->prepare($sql);

        // Foreach all of the days and add them to the database.
        foreach ($dayone as $day) {
            $dateAndTime = explode("T", $day["Date"]);
            $date = $dateAndTime[0];

            $values = [
                'id' => $slug . $date,
                'slug' => $slug,
                'country' => $day["Country"],
                'confirmed' => $day["Confirmed"],
                'deaths' => $day["Deaths"],
                'recovered' => $day["Recovered"],
                'active' => $day["Active"],
                'date' => $date,
            ];
            $stmt->execute($values);
        }

        echo "<br>Writing all days for " . $slug . " in database...";
        echo "OK <br>";
    } catch (Exception $e) {
        echo $e;
        die();
    }
}
