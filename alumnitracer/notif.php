<?php


include ('includes/connection.php');


$sql ="UPDATE announce SET notif_status = '1' ";
$result = mysqli_query($con, $sql);
if ($result) {
	echo "Success";
}
else{
	echo "Failed";
}


?>
	
