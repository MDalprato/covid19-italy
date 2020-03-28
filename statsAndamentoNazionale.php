
<?php
include 'header.php';

// Update  dpc-covid19-ita-andamento-nazionale.json


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
$Array_date = array();

$Array_idx_trade_ricoverati_con_sintomi = array(); // traind indeixe

$Array_trade_ricoverati_con_sintomi = array(); // traind ricoverati

$id = 0 ;


  $sql = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `id` ASC";
  $type = $_GET['type'];

  $result = $conn->query($sql);

            

 
  
  if ($result->num_rows > 0) {
    // output data of each row

  while($row = $result->fetch_assoc()) { 

  
      //Ottengo valori dal JSON
    
      $data                           = $row['data'];
      $ricoverati_con_sintomi         =  $row['ricoverati_con_sintomi'];
      $terapia_intensiva              =  $row['terapia_intensiva'];
      $totale_ospedalizzati           =  $row['totale_ospedalizzati'];
      $isolamento_domiciliare         =  $row['isolamento_domiciliare'];
      $totale_attualmente_positivi    =  $row['totale_attualmente_positivi'];
      $nuovi_attualmente_positivi     =  $row['nuovi_attualmente_positivi'];
      $dimessi_guariti                =  $row['dimessi_guariti'];
      $deceduti                       =  $row['deceduti'];
      $totale_casi                    =  $row['totale_casi'];
      $tamponi                        =  $row['tamponi'];

  
      // pulizia variabili
  
      $data                           = str_replace("'", '-', $data);
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
      array_push($Array_date,$data);
  
      array_push($Array_id,$id);
  
  
  
      $id++;

      
  }


  
}


echo "ciao";


class Predict {
    private $nums = array();
    private $rawPattern = array();

    function __construct($nums) {
        $this->nums = $nums;
        $this->createPattern();
    }

    private function patternPart($num) {
        if($num >= 0) {
            $patternPart = "{$num},";
        } else {
            $patternPart = "{$num},";
        }

        return $patternPart;
    }

    private function createPattern() {
        foreach($this->nums as $key => $num) {
            if($key > 0) {
                $prev = $this->nums[$key - 1];
                $diff = $num - $prev;

                $this->rawPattern[] = $this->patternPart($diff);
            }
        }
    }

    function getPattern($del = ' ') {
        $first = reset($this->rawPattern);

        // When all values are same just print the first one
        if(count(array_unique($this->rawPattern)) === 1 && end($this->rawPattern) === $first) {
            return $first;
        } else {
            $resultPattern = array();
            $patternToAppend = array();
            $doCheckIndex = 0;

            foreach($this->rawPattern as $key => $part) {
                if($key == 0) {
                    $resultPattern[] = $part;
                } else {
                    $checkNum = $this->rawPattern[$doCheckIndex];

                    if($checkNum == $part) {
                        $patternToAppend[] = $part;
                        $doCheckIndex++;
                    } else {
                        $patternToAppend[] = $part;
                        $doCheckIndex = 0;

                        if(!empty($patternToAppend)) {
                            $resultPattern = array_merge($resultPattern, $patternToAppend);
                            $patternToAppend = array();
                        }
                    }
                }
            }

            return implode($del, $resultPattern);
        }
    }
}




$Array_ricoverati_con_sintomi = new Predict($Array_ricoverati_con_sintomi);
$Array_terapia_intensiva = new Predict($Array_terapia_intensiva);
$Array_totale_ospedalizzati = new Predict($Array_totale_ospedalizzati);
$Array_isolamento_domiciliare = new Predict($Array_isolamento_domiciliare);
$Array_totale_attualmente_positivi = new Predict($Array_totale_attualmente_positivi);
$Array_nuovi_attualmente_positivi = new Predict($Array_nuovi_attualmente_positivi);
$Array_dimessi_guariti = new Predict($Array_dimessi_guariti);
$Array_deceduti = new Predict($Array_deceduti);
$Array_totale_casi = new Predict($Array_totale_casi);
$Array_tamponi = new Predict($Array_tamponi);




//echo $nums1->getPattern(); // prints +3

$Array_ricoverati_con_sintomi = "[" . $Array_ricoverati_con_sintomi->getPattern() . "]";
$Array_terapia_intensiva = "[" . $Array_terapia_intensiva->getPattern() . "]";
$Array_totale_ospedalizzati = "[" . $Array_totale_ospedalizzati->getPattern() . "]";
$Array_isolamento_domiciliare = "[" . $Array_isolamento_domiciliare->getPattern() . "]";
$Array_totale_attualmente_positivi = "[" . $Array_totale_attualmente_positivi->getPattern() . "]";
$Array_nuovi_attualmente_positivi = "[" . $Array_nuovi_attualmente_positivi->getPattern() . "]";
$Array_dimessi_guariti = "[" . $Array_dimessi_guariti->getPattern() . "]";
$Array_deceduti = "[" . $Array_deceduti->getPattern() . "]";
$Array_totale_casi = "[" . $Array_totale_casi->getPattern() . "]";
$Array_tamponi = "[" . $Array_tamponi->getPattern() . "]";

$Array_date = "[" . "'" . implode("','", $Array_date) . "'" . "]";



?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Codiv-19 Italia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
		<p>
		
		Grafici con gli andamenti (positivi o negativi) rispetto al giorno precedente. (Beta)
		</p>
		
		   <!-- Main row -->
		   <div class="row">

		   	<section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

            
            <div class="card">
           
              <div class="card-body">
                <div class="tab-content p-0">

                
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 900px;">
                      <canvas id="myChart" height="300" style="height: 900px;"></canvas>                         
                   </div>
               
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

<script>

var ChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    title: {
      display: true,
      text: 'Grafico statistiche situazione nazionale'
      },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#A9A9A9',
        },
        gridLines : {
          display : false,
          color: '#A9A9A9',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#A9A9A9',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }



  var ChartData = {

labels  : <?php echo $Array_date; ?>,
datasets: [

  {
    label               : 'Nuovi positivi',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#20B2AA',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#20B2AA',
    pointBackgroundColor: '#20B2AA',
    data                : <?php echo $Array_nuovi_attualmente_positivi ?>,
   
  },
  {
    label               : 'Ricoverati',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#8A2BE2',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#8A2BE2',
    pointBackgroundColor: '#8A2BE2',
    data                : <?php echo $Array_ricoverati_con_sintomi ?>,
   
  },

  {
    label               : 'Terapia intensiva',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#A52A2A',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#A52A2A',
    pointBackgroundColor: '#A52A2A',
    data                : <?php echo $Array_terapia_intensiva ?>,
  },

  {
    label               : 'Totale ospedalizzati',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#5F9EA0',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#5F9EA0',
    pointBackgroundColor: '#5F9EA0',
    data                : <?php echo $Array_totale_ospedalizzati ?>,
  }, 
  {
    label               : 'In isolamento domiciliare',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#D2691E',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#D2691E',
    pointBackgroundColor: '#D2691E',
    data                : <?php echo $Array_isolamento_domiciliare ?>,
  },
  {
    label               : 'Totale attualmente positivi',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#008B8B',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#008B8B',
    pointBackgroundColor: '#008B8B',
    data                : <?php echo $Array_totale_attualmente_positivi ?>,
  },
  {
    label               : 'Dimessi guariti',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#008000',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#008000',
    pointBackgroundColor: '#008000',
    data                : <?php echo $Array_dimessi_guariti ?>,
  },
  {
    label               : 'Deceduti',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#696969',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          :  '#696969',
    pointBackgroundColor:  '#696969',
    data                : <?php echo $Array_deceduti ?>,
  },
  {
    label               : 'Totale casi',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#4B0082',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#4B0082',
    pointBackgroundColor: '#4B0082',
    data                : <?php echo $Array_totale_casi ?>,
    
  },{
    label               : 'Tamponi',
    fill                : false,
    borderWidth         : 1,
    lineTension         : 0,
    spanGaps : true,
    borderColor         : '#8B4513',
    pointRadius         : 2,
    pointHoverRadius    : 7,
    pointColor          : '#8B4513',
    pointBackgroundColor: '#8B4513',
    hidden: true,
    data                : <?php echo $Array_tamponi ?>,
    
  }
]
}




              var ctx = document.getElementById("myChart");
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: ChartData,
                  options: ChartOptions

              });

        </script>
    </body>
</html>
 



</section>
     
     </div>



     <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>



<script src="dist/js/index.js"></script>

<!-- Footer -->
<?php
include 'footer.php'; ?>

