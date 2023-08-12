<?php 
    include 'home.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<div class='container mt-3'>
			<div class="jumbotron"><h2 class='text-muted text-center'>Farming System</h2></div>
			<div class='row'>
				<div class='col-md-5 mx-auto'>
					<h3 class='text-muted text-center'>LOGIN</h3>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
						<div class="form-group">
							<label>User Name</label>
							<input type="text" class="form-control" name="uname"  placeholder="UserName" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="upass" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input type='submit' name='login' value='Login' class='btn btn-primary'>
						</div>
					</form>
                    <?php 
						$uname = $_POST['uname'];
                        $upass = $_POST['upass'];
                        $_SESSION["login_info"]=$uname;
                        if( $uname == 'admin' && $upass == "admin"){
                            header('location:planatation_index.php');
                        }else{
                            echo"<div class='alert alert-danger'>Invalid Login Details.</div>";
                        }
					?>
				</div>
				
			</div>
		</div>
	</body>
</html>