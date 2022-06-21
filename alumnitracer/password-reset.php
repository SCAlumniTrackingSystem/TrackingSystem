<?php
$title = 'Password Reset';
session_start();
include('includes/header.php');
include('includes/navbar1.php');

?>

<div class="py-5" style="margin-top: 8%;">
    <div class="container">
        <div class="row justify-content-center">
<div class="col-md-5">
   
    <div class="card">
   
<div class="card-body">
<div class="text-center">
						<img src="uploads/cvsu.png" alt="cvsu" width="75" height="65">
</div>
<form action="password-reset-code.php" method="POST">
<div class="form-group mb-3">
    <label>Email Address</label>
    <input type="text" name="email" class="form-control" placeholder ="Enter Email Address">
</div>
<div class="form-group mb-3">
    <button type="submit" name="password_reset_link" class="btn btn-primary"> Send Password Reset Link</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('includes/footer.php'); 
include('includes/script.php');?>