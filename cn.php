<?php

    $servername = "localhost";
    $database = "micro";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    return $conn;
?>