
<style>

.navbar-nav{
			margin-left: auto;

}

.navbar > ul > li{
  display: inline-block;
}
.navbar > ul > li > a{
  color: #fff;
  cursor: pointer;
  display: inline-block;
  

}
.navbar ul li .dropdown {
 position: absolute;
 top: 100%;
 right: 0;
 background-color: #fff;
 border: 1px solid #ccc;
 padding: 1rem;
 visibility: hidden;
 opacity: 0;
 transition: 0.3s;
 width: 250px;
}
.navbar ul li .dropdown li{
  margin-bottom: 1rem;
  border-bottom: 1px solid #ccc;
  padding-bottom: 1rem;
 
}
.navbar ul li .dropdown li:last-child{
  margin-bottom: 0;
  padding-bottom: 0;
  border-bottom: 0;
}
.navbar > ul > li .dropdown-check:checked ~ .dropdown{
  visibility: visible;
  opacity: 1;

}
.navbar > ul > li .dropdown-check{
  display: none;
}
.navbar > ul > li > a  .count{
  position: absolute;
  right: -6px;
  top: -1px;
  border-radius: 50%;
  font-size: 0.8rem;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: red;
  color: #fff;
  width: 12px;
  height: 13px;
}


  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
 
<?php
include ('includes/connection.php');
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

   
    $name = $row["name"];
    


   
   
  }
}

?>

<div class="bg-dark"> 
<div class="container">
  <div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid"> 
 <img src="uploads/cvsu.png" alt="mdo" width="50" height="45" style="margin-right: 2%;" >
  <a class="navbar-brand" href="home.php">Cavite State University-Silang Campus Alumni Tracking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="survey-form.php">Survey</a>
        </li>
       
        <!---<li class="nav-item dropdown">//
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Alumni
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="dit_list.php">DIT</a></li>
            <li><a class="dropdown-item" href="dom_list.php">DOM</a></li>
             <li><a class="dropdown-item" href="das_list.php">DAS</a></li>
             <li><a class="dropdown-item" href="ted_list.php">TED</a></li>
          </ul>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <strong> <?php echo $name; ?></strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
            <li><a class="dropdown-item" href="update-profile.php">Update Profile</a></li>
             <li><a class="dropdown-item" href="change-pass.php">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>

        <div class="navbar">

          <ul>
            <li>
              <?php
              include ('connection.php');
              
              $query = "SELECT * FROM announce WHERE notif_status ='0' ORDER BY announceID DESC";
              $query_run = mysqli_query($con, $query) or die(mysqli_error($con));

              ?>
              <a href="#" id="notifactions"><label for="check">
                <i class="fa fa-bell-o" aria-hidden="true" style="margin-left:-20px; font-size: 1.25rem;"></i></label>
                <span class="count"><?php echo mysqli_num_rows($query_run); ?></span>
              </a>
              <input type="checkbox" class="dropdown-check" id="check" />
              
                <ul class="dropdown" style="list-style: none;">
                <?php
                
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $item) {
                ?>
                 <li><?php echo $item["topic"]; ?></li>
               <?php }
             } ?>
  </ul>
            </li>
          </ul>
          
        </div>

        <?php
         
        /*  <li class="notif">
          <a href="#" id="notifactions"><label for="check">
              <i class="fa fa-bell-o" aria-hidden="true"></i>
              <span class="count" style=" position: absolute; right: 30px; top: 15px; background-color: #fff; color: #0066ff; width: 12px; height: 12px; border-radius: 50%; font-size: 0.8rem; display: flex;justify-content: center;align-items: center;">3</span>
            </label>
            
          </a>
          <input type="checkbox" class="dropdown-check" id="check">

                <ul class="dropdowns">
                  <li>Notifications 1</li>
                </ul>

      </li>  */
      ?>

        </ul>
      
      </ul>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
$("#notifactions").on("click", function(){
$.ajax({
  url: "notif.php",
  success: function(res){
    console.log(res);
  }

});
});
  });
</script>
  </div>
</div>
</div>

