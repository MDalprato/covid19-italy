<?php

// Update  dpc-covid19-ita-andamento-nazionale.json

include 'connection.php';

$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale.json');
echo $json;
$arr = json_decode($json, true);

echo $arr;

$sqlDelete = "TRUNCATE TABLE `dpc-covid19-ita-andamento-nazionale`";

if ($conn->query($sqlDelete) === TRUE) {
            
    echo "Database `dpc-covid19-ita-andamento-nazionale` Cleaned";

foreach($arr as $item) { 

    //Ottengo valori dal JSON
 
    $data                           = html_entity_decode($item['data'], ENT_QUOTES, "UTF-8");
    $stato                          = html_entity_decode($item['stato'], ENT_QUOTES, "UTF-8");
    $ricoverati_con_sintomi         = html_entity_decode($item['ricoverati_con_sintomi'], ENT_QUOTES, "UTF-8");
    $terapia_intensiva              = html_entity_decode($item['terapia_intensiva'], ENT_QUOTES, "UTF-8");
    $totale_ospedalizzati           = html_entity_decode($item['totale_ospedalizzati'], ENT_QUOTES, "UTF-8");
    $isolamento_domiciliare         = html_entity_decode($item['isolamento_domiciliare'], ENT_QUOTES, "UTF-8");
    $totale_positivi                = html_entity_decode($item['totale_positivi'], ENT_QUOTES, "UTF-8");
    $nuovi_positivi                 = html_entity_decode($item['nuovi_positivi'], ENT_QUOTES, "UTF-8");
    $variazione_totale_positivi     = html_entity_decode($item['variazione_totale_positivi'], ENT_QUOTES, "UTF-8");
    $dimessi_guariti                = html_entity_decode($item['dimessi_guariti'], ENT_QUOTES, "UTF-8");
    $deceduti                       = html_entity_decode($item['deceduti'], ENT_QUOTES, "UTF-8");
    $totale_casi                    = html_entity_decode($item['totale_casi'], ENT_QUOTES, "UTF-8");
    $tamponi                        = html_entity_decode($item['tamponi'], ENT_QUOTES, "UTF-8");

    // pulizia variabili

    $data                           = str_replace("'", '-', $data);
    $stato                          = str_replace("'", '-', $stato);
    $ricoverati_con_sintomi         = str_replace("'", '-', $ricoverati_con_sintomi);
    $terapia_intensiva              = str_replace("'", '-', $terapia_intensiva);
    $totale_ospedalizzati           = str_replace("'", '-', $totale_ospedalizzati);
    $isolamento_domiciliare         = str_replace("'", '-', $isolamento_domiciliare);
    $totale_positivi                = str_replace("'", '-', $totale_positivi);
    $nuovi_positivi                 = str_replace("'", '-', $nuovi_positivi);
    $variazione_totale_positivi     = str_replace("'", '-', $variazione_totale_positivi);
    $dimessi_guariti                = str_replace("'", '-', $dimessi_guariti);
    $deceduti                       = str_replace("'", '-', $deceduti);
    $totale_casi                    = str_replace("'", '-', $totale_casi);
    $tamponi                        = str_replace("'", '-', $tamponi);

    // creo sql

    /*

        {
        "data": "2020-02-24T18:00:00",
        "stato": "ITA",
        "ricoverati_con_sintomi": 101,
        "terapia_intensiva": 26,
        "totale_ospedalizzati": 127,
        "isolamento_domiciliare": 94,
        "totale_positivi": 221,
        "variazione_totale_positivi": 0,
        "nuovi_positivi": 221,
        "dimessi_guariti": 1,
        "deceduti": 7,
        "totale_casi": 229,
        "tamponi": 4324,
        "note_it": "",
        "note_en": ""
    },
    {
    
    */

    $sql = "INSERT INTO `dpc-covid19-ita-andamento-nazionale`(
    `data`, 
    `stato`, 
    `ricoverati_con_sintomi`,
    `terapia_intensiva`, 
    `totale_ospedalizzati`,
    `isolamento_domiciliare`,
    `totale_positivi`, 
    `variazione_totale_positivi`, 
    `nuovi_positivi`, 
    `dimessi_guariti`, 
    `deceduti`, 
    `totale_casi`,
    `tamponi`) VALUES (
    '".$data."', 
    '".$stato."', 
    '".$ricoverati_con_sintomi."', 
    '".$terapia_intensiva."', 
    '".$totale_ospedalizzati."', 
    '".$isolamento_domiciliare."', 
    '".$totale_positivi."', 
    '".$variazione_totale_positivi."', 
    '".$nuovi_positivi."', 
    '".$dimessi_guariti."', 
    '".$deceduti."', 
    '".$totale_casi."', 
    '".$tamponi."') ";

    // eseguo SQL

    if ($conn->query($sql) === TRUE) {
        
        echo $sql;
        echo "<br>";
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

