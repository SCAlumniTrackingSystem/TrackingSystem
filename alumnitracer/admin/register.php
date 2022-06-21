<?php
include 'a_authentication.php';
$title = 'Admin Register';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');


 ?>

<?php 
include ('../includes/connection.php');

?>

<div class="py-5" style="margin-top: 5%;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5">

			
				<div class="card shadow">
					<div class="card-header">
						<h5 class="mb-2 text-secondary">
							Registration Form
						</h5>
						
					</div>
					<div class="card-body" >
						<form method="POST" action = "a_registercode.php">
							<div class="form-group">
	<label for="">First name</label>
    <input type="text" class="form-control" name="fname" value="" required="">
  </div>
  
  <div class="form-group">
	<label for="">Middle Initial</label>
    <input type="text" class="form-control" name="MI" value=""  required="">
  </div>

  <div class="form-group">
	<label for="">Last Name</label>
    <input type="text" class="form-control" name="lname" value=""  required="">
  </div>

  <div class="form-group">
	<label for="">Email Address</label>
    <input type="text" class="form-control" name="email" value=""  required="">
  </div>

  <div class="form-group">
	<label for="">Password</label>
    <input type="password" class="form-control" name="pass" value=""  required="">
  </div>
  <div>
  	<br>
  	<button type="submit" class="btn btn-primary" name="register"> Register
  	</button>
  </div>		
							</div>
						</form>
		


					</div>
				</div>
				
			</div>
			
		</div>
	</div>

</div>

<?php include('includes/footer-admin.php');
include('includes/script.php'); ?>