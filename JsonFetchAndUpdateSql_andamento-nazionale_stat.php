<?php

// Update  dpc-covid19-ita-andamento-nazionale.json

include 'connection.php';

$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale.json');
$arr = json_decode($json, true);


$sqlDelete = "TRUNCATE TABLE `dpc-covid19-ita-andamento-nazionale-statistiche`";

if ($conn->query($sqlDelete) === TRUE) {
            
$Array_id = array();

  $Array_ricoverati_con_sintomi = array();
  $Array_terapia_intensiva = array();
  $Array_totale_ospedalizzati = array();
  $Array_isolamento_domiciliare = array();
  $Array_totale_attualmente_positivi = array();
  $Array_nuovi_attualmente_positivi= array();
  $Array_dimessi_guariti = array();
  $Array_deceduti = array();
  $Array_totale_casi = array();
  $Array_tamponi = array();


  $Array_trade_ricoverati_con_sintomi = array(); // traind ricoverati

  $id = 0 ;

foreach($arr as $item) { 

    //Ottengo valori dal JSON
    
    $data                           = html_entity_decode($item['data'], ENT_QUOTES, "UTF-8");
    $stato                          = html_entity_decode($item['stato'], ENT_QUOTES, "UTF-8");
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


    $format = 'Y-m-d H:i:s';
    $date = DateTime::createFromFormat($format, $data);
    $data = $date->format('Y-m-d');

    array_push($Array_ricoverati_con_sintomi,$ricoverati_con_sintomi);
    array_push($Array_terapia_intensiva,$terapia_intensiva);
    array_push($Array_totale_ospedalizzati,$totale_ospedalizzati);
    array_push($Array_isolamento_domiciliare,$isolamento_domiciliare);
    array_push($Array_totale_attualmente_positivi,$totale_attualmente_positivi);
    array_push($Array_nuovi_attualmente_positivi,$nuovi_attualmente_positivi);
    array_push($Array_dimessi_guariti,$dimessi_guariti);
    array_push($Array_deceduti,$deceduti);
    array_push($Array_totale_casi,$totale_casi);
    array_push($Array_tamponi,$tamponi);

    array_push($Array_id,$id);



    $id++;

}

$lastAvailableIndex = 0;




for ($i = 0; $i <= 30; $i++) {
    
    $idx_ricoverati_con_sintomi = (($Array_ricoverati_con_sintomi[$i]- $Array_ricoverati_con_sintomi[$i-1])/$Array_ricoverati_con_sintomi[$i-1]);
 
    if(is_infinite($idx_ricoverati_con_sintomi)){
        $idx_ricoverati_con_sintomi = 0;
        
    }


    $theroical_ricoverati_con_sintomi = (($Array_ricoverati_con_sintomi[$i] * $idx_ricoverati_con_sintomi) +$Array_ricoverati_con_sintomi[$i]);

    // devo digli che se non esiste deve inventarselo



    $lastAvailableIndex = $i - 1;

    if($idx_ricoverati_con_sintomi < 0){ //sezione valori da inventare


        // prima devo poter ottenere Vpresente
        // Vpresente = (Vpassato * idx (x-1))+ Vpassato)

        $Vpassato = $Array_ricoverati_con_sintomi[$lastAvailableIndex];


        
        


        echo "<br>";
        echo "<br>";

        echo "---fine valori certi - " . $lastAvailableIndex ;
        echo "<br>";
        echo "<br>";




        $lastAvailableIndex++;

        
    }

    array_push($Array_trade_ricoverati_con_sintomi,$terapia_intensiva);


    echo "$I =". $i. " - " . $theroical_ricoverati_con_sintomi." = ((".$Array_ricoverati_con_sintomi[$i]." * ".$idx_ricoverati_con_sintomi.") + ". $Array_ricoverati_con_sintomi[$i].");";
 
 
    echo "<br>";

}


/*
$idLoop = 0;

foreach ($Array_id as $item){

    $idx_ricoverati_con_sintomi = (($Array_ricoverati_con_sintomi[$idLoop]- $Array_ricoverati_con_sintomi[$idLoop-1])/$Array_ricoverati_con_sintomi[$idLoop-1]);
 

    if(is_infinite($idx_ricoverati_con_sintomi)){
        $idx_ricoverati_con_sintomi = 0;
        
    }

    $idLoop++;

    echo $idx_ricoverati_con_sintomi;

}

*/




} else {
    echo "Error:" . $conn->error;
}


$conn->close();

?>

