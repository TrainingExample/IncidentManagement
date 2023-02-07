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

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<!-- production -->
<script type="text/javascript" src="js/plupload.full.min.js"></script>

 <!-- debug  -->
<script type="text/javascript" src="js/moxie.js"></script>
<script type="text/javascript" src="js/plupload.dev.js"></script>
<script type="text/javascript" src="js/jquery.ui.plupload/jquery.ui.plupload.js"></script>


</head>
<body>


	
<style>
	#form{
		padding-top: 30px;
	}
	.submit_btn{
		display: none;
		margin: 0px 10px;
		padding: 10px 15px;
	    border: 0;
	    background-color: #d3d3d3;
	    border-radius: 5px;
	    cursor: pointer;
	    font-size: 16px;
	}
	.plupload_wrapper{
		max-width: 100%;
		padding: 0px 10px;
		min-width: inherit;
	}
</style>

<div class="container">
	<form id="form" method="post" action="dump.php">
		<div id="uploader">
			<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
		</div>
		<br />
		<input type="submit" class="submit_btn" value="Submit" />
	</form>
</div>

<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : 'uploader.php',

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '10mb',

		// Resize images on clientside if we can
		resize : {
			width : 200, 
			height : 200, 
			quality : 90,
			crop: true // crop to exact dimensions
		},
		
		filters : {
			// Maximum file size
			max_file_size : '100000mb',
		},

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : 'js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : 'js/Moxie.xap'
	});

	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {

			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				$('#form')[0].submit();
			});

			$('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});
});
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script src="assests/js/custom.js"></script>
</body>
</html>