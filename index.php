<?php
	
function  create_image(){
	
	//Load water mark from png image
	$wmark = imagecreatefrompng('img/stamp.png');
	//Load jpg image
	$image = imagecreatefromjpeg('img/image'.rand(1,3).'.jpg');
	
	//Get image width/height
	$width = imagesx($image);
	$height = imagesy($image);
	
	// Set the margins for the stamp and get the height/width of the stamp image
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($wmark);
	$sy = imagesy($wmark);
	
	// Copy the stamp image onto our photo using the margin offsets and the photo width to calculate positioning of the stamp. 
	imagecopy($image, $wmark, $width-$sx-$marge_right, $height-$sy-$marge_bottom,0,0,$sx,$sy);
	
	// Prepare the final image and save to path. If you only pass $image it will output to the browser instead of a file.
	imagepng($image,"generatedImage.png");
	
	// Output and free memory
	imagedestroy($image);
}

// Create image
	create_image();
	// Create output
	$output = '	<a href="index.php"><img src="generatedImage.png" alt="generated image" /></a><br/>';
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Image Manipulation</title>
</head>

<body>
<?php echo $output; ?>
</body>
</html>