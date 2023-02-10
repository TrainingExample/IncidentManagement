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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $project_name; ?> - Wildland Fire Incident Support</title>
	<link rel="stylesheet" type="text/css" href="assests/css/style.css">
	<style>
		.file_heading_button input{
		    text-decoration: none;
		    cursor: pointer;
		    color: black;
		    font-size: 13px;
		    padding: 7px 21px;
		    background: #e9e9e9;
		    border-radius: 4px;
		    border: 0;
		}
		.popup_button{
			cursor: pointer;
		}
	</style>
</head>
<body>
<div class="main_div_box">
	<div class="container">
		<div class="all_button_nav_data">
			<div class="main_header_logo">
				<div class="side_logo_heading">
					<div class="side_logo">
						<img src="assests/img/logo.png">
					</div>
					<div class="header_heading">
						<h2>Forest Service</h2>
						<h3>Wildland Fire Incident</h3>
					</div>
				</div>
				<div class="side_name_heading">
					<h2><?php echo $project_name;  ?></h2>
					<a class="popup_button">Change Incident</a>
				</div>
			</div>
			<div class="popup_section">
				<div class="section_download section_download_2">
					<div class="folder_button">
						<h2>Select Incident</h2>
						<p class="close">X</p>
					</div>	
						<?php
							$directory_name = '\\\\dvm-tma-00133.microsoftdatabox.com\\incidents';
							$dir = new DirectoryIterator($directory_name);
							foreach ($dir as $fileinfo) {
								if (strpos($fileinfo, '__Microsoft Data Box Edge__') === false) {
									if ($fileinfo->isDir() && !$fileinfo->isDot()) {
										?>
										<form accept="<?php echo $_SERVER['REQUEST_URI']; ?>" class="file_heading_button" method="POST">
											<p><?php echo $fileinfo->getFilename(); ?></p> <input type="hidden" name="folder_name" value="<?php echo $fileinfo->getFilename(); ?>">
											<input type="submit" name="submit" value="Select">
										</form>
										<?php
									}
								}
							}
						 ?>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="all_nav_page">
	<div class="container">
		<div class="navbar">
			<ul class="home_navbar">
				<li><a href="index.php">Home</a></li>
				<li><a href="download.php">Download</a></li>
				<li><a href="upload.php">Upload</a></li>
				<li><a href="status.php">Edge Status</a></li>
			</ul>
		</div>
	</div>
</nav>