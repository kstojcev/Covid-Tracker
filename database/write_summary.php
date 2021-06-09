<?php

function writeSummary($conn)
{
    // Get the summary for today from the API.
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.covid19api.com/summary');
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $summary = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    // Json decode them.
    $summary = json_decode($summary, true);


    echo "<br>Writing summary for each country in database... <br>";

    // Foreach all of the countires and add them to the database.
    foreach ($summary["Countries"] as $countrySummary) {
        sleep(1);
        writeTotal($conn, $countrySummary['Slug']);
    }
    echo "OK";
}
