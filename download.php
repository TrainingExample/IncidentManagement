<?php
	include 'header.php';
	
	session_start();
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

<div class="section_downloand">
	<div class="folder_button">
		<h2><?php echo $project_name; ?></h2>
	</div>	
	<?php 
		$directory_name = "\\\\fileserver\\download\\$project_name";
		$scan = scandir($directory_name);
		foreach($scan as $file) {
		   if (!is_dir($directory_name."/$file")) {
		    ?>
		    	<div class="file_heading_button">
		    		<p><?php echo "$file\n"; ?></p>
		    		<a href="file.php?file=<?php echo $directory_name."/$file\n"; ?>">Download</a>
		    	</div>
		    <?php 
		   }
		}
	?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assests/js/custom.js"></script>
</body>
</html>