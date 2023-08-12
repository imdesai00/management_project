<?php
    require_once 'db_connect.php';
    $fungicide_no = $_POST['fungicide_no'];
    $fungicide_val = "SELECT * FROM fungicide where Name = '$fungicide_no'";
    $fungicide_result = mysqli_query($connect, $fungicide_val);
    $output = '<option value=""> select Technical</option>';
    while($fungicide_rows=mysqli_fetch_assoc($fungicide_result)){ 
        $output .='<option value="'.$fungicide_rows['Technical'].'">'.$fungicide_rows['Technical'].'</option>';
    }        
    echo $output;
?>