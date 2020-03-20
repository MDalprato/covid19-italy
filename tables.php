
<?php
include 'header.php'; 



$title = "Risultati andamento nazionale";
$sql = "dpc-covid19-ita-andamento-nazionale";
$type = "andamento-nazionale";

// ottengo l'ultimo giorno dal php





if(isset($_GET['type'])) { // filtro parametro in ingresso
 
  if ($_GET['type'] == "regioni") {
 
    $title = "Risultati regionali da sempre";
    $Subtitle = "Le Province autonome di Trento e Bolzano sono indicate in 'denominazione regione' e
    con il codice 04 del Trentino Alto Adige.";
    $sql = "SELECT * FROM `dpc-covid19-ita-regioni` ORDER BY `data` DESC";
    $type = $_GET['type'];
    $type2 = "regioni-link";



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
    $Subtitle = "Le Province autonome di Trento e Bolzano sono indicate in 'denominazione regione' e
    con il codice 04 del Trentino Alto Adige.";
    $sql = "SELECT * FROM `dpc-covid19-ita-regioni` WHERE `data` like '" .$lastUpdate. "'   ORDER BY `data` DESC";
    $type = "regioni";
    $type2 = "regioni-ultimo-giorno-link";

  }
  
  if ($_GET['type'] == "provincie") {
    $title = "Risultati provinciali da sempre";
    $Subtitle = "Le Province autonome di Trento e Bolzano sono indicate in 'denominazione regione' e
     con il codice 04 del Trentino Alto Adige.<br>
    Ogni Regione ha una Provincia denominata 'In fase di definizione/aggiornamento' con il codice
     provincia da 979 a 999, utile ad indicare i dati ancora non assegnati alle Province.";

    $sql = "SELECT * FROM `dpc-covid19-ita-province`  ORDER BY `data` DESC";
    $type = $_GET['type'];

    if($_GET['Idregione'] > 0 ) {

      $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `codice_regione` = ". $_GET['Idregione'] ."  ORDER BY `data` DESC";

  
    }

  }
  
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
    $Subtitle = "Le Province autonome di Trento e Bolzano sono indicate in 'denominazione regione' e
     con il codice 04 del Trentino Alto Adige.<br>
    Ogni Regione ha una Provincia denominata 'In fase di definizione/aggiornamento' con il codice
     provincia da 979 a 999, utile ad indicare i dati ancora non assegnati alle Province.";

    $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `data` like '" .$lastUpdate. "'  ORDER BY `data` DESC";
    $type = "provincie";


      if($_GET['Idregione'] > 0 ) {

        $sql = "SELECT * FROM `dpc-covid19-ita-province` WHERE `data` like '" .$lastUpdate. "' AND `codice_regione` = ". $_GET['Idregione'] ."  ORDER BY `data` DESC";

    
      }


  }

  if ($_GET['type'] == "andamento-nazionale") {
    $title = "Risultati andamento nazionale";
    $Subtitle = "Risultati andamento nazionale";

    $sql = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `id` ASC";
    $type = $_GET['type'];

  }

  if ($_GET['type'] == "updates") {
    $title = "Risultati aggiornamenti dati";
    $Subtitle = "Vengono mostrati tutti gli aggiornamenti effettuati verso 
    il database del Sito del Dipartimento della Protezione Civile - 
    Emergenza Coronavirus: la risposta nazionale";

    $sql = "SELECT * FROM `dpc-covid19-updates` ORDER BY `id` DESC";
    $type = $_GET['type'];

  }

  if ($_GET['type'] == "stats") {
    $title = "Risultati statistiche";
    $Subtitle = "Statistiche sito";

    $sql = "SELECT * FROM `stats` ORDER BY `id` DESC";
    $type =  $_GET['type'];

  }


  //tables.php?type=provincie-ultimo-giorno&Idregione=

  //echo "              " .$sql;
  //echo $type;



  }

$result = $conn->query($sql);



?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $Subtitle;?></h3>
            </div>
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
                                    <a href="tables.php?type=provincie-ultimo-giorno&Idregione=<?php echo $row['codice_regione'];?>" >
                                    <?php echo $row['denominazione_regione']; ?>
                                    </a>

                                    </td>


                                <?php

                                }else{
                                  ?>
                                  
                                  <td>
                                    <a href="tables.php?type=provincie&Idregione=<?php echo $row['codice_regione'];?>" >
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
      <!-- /.row -->
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

