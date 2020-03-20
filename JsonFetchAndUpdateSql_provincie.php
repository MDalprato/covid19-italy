<?php

// Update  dpc-covid19-ita-province.json

include 'connection.php';

$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-province.json');


$arr = json_decode($json, true);

echo $arr;

$sqlDelete = "TRUNCATE TABLE `dpc-covid19-ita-province`";

if ($conn->query($sqlDelete) === TRUE) {
            
    echo "Database `dpc-covid19-ita-province` Cleaned";



foreach($arr as $item) { 

    /*
       "data": "2020-02-24 18:00:00",
        "stato": "ITA",
        "codice_regione": 13,
        "denominazione_regione": "Abruzzo",
        "codice_provincia": 69,
        "denominazione_provincia": "Chieti",
        "sigla_provincia": "CH",
        "lat": 42.35103167,
        "long": 14.16754574,
        "totale_casi": 0
    */
    
    //Ottengo valori dal JSON
 
    $data                           = html_entity_decode($item['data'], ENT_QUOTES, "UTF-8");
    $stato                          = html_entity_decode($item['stato'], ENT_QUOTES, "UTF-8");
    $codice_regione                 = html_entity_decode($item['codice_regione'], ENT_QUOTES, "UTF-8");
    $denominazione_regione          = html_entity_decode($item['denominazione_regione'], ENT_QUOTES, "UTF-8");
    $codice_provincia               = html_entity_decode($item['codice_provincia'], ENT_QUOTES, "UTF-8");
    $denominazione_provincia        = html_entity_decode($item['denominazione_provincia'], ENT_QUOTES, "UTF-8");
    $sigla_provincia                = html_entity_decode($item['sigla_provincia'], ENT_QUOTES, "UTF-8");
    $lat                            = html_entity_decode($item['lat'], ENT_QUOTES, "UTF-8");
    $longit                         = html_entity_decode($item['long'], ENT_QUOTES, "UTF-8");
    $totale_casi                    = html_entity_decode($item['totale_casi'], ENT_QUOTES, "UTF-8");

    // pulizia variabili

    $data                           = str_replace("'", '-', $data);
    $stato                          = str_replace("'", '-', $stato);
    $codice_regione                 = str_replace("'", '-', $codice_regione);
    $denominazione_regione          = str_replace("'", '-', $denominazione_regione);
    $codice_provincia               = str_replace("'", '-', $codice_provincia);
    $denominazione_provincia        = str_replace("'", '-', $denominazione_provincia);
    $sigla_provincia                = str_replace("'", '-', $sigla_provincia);
    $lat                            = str_replace("'", '-', $lat);
    $longit                         = str_replace("'", '-', $longit);
    $totale_casi                    = str_replace("'", '-', $totale_casi);



  
    $format = 'Y-m-d H:i:s';
    $date = DateTime::createFromFormat($format, $data);
    $data = $date->format('Y-m-d');

    // creo sql

    $sql = "INSERT INTO `dpc-covid19-ita-province`(
    `data`, 
    `stato`, 
    `codice_regione`,
    `denominazione_regione`, 
    `codice_provincia`, 
    `denominazione_provincia`, 
    `sigla_provincia`, 
    `lat`, 
    `longit`, 
    `totale_casi` ) VALUES (
    '".$data."', 
    '".$stato."', 
    '".$codice_regione."', 
    '".$denominazione_regione."', 
    '".$codice_provincia."', 
    '".$denominazione_provincia."', 
    '".$sigla_provincia."', 
    '".$lat."', 
    '".$longit."', 
    '".$totale_casi."') ";

    // eseguo SQL
    
    if ($conn->query($sql) === TRUE) {
            
     
        echo $sql;
        echo "<br>";
    }
    else 
    {
            echo "Error: " . $sql . "<br> Error:" . $conn->error;
    }

    echo "<br>";
    echo "<br>";

}

} else {
    echo "Error:" . $conn->error;
}


$conn->close();

?>

