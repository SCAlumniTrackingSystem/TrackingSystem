<?php 
session_start();
$title = 'Cvsu Alumni Tracer Admin';
include('includes/header-admin.php'); ?>
<?php  include ('includes/navbar-admin.php');  ?>

<?php 
include ('../includes/connection.php');

?>

<div class="py-5" style="margin-top: 8%;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5">

			
				<div class="card shadow">
				
					<div class="card-body" >
					<div class="text-center">
						<img src="../uploads/cvsu.png" alt="cvsu" width="75" height="65">
</div>
						<form method="POST" action = "a_login-code.php">
							<div class="form-group">
	<label for="">Email Address</label>
    <input type="text" class="form-control" name="email" value="">
  </div>
  
  <div class="form-group">
	<label for="">Password</label>
    <input type="password" class="form-control" name="pass" value="">
  </div>
  <div>
  	<br>
  	<button type="submit" class="btn btn-primary" name="login"> Login
  	</button>
	  <a href = "a_password-reset.php" class ="float-end">Forgot your password?</a>
  </div>		
							</div>
						</form>
<p  class="text-center mt-3 text-secondary">Did not receive your Email verification?
	<a href = "a_resend-email-verification.php">Resend</a>
		</p>


					</div>
				</div>
				
			</div>
			
		</div>
	</div>

</div>


  

<?php include('includes/footer-admin.php');
include('includes/script.php'); ?>