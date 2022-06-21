<?php
$title = 'Survey';
include ('authentication.php');

include ('includes/connection.php');


include('includes/header.php'); 
include('includes/navbarhome.php');
 ?>






<form method="POST" action="checking-srv.php">
<div class="card border-dark mx-auto" style="width: 60%; margin-top:8%; ">
  <div class="card-header border-dark text-primary" style="text-align: center;" >
    Terms and Conditions
  </div>
  <div class="card-body" style="text-align: justify;">
    <h5 class="card-title" style="text-align: center;">Consent</h5>
    <p class="card-text">Good Day Alumni!
 The Alumni Tracer would require you to provide some personal information. Before you respond to this online form. Clicking on the "I Agree" checkbox indicate that
<p>1. You are a graduate of Cavite State University Silang - Campus.</p>
<p>2. You have read the above information.</p>
<p>3. You voluntarily agree to respond.</p>

<p>We value and protect you personal information in compliance with the Data Privacy Act 2012. The information that you will be treated with strict confidentiality and 
will be securely stored accessible only to the authorized persons.
</p>
</p>


<input type ="hidden" name ="regsID" value ="<?php echo $_SESSION['regs_ID'];  ?>">
<button type="submit" name="agree" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  I Agree
</button>
</form>
  </div>
</div>




<?php include('includes/footer.php');
include('includes/script.php'); ?>