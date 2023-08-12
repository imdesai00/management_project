<?php 	

    require_once 'db_connect.php';

    // spray-insecticide
    $view_insecticide = "SELECT * FROM  insecticide;";
    $r_insecticide = $connect->query($view_insecticide);
    
    // spray-fungicide
    $view_fungicide = "SELECT * FROM fungicide;";
    $r_fungicide = $connect->query($view_fungicide);

    // spray-fertilizer
    $view_fertilizer = "SELECT * FROM fertilizer;";
    $r_fertilizer = $connect->query($view_fertilizer);

    // spray-pgr
    $view_pgr = "SELECT * FROM  pgr;";
    $r_pgr = $connect->query($view_pgr);

    // crop
    $view_crop = "SELECT * FROM  crop;";
    $r_crop = $connect->query($view_crop);

    // planatation inidex
    $view_planatationindex = "SELECT * FROM plantation_index;";
    $r_planatationindex = $connect->query($view_planatationindex);

    //sales
    $view_sales = "SELECT * FROM  sales;";
    $r_sales = $connect->query($view_sales);

    
?>