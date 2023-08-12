<?php include 'home.php'; session_start(); 
if(!isset($_SESSION["login_info"])){
  header('location: http://localhost/extra/index.php');
}?>
<?php require_once 'php_Action/db_connect.php';?>
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
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <label>Select </label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option selected>-- Select --</option>
                            <?php 
                                $sql = "SELECT crop_name FROM crop;";
                                $result1 = mysqli_query($connect, $sql); 
                                while($rows=mysqli_fetch_assoc($result1)){ ?>
                                <option value="<?php echo $rows['crop_name'];?>" ><?php echo $rows['crop_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
                </form>
                <?php     $selected = $_POST['type']; ?>
                <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <br>
                    <h4>Planatation Index</h4>
                    <br>
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
                        </tr>
                      </thead>
                      <?php
                        $view_planatationindex = "SELECT * FROM plantation_index where Type = '$selected'";
                        $r_planatationindex = $connect->query($view_planatationindex);
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
                        </tr>
                        <?php
                                }
                            ?>
                      </tbody>
                    </table>
                    <br>
                    <h4>Irrigation</h4>
                    <br>
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Irrigation_no</th>
                            <th>date</th>
                            <th>area</th>
                            <th>time</th>
                            <th>type</th>
                            <th>days</th>
                        </tr>
                      </thead>
                      <?php
                        $view_planatationindex = "SELECT * FROM  irrigation where type = '$selected'";
                        $r_planatationindex = $connect->query($view_planatationindex);
                         while($row_planatationindex=$r_planatationindex->fetch_assoc())
                            {
                        ?>
                      <tbody>
                        <tr>
                            <td><?php echo $row_planatationindex['Irrigation_no'];?></td>
                            <td><?php echo $row_planatationindex['date'];?></td>
                            <td><?php echo $row_planatationindex['area'];?></td>
                            <td><?php echo $row_planatationindex['time'];?></td>
                            <td><?php echo $row_planatationindex['type'];?></td>
                            <td><?php echo $row_planatationindex['days'];?></td>
                        </tr>
                        <?php
                                }
                            ?>
                      </tbody>
                    </table>
                    <br>
                    <h4>Fertigation</h4>
                    <br>
                    <table class="table">
                      <thead>
                        <tr>
                            <th>fertigation_no</th>
                            <th>date</th>
                            <th>area</th>
                            <th>type</th>
                            <th>total</th>
                            <th>totalacre</th>
                            <th>typeofproduct</th>
                        </tr>
                      </thead>
                      <?php
                        $view_planatationindex = "SELECT * FROM   fertigation  where typeofproduct = '$selected'";
                        $r_planatationindex = $connect->query($view_planatationindex);
                         while($row_planatationindex=$r_planatationindex->fetch_assoc())
                            {
                        ?>
                      <tbody>
                        <tr>
                            <td><?php echo $row_planatationindex['fertigation_no'];?></td>
                            <td><?php echo $row_planatationindex['date'];?></td>
                            <td><?php echo $row_planatationindex['area'];?></td>
                            <td><?php echo $row_planatationindex['type'];?></td>
                            <td><?php echo $row_planatationindex['total'];?></td>
                            <td><?php echo $row_planatationindex['totalacre'];?></td>
                            <td><?php echo $row_planatationindex['typeofproduct'];?></td>
                        </tr>
                        <?php
                                }
                            ?>
                      </tbody>
                    </table>
                    <br>
                    <h4>Spray</h4>
                    <br>
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Type</th>
                            <th>Area</th>
                            <th>Date</th>
                            <th>TypeInsecticide</th>
                            <th>TechnicalInsecticide</th>
                            <th>TypeFungicide</th>
                            <th>TechnicalFungicide</th>
                            <th>TypeFertilizer </th>
                            <th>TypePGR</th>
                            <th>TechnicalPGR</th>
                            <th>Pump</th>
                            <th>Ltr</th>
                        </tr>
                      </thead>
                      <?php
                        $view_planatationindex = "SELECT * FROM   spray  where Type = '$selected'";
                        $r_planatationindex = $connect->query($view_planatationindex);
                         while($row_planatationindex=$r_planatationindex->fetch_assoc())
                            {
                        ?>
                      <tbody>
                        <tr>
                            <td><?php echo $row_planatationindex['Type'];?></td>
                            <td><?php echo $row_planatationindex['Area'];?></td>
                            <td><?php echo $row_planatationindex['Date'];?></td>
                            <td><?php echo $row_planatationindex['TypeInsecticide'];?></td>
                            <td><?php echo $row_planatationindex['TechnicalInsecticide'];?></td>
                            <td><?php echo $row_planatationindex['TypeFungicide'];?></td>
                            <td><?php echo $row_planatationindex['TechnicalFungicide'];?></td>
                            <td><?php echo $row_planatationindex['TypeFertilizer'];?></td>
                            <td><?php echo $row_planatationindex['TypePGR'];?></td>
                            <td><?php echo $row_planatationindex['TechnicalPGR'];?></td>
                            <td><?php echo $row_planatationindex['Pump'];?></td>
                            <td><?php echo $row_planatationindex['Ltr'];?></td>
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