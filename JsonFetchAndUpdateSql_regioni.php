<?php

// Update  dpc-covid19-ita-regioni.json

include 'connection.php';


$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni.json');

$arr = json_decode($json, true);

echo $arr;

$sqlDelete = "TRUNCATE TABLE `dpc-covid19-ita-regioni`";

if ($conn->query($sqlDelete) === TRUE) {
            
    echo "Database `dpc-covid19-ita-andamento-nazionale` Cleaned";
    echo "<br>";    



foreach($arr as $item) { 
    
    //Ottengo valori dal JSON
    $data                           = html_entity_decode($item['data'], ENT_QUOTES, "UTF-8");
    $stato                          = html_entity_decode($item['stato'], ENT_QUOTES, "UTF-8");
    $codice_regione                 = html_entity_decode($item['codice_regione'], ENT_QUOTES, "UTF-8");
    $denominazione_regione          = html_entity_decode($item['denominazione_regione'], ENT_QUOTES, "UTF-8");
    $lat                            = html_entity_decode($item['lat'], ENT_QUOTES, "UTF-8");
    $longit                         = html_entity_decode($item['long'], ENT_QUOTES, "UTF-8");
    $ricoverati_con_sintomi         = html_entity_decode($item['ricoverati_con_sintomi'], ENT_QUOTES, "UTF-8");
    $terapia_intensiva              = html_entity_decode($item['terapia_intensiva'], ENT_QUOTES, "UTF-8");
    $totale_ospedalizzati           = html_entity_decode($item['totale_ospedalizzati'], ENT_QUOTES, "UTF-8");
    $isolamento_domiciliare         = html_entity_decode($item['isolamento_domiciliare'], ENT_QUOTES, "UTF-8");
    $totale_attualmente_positivi    = html_entity_decode($item['totale_attualmente_positivi'], ENT_QUOTES, "UTF-8");
    $nuovi_attualmente_positivi     = html_entity_decode($item['nuovi_attualmente_positivi'], ENT_QUOTES, "UTF-8");
    $dimessi_guariti                = html_entity_decode($item['dimessi_guariti'], ENT_QUOTES, "UTF-8");
    $deceduti                       = html_entity_decode($item['deceduti'], ENT_QUOTES, "UTF-8");
    $totale_casi                    = html_entity_decode($item['totale_casi'], ENT_QUOTES, "UTF-8");
    $tamponi                        = html_entity_decode($item['tamponi'], ENT_QUOTES, "UTF-8");

    // pulizia variabili

    $data                           = str_replace("'", '-', $data);
    $stato                          = str_replace("'", '-', $stato);
    $codice_regione                 = str_replace("'", '-', $codice_regione);
    $denominazione_regione          = str_replace("'", '-', $denominazione_regione);
    $lat                            = str_replace("'", '-', $lat);
    $longit                         = str_replace("'", '-', $longit);
    $ricoverati_con_sintomi         = str_replace("'", '-', $ricoverati_con_sintomi);
    $terapia_intensiva              = str_replace("'", '-', $terapia_intensiva);
    $totale_ospedalizzati           = str_replace("'", '-', $totale_ospedalizzati);
    $isolamento_domiciliare         = str_replace("'", '-', $isolamento_domiciliare);
    $totale_attualmente_positivi    = str_replace("'", '-', $totale_attualmente_positivi);
    $nuovi_attualmente_positivi     = str_replace("'", '-', $nuovi_attualmente_positivi);
    $dimessi_guariti                = str_replace("'", '-', $dimessi_guariti);
    $deceduti                       = str_replace("'", '-', $deceduti);
    $totale_casi                    = str_replace("'", '-', $totale_casi);
    $tamponi                        = str_replace("'", '-', $tamponi);
   
    echo "<br>";    




    echo "<br>";


    $sql = "INSERT INTO `dpc-covid19-ita-regioni`(
    `data`, 
    `stato`, 
    `codice_regione`,
    `denominazione_regione`, 
    `lat`, 
    `longit`, 
    `ricoverati_con_sintomi`,
    `terapia_intensiva`, 
    `totale_ospedalizzati`,
    `isolamento_domiciliare`,
    `totale_attualmente_positivi`, 
    `nuovi_attualmente_positivi`, 
    `dimessi_guariti`, 
    `deceduti`, 
    `totale_casi`,
    `tamponi`) VALUES (
    '".$data."', 
    '".$stato."', 
    '".$codice_regione."', 
    '".$denominazione_regione."', 
    '".$lat."', 
    '".$longit."', 
    '".$ricoverati_con_sintomi."', 
    '".$terapia_intensiva."', 
    '".$totale_ospedalizzati."', 
    '".$isolamento_domiciliare."', 
    '".$totale_attualmente_positivi."', 
    '".$nuovi_attualmente_positivi."', 
    '".$dimessi_guariti."', 
    '".$deceduti."', 
    '".$totale_casi."', 
    '".$tamponi."') ";

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

