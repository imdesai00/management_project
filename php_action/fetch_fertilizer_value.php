<?php
    require_once 'db_connect.php';
    $fertilizer_no = $_POST['fertilizer_no'];
    $sql = "SELECT * FROM  fertilizer  where Fertilizer_no = '$fertilizer_no'";
    $fertilizer_val= mysqli_query($connect, $sql);
    $output = '<option value=""> select Technical</option>';
    while($fertilizer_rows=mysqli_fetch_assoc($fertilizer_val)){ 
        $output .='<option value="'.$fertilizer_rows['Technical'].'">'.$fertilizer_rows['Technical'].'</option>';
    }        
    echo $output;
?>