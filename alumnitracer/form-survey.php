<?php
$title = 'Survey Form';
include ('authentication.php');
include('includes/header.php'); 
include('includes/navbarhome.php');
include ('includes/connection.php');


 ?>


<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2" style="margin-top:5%; ">
  
    <div class="signup-form" >
        <form class="mt-5 border p-5 bg-light shadow" method="POST" action="survey-code.php" enctype="multipart/form-data">
            <h4 class="mb-5 text-secondary">Survey Form</h4>
     <div class="row">

     <div class="mb-2 col-md-6">
     <label for="">Employment Status</label>
    <select id="inputState" class="form-select" name="emID" required="">  
        <option></option>
        <?php
        $query = "SELECT * FROM employment ORDER by emID asc";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
        	?>
<option value="<?php echo $row['emID'] ?>"><?php echo $row['status'] ?></option>
  <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3 col-md-6">
  <label for="exampleInputEmail1" class="form-label">Title of Job</label>
    <input type="text" class="form-control"  name="titlejob" placeholder="Enter your job title" required="">
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label">Job Position</label>
    <input type="text" class="form-control"  name="jobpos" placeholder="Enter your job position" required="">
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label">Company Name</label>
    <input type="text" class="form-control"  name="company" placeholder="Enter your company name" required="">
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label">Year Employed</label>
    <input type="text" class="form-control datepickerY" name="year" placeholder="Enter your year of employment" required="">
</div>

<div class="mb-3 col-md-6">
<label for="">Is your job inlined with your course graduated?</label>
    <select id="inputState" class="form-select" name="alignjob" required=""> 
     <option></option>
        
          <?php
        $query = "SELECT * FROM jobalign";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
        	?>
<option value="<?php echo $row['jobID'] ?>"><?php echo $row['align'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Proof of your are working</label>
  <input class="form-control" type="file" name="image" id="image" onchange="getImagePreview(event)" required="">
  <div id="preview"></div>
</div>

<div class="mb-3">
<button type="submit" name="save" class="btn btn-success float-end" >Save</button>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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

<?php include('includes/footer.php');
include('includes/script.php'); ?>