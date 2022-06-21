<?php
include 'a_authentication.php';
$title = 'Admin Update Profile';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');
 ?>
 <?php
$id = $_SESSION['id'];
$login_query ="SELECT  * , CONCAT (Fname, ' ' , MI ,' ',Lname) AS name FROM admin
WHERE adminID = '$id'";
$result = mysqli_query($con, $login_query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
  
   $fname = $row["Fname"];
   $MI = $row["MI"];
   
   $lname = $row ["Lname"];
    $email =$row["email"];
  }
}

?>
 
     <div class="py-5" style="margin-top: 2%;">
     

<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">
  
 <form class="mt-5 border p-5 bg-light shadow" id="form" enctype = "multipart/form-data" method="POST" action="a_update-admin.php">
<h4 class="mb-5 text-secondary">Update Admin Profile</h4>
          

     <div class="row">
  <div class="mb-3 col-md-6">
  <label>First name</label>
                <input type="text" class="form-control"  name="fname" value="<?php echo $fname; ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Middle Initial</label>
                <input type="text" class="form-control"  name="MI" value="<?php echo $MI; ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Last name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Email Address</label>
                <input type="text" class="form-control"  name="email" value="<?php echo $email ?>">
</div>
<div class="mb-3">
  	<button type="submit" class="btn btn-primary float-end" name="Update-Admin"> Update </button>
  </div>

    </div>
</div>
</form>
</div>
</div>
</div>
</div>


<?php include('includes/footer-admin.php');
include('includes/script.php'); ?>