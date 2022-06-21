<?php

$title = 'Change Password';
include ('authentication.php');
include ('includes/connection.php');

include('includes/header.php'); ?>
<?php include('includes/navbarhome.php');
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
                        <form method="POST" action = "change-pass-code.php">
                            <div class="form-group">
                                <input type="hidden" value=" <?= $_SESSION['auth_user'] ['email']; ?>">
                                <input type="hidden" value=" <?php echo $_SESSION['regs_ID']; ?>">
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

<?php include('includes/footer.php');
include('includes/script.php'); ?>