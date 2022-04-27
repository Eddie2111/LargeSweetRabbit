<?php

# database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "hoteltest";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    echo "Check dbconnect.php";
}


?>