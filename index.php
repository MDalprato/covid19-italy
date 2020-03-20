
<!-- header -->
<?php include 'header.php'; ?>
<?php include 'stats.php'; ?>


<?php



$sqlLastDay = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `id` DESC  limit 1";
$resultLastDay = $conn->query($sqlLastDay);

$lastUpdate = "";

  if ($resultLastDay->num_rows > 0) {
    while($rowLastDay = $resultLastDay->fetch_assoc()) { 
    $lastUpdate = $rowLastDay['data']; 
    }
  }


$sql = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `data` DESC LIMIT 2";
$type = $_GET['type'];

$result = mysqli_query($conn, $sql);
  
  $ArrayDifferenze = array();
  
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


//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {

    array_push($Array_ricoverati_con_sintomi,$row["ricoverati_con_sintomi"]);
    array_push($Array_terapia_intensiva,$row["terapia_intensiva"]);
    array_push($Array_totale_ospedalizzati,$row["totale_ospedalizzati"]);
    array_push($Array_isolamento_domiciliare,$row["isolamento_domiciliare"]);
    array_push($Array_totale_attualmente_positivi,$row["totale_attualmente_positivi"]);
    array_push($Array_nuovi_attualmente_positivi,$row["nuovi_attualmente_positivi"]);
    array_push($Array_dimessi_guariti,$row["dimessi_guariti"]);
    array_push($Array_deceduti,$row["deceduti"]);
    array_push($Array_totale_casi,$row["totale_casi"]);
    array_push($Array_tamponi,$row["tamponi"]);

   

  }

  $diff_ricoverati_con_sintomi = $Array_ricoverati_con_sintomi[0] -  $Array_ricoverati_con_sintomi[1] ;
  $diff_terapia_intensiva = $Array_terapia_intensiva[0] -  $Array_terapia_intensiva[1] ;
  $diff_totale_ospedalizzati = $Array_totale_ospedalizzati[0] -  $Array_totale_ospedalizzati[1] ;
  $diff_isolamento_domiciliare = $Array_isolamento_domiciliare[0] -  $Array_isolamento_domiciliare[1] ;
  $diff_totale_attualmente_positivi= $Array_totale_attualmente_positivi[0] -  $Array_totale_attualmente_positivi[1] ;
  $diff_nuovi_attualmente_positivi = $Array_nuovi_attualmente_positivi[0] -  $Array_nuovi_attualmente_positivi[1] ;
  $diff_dimessi_guariti = $Array_dimessi_guariti[0] -  $Array_dimessi_guariti[1] ;
  $diff_deceduti = $Array_deceduti[0] -  $Array_deceduti[1] ;
  $diff_totale_casi = $Array_totale_casi[0] -  $Array_totale_casi[1] ;
  $diff_tamponi = $Array_tamponi[0] -  $Array_tamponi[1] ;


  if($diff_ricoverati_con_sintomi > 0){ 
    $diff_ricoverati_con_sintomi = "+" . $diff_ricoverati_con_sintomi . " rispetto a ieri";
  }
    else{
    $diff_ricoverati_con_sintomi =  $diff_ricoverati_con_sintomi. " rispetto a ieri";
  }

  if($diff_terapia_intensiva > 0){ 
    $diff_terapia_intensiva = "+" . $diff_terapia_intensiva. " rispetto a ieri";
  }
    else{
    $diff_terapia_intensiva =  $diff_terapia_intensiva. " rispetto a ieri";
  }

  if($diff_totale_ospedalizzati > 0){ 
    $diff_totale_ospedalizzati = "+" . $diff_totale_ospedalizzati. " rispetto a ieri";
  }
    else{
    $diff_totale_ospedalizzati =  $diff_totale_ospedalizzati. " rispetto a ieri";
  }

  if($diff_isolamento_domiciliare > 0){ 
    $diff_isolamento_domiciliare = "+" . $diff_isolamento_domiciliare. " rispetto a ieri";
  }
    else{
    $diff_isolamento_domiciliare =  $diff_isolamento_domiciliare. " rispetto a ieri";
  }

  if($diff_totale_attualmente_positivi > 0){ 
    $diff_totale_attualmente_positivi = "+" . $diff_totale_attualmente_positivi. " rispetto a ieri";
  }
    else{
    $diff_totale_attualmente_positivi =  $diff_totale_attualmente_positivi. " rispetto a ieri";
  }

  if($diff_nuovi_attualmente_positivi > 0){ 
    $diff_nuovi_attualmente_positivi = "+" . $diff_nuovi_attualmente_positivi. " rispetto a ieri";
  }
    else{
    $diff_nuovi_attualmente_positivi =  $diff_nuovi_attualmente_positivi. " rispetto a ieri";
  }

  if($diff_dimessi_guariti > 0){ 
    $diff_dimessi_guariti = "+" . $diff_dimessi_guariti. " rispetto a ieri";
  }
    else{
    $diff_dimessi_guariti =  $diff_dimessi_guariti. " rispetto a ieri";
  }

  if($diff_deceduti > 0){ 
    $diff_deceduti = "+" . $diff_deceduti. " rispetto a ieri";
  }
    else{
    $diff_deceduti =  $diff_deceduti. " rispetto a ieri";
  }

  if($diff_totale_casi > 0){ 
    $diff_totale_casi = "+" . $diff_totale_casi. " rispetto a ieri";
  }
    else{
    $diff_totale_casi =  $diff_totale_casi. " rispetto a ieri";
  }

  if($diff_tamponi > 0){ 
    $diff_tamponi = "+" . $diff_tamponi. " rispetto a ieri";
  }
    else{
    $diff_tamponi =  $diff_tamponi. " rispetto a ieri";
  }

  
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


    <?php

  // ultimi valori
    $sql = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY ID DESC LIMIT 1" ;
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
<p>
<!--

Alla data <?php echo $lastUpdate;?> sono presenti in Italia un totale di <?php echo $Array_totale_casi[0];?> di cui:

 <ul>
 <li> <?php echo $Array_deceduti[0];?> persone che ci hanno lasciato.</li>
  <li> <?php echo $Array_tamponi[0];?> tamponi.</li>
  <li> <?php echo $Array_ricoverati_con_sintomi[0];?> persone ricoverate con sintomi.</li>
  <li> <?php echo $Array_totale_ospedalizzati[0];?> persone ospedalizzate. </li>
  <li> <?php echo $Array_terapia_intensiva[0];?> persone in terapia intensiva. </li>
  <li> <?php echo $Array_isolamento_domiciliare[0];?> persone in isolamento domiciliare. </li>
  <li> <?php echo $Array_totale_attualmente_positivi[0];?> persone attualmente positive al Covid-19. </li>
  <li> <?php echo $Array_nuovi_attualmente_positivi[0];?> nuovi casi di persone positive Covid-19. </li>
  <li> <?php echo $Array_dimessi_guariti[0];?> persone guarite dal Covid-19. </li>
</ul>

-->


I dati fanno riferimento al giorno: <?php echo $lastUpdate;?> <br>
Il sito si basa esclusivamente sui dati del  <a href="https://github.com/pcm-dpc/COVID-19">Sito del Dipartimento 
della Protezione Civile - Emergenza Coronavirus: la risposta nazionale</a> pertanto è basato du dati attendibili.

#iorestoacasa


</p>
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
              <h3>Deceduti</h3>
                <h2><?php  echo $row['deceduti']; ?></h2>
                <p><?php  echo $diff_deceduti; ?></p>

              </div>
            </div>
          </div>


          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
              <h3>Casi totali</h3>
              <h2><?php  echo $row['totale_casi']; ?></h2>
              <p><?php  echo $diff_totale_casi; ?></p>

              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Ricoverati</h3>
                <h2><?php  echo $row['ricoverati_con_sintomi']; ?></h2>
                <p><?php  echo $diff_ricoverati_con_sintomi; ?></p>

              </div>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3>T. intensiva</h3>
              <h2><?php  echo $row['terapia_intensiva']; ?></h2>
              <p><?php  echo $diff_terapia_intensiva; ?></p>

              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>Nuovi positivi</h3>
                <p>
                <h2><?php  echo $row['nuovi_attualmente_positivi']; ?></h2>
                <p><?php  echo $diff_nuovi_attualmente_positivi; ?></p>

              </div>
            </div>
          </div>
      


          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3>In isolamento</h3>
              <h2><?php  echo $row['isolamento_domiciliare']; ?></h2>
              <p><?php  echo $diff_isolamento_domiciliare; ?></p>

              </div>
            </div>
          </div>


          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
              <h3>Dimessi</h3>
              <h2><?php  echo $row['dimessi_guariti']; ?></h2>
              <p><?php  echo $diff_dimessi_guariti; ?></p>

              </div>
              </div>
          </div>


          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3>Tamponi</h3>
              <h2><?php  echo $row['tamponi']; ?></h2>
              <p><?php  echo $diff_tamponi; ?></p>

              </div>
            </div>
          </div>


          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
              <h3>Ospedalizzati</h3>
              <h2><?php  echo $row['totale_ospedalizzati']; ?></h2>
              <p><?php  echo $diff_totale_ospedalizzati; ?></p>

              </div>
            </div>
          </div>




          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>Totale positivi</h3>
              <h2><?php  echo $row['totale_attualmente_positivi']; ?></h2>
              <p><?php  echo $diff_totale_attualmente_positivi; ?></p>

              </div>
            </div>
          </div>


        

          <!-- ./col -->
        </div>
        <!-- /.row -->

        <?php
          }
      } else {
          echo "0 results";
      }
      ?>




        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

            
            <div class="card">
           
              <div class="card-body">
                <div class="tab-content p-0">

                
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 500px;">
                      <canvas id="line-chart-andamento-nazionale" height="300" style="height: 500px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 500px;">
                    <canvas id="sales-chart-canvas" height="500" style="height: 500px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>


          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
            
              <div class="card-body">
                <div class="tab-content p-0">

                
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                      <canvas id="line-chart-deceduti" height="300" style="height: 300px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
             
              <div class="card-body">
                <div class="tab-content p-0">

                
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                      <canvas id="line-chart-isolamento_domiciliare" height="300" style="height: 300px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

       



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

