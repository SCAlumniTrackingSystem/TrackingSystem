<?php

$title = 'View Profile';
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
    $name = $row["name"];
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
    .card {
    width: 50%;
    margin: 75px auto 0;
    background-color: #fff;
    box-shadow: 0 3px 30px rgba(0, 0, 0, .14);
    color: #444;
    text-align: center;
    font-size: 16px;
    margin-top: 10%;
}

.card .card-header {
    position: relative;
    height: 48px;
}

.card .card-header .img {
    width: 96px;
    height: 96px;
    border-radius: 1000px;
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 6px solid #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, .2);
}

.card .card-body {
    padding: 10px 40px;
}
.card .card-body .card-text {
    font-size: 16px;
    font-weight: 600;
    text-align: left;
    margin: 10px 0 0;
}
     </style>

 
<div class="card">
    <div class="card-header">
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
    </div>
    <div class="card-body">
    <p class="card-text"><?php echo $name; ?></p>
    <p class="card-text"><?php echo $stntid; ?></p>
    <p class="card-text"><?php echo $email; ?></p>
    <p class="card-text"><?php echo $add; ?></p>
    <p class="card-text"><?php echo $bday; ?></p>
    <hr>
    <p class="card-text"><?php echo $department; ?></p>
    <p class="card-text"><?php echo $courses; ?></p>
    <p class="card-text"><?php echo $batch; ?></p>  
    <hr>
    <?php
$id = $_SESSION['regs_ID'];
 $toj= $pos = $com = $yr= $status= $job ='';
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
<p class="card-text"><?php echo $status; ?></p>
    <p class="card-text"><?php echo $toj; ?></p>
    <p class="card-text"><?php echo $pos; ?></p>
    <p class="card-text"><?php echo $com; ?></p>
    <p class="card-text"><?php echo $yr; ?></p>
<hr>

    </div>
</div>




<?php include('includes/footer.php'); ?>