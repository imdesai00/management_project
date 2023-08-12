<?php
    require_once 'db_connect.php';
    $type = $_POST['days'];
    $sql = "SELECT * FROM  plantation_index  where Type = '$type'";
    $fertilizer_val= mysqli_query($connect, $sql);
    $output = '<option value=""> select days</option>';
    while($fertilizer_rows=mysqli_fetch_assoc($fertilizer_val)){ 
        $output .='<option value="'.$fertilizer_rows['days'].'">'.$fertilizer_rows['days'].'</option>';
    }        
    echo $output;
?>