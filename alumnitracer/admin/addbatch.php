<?php
include 'a_authentication.php';
$title = 'Add Batch Year';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
 



<style type="text/css">
	.col{
		text-align: right;
		margin-right: 60px;
		margin-top: 20px;
		margin-bottom: 10px;
	}
	.card{
		margin-left: 50px;
		margin-right: 50px;
	}
	.tab{
		margin-left: 200px;
		margin-right: 200px;
	}
	
</style>

 
<!-- Button trigger modal -->




<!-- Modal footer -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Batch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="addbatch-code.php">
        	<div class="form-group">
        		<label>Batch</label>
        		<input type="text" class="form-control" name="bth" required="">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="insert">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal update -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Batch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form method="POST" action="updatebatch.php">
        	<input type="hidden" name="id" id="batch_id">
        	<div class="form-group">
        		<label>Batch</label>
        		<input type="text" id="batchyear" class="form-control" name="bth" required="">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="col" style="margin-top: 12%;">
		<button type="button" class="btn btn-success badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#add" style="width: 80px; height: 40px;">
  ADD
</button>
	</div>



<?php
	$query="SELECT * FROM batch";
	$query_run = mysqli_query($con,$query);
?>
<div class="tab">
 <table id="dept" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
        
    <thead class="table-dark">
    <tr>
   <th  scope="col" style="display:none;">ID</th>
    <th  scope="col">Batch</th>
    <th scope="col">Action</th>
      
    </tr>
  </thead>

  <?php
        while($row = mysqli_fetch_array($query_run)){
      
            echo '

                <tr >
                
          		 <td style="display:none;"> '.$row["batchID"].'</td>
                <td> '.$row["year"].'</td>
                <td> <button type="button"class="btn btn-sm btn-outline-primary editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg></button>
                   

                </tr>
            ';
        }
  ?>

</table>
</div>
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script>
        $(document).ready(function() {
        $('#dept').DataTable();
        $('.editbtn').on('click', function(){
        	$('#update').modal('show');
        	$tr = $(this).closest('tr');
        	var data= $tr.children("td").map(function(){
        		return $(this).text();
        	}).get();

        	console.log(data);
        	$('#batch_id').val(data[0]);
        	$('#batchyear').val(data[1]);
        });
        });
        
    </script>
  <?php include('includes/footer-admin.php');
  include('includes/script.php'); ?>