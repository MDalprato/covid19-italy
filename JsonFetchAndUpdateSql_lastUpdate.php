<?php

// Update  dpc-covid19-ita-province.json

include 'connection.php';

use \Datetime;

$today = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
$sql = "INSERT INTO `dpc-covid19-updates`(`dpc-covid19-ita-update`) VALUES ('".$today."')";

echo $sql;

if ($conn->query($sql) === TRUE) {
            
    echo "All DB updated";

} 



$conn->close();

?>

