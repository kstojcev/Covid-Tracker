<?php
// Requires for files for data inserting
require_once './write_summary.php';
require_once './write_total.php';

// Overwriting the default PHP processing time
ini_set('max_execution_time', 0);

// Require for database-connection
require_once './config.php';

writeSummary($db);
