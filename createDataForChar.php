<?php

include 'connection.php';

if(isset($_GET['type'])) { // filtro parametro in ingresso
 
  if ($_GET['type'] == "regioni-ultimo-giorno") {


    $sqlLastDay = "SELECT * FROM `dpc-covid19-ita-regioni` ORDER BY `id` DESC  limit 1";
    $resultLastDay = $conn->query($sqlLastDay);

    $lastUpdate = "";

      if ($resultLastDay->num_rows > 0) {
        while($rowLastDay = $resultLastDay->fetch_assoc()) { 
        $lastUpdate = $rowLastDay['data']; 
        }
      }

      
 
    $title = "Risultati regionali";
    $sql = "SELECT * FROM `dpc-covid19-ita-regioni` WHERE `data` like '" .$lastUpdate. "'  ORDER BY `totale_casi` DESC";
    $type = $_GET['type'];



  }


  if ($_GET['type'] == "provincie-ultimo-giorno") {
  

    $sqlLastDay = "SELECT * FROM `dpc-covid19-ita-province` ORDER BY `totale_casi` DESC  limit 1";
    $resultLastDay = $conn->query($sqlLastDay);

    $lastUpdate = "";

      if ($resultLastDay->num_rows > 0) {
        while($rowLastDay = $resultLastDay->fetch_assoc()) { 
        $lastUpdate = $rowLastDay['data']; 
        }
      }


 
    $title = "Risultati regionali";
    $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `data` like '" .$lastUpdate. "'  ORDER BY `totale_casi` DESC";
    $type = $_GET['type'];

    if($_GET['Idregione'] > 0 ) {

      $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `data` like '" .$lastUpdate. "' AND `codice_regione` = ". $_GET['Idregione'] ."  ORDER BY `totale_casi` DESC";

    }

  }




  
  if ($_GET['type'] == "regioni") {
    $title = "Risultati regionali";
    $sql = "SELECT * FROM `dpc-covid19-ita-regioni` ORDER BY `data` ASC";
    $type = $_GET['type'];

  }

  if ($_GET['type'] == "provincie") {
    $title = "Risultati provinciali";
    $sql = "SELECT * FROM `dpc-covid19-ita-province` ORDER BY `data` ASC";
    $type = $_GET['type'];

  }
  
  if ($_GET['type'] == "andamento-nazionale") {
    $title = "Risultati andamento nazionale";
    $sql = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `data` ASC";
    $type = $_GET['type'];

  }



 // echo "<br><br>";

  }

$result = mysqli_query($conn, $sql);

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
    $dbdata[]=$row;
    
  }
  

//Print array in JSON format
echo json_encode($dbdata);

?>