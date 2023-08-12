<?php include 'home.php'; 
if(!isset($_SESSION["login_info"])){
  header('location: http://localhost/extra/index.php');
}
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="blank_page.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="planatation_index.php">
                <span class="menu-title">Planatation Index</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Add Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-library-plus"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="crop.php">Crop</a></li>
                  <li class="nav-item"> <a class="nav-link" href="insecticide.php">Insecticide</a></li>
                  <li class="nav-item"> <a class="nav-link" href="fertilizer.php">Fertilizer</a></li>
                  <li class="nav-item"> <a class="nav-link" href="fungicide.php">Fungicide</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pgr.php">PGR</a></li>
                  <li class="nav-item"> <a class="nav-link" href="harvesting.php">Harvesting</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-b" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">View Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-eye"></i>
              </a>
              <div class="collapse" id="ui-b">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="view_planatation_index.php">Planatation Index</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_crop.php">Crop</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_insecticide.php">Insecticide</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_fertilizer.php">Fertilizer</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_fungicide.php">Fungicide</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_pgr.php">PGR</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_sales.php">Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="category.php">category</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="spray.php">
                <span class="menu-title">Spray</span>
                <i class="mdi mdi-spray menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sales.php">
                <span class="menu-title">Sales</span>
                <i class="mdi mdi-sale menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inventory.php">
                <span class="menu-title">Inventory</span>
                <i class="mdi mdi-barn"></i>
              </a>
            </li>
          </ul>
        </nav>
        