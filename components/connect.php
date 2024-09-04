<?php

    $servername = "localhost";
    $usern = "root";
    $password = "";  // Add your password here if there is one
    $dbname = "shop_db";
    $port = "4306";  // Replace with your current MySQL port number

    // Create connection
    $conn = mysqli_connect($servername, $usern, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>