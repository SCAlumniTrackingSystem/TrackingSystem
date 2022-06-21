<?php
$title = 'Validating';
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
						<form method="POST" action="validating-code.php">
							<div class="form-group">
	<label for="">Student Number</label>
    <input type="text" class="form-control" name="studentnum" value="" required="">
  </div>
  <h10>Example: "201801100"</h10>
  <div>
  	<br>
  	<button type="submit" class="btn btn-primary float-end" name="check">Check
  		
  	</button>
  </div>

								
							</div>
							
						</form>
						<p  class="text-center mt-3 text-secondary">Does your student number is not on the list?
	<a href = "studentlist.php">Click Here</a>
		</p>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

</div>
<?php include('includes/footer.php');
include('includes/script.php'); ?>