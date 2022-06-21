<?php
include 'a_authentication.php';
$title = 'Update User';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

<?php 
 $id = $_POST ['id'];
 $query ="SELECT * FROM gradlist_tbl INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID  WHERE grad_ID ='$id'";

$query_run = mysqli_query($con, $query);

if ($query_run) {
	while ($row = mysqli_fetch_array($query_run)) {
		?>

   
    	<div class="py-5" style="margin-top:5%;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5">


				<div class="card shadow">
					<div class="card-header">
						<h5 class="mb-2 text-secondary">
							Update User
						</h5>
						
					</div>
					<div class="card-body" >
						<form method="POST" action="updateuser.php">
   <input type="hidden" name="id" value="<?php echo $row['grad_ID'] ?>">
							<div class="form-group">
	<label for="">Student Number</label>
    <input type="text" class="form-control" name="snum" value="<?php echo $row['studentnumber'] ?>">
  </div>
							<div class="form-group">
	<label for="">First name</label>
    <input type="text" class="form-control" name="fname" value="<?php echo $row['firstname'] ?>">
  </div>
  
  <div class="form-group">
	<label for="">Middle Initial</label>
    <input type="text" class="form-control" name="MI" value="<?php echo $row['middle'] ?>">
  </div>

  <div class="form-group">
	<label for="">Last Name</label>
    <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname'] ?>">
  </div>

  <div class="form-group">
<label for="">Department</label>
    <select id="inputState" class="form-select" name="deptID" >
    <option value="<?php echo $row['deptID'] ?>"><?php echo $row['dept'] ?></option>
        <?php
        $query = "SELECT * FROM department ORDER by deptID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
          ?>
<option value="<?php echo $row['deptID'] ?>"><?php echo $row['dept'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

  <div class="form-group">
<label for="">Course</label>
    <select id="inputState1" class="form-select" name="courseID" >  
    <?php 
 $id = $_POST ['id'];
 $query ="SELECT * FROM gradlist_tbl INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID  WHERE grad_ID ='$id'";
$query_run = mysqli_query($con, $query);
if ($query_run) {
	while ($row = mysqli_fetch_array($query_run)) {
		?>
    <option value="<?php echo $row['courseID'] ?>"><?php echo $row['course'] ?></option>
    <?php
	}
}
else{
}
?>
        <?php
        $query = "SELECT * FROM courses ORDER by courseID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
          ?>
<option value="<?php echo $row['courseID'] ?>"><?php echo $row['course'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

<div class="form-group">
<label for="">Batch</label>
    <select id="inputState2" class="form-select" name="batchID" >  
    <?php 
 $id = $_POST ['id'];
 $query ="SELECT * FROM gradlist_tbl INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID  WHERE grad_ID ='$id'";
$query_run = mysqli_query($con, $query);
if ($query_run) {
	while ($row = mysqli_fetch_array($query_run)) {
		?>
    <option value="<?php echo $row['batchID'] ?>"><?php echo $row['year'] ?></option>
    <?php
	}
}
else{
}
?>
      
        <?php
        $query = "SELECT * FROM batch ORDER by batchID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
          ?>
<option value="<?php echo $row['batchID'] ?>"><?php echo $row['year'] ?></option>
  <?php endwhile; ?>
    </select>
</div>
  <div>
  	<br>
  	<button type="submit" class="btn btn-primary" name="update"> Update
  	</button>
  	 <a href="addpost.php" class="btn btn-secondary">Cancel</a>
  </div>		
							</div>
						</form>

					</div>
				</div>
				
			</div>
			
		</div>
	</div>

</div>



   <?php
	}
}
else{

}
?>
 
   <?php include ('includes/footer-admin.php'); ?>