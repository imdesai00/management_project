<?php
    require_once 'db_connect.php';
    $insecticide_no = $_POST['insecticide_no'];
    $insecticide_val = "SELECT * FROM insecticide where Name = '$insecticide_no'";
    $insecticide_result = mysqli_query($connect, $insecticide_val);
    $output = '<option value=""> select Technical</option>';
    while($insecticide_rows=mysqli_fetch_assoc($insecticide_result)){ 
        $output .='<option value="'.$insecticide_rows['Technical'].'">'.$insecticide_rows['Technical'].'</option>';
    }        
    echo $output;
?>