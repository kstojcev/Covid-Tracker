<?php
//Connection to database
try {
    $db = new PDO("mysql:host=localhost;dbname=covid-tracker-custom", "root", "");
} catch (PDOException $e) {
    echo $e;
    die();
}
