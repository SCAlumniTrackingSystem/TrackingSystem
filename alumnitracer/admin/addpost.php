<?php
include 'a_authentication.php';
$title = 'Importing User';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<div class="container">
         <div class="row">
             <div class="col-md-12 mt-4">
           
                 <h5 style="margin-top:12%;">
Importing Users
                 </h5>
                 <hr>
                 <form action="import.php" method="POST" enctype="multipart/form-data">
                     <div class="card card-body shadow">
                         <div class="row">
                             <div class="col-md-2 my-auto">
                                 <h5>Select File</h5>
                             </div>
                             <div class="col-md-4">
                                 <input type="file" accept=".csv, .xlsx, .xls" name="import" class="form-control" required="" />
                             </div>
                             <div class="col-md-4">
                                 <button type="submit" name="import_file_btn" class="btn btn-success">Upload/Import</button>
                             </div>
                            <h10>*Please upload your file using the universisty format</h10>
                             <h10>*click <a href="file-format.php">Here</a> to see the excel format</h10>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>

     <div class="col-xl-3 col-md-g mx-auto">
<div class="card bg-dark text-white mb-4">
          <div class="card-body">Total Imported User
              <?php

              $query ="SELECT * FROM gradlist_tbl";
              $query_run = mysqli_query($con, $query);

              if ($students_total = mysqli_num_rows($query_run)) {
                echo '<h4 class="mb-0">'.$students_total.'</h4>';
              }
              else {
            echo '<h4 class="mb-0">No Data</h4>';
              }
              ?>
          </div>
           <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">All Users</a>
              <div class="small text-white"><i class="fas fa-angle-right"> </i></div>
          </div>
      </div>
  </div>
  <?php  
 
 $query ="SELECT * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name  FROM gradlist_tbl 
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID ";  
 $result = mysqli_query($con, $query);  
 ?>  

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manually adding of Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form method="POST" action="add-manual.php">
<div class="form-group">
    <label for="">Student Number</label>
    <input type="text" name="stdnt" class="form-control" required="">
</div>

<div class="form-group">
    <label for="">First Name</label>
    <input type="text" name="fname" class="form-control" required="">
</div>

<div class="form-group">
    <label for="">Middle Initial</label>
    <input type="text" name="MI" class="form-control" required="">
</div>

<div class="form-group">
    <label for="">Last Name</label>
    <input type="text" name="lname" class="form-control" required="">
</div>

<div class="form-group">
<label for="">Department</label>
    <select id="inputState" class="form-select" name="deptID" required="">  
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
    <select id="inputState" class="form-select" name="courseID" required="">  
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
    <select id="inputState" class="form-select" name="batchID" required="">  
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
<br>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add-user">Add</button>
      </div>
      </div>
</form>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal update -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form method="POST" action="updateuser.php">
          <input type="hidden" name="id" id="update_id">
          <div class="form-group">
            <label>Student Number</label>
            <input type="text" id="upd" class="form-control" name="snum">
          </div>
          <div class="form-group">
            <label>Firstname</label>
            <input type="text" id="upd_name" class="form-control" name="fname" >
          </div>
          <div class="form-group">
            <label>Middle</label>
            <input type="text" id="upd_name1" class="form-control" name="MI" >
          </div>
          <div class="form-group">
            <label>Lastname</label>
            <input type="text" id="upd_name2" class="form-control" name="lname" >
          </div>
<div class="form-group">
<label for="">Department</label>
    <select id="inputState" class="form-select" name="deptID" >  
        <option></option>
        <?php
        $query = "SELECT * FROM department ORDER by deptID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
          ?>
<option value="<?php echo $row['deptID'] ?>"><?php echo $row['department'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

<div class="form-group">
<label for="">Course</label>
    <select id="inputState1" class="form-select" name="courseID" >  
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
    <select id="inputState2" class="form-select" name="batchID" >  
        <option></option>
        <?php
        $query = "SELECT * FROM batch ORDER by batchID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
          ?>
<option value="<?php echo $row['batchID'] ?>"><?php echo $row['batchyear'] ?></option>
  <?php endwhile; ?>
    </select>
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




    <div class="row">
      <div class="col-md-12">
      <button type="button" style="margin-left:  87%; margin-top: 50px;" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg></button>
      </div>
  </div>

            <div class="container">  
                <h3 align="center">LIST OF IMPORTED USER</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
                          <thead class="table-dark">  
                               <tr>   <td style="display:none;">ID</td>
                                    <td>StudentNumber</td>  
                                    <td>Name</td>  
                                    
                                    <td>Department</td>  
                                    <td>Course</td>  
                                    <td>Batch</td> 
                                    <td>Action</td>   

                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  <td style="display:none;">'.$row["grad_ID"].'</td>
                                    <td>'.$row["studentnumber"].'</td>  
                                    <td>'.$row["name"].'</td> 
                                    <td>'.$row["dept"].'</td>  
                                    <td>'.$row["course"].'</td>  
                                    <td>'.$row["year"].'</td> 
                                    <form method="POST" action="updatedata.php"> 
                                    <input type="hidden" name="id" value="'.$row["grad_ID"].'">
                                    <td class="text-center"><button type="submit"class="btn btn-sm btn-outline-primary editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg></button>
                                  </form>

                                  <input type="hidden" class="delete_id_value" value="'.$row["grad_ID"].'">
                                  <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                   <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                     </a> 

                                    </td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#table').DataTable();

      $('#table tbody').on('click', '.delete_btn_ajax', function () {
//alert("you activate the event");

      
       $('.editbtn').on('click', function(){
          $('#update').modal('show');
          $tr = $(this).closest('tr');
          var data= $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
          $('#update_id').val(data[0]);
          $('#upd').val(data[1]);
           $('#upd_name').val(data[2]);
            $('#upd_name1').val(data[3]);
             $('#upd_name2').val(data[4]);
           $('#inputState').val(data[5]);
           $('#inputState1').val(data[6]);
           $('#inputState2').val(data[7]);
        });  
        $('.delete_btn_ajax').click(function (e){
              e.preventDefault();
                //
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
               
                //console.log(deleteid);
                swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    type: "POST",
                    url: "delete-user.php",
                    data: {
                      "delete_btn_set": true,
                      "delete_id": deleteid
                     
                    },
                    success: function(response){
                      swal("Data Deleted Succesfully!",{
                        icon: "success",
                      }).then((result) => {
                        location.reload();
                      });


                    }
                   

                  });
                } 
              });


          });

        });

 });  
 </script>   



<?php include('includes/footer-admin.php');
include('includes/script.php'); ?>