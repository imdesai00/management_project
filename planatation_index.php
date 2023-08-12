<?php include 'home.php'; session_start();
if(!isset($_SESSION["login_info"])){
  header('location: http://localhost/extra/index.php');
}
?>
<?php include 'php_action/db_connect.php';?>
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
            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form method="POST" action = "php_action/create_plantation_index.php">
                    <h4 class="card-title">Planatation Index</h4>
                      <p class="card-description"> Fill Data About All Crop That Are Planted </p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Select </label>
                              <select class="form-select" aria-label="Default select example" name="Type">
                                  <option selected>-- Select --</option>
                                  <?php 
                                      $sql = "SELECT crop_name FROM crop;";
                                      $result1 = mysqli_query($connect, $sql); 
                                      while($rows=mysqli_fetch_assoc($result1)){ ?>
                                      <option value="<?php echo $rows['crop_name'];?>" ><?php echo $rows['crop_name'];?></option>
                                  <?php } ?>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="Company" placeholder="Enter Company" class="form-control" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Varity</label>
                            <input type="text" name="Varity" placeholder="Enter Varity" class="form-control" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Plantation Date</label>
                            <input type="date" name="Plantation_Date" placeholder="Enter Plantation_Date" class="form-control" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="Location" placeholder="Enter Location" class="form-control" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Area</label>
                            <input type="text" name="Area" placeholder="Enter Area" class="form-control" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>review</label>
                            <input type="text" name="review" placeholder="Enter review" class="form-control" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>days for reminder</label>
                            <input type="text" name="reminder" placeholder="Enter dayes for reminder" class="form-control" >
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
                    </form>
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