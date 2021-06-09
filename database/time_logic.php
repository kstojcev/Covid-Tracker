<?php

$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime($today . "-2 days"));
$ereyesterday = date("Y-m-d", strtotime($today . "-3 days"));
$lastMonth = date("Y-m-d", strtotime($today . "-1 month"));
$lastThreeMonths = date("Y-m-d", strtotime($today . "-3 month"));

//This was the original logic:
//$yesterday = date("Y-m-d", strtotime($today . "-1 days"));
//$ereyesterday = date("Y-m-d", strtotime($today . "-2 days"));

//But the logic will always fail at a certain time of the day.
//Because the API doesn't get updated immediately for the new day.
//So just for always displaying information the logic was changed.

//the back-end time-logic for updating the database will still look for cases from yesterday and will use this logic:
    //File: write-total.php
    //$yesterday = -1 day