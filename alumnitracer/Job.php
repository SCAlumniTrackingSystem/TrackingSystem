<?php
$title = 'Contact Us';
session_start();
include('includes/header.php');
include('includes/navbar1.php');
include ('includes/connection.php');
?>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<div class="py-5" style="margin-top: 8%;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5">

			
				<div class="card shadow">
					
					<div class="card-body" >
						<div class="text-center">
						<img src="uploads/cvsu.png" alt="cvsu" width="75" height="65">
</div>
						<form method="POST" action = "complain-code.php">
                     
                        <div class="form-group">
	<label for="">Email Address</label>
    <input type="text" class="form-control" name="em" value="">
  </div>
  
  <div class="form-group">
 <label>Description</label>
 <textarea name="description" id="summernote" name="description" class="form-control" rows= "4" required=""></textarea>
</div>
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

<?php include('includes/footer.php');
include('includes/script.php'); ?>