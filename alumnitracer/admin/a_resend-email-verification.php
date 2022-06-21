<?php 
session_start();
$title = 'Resend Email Verification Admin';
include('includes/header-admin.php'); ?>
<?php  include ('includes/navbar-admin.php');  ?>

<?php 
include ('../includes/connection.php');?>

<div class="py-5" style="margin-top: 8%;">
    <div class="container">
        <div class="row justify-content-center">
<div class="col-md-5">
    <div class="card">
   
<div class="card-body">
<div class="text-center">
						<img src="../uploads/cvsu.png" alt="cvsu" width="75" height="65">
</div>
<form action="a_resend-code.php" method="POST">
<div class="form-group mb-3">
    <label>Email Address</label>
    <input type="text" name="email" class="form-control" placeholder ="Enter Email Address">
</div>
<div class="form-group mb-3">
    <button type="submit" name="resend_email_verify_btn" class="btn btn-primary"> Submit</button>
    <a href="index.php"><button type="button" class="btn btn-secondary float-end"> Back</button></a>
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