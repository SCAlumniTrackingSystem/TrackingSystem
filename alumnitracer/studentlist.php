<?php
$title = 'Requesting Admin';
session_start();
include('includes/header.php');
include('includes/navbar1.php');
include ('includes/connection.php');
?>

<div class="py-5" style="margin-top:5%;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5">


				<div class="card shadow">
					<div class="card-body" >
                    <div class="text-center">
						<img src="uploads/cvsu.png" alt="cvsu" width="75" height="65">
</div>
						<form method="POST" action="stdnt-code.php">
  
							<div class="form-group">
	<label for="">Student Number</label>
    <input type="text" class="form-control" name="snum" value="" required="">
  </div>
							<div class="form-group">
	<label for="">First name</label>
    <input type="text" class="form-control" name="fname" value=""  required="">
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
<label for="">Department</label>
    <select id="inputState" class="form-select" name="deptID"  required="">
    <option></option>
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
    <select id="inputState1" class="form-select" name="courseID"  required="">  
    <option></option>
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
    <select id="inputState2" class="form-select" name="batchID"  required="" > 
    <option></option>       
        <?php
        $query = "SELECT * FROM batch ORDER by batchID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
          ?>
<option value="<?php echo $row['batchID'] ?>"><?php echo $row['year'] ?></option>
  <?php endwhile; ?>
    </select>
</div>
<h10 class="text-danger">Note: Please wait for the admin to input your requested student number. It might take 3-7 days to process your request. the format of the student number should be like this (201801001) no dashes</h10>
  <div>
  	<br>
  	<button type="submit" class="btn btn-primary float-end" name="send"> Send
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



  

<?php include('includes/footer.php');
include('includes/script.php'); ?>