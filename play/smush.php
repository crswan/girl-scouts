<?php
// ---------------------- Get User Inputs ----------------------

$collectionName = isset( $_GET["collectionName"] ) ? $_GET["collectionName"] : "My Collection";
$gridSize = isset( $_GET["gridSize"] ) && $_GET["gridSize"] < 10 ? $_GET["gridSize"] : 3;

// ---------------------- Initialize Some Variables ----------------------

// Get the list of source images
$imageDir = "images/";
$tileNames = scandir($imageDir, 1); // use descending order to make it easier to skip . and ..
$numTiles = count($tileNames) - 2;  // skip . and ..

// Limit how many tiles to draw; also leave room at the end to draw the label.
if ( $numTiles > $gridSize * $gridSize - 2 ) $numTiles = $gridSize * $gridSize - 2;

// Thumbnail and collage sizes 
$thumbWidth = $thumbHeight = 100;
$collageWidth = $collageHeight = $gridSize * $thumbWidth;

// Where to draw the label
$labelX = $collageWidth - 2*$thumbWidth + 10;
$labelY = $collageHeight - 0.5 * $thumbHeight;
$labelWidth = 2 * $thumbWidth;
$labelHeight = $thumbHeight;

// ---------------------- Build the collage ----------------------

// Initialize the blank canvas
$collage = imagecreatetruecolor($collageWidth, $collageHeight);
$blue = imagecolorallocate($collage, 100, 100, 255);
$black = imagecolorallocate($collage, 0, 0, 0);
$grey = imagecolorallocate($collage, 150, 150, 150);
$white = imagecolorallocate($collage, 255, 255, 255);
$green = imagecolorallocate($collage, 100, 255, 100);
imagefill($collage, 0, 0, $blue);

// Generate thumbnails and copy them into the grid
for ( $i = 0; $i < $numTiles; $i++)
{
	// Load a file
	$filename = $imageDir . $tileNames[$i];
	$source = imagecreatefromjpeg($filename);
	
	// Resize and copy it
	// (Should really retain the aspect ratio of the source image)
	$x = $thumbWidth * fmod($i, $gridSize);
	$y = $thumbHeight * floor($i / $gridSize );
	list($width, $height) = getimagesize($filename);
	imagecopyresized($collage, $source, $x, $y, 0, 0, $thumbWidth, $thumbHeight, $width, $height);
}

// Draw the collage's label with a drop shadow and some artsy fartsy blobbies
$font = 'LucidaBrightRegular.ttf';
imagefilledellipse($collage, $labelX + .5*$labelWidth, $collageHeight, $labelWidth, $labelHeight, $grey);
imagefilledellipse($collage, $labelX + $labelWidth, $collageHeight - .5* $thumbHeight, $thumbWidth, $thumbHeight, $green);
imagettftext($collage, 20, 0, $labelX-3, $labelY-3, $black, $font, $collectionName);
imagettftext($collage, 20, 0, $labelX, $labelY, $white, $font, $collectionName);

// use PNG instead of JPG since we're drawing text
header('Content-Type: image/png');
imagepng($collage);

// Free up memory
imagedestroy($source);
imagedestroy($collage);

?>

