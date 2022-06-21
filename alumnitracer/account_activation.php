<?php
$title = 'Account Activation';
session_start();
include('includes/header.php');
include('includes/navbar1.php');
include ('includes/connection.php');

?>

<?php
$id = $_SESSION['grad_ID'];
$query = "SELECT * FROM gradlist_tbl
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID  

WHERE grad_ID ='$id' LIMIT 1";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {

    $stntid =$row["studentnumber"];
    $fname = $row["firstname"];
    $MI = $row["middle"];
    $lname = $row["lastname"];

    $deptID = $row["deptID"];
    $department =$row["dept"];

    $courseID = $row["courseID"];
    $courses =$row["course"];

    $batchID = $row["batchID"];
    $batch =$row["year"];
   
  }
}
?>


<div class="py-5" style="margin-top: 3%;">

<div class="container" >
<div class="row">
<div class="col-md-8 offset-md-2">
    <div class="signup-form">
        <form class="mt-5 border p-5 bg-light shadow" method="POST" action="activation-code.php">
            <h4 class="mb-5 text-secondary">Activation Form</h4>
     <div class="row">

     <div class="mb-3 col-md-6">
                <label>Student number</label>
                <input type="text" class="form-control" required="" name="snum" value="<?php echo $stntid; ?>">
  </div>

  <div class="mb-3 col-md-6">
  <label>First name</label>
                <input type="text" class="form-control" required="" name="fname" value="<?php echo $fname; ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Middle Initial</label>
                <input type="text" class="form-control" required="" name="MI" value="<?php echo $MI; ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Last name</label>
                <input type="text" class="form-control" required="" name="lname" value="<?php echo $lname; ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Department</label>
    <select id="inputState" class="form-select" name="deptID">  
        <option value="<?php echo $deptID ?>"><?php echo $department?></option>
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Course</label>
    <select id="inputState" class="form-select" name="courseID">
        <option value="<?php echo $courseID ?>"><?php echo $courses ?></option>
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Batch</label>
  <select id="inputState" class="form-select" name="batchID">
        <option value="<?php echo $batchID ?>"><?php echo $batch ?></option>
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Gender</label>
  <br>
    <input type="radio" name="gender" value="MALE" required="">
    <label>Male</label>
    <input type="radio" name="gender" value="FEMALE" required="">
    <label>Female</label>
</div>

<div class="mb-3 col-md-6">
  <label>Birthday</label>
                <input type="date" class="form-control" required="" name="bday" value="" required="">
</div>

<div class="mb-3 col-md-6">
  <label>Full addres</label>
                <input type="text" class="form-control" required="" name="add" value="" required="">
</div>

<div class="mb-3 col-md-6">
  <label>Phone number</label>
                <input type="tel" class="form-control" required="" name="phone" value="" required="">
</div>

<div class="mb-3 col-md-6">
  <label>Email Address</label>
                <input type="text" class="form-control" required="" name="email" value="" required="">
</div>

<div class="mb-3 col-md-6">
  <label>Password</label>
                <input type="password" class="form-control" required="" name="pass" value="" required="">
</div>

<div class="mb-3">
  	<button type="submit" class="btn btn-primary float-end" name="Activate"> Activate </button>
  </div>
</div>
</form>
<p class="text-center mt-3 text-secondary"> IF your email is verified, Please <a href="#"> Login Now</a> </p>
</div>
</div>
</div>
</div>
</div>

<?php include('includes/footer.php');
include('includes/script.php'); ?>