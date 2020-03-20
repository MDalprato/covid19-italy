<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "codiv19";

//echo "<h1>TEST LOCALE ----- DO NOT PULISH </h1>";

/*

$servername = "89.46.111.57";
$username = "Sql1169921";
$password = "403061exra";
$dbname = "Sql1169921_2";

*/


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>