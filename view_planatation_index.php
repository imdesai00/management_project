<?php include 'home.php'; session_start(); require_once 'php_action/db_connect.php';
if(!isset($_SESSION["login_info"])){
  header('location: http://localhost/extra/index.php');
}?>
<?php 
$current_month_day=date("m-d");
$sql="select * from irrigation";
$res=$connect->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $date = new DateTime($row['date']);
        $date1 = $date->format('d-m');
        $t =  $row['type'];
        $d =  $row['days'];
        $date2 = date('d-m', strtotime($date1. "+".$d));
    }
    
    if($date2 = $current_month_day){
        $notification[] = "todays iggrate to ". $t;
    }
}
?>
<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <h4><span class="mdi mdi-barley"> Farming</span></h4>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown" style="margin-right: 50px;">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>            
                <div class="dropdown-menu dropdown-menu-right p-2 text-black" aria-labelledby="navbarDropdown">
                  <?php foreach($notification as $row):?>
                    <a class="dropdown-item pt-3 pb-3 alert alert-success text-black" href="#"><?php echo $row; ?></a>
                  <?php endforeach;?>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text" style="margin-right: 10px;">
                  <p class="mb-1 text-black">Hello Admin</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"  style="margin-right: 50px;"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="mdi mdi-logout me-2 text-black"></i> Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'header.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="page-header">
              <h3 class="page-title"> Fertilizer Data </h3>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form>
                      <a type="button" href="update_plantation_index.php" class="btn btn-gradient-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Update </a>
                        <a type="button" href="delete_planatation_index.php" class="btn btn-gradient-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Delet</a>
                    </form>
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Sr_no</th>
                            <th>Type</th>
                            <th>company</th>
                            <th>Variety</th>
                            <th>Date_of_plantation</th>
                            <th>Location</th>
                            <th>Area</th>
                            <th>Reviews</th>
                            <th>Reminder</th>
                        </tr>
                      </thead>
                      <?php
                         include 'php_action/view_data.php';
                         while($row_planatationindex=$r_planatationindex->fetch_assoc())
                            {
                        ?>
                      <tbody>
                        <tr>
                            <td><?php echo $row_planatationindex['Sr_no'];?></td>
                            <td><?php echo $row_planatationindex['Type'];?></td>
                            <td><?php echo $row_planatationindex['company'];?></td>
                            <td><?php echo $row_planatationindex['Variety'];?></td>
                            <td><?php echo $row_planatationindex['Date_of_plantation'];?></td>
                            <td><?php echo $row_planatationindex['Location'];?></td>
                            <td><?php echo $row_planatationindex['Area'];?></td>
                            <td><?php echo $row_planatationindex['Reviews'];?></td>
                            <td><?php echo $row_planatationindex['days'];?></td>
                        </tr>
                        <?php
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include 'footer.php'; ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>