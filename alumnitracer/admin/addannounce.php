<?php
include 'a_authentication.php';
$title = 'Add Announcement';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

 <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="addannounce-code.php" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>Topic</label>
        		<input type="text" class="form-control" name="topic" required="">
        	</div>

          <div class="form-group">
            <label>Description</label>
                                <textarea name="description" id="summernote" name="description" class="form-control" rows= "4" required=""></textarea>
          </div>

          <div class="form-group">
            
                                 <input readonly value="0" type="hidden" id="inputState"  class="form-select" name="status">  
                                  
                                </input>
                                </div>

  <div class="form-group">
  <label>Image</label>
  <input class="form-control" type="file" name="image" id="image" onchange="getImagePreview(event)" required="">
  <div id="preview"></div>
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






<div class="col" style="margin-top: 12%;">
		<button type="button" class="btn btn-success badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#add" style="width: 80px; height: 40px;">
  ADD
</button>
	</div>



<?php
	$query="SELECT  * FROM announce";
	$query_run = mysqli_query($con,$query);
?>
<div class="tab">
 <table id="dept" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
        
    <thead class="table-dark">
    <tr>
   <th  scope="col" style="display:none;">ID</th>
    <th  scope="col">Topic</th>
    <th scope="col">Description</th>
       <th scope="col">Image</th>
     
       <th scope="col">Action</th>

      
    </tr>
  </thead>

  <?php
        while($row = mysqli_fetch_array($query_run)){
      
            echo '

                <tr >
                
          		 <td style="display:none;"> '.$row["announceID"].'</td>
                <td> '.$row["topic"].'</td>
                <td> '.$row["description_announce"].'</td>
                <td> <img src="../uploads/'.$row["image"].' " width="80" height="100"></td>
                

                
                <input type="hidden" class="delete_id_value" value="'.$row["announceID"].'">
                <td>  <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script>
        $(document).ready(function() {
        $('#dept').DataTable();
        });
        
    </script>

    

    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
           // $("#your_summernote").summernote();
             $('#summernote').summernote({
        placeholder: 'Type Your Description',
        tabsize: 2,
        height: 200
      });
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->


    <script type="text/javascript">
  function getImagePreview(event){
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="310";
    imagediv.appendChild(newimg);
    $(document).ready(function(){
      $('#insertdata').click(function(){
        var image_name = $('#image').val();
        if(image_name == ''){
          alert("Please Select Image");
          return false;
        }
        else{
          var extension = $('#image').val().split('.').pop().toLowerCase();
          if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
            alert('Invalid Image File');
            $('#image').val('');
            return false;
          }
        }
      });

    });

  }
</script>

<script>
        $(document).ready(function() {
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
                    url: "delete-announce.php",
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

      </script>
  <?php include('includes/footer-admin.php');
  include('includes/script.php'); ?>