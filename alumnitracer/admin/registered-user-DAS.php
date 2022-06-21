<?php
include 'a_authentication.php';
$title = 'Registered User DAS';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

 <div class="container-fluid px-4" style="margin-top:12%;">
     <h3 class="mt-4">Registered/Unregistered User</h3>
     <br>

 <div class="row">
  <div class="col-xl-3 col-md-g  mx-auto">
      <div class="card bg-primary text-white mb-4 mx-auto">
          <div class="card-body">Total Registered User 
              <?php

              $query ="SELECT * FROM registration INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
               INNER JOIN department on gradlist_tbl.deptID = department.deptID
               WHERE verify_status = 1 AND department.deptID = '4' ";
              $query_run = mysqli_query($con, $query);

              if ($registration_total = mysqli_num_rows($query_run)) {
                echo '<h4 class="mb-0">'.$registration_total.'</h4>';
              }
              else {
            echo '<h4 class="mb-0">No Data</h4>';
              }
              ?>
             
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="registered-user-DAS.php">All Users</a>
              <div class="small text-white"><i class="fas fa-angle-right"> </i></div>
          </div>
      </div>
  </div>
 <div class="col-xl-3 col-md-g mx-auto">
<div class="card bg-info text-white mb-4">
          <div class="card-body">Total Unregistered User
              <?php

              $query ="SELECT * FROM registration 
              INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
              INNER JOIN department on gradlist_tbl.deptID = department.deptID
              WHERE verify_status = 0 AND department.deptID = '4'";
              $query_run = mysqli_query($con, $query);

              if ($registration_total = mysqli_num_rows($query_run)) {
                echo '<h4 class="mb-0">'.$registration_total.'</h4>';
              }
              else {
            echo '<h4 class="mb-0">No Data</h4>';
              }
              ?>
             
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="registered-user-DAS.php">All Users</a>
              <div class="small text-white"><i class="fas fa-angle-right"> </i></div>
          </div>
      </div>
  </div>
 </div>

 
			 <div class="container">  
            
                <br >  
                <div class="table-responsive">  
                     <table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
                          <thead class="table-dark">  
                               <tr>  

									<th style="display:none">ID</th>
									
									<th class="">Name</th>
									<th>Department</th>
									<th class="">Course Graduated</th>
									<th class="">Status</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								
$alumni = $con->query("SELECT * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name  FROM registration
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID	 
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE department.deptID = '4' ORDER by registerID asc");
								while($row=$alumni->fetch_assoc()):
									
								?>
								<tr>
									<td class="" style="display:none">
										 <p> <b><?php echo ucwords($row['registerID']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>

									<td class="">
										 <p> <b><?php echo $row['dept'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['course'] ?></b></p>
									</td>
									<td class="text-center">
										<?php if($row['verify_status'] == 1): ?>
											<span class="badge bg-primary">Verified</span>
										<?php else: ?>
											<span class="badge bg-danger">Not Verified</span>
										<?php endif; ?>

									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
<script>  
 $(document).ready(function(){  
      $('#table').DataTable();  
 });  
 </script>   


 <?php include ('includes/footer-admin.php'); ?>