<?php
session_start ();

include ('../includes/connection.php');



if (isset($_POST['login']))
 {

if (!empty(trim($_POST['email'])) && !empty(trim($_POST['pass'])))
{
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $pass = MD5 ($pass);

    $login_query = "SELECT  * , CONCAT (Fname, ' ' , MI ,' ',Lname) AS name FROM admin WHERE email = '$email' && password = '$pass' LIMIT 1 ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0 )
     {

        $row =  mysqli_fetch_array($login_query_run);
        if ($row['verify_status'] == "1") {

            $_SESSION['authenticated'] = TRUE;
            $_SESSION['auth_user'] = [ 'name' => $row['name'],
                                        'email' =>$row['email'],

        ];

        $_SESSION ['id'] = $row ["adminID"];
        $_SESSION['status'] = "Admin logged in";
        $_SESSION['status_code'] = "success";
            header("Location: dashboard.php");
            exit (0); 
            
        }    

        else {
            
            $_SESSION['status'] = "Please verify you email address to login";
            $_SESSION['status_code'] = "warning";
            header("Location: index.php");
            exit (0); 
        }
    }

    else
     {
        
        $_SESSION['status'] = "Invalid Email  or Password";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit (0); 
    }


}
else {
    
    $_SESSION['status'] = "All fields are Required";
    $_SESSION['status_code'] = "info";
    header("Location: index.php");
    exit (0); 
}
   

}



?>