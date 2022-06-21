<?php
include 'a_authentication.php';
$title = 'Admin Change Password';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>


<div class="py-5" style="margin-top: 5%;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow">
                    <div class="card-header text-secondary">
                        <h5>
                            Change Password
                        </h5>
                        
                    </div>
                    <div class="card-body" >
                        <form method="POST" action = "a_change-pass-code.php">
                            <div class="form-group">
                                <input type="hidden" value=" <?= $_SESSION['auth_user'] ['email']; ?>">
                                <input type="hidden" value=" <?php echo $_SESSION['id']; ?>">
    <label for="">Old Password</label>
    <input type="password" class="form-control" name="old" value="" required="">

  </div>

  <div class="form-group">
    <label for="">New Password</label>
    <input type="password" class="form-control" name="new" value="" required="">
  </div>
  
  <div class="form-group">
    <label for="">Confirm Password</label>
    <input type="password" class="form-control" name="newp" value="" required="">
  </div>
  <div>
    <br>
    <button type="submit" class="btn btn-primary float-end" name="change"> Change
    </button>
 
  </div>        
                            </div>
                        </form>



                    </div>
                </div>
                
            </div>
            
        </div>
    </div>

</div>


<?php include ('includes/footer-admin.php');
include ('includes/script.php'); ?>