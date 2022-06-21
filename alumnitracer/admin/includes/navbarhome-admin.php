<?php

include ('../includes/connection.php');
$id = $_SESSION['id'];
$login_query ="SELECT  * , CONCAT (Fname, ' ' , MI ,' ',Lname) AS name FROM admin
WHERE adminID = '$id'";


$result = mysqli_query($con, $login_query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {

   
    $name = $row["name"];
    


   
   
  }
}

?>
<style>
.navbar-brand{
			margin-left: 3%;
}


  </style>

<div class="bg-dark"> 
<div class="container">
  <div class="row">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
  <div class="container-fluid"> 
  <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
  <span class="navbar-toggler-icon" ></span>
 </button>
  <img src="../uploads/cvsu.png" alt="mdo" width="100" height="90" style="margin-left: 23%;" >
  <a class="navbar-brand text-center fs-5">Cavite State University - Silang Campus <br>Alumni Tracking System</a> 
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
  </div>
</nav>
  </div>
</div>
</div>
<div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-3 text-white bg-dark overflow-auto" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 280px;">
  

<button type="button" class="btn-close btn-close-white"  data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <img src="../uploads/cvsu.png" alt="mdo" width="50" height="45" style="margin-right: 2%;" >
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li  class="nav-item" >
        <a href="dashboard.php" class="nav-link text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#dashboard"/></svg>
          Dashboard
        </a>
      </li>

      <li>
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapseadd" aria-expanded="false" aria-controls="collapseExample">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#charts"/></svg>
          Add
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>        </a>
        <div class="collapse" id="collapseadd" >
  <div class=" bg-dark text-white ">
<ul style="list-style: none; margin-left: 5%;">
            <li><a href="add_dep.php" class="text-white" >Department</a></li>
            <li><a href="add_crs.php" class="text-white">Course</a></li>
            <li><a href="addbatch.php" class="text-white">Batch Year</a></li>
            <li><a href="addannounce.php" class="text-white">Announcement</a></li>
           
          </ul>  
  </div>
</div>
      </li>

      <li>
        <a href="request.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Requesting
        </a>
      </li>

      <li>
        <a href="addpost.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Importing User
        </a>
      </li>

      <li>
        <a href="complains.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Complaints
        </a>
      </li>

      <li>
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapseregs" aria-expanded="false" aria-controls="collapseExample">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#charts"/></svg>
          Registered User
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>        </a>
        <div class="collapse" id="collapseregs" >
  <div class=" bg-dark text-white ">
<ul style="list-style: none; margin-left: 5%;">
            <li><a href="registered-user.php" class="text-white" >DIT</a></li>
            <li><a href="registered-user-DOM.php" class="text-white">DOM</a></li>
            <li><a href="registered-user-TED.php" class="text-white">TED</a></li>
            <li><a href="registered-user-DAS.php" class="text-white">DAS</a></li>
            
          </ul>  
  </div>
</div>
      </li>

     

        <li>
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapseExample">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#charts"/></svg>
          Survey Form
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>        </a>
        <div class="collapse" id="collapse" >
  <div class=" bg-dark text-white ">
<ul style="list-style: none; margin-left: 5%;">
         <li>
        <a href="srv-BSIT.php" class="text-white">BSIT</a></li>
            <li><a href="srv-BSCS.php" class="text-white" >BSCS</a></li>
            <li><a href="srv-BSP.php" class="text-white">BSP</a></li>
            <li><a href="srv-BSTM.php" class="text-white">BSTM</a></li>
            <li><a href="srv-BSHM.php" class="text-white">BSHM</a></li>
            <li><a href="srv-BEED.php" class="text-white">BEED</a></li>
            <li><a href="srv-BSED.php" class="text-white">BSED</a></li>
            <li><a href="srv-BSBM.php" class="text-white">BSBM</a></li>
          </ul>
          
  </div>
</div>
      </li>

       <li>
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#charts"/></svg>
          Reports
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
        </a>
        <div class="collapse" id="collapseExample" aria-expanded="false">
  <div class=" bg-dark text-white ">
<ul style="list-style: none; margin-left: 5%;">
         <li>
        <a href="BSIT.php" class="text-white">BSIT</a></li>
            <li><a href="BSCS.php" class="text-white" >BSCS</a></li>
            <li><a href="BSP.php" class="text-white">BSP</a></li>
            <li><a href="BSTM.php" class="text-white">BSTM</a></li>
            <li><a href="BSHM.php" class="text-white">BSHM</a></li>
            <li><a href="BEED.php" class="text-white">BEED</a></li>
            <li><a href="BSED.php" class="text-white">BSED</a></li>
            <li><a href="BSBM.php" class="text-white">BSBM</a></li>
          
          </ul>
          
  </div>
</div>
      </li>

      <li>
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapsecharts" aria-expanded="false" aria-controls="collapseExample">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#charts"/></svg>
          Charts
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
        </a>
        <div class="collapse" id="collapsecharts" aria-expanded="false">
  <div class=" bg-dark text-white ">
<ul style="list-style: none; margin-left: 5%;">
            <li><a href="charts-BSIT.php" class="text-white">BSIT</a></li>
            <li><a href="charts-BSCS.php" class="text-white" >BSCS</a></li>
            <li><a href="charts-BSP.php" class="text-white">BSP</a></li>
            <li><a href="charts-BSTM.php" class="text-white">BSTM</a></li>
            <li><a href="charts-BSHM.php" class="text-white">BSHM</a></li>
            <li><a href="charts-BEED.php" class="text-white">BEED</a></li>
            <li><a href="charts-BSED.php" class="text-white">BSED</a></li>
            <li><a href="charts-BSBM.php" class="text-white">BSBM</a></li>
          
          </ul>
          
  </div>
</div>
      </li>


    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        
        <strong style="margin-left: 15%;"> <?php echo $name; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="register.php">Add Admin</a></li>
        <li><a class="dropdown-item" href="a_change-pass.php">Change Password</a></li>
        <li><a class="dropdown-item" href="a_update-profile.php">Update Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="a_logout.php">Sign out</a></li>
      </ul>
    </div>
 

</div>