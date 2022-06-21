<?php
session_start ();
include ('includes/connection.php');
if (isset($_POST['login']))
 {

if (!empty(trim($_POST['email'])) && !empty(trim($_POST['pass'])))
{
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $pass = MD5 ($pass);

    $login_query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM registration
     INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
     INNER JOIN department on gradlist_tbl.deptID = department.deptID
     INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
     INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
     WHERE email = '$email' AND password = '$pass' LIMIT 1 ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0 )
     {

        $row =  mysqli_fetch_array($login_query_run);
        if ($row['verify_status'] == "1") {

            $_SESSION['authenticated'] = TRUE;
           $_SESSION['auth_user'] = [ 'name' => $row['name'],
                                     'dept' => $row['department'],
                                     'batch' =>$row ['batchyear'],
                                     'course' =>$row['course'],
                                       'add' => $row ['address'],
                                        'phone' =>$row['phone'],
                                      'email' =>$row['email'],
                                       'regsID' =>$row['regsID'],

        ];
        $_SESSION['regs_ID'] = $row["registerID"];
        $_SESSION['status'] = "You logged in";
        $_SESSION['status_code'] = "success";
            header("Location: home.php");
            exit (0); 
            
        }    

        else {
            
            $_SESSION['status'] = "Please verify you email address to login";
            $_SESSION['status_code'] = "warning";
            header("Location: login.php");
            exit (0); 
        }
    }

    else
     {
        
        $_SESSION['status'] = "Invalid Email  or Password";
        $_SESSION['status_code'] = "error";
        header("Location: login.php");
        exit (0); 
    }


}
else {
    
    $_SESSION['status'] = "All fields are Required";
    $_SESSION['status_code'] = "info";
    header("Location: login.php");
    exit (0); 
}
   

}



?>