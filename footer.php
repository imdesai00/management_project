<?php include 'home.php'; 
if(!isset($_SESSION["login_info"])){
  header('location: http://localhost/extra/index.php');
}?>
<footer class="footer">
<div class="container-fluid d-flex justify-content-between">
    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Mr.Farmer 2021</span>
</footer>