<?php
$title = 'Login';
session_start();
include('includes/header.php');
include('includes/navbar1.php');

?>
<div class="py-5" style="margin-top: 8%;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5">

			
				<div class="card shadow">
					
					<div class="card-body" >
						<div class="text-center">
						<img src="uploads/cvsu.png" alt="cvsu" width="75" height="65">
</div>
						<form method="POST" action = "logincode.php">
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
	  <a href = "password-reset.php" class ="float-end">Forgot your password?</a>
  </div>		
							</div>
						</form>
<p  class="text-center mt-3 text-secondary">Did not receive your Email verification?
	<a href = "resend-email-verification.php">Resend</a>
		</p>


					</div>
				</div>
				
			</div>
			
		</div>
	</div>

</div>

<?php include('includes/footer.php');
include('includes/script.php'); ?>