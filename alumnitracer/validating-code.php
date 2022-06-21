<?php
session_start ();

include ('includes/connection.php');



if(isset($_POST['check'])){
    $stntid = $_POST["studentnum"];
    
    
        $query = "SELECT * FROM registration 
        INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID 
        WHERE studentnumber ='$stntid' LIMIT 1";
        $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION ['status'] = "You Already Activate Your Account";
        $_SESSION['status_code'] = "info";
        header("Location: validating.php");
        exit(0);
    }
    else{
        
        $query = "SELECT * FROM gradlist_tbl WHERE studentnumber = '$stntid' LIMIT 1 ";
        $result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["grad_ID"];
		$stntid = $row["studentnumber"];
		session_start();
		$_SESSION['grad_ID'] = $row["grad_ID"];
	}
		
   
	header("Location: account_activation.php");
	
}
else {
    $_SESSION['status'] = "You are not in the Gradlist";
    $_SESSION['status_code'] = "warning";
	header("Location: validating.php");
	exit (0); 
}
        
    }
    }

?>