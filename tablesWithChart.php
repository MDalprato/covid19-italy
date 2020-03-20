
<?php
include 'header.php'; 




// ottengo l'ultimo giorno dal php




if(isset($_GET['type'])) { // filtro parametro in ingresso
 
 

  if ($_GET['type'] == "andamento-nazionale") {


    $title = "Risultati andamento nazionale";
    $Subtitle = "Risultati andamento nazionale";

    $sql = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `id` ASC";
    $type = $_GET['type'];


    $charType= "andamento-nazionale";
    
    
    ?>

<script src="dist/js/tableWithChart.js"></script>
<script>
  
  createTable('<?php echo $charType?>', '0');

</script>


    <?php

  }

  


  if ($_GET['type'] == "regioni-ultimo-giorno") {
 


    $sqlLastDay = "SELECT * FROM `dpc-covid19-ita-regioni` ORDER BY `id` DESC  limit 1";
    $resultLastDay = $conn->query($sqlLastDay);

    $lastUpdate = "";

      if ($resultLastDay->num_rows > 0) {
        while($rowLastDay = $resultLastDay->fetch_assoc()) { 
        $lastUpdate = $rowLastDay['data']; 
        }
      }


    
    $title = "Risultati regionali al : ".$lastUpdate ;
    $sql = "SELECT * FROM `dpc-covid19-ita-regioni` WHERE `data` like '" .$lastUpdate. "'   ORDER BY `totale_casi` DESC";
    $type = "regioni";
    $type2 = "regioni-ultimo-giorno-link";
    $charType= "regioni-ultimo-giorno";
    
    
    ?>

<script src="dist/js/tableWithChart.js"></script>
<script>
  
  createTable('<?php echo $charType?>', '0');

</script>


    <?php

  }

  ?>

  <?php

  
  
  
  if ($_GET['type'] == "provincie-ultimo-giorno") {



    $sqlLastDay = "SELECT * FROM `dpc-covid19-ita-province` ORDER BY `id` DESC  limit 1";
    $resultLastDay = $conn->query($sqlLastDay);

    $lastUpdate = "";

      if ($resultLastDay->num_rows > 0) {
        while($rowLastDay = $resultLastDay->fetch_assoc()) { 
        $lastUpdate = $rowLastDay['data']; 
        }
      }

    
    $title = "Risultati provinciali al : ".$lastUpdate ;


    $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `data` like '" .$lastUpdate. "'  ORDER BY `totale_casi` DESC";
    $type = "provincie";
    $charType= "provincie-ultimo-giorno";


      if($_GET['Idregione'] > 0 ) {

        $idRegione = $_GET['Idregione'];

        $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `data` like '" .$lastUpdate. "' AND `codice_regione` = ". $idRegione ."  ORDER BY `totale_casi` DESC";

        ?>

  <script src="dist/js/tableWithChart.js"></script>
  <script>
    
    createTable('<?php echo $charType?>', '<?php echo $idRegione?>');

  </script>


        <?php
    
      }else {

        $charType= "provincie-ultimo-giorno";


?>

<script src="dist/js/tableWithChart.js"></script>
  <script>
    
    createTable('<?php echo $charType?>');

  </script>

<?php

      }


  }


  ?>




  <?php
  }

$result = $conn->query($sql);


?>


 



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $title;?></h1>
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




        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  I dati sono ordinati secondo il numero totale dei casi rilevati
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 600px;">
                      <canvas id="line-chart-andamento-nazionale-completo" height="300" style="height: 600px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 600px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 600px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="row">
        <div class="col-12">
          <div class="card">
        
            <!-- /.card-header -->
            <div class="card-body">

          
            <?php

                  if ($type == "stats") { 
                                    
                    ?>
                    <!-- tabella nazionale --> 

                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Ora</th>
                      <th>Dettagli</th>
                      <th>Origine</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                      if ($result->num_rows > 0) {
                          // output data of each row
                        while($row = $result->fetch_assoc()) { ?>
                          <tr>

                            <td><?php echo $row['timestamp']; ?></td>
                            <td><?php echo $row['string']; ?></td>
                            <td><?php echo $row['ip_src']; ?></td>

                          </tr>
                            <?php }
                            } else {
                                echo "No results";
                            }
                      ?>
                    </tfoot>
                  </table>
                    <?php }?>

                    <?php

                if ($type == "updates") { 
                  
                  ?>
                  <!-- tabella nazionale --> 

                  <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>Incrementale</th>
                    <th>Aggiornamento</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                      while($row = $result->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $row['id']; ?></td>

                          <td><?php echo $row['dpc-covid19-ita-update']; ?></td>
                         
                        </tr>
                          <?php }
                          } else {
                              echo "No results";
                          }
                    ?>
                  </tfoot>
                </table>
                  <?php }?>


                  <?php
                  
              if ($type == "andamento-nazionale") { ?>
            
               <!-- tabella nazionale --> 
            
               <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Data</th>
                  <th>Ricoverati</th>
                  <th>Terapia Intensiva</th>
                  <th>Ospedalizzati</th>
                  <th>Isolamento</th>
                  <th>Positivi</th>
                  <th>Nuovi positivi</th>
                  <th>Dimessi</th>
                  <th>Deceduti</th>
                  <th>Totale</th>
                  <th>Tamponi</th>
                </tr>
                </thead>
                <tbody>
                
                <?php
                  if ($result->num_rows > 0) {
                      // output data of each row
                    while($row = $result->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $row['data']; ?></td>
                        <td><?php echo $row['ricoverati_con_sintomi']; ?></td>
                        <td><?php echo $row['terapia_intensiva']; ?></td>
                        <td><?php echo $row['totale_ospedalizzati']; ?></td>
                        <td><?php echo $row['isolamento_domiciliare']; ?></td>
                        <td><?php echo $row['totale_attualmente_positivi']; ?></td>
                        <td><?php echo $row['nuovi_attualmente_positivi']; ?></td>
                        <td><?php echo $row['dimessi_guariti']; ?></td>
                        <td><?php echo $row['deceduti']; ?></td>
                        <td><?php echo $row['totale_casi']; ?></td>
                        <td><?php echo $row['tamponi']; ?></td>
                      </tr>
                        <?php }
                        } else {
                            echo "No results";
                        }
                  ?>
                </tfoot>
              </table>
               <?php }?>
 
             <?php

                  if ($type == "provincie") { ?>

                  <!-- tabella nazionale --> 

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Provincia</th>
                      <th>Totale</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                      if ($result->num_rows > 0) {
                          // output data of each row
                        while($row = $result->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $row['denominazione_provincia']; ?></td>
                            <td><?php echo $row['totale_casi']; ?></td>
                          </tr>
                            <?php }
                            } else {
                                echo "No results";
                            }
                      ?>
                    </tfoot>
                  </table>
                  <?php }?>





                  <?php

                  if ($type == "regioni") { ?>

                  <!-- tabella nazionale --> 

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Regione</th>
                      <th>Ricoverati</th>
                      <th>Terapia Intensiva</th>
                      <th>Ospedalizzati</th>
                      <th>Isolamento</th>
                      <th>Positivi</th>
                      <th>Nuovi positivi</th>
                      <th>Dimessi</th>
                      <th>Deceduti</th>
                      <th>Totale</th>
                      <th>Tamponi</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                      if ($result->num_rows > 0) {
                          // output data of each row
                        while($row = $result->fetch_assoc()) { ?>
                          <tr>

                            <?php

                                if ($type2 == "regioni-ultimo-giorno-link") {?>

                                    <td>
                                    <a href="tablesWithChart.php?type=provincie-ultimo-giorno&Idregione=<?php echo $row['codice_regione'];?>" >
                                    <?php echo $row['denominazione_regione']; ?>
                                    </a>

                                    </td>


                                <?php

                                }else{
                                  ?>
                                  
                                  <td>
                                    <a href="tablesWithChart.php?type=provincie&Idregione=<?php echo $row['codice_regione'];?>" >
                                    <?php echo $row['denominazione_regione']; ?>
                                    </a>

                                    </td>
                                  <?php
                                }

                            ?>

                            <td><?php echo $row['ricoverati_con_sintomi']; ?></td>
                            <td><?php echo $row['terapia_intensiva']; ?></td>
                            <td><?php echo $row['totale_ospedalizzati']; ?></td>
                            <td><?php echo $row['isolamento_domiciliare']; ?></td>
                            <td><?php echo $row['totale_attualmente_positivi']; ?></td>
                            <td><?php echo $row['nuovi_attualmente_positivi']; ?></td>
                            <td><?php echo $row['dimessi_guariti']; ?></td>
                            <td><?php echo $row['deceduti']; ?></td>
                            <td><?php echo $row['totale_casi']; ?></td>
                            <td><?php echo $row['tamponi']; ?></td>
                          </tr>
                            <?php }
                            } else {
                                echo "No results";
                            }
                      ?>
                    </tfoot>
                  </table>
                  <?php }?>



            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
            
          </section>





          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable" hidden>

            <!-- Map card -->
            <div class="card bg-gradient-primary" >
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            



            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>



        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false,
      "scrollX": true,
      "lengthChange": true,
      "order": [[ 1, "desc" ]]

    });
  });
</script>

  <!-- Footer -->

<?php 

include 'footer.php'; ?>

