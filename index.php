<?php

include 'header.php';

?>

<?php 
	if (isset($_POST['submit'])) {
		$folder_name = $_POST['folder_name'];
		$directory = 'download/'.$folder_name;

		$myfile = fopen("project.txt", "w") or die("Unable to open file!");
		$txt = $directory;
		fwrite($myfile, $txt);
		fclose($myfile);
		
	}

	$file = "project.txt";
	$doc = file_get_contents($file);
	$directory = $doc;
	$project_name = str_replace('download/', '', $doc);

?>

<div class="section_img">
	<div class="img_pdf_1">
		<img src="report/<?php echo $project_name; ?>/header_map.png">
	</div>

</div>

<iframe src="report/<?php echo $project_name; ?>/daily_report.pdf" width="100%" height="600px">
    </iframe>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assests/js/custom.js"></script>
</body>
</html>
