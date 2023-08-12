<?php include 'home.php'; session_start();
if(!isset($_SESSION["login_info"])){
    header('location: http://localhost/extra/index.php');
  }?>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <p class="radio-container m-r-45">Select Form To Enter Data</p>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected id="n" >-- Select --</option>
                                            <option value="1" id="z" >Irrigation</option>
                                            <option value="2" id="o" >Fertigation</option>
                                            <option value="3" id="t" >Spray</option>
                                        </select>
                                    </div>
                                </div>
                                <div id = "zero" style="display:none;">
                                    <h2  class="title">Irrigation</h2>
                                    <form method="POST" action = "php_action/create_irrigation.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p class="radio-container m-r-45">Select Crop</p>
                                                    <select class="form-select" aria-label="Default select example" name="type" id="type">
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                        $sql = "SELECT Type FROM plantation_index";
                                                        $result = mysqli_query($connect, $sql); 
                                                        while($row=mysqli_fetch_assoc($result)){ ?>
                                                            <option value="<?php echo $row['Type'];?>" ><?php echo $row['Type'];?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <p class="radio-container m-r-45">Select Crop days</p>
                                                    <select class="form-select" aria-label="Default select example" name="days" id="days" >
                                                        <option selected>-- Select --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="Date" placeholder="Enter Date" class="form-control" >
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
                                                    <label>Time</label>
                                                    <input type="text" name="Time" placeholder="Enter Time" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Survey</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id = "one" style="display:none;">
                                    <h2  class="title">Fertigation</h2>
                                    <form method="POST" action = "php_action/create_fertigation.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label class="radio-container m-r-45">Select Crop</label>
                                                    <select class="form-select" aria-label="Default select example" name="type" >
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                        $sql = "SELECT Type FROM plantation_index";
                                                        $result = mysqli_query($connect, $sql); 
                                                        while($row=mysqli_fetch_assoc($result)){ ?>
                                                            <option value="<?php echo $row['Type'];?>" ><?php echo $row['Type'];?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Select Type Of Fertilizer</label>
                                                    <select class="form-select" aria-label="Default select example" name="Type">
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                            $sql = "SELECT Name FROM fertilizer;";
                                                            $result1 = mysqli_query($connect, $sql); 
                                                            while($row1=mysqli_fetch_assoc($result1)){ ?>
                                                                <option value="<?php echo $row1['Name'];?>" ><?php echo $row1['Name'];?></option>
                                                                <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <input type="text" name="Area" placeholder="Enter Area" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="Date" placeholder="Enter Date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" name="Total" placeholder="Enter Total" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Total/Acre</label>
                                                    <input type="text" name="Total/Acre" placeholder="Enter Total/Acre" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Survey</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id = "two" style="display:none;">
                                    <h2  class="title">Spray</h2>
                                    <form method="POST" action = "php_action/create_spray.php">
                                        <div class="form-group row">
                                            <p class="radio-container m-r-45">Select Crop</p>
                                            <select class="form-select" aria-label="Default select example" name="type" >
                                                <option selected>-- Select --</option>
                                                <?php
                                                $sql = "SELECT Type FROM plantation_index";
                                                $result = mysqli_query($connect, $sql); 
                                                while($row=mysqli_fetch_assoc($result)){ ?>
                                                    <option value="<?php echo $row['Type'];?>" ><?php echo $row['Type'];?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <input type="text" name="Area" placeholder="Enter Area" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="Date" placeholder="Enter Date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Insecticide</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Select Insecticide</label>
                                                    <select class="form-select" aria-label="Default select example" name="TypeInsecticide" id = "TypeInsecticide" >
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                            $sql = "SELECT * FROM insecticide;";
                                                            $result1 = mysqli_query($connect, $sql); 
                                                            while($rows=mysqli_fetch_assoc($result1)){ ?>
                                                                <option value="<?php echo $rows['Name'];?>" ><?php echo $rows['Name'];?></option>
                                                                <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Technical</label>
                                                    <select class="form-select" aria-label="Default select example"  name="TechnicalInsecticide" id="Technicalinsecticide" >
                                                        <option selected>-- Select --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>        
                                        <h3>Fungicide</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Select Fungicide</label>
                                                    <select class="form-select" aria-label="Default select example" name="TypeFungicide" id = "TypeFungicide" >
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                            $sql = "SELECT * FROM fungicide;";
                                                            $result1 = mysqli_query($connect, $sql); 
                                                            while($fungicide_row=mysqli_fetch_assoc($result1)){ ?>
                                                                <option value="<?php echo $fungicide_row['Name'];?>" ><?php echo $fungicide_row['Name'];?></option>
                                                            <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Technical</label>
                                                    <select class="form-select" aria-label="Default select example"  name="TechnicalFungicide" id="TechnicalFungicide" >
                                                        <option selected>-- Select --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Fertilizer</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Select Fertilizer</label>
                                                    <select class="form-select" aria-label="Default select example" name="TypeFertilizer" id = "TypeFertilizer" >
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                            $sql = "SELECT * FROM fertilizer;";
                                                            $result1 = mysqli_query($connect, $sql); 
                                                            while($rows=mysqli_fetch_assoc($result1)){ ?>
                                                                <option value="<?php echo $rows['Name'];?>" ><?php echo $rows['Name'];?></option>
                                                                <?php $no = $rows['Fertilizer_no'];?>
                                                                <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>PGR</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Select PGR</label>
                                                    <select class="form-select" aria-label="Default select example" name="TypePGR" id = "TypePGR" >
                                                        <option selected>-- Select --</option>
                                                        <?php
                                                            $sql = "SELECT * FROM pgr;";
                                                            $result1 = mysqli_query($connect, $sql); 
                                                            while($rows=mysqli_fetch_assoc($result1)){ ?>
                                                                <option value="<?php echo $rows['Name'];?>" ><?php echo $rows['Name'];?></option>
                                                                <?php $no = $rows['PGR_no'];?>
                                                                <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Technical</label>
                                                    <select class="form-select" aria-label="Default select example"  name="TechnicalPGR" id="TechnicalPGR" >
                                                        <option selected>-- Select --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pump</label>
                                                    <input type="text" name="Pump" placeholder="Enter Pump" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ltr</label>
                                                    <input type="text" name="Ltr" placeholder="Enter Ltr" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Survey</button>
                                            </div>
                                        </div>
                                    </form>
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
    <script>
        document.getElementById("n").onclick = function() {
            document.getElementById("zero").style.display = "none";
            document.getElementById("two").style.display = "none";
            document.getElementById("one").style.display = "none";
        }

         document.getElementById("z").onclick = function() {
            document.getElementById("zero").style.display = "block";
            document.getElementById("two").style.display = "none";
            document.getElementById("one").style.display = "none";
        }
  
        document.getElementById("o").onclick = function() {
            document.getElementById("one").style.display = "block";
            document.getElementById("two").style.display = "none";
            document.getElementById("zero").style.display = "none";
        }
  
        document.getElementById("t").onclick = function() {
            document.getElementById("two").style.display = "block";
            document.getElementById("one").style.display = "none";
            document.getElementById("zero").style.display = "none";
        }
        $("#TypeInsecticide").on('change',function(){
            var Insecticide_no = this.value;
            $.ajax({
                url:'php_action/fetch_insecticide_value.php',
                type:"POST",
                data:{
                    insecticide_no:Insecticide_no
                },
                success:function(data){
                    $("#Technicalinsecticide").html(data);
                }
            })
        });
        $("#TypeFungicide").on('change',function(){
            var Fungicide_no = this.value;
            $.ajax({
                url:'php_action/fetch_fungicide_value.php',
                type:"POST",
                data:{
                    fungicide_no:Fungicide_no
                },
                success:function(data0){
                    $("#TechnicalFungicide").html(data0);
                }
            })
        });
        $("#TypeFertilizer").on('change',function(){
            var Fertilizer_no = this.value;
            $.ajax({
                url:'php_action/fetch_fertilizer_value.php',
                type:"POST",
                data:{
                    fertilizer_no:Fertilizer_no
                },
                success:function(dataa1){
                    $("#TechnicalFertilizer").html(dataa1);
                }
            })
        });
        $("#TypePGR").on('change',function(){
            var PGR_no = this.value;
            $.ajax({
                url:'php_action/fetch_pgr_value.php',
                type:"POST",
                data:{
                    pgr_no:PGR_no
                },
                success:function(data2){
                    $("#TechnicalPGR").html(data2);
                }
            })
        });
        $("#type").on('change',function(){
            var Days = this.value;
            $.ajax({
                url:'php_action/fetch_days_value.php',
                type:"POST",
                data:{
                    days:Days
                },
                success:function(data3){
                    $("#days").html(data3);
                }
            })
        });
    </script>