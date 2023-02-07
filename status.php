<?php
	$file_name = "status.xml";
	$xmldata = simplexml_load_file($file_name) or die("Failed to load");
 	
 	include "header.php";
 ?>
<div class="section_status">
	<div class="folder_button">

	</div>	
	<?php 
		foreach($xmldata->children() as $empl) { ?>
	       <div class="file_heading_button">
	       	<div class="page_stataus_div">
	       		<div class="status_input">
	       			<p class="status_heading"><?php echo $empl->name; ?></p>
	       			<p><?php echo $empl->updated; ?></p>
	       		</div>
	       		<div style="background-color: <?php echo $empl->status; ?>;" class="color_biv"></div>
	       	</div>
	       </div>

	<?php }

	?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assests/js/custom.js"></script>
</body>
</html>