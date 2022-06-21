<?php
$title = 'Home';
include ('authentication.php');

include ('includes/connection.php');


include('includes/header.php'); ?>
<?php include('includes/navbarhome.php');
 ?>
<style>
	 
	 .card-body.showContent p{
height:auto;
	 }
	 .box p {
		 height: 90px;
		 overflow: hidden;
	 }
	 .box{
		 align-items:justify;
	 }
	 </style>

<?php
    $event = $con->query("SELECT  * FROM announce ORDER by created desc");
    while($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['description_announce']),$trans);
        $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
    ?>
	<div class="box">
	<div class="card border-primary mx-auto"style="width: 50%; margin-top:8%;">
  <div class="card-header  border-primary text-primary text-uppercase" style="text-align: center;">
  <?php echo $row['topic'] ?>
  </div>
  <div class="card-body">
       <p class="card-text" style="text-align: justify;"><?php echo strip_tags($desc) ?></p>
       <img src="uploads/<?php echo $row['image'] ?> " width="400" height="300">	
	<hr>
	<p>Posted on: <?php echo $row['created'] ?> </p>
    <button type="button" class="btn btn-outline-primary btn-sm float-end readmore-btn">Read More</button>
  </div>
</div>
</div>
    <?php endwhile; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$('.readmore-btn').on('click',function(){
		$(this).parent().toggleClass("showContent");
		//var = replaceText = $(this).parent().hasClass("showContent") ? "Read Less" : "Read More";
		//$(this).text(replaceText);
	});
	</script>


<?php include('includes/footer.php');
include('includes/script.php'); ?>
