<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">

      <?php

      if($servername == "localhost"){
        $title = "Covid-19 Italia - Local"; 
      }else{
        $title = "Covid-19 Italia";
      }
      
      ?>

    <span class="brand-text font-weight-light"><?php echo $title; ?></span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
           

            <li class="nav-header">Grafici</li>
       

  
       
       <li class="nav-item">
         <a href="tablesWithChart.php?type=andamento-nazionale" class="nav-link">
         <i class="nav-icon far fa-circle text-info"></i>
           <p>Andamento Nazionale</p>
         </a>
       </li>

     

              <li class="nav-item">
                <a href="tablesWithChart.php?type=regioni-ultimo-giorno" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Regioni</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tablesWithChart.php?type=provincie-ultimo-giorno" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Provincie</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="statsAndamentoNazionale.php" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Statistiche (Beta)</p>
                </a>
              </li>

              
  
                     


                   <!-- </ul> -->
                   </li>
            <li class="nav-header">Tabelle temporali</li>
            <li class="nav-item has-treeview">
             
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Dall'ultimo giorno
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="tables.php?type=regioni-ultimo-giorno" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Regionali</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tables.php?type=provincie-ultimo-giorno" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Provinciali</p>
                </a>
              </li>

                
              </ul>
            </li>
                <!-- </ul> -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                 Da sempre
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               
                 
              <li class="nav-item">
                <a href="tables.php?type=regioni" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Regionali</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tables.php?type=provincie" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Provinciali</p>
                </a>
              </li>
              </ul>

           <!-- </ul> -->
           </li>
            <li class="nav-header">Risorse</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Fonti
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="page_wiki.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cos'è il coronavirus</p>
                  </a>
                </li>

                <li class="nav-item">
                <a href="tables.php?type=updates" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Dati Aggiornamenti</p>
                </a>
              </li>

              </ul>
            </li>


           <li class="nav-header">Credits</li>
            <li class="nav-item">
                <a href="page_credits.php" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                  <p>Credits</p>
                </a>
              </li>

          </li>

 
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>