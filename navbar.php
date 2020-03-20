<?php

  $sqlNavBar = "SELECT * FROM `dpc-covid19-ita-andamento-nazionale` ORDER BY `data` DESC";
  $resultNavBar = $conn->query($sqlNavBar);
  $newCases =  $resultNavBar->num_rows;

?>


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     

      <!-- Notifications Dropdown Menu -->

 



      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-medkit"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $newCases;?></span>
        </a>
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Nuovi casi positivi</span>
         
         <?php
      if ($resultNavBar->num_rows > 0) {
          // output data of each row
        while($rowNavBar = $resultNavBar->fetch_assoc()) { 
          
          ?>
       
       
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-medkit mr-2"></i>Data: <?php echo $rowNavBar['data']; ?>
              <span class="float-right text-muted text-sm">Casi: <?php echo $rowNavBar['nuovi_attualmente_positivi']; ?></span>
            </a>
       


        <?php
         
        
        }
            } else {
                echo "No results";
            } ?>

          <div class="dropdown-divider"></div>
        </div>

      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

