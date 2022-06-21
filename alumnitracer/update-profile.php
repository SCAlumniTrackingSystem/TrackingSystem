<?php

$title = 'Update Profile';
include ('authentication.php');
include ('includes/connection.php');

include('includes/header.php'); ?>
<?php include('includes/navbarhome.php');
$id = $_SESSION['regs_ID'];
$login_query ="SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM registration
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
WHERE registerID = '$id'";

$result = mysqli_query($con, $login_query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
   $profile = $row["profile"];
   $stntid = $row["studentnumber"];
   $fname = $row["firstname"];
   $MI = $row["middle"];
   $name = $row["name"];
   $lname = $row ["lastname"];
    $deptID = $row["deptID"];
    $department =$row["dept"];
    $courseID = $row["courseID"];
    $courses =$row["course"];
   $batchID = $row["batchID"];
    $batch =$row["year"];
    $email =$row["email"];
    $phone =$row["phone"];
    $add =$row["address"];
    $gender =$row["gender"];
    $bday =$row["birthday"];
  }
}

?>


<style>
    .upload{
      width: 100px;
      position: relative;
      margin:auto;
      background: #808080;
        color: #eeeeee;
        border-radius: 50px;
  float:right;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.1rem;
        margin-top: 7%;
        margin-right: 7%;

    }
    .upload img{
      border-radius: 60%;
      border: 8pxsolid #DCDCDC;
      height: 85px;
      width: 100px;
      margin-top: -30%;
    }
.upload .round{
  position: absolute;
  background: #00B4FF;
  bottom: 0;
  right:0;
  width: 32px;
  line-height: 33px;
  text-align:center;
  border-radius: 50%;
  overflow:hidden;
}
.upload .round input[type = "file"]{
  position: absolute;
  transform: scale(2);
  opacity: 0;
}
input[type=file]::-webkit-file-upload-button{
  cursor:pointer
}
    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <div class="py-5" style="margin-top: 2%;">
     

<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">
 
    <div class="signup-form">
      <form id="form" enctype = "multipart/form-data" method="POST" action="#" class="form">
      <div class="upload">
      <?php
      $id = $_SESSION['regs_ID'];
      $login_query ="SELECT  profile  FROM registration WHERE registerID = '$id'";
      $result = mysqli_query($con, $login_query);
       while ($row = mysqli_fetch_assoc($result)) {
         if ($row["profile"] == "") {
           echo " <img src= 'uploads/default.jpg' class='img'> ";
         }
         else {
        echo  " <img src='uploads/".$row["profile"]."' class='img' > ";
         }
       }
    ?>
        
        <div class="round">
        <input type="hidden" name="id" value="<?php echo $id; ?>" >
        <input type="hidden" name="name" value="<?php echo $name; ?>" >
        <input type="file" name="image" id="image" accept = ".jpg, .jpeg, .png">
        <i class=" fa fa-camera" style="color: #fff;"> </i>
        </div>
        </div>
</form>


        <form class="mt-5 border p-5 bg-light shadow" id="form" enctype = "multipart/form-data" method="POST" action="update-code-profile.php">
 
            <h4 class="mb-5 text-secondary">Update Profile</h4>
          

     <div class="row">

     <div class="mb-3 col-md-6">
                <label>Student number</label>
  
                <input type="text" class="form-control"  name="snum" value="<?php  echo $stntid; ?>">
           
  </div>

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
  <label>Department</label>
    <select id="inputState" class="form-select" name="deptID">  
      <option value="<?php echo $deptID ?>"><?php echo $department?></option>
        <?php
        $query = "SELECT * FROM department";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
        	?>
<option value="<?php echo $row['deptID'] ?>"><?php echo $row['dept'] ?></option>
  <?php endwhile; ?>
        
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Course</label>
    <select id="inputState" class="form-select" name="courseID">
        <option value="<?php echo $courseID ?>"><?php echo $courses ?></option>
        
        <?php
        $query = "SELECT * FROM courses";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
        	?>
<option value="<?php echo $row['courseID'] ?>"><?php echo $row['course'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Batch</label>
  <select id="inputState" class="form-select" name="batchID">
        <option value="<?php echo $batchID ?>"><?php echo $batch ?></option>
        <?php
        $query = "SELECT * FROM batch";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
        	?>
<option value="<?php echo $row['batchID'] ?>"><?php echo $row['year'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

<div class="mb-3 col-md-6">
  <label>Gender</label>
  <br>
    <input type="radio" name="gender" value="<?php echo $gender ?>">
    <label>Male</label>
    <input type="radio" name="gender" value="<?php echo $gender ?>">
    <label>Female</label>
</div>

<div class="mb-3 col-md-6">
  <label>Birthday</label>
                <input type="date" class="form-control"  name="bday" value="<?php echo $bday ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Full addres</label>
                <input type="text" class="form-control" name="add" value="<?php echo $add ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Phone number</label>
                <input type="tel" class="form-control"  name="phone" value="<?php echo $phone ?>">
</div>

<div class="mb-3 col-md-6">
  <label>Email Address</label>
                <input type="text" class="form-control"  name="email" value="<?php echo $email ?>">
</div>
<div class="mb-3">
  	<button type="submit" class="btn btn-primary float-end" name="Update-prof"> Update </button>
  </div>

    </div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php

$id = $_SESSION['regs_ID'];

 $status = $toj = $pos = $com = $yr = $job = "";
$login_query ="SELECT  *  FROM survey
 INNER JOIN registration on survey.registerID = registration.registerID
 INNER JOIN employment on survey.emID = employment.emID
 INNER JOIN jobalign on survey.jobID = jobalign.jobID
 WHERE registration.registerID = '$id'";
 
 $result = mysqli_query($con, $login_query);
 if(mysqli_num_rows($result) > 0)
 {
   while($row = mysqli_fetch_assoc($result))
   {
   
    $emID = $row["emID"];
    $status =$row["status"];

    $toj =$row["jobtitle"];
    $pos =$row["jobposition"];

    
    $com =$row["company"];

    $yr =$row["yearemployed"];

    $jobID =$row["jobID"];
    $job =$row["align"];   
   }
  }

?>
<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">
    <div class="signup-form">
        <form class="mt-5 border p-5 bg-light shadow" method="POST" action="update-survey-form.php">
            
     <div class="row">

     <div class="mb-3 col-md-6">
<label for="">Employment Status</label>
    <select id="inputState" class="form-select" name="emID">  
    <option value="<?php echo $emID ?>"><?php echo $status ?></option>
    <?php
        $query = "SELECT * FROM employment";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
          ?>
<option value="<?php echo $row['emID'] ?>"><?php echo $row['status'] ?></option>
  <?php endwhile; ?>
    </select>
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label">Title of Job</label>
                <input type="text" class="form-control"  name="toj" value="<?php echo $toj ?>">
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label"> Job Position</label>
                <input type="text" class="form-control" name="jpos" value="<?php echo $pos ?>">
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label">Company Name</label>
    <input type="text" class="form-control"  name="company" value="<?php echo $com ?>" >
</div>

<div class="mb-3 col-md-6">
<label for="exampleInputEmail1" class="form-label">Year Employed</label>
    <input type="text" class="form-control"  name="year-emp" value="<?php echo $yr ?>" >
</div>

<div class="mb-3 col-md-6">
<label for=""> job inlinement</label>
    <select id="inputState" class="form-select" name="jID">  
    <option value="<?php echo $jobID ?>"><?php echo $job ?></option>
<?php
        $query = "SELECT * FROM jobalign";
        $query_run = mysqli_query($con,$query);
 while($row=$query_run->fetch_assoc()):
   
          ?>
<option value="<?php echo $row['jobID'] ?>"><?php echo $row['align'] ?></option>
  <?php endwhile; ?>
    </select>
</div>
<div class="mb-3">
<button type="submit"  name="Update-surv" class="btn btn-primary float-end" >Update</button>
  </div>
</div>
</form>

</div>
</div>
</div>
</div>


<script>
  document.getElementById("image").onchange = function(){
    document.getElementById('form').submit();
  }
  </script>
  <?php
  if (isset($_FILES["image"]["name"])) {
    $id = $_POST ["id"];
    $name =$_POST["name"];

    $imageName = $_FILES["image"] ["name"];
    $imageSize = $_FILES["image"] ["size"];
    $tmpName = $_FILES["image"] ["tmp_name"];

    // Image Validation

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.',$imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
      "
      <script>
      alert('Invalid Image Extension');
      document.location.href ='../alumnitracer/update-profile.php';
      </script>
      ";
    }
    elseif ($imageSize > 1200000) {
      echo
      "
      <script>
      alert('Image Size is too large');
      document.location.href ='../alumnitracer/update-profile.php';
      </script>
      ";
    }
    else {
    $newImageName = $name . " - " . date("Y.m.d") . " - " .date("h.i.sa");
    $newImageName .= "." . $imageExtension;
    $query="UPDATE registration set profile = '$newImageName' WHERE registerID = '$id'";
    mysqli_query($con, $query);
    move_uploaded_file($tmpName, 'uploads/' . $newImageName);
    echo
    "
    <script>
    
    document.location.href ='../alumnitracer/update-profile.php';
    </script>
    ";

    }
  }

  ?>
  <?php include('includes/footer.php');
  include('includes/script.php'); ?>
