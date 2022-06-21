<?php 
//session_start();
include ('../includes/connection.php');

if(isset($_POST['delete_btn_set'])){


	$id = $_POST['delete_id'];
	$query = "DELETE  FROM announce  WHERE announceID ='$id'";
	$query_run = mysqli_query($con, $query);

	if($query_run)
	{
		
		// $_SESSION['status'] = "POST has been deleted";
         ///   header("Location: addannounce.php");
          //  exit (0); 
	}
	else{
		// $_SESSION['status'] = "POST not deleted";
          //  header("Location: addannounce.php");
           // exit (0); 
	}
}


 ?>