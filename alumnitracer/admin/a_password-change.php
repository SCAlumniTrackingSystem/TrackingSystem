<?php 
session_start();
$title = 'Password Change Admin';
include('includes/header-admin.php'); ?>
<?php  include ('includes/navbar-admin.php');  ?>

<?php 
include ('../includes/connection.php');?>

<div class="py-5" style="margin-top:5%;">
    <div class="container">
        <div class="row justify-content-center">
<div class="col-md-6">
    
    <div class="card">
    <div class="card-header">
        <h5>Change Password</h5>
</div>
<div class="card-body p-4">
    
<form action="a_password-reset-code.php" method="POST">
    <input type ="hidden" name ="password_token" value ="<?php if(isset($_GET['token'])){echo $_GET['token']; } ?>">
<div class="form-group mb-3">
    <label>Email Address</label>
    <input type="text" name="email" value = "<?php if(isset($_GET['email'])){echo $_GET['email']; } ?>"class="form-control" placeholder ="Enter Email Address">
</div>
<div class="form-group mb-3">
    <label>New Password</label>
    <input type="password" name="new_password" class="form-control" placeholder ="Enter Email New Password">
</div>

<div class="form-group mb-3">
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control" placeholder ="Enter Confirm password">
</div>

<div class="form-group mb-3">
    <button type="submit" name="password_update" class="btn btn-success w-100"> Password Update</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer-admin.php');
 include('includes/script.php');?>