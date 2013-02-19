<?php
$no_db = false;
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Katata Networks - learning jQuery - Kyryl Afanasenko</title>
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> 
		<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"> 
		<style>
		h1 {color:red;}
		</style>
		
		<?php 
			if(isset($_GET['op'])){
				$op = $_GET['op'];
		      	if (is_file("assets/css/".$op.".css")) {
			      	echo ("<link rel='stylesheet' type='text/css' media='screen' href='assets/css/$op.css'>");
		      	}
			}
		?>
		<script src="http://www.google.com/jsapi"></script>
		<script>google.load("jquery", "1");</script>
		<script src="includes/jQuery.isc/jquery-image-scale-carousel.js" type="text/javascript" charset="utf-8"></script>
		<script src="includes/jquery.ez-pinned-footer.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="includes/jFormer/jFormer.js" ></script>
		<script type="text/javascript">
			//jquery source from local if CDN no work
			if (typeof jQuery == 'undefined'){
				document.write(unescape("%3Cscript src='includes/jquery-1.9.0.js' type='text/javascript'%3e%3C/script%3E"));
			}
		
			$(document).ready(function(){
				$('li:not(#third)').css({'border':'0px solid #0000FF'});
			});
		
			<?php
			if ($dir = opendir('assets/carousel/')) {
				echo 'var carousel_images = [';
				while ($file = readdir($dir)) {
					list($fileName, $fileExt) = explode('.', $file);
					if (($fileExt == 'jpg') || ($fileExt == 'gif') || ($fileExt == 'png') || ($fileExt == 'jpeg')) {
						echo '"assets/carousel/' . $file . '",';
					}
			    }
				echo ']';
			    closedir($dir);
			}
			?>

			$(window).load(function() {
				$("#photo_container").isc({
					imgArray: carousel_images,
					autoplay: true,
					autoplayTimer: 5000
				});	
			});

			$(window).load(function() {
			    $("#footer").pinFooter();
			});

			$(window).resize(function() {
			    $("#footer").pinFooter();
			});
		</script>
	</head>
	<body>
		<h1>SUCK IT</h1>
	</body>
</html>
