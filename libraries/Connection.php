<?php

    date_default_timezone_set("Asia/Jakarta");

    include 'Database.php';

    $db = new Database("Localhost", "root", "", "db_smart_task");
    $conn = $db->connect();

?>