<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

if (isset($_SESSION['status'])) {
    ?>

   
        <script>
        swal({
  title: "<?php echo $_SESSION['status'] ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code'] ?>",
  button: "OK",
 
});
</script>
</div>
<?php
unset($_SESSION['status']); 
}
?>