<?php
    require_once 'db_connect.php';
    $pgr_no = $_POST['pgr_no'];
    $sql = "SELECT * FROM pgr where Name = '$pgr_no'";
    $pgr_val = mysqli_query($connect, $sql);
    $output = '<option value=""> select Technical</option>';
    while($pgr_rows=mysqli_fetch_assoc($pgr_val)){ 
        $output .='<option value="'.$pgr_rows['Technical'].'">'.$pgr_rows['Technical'].'</option>';
    }        
    echo $output;
?>