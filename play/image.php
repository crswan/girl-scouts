<?php 
/*
header("Content-type: image/jpeg");
//$img = imagecreatefromjpeg("images/Tulips.jpg");
//
$img = imagecreatefromjpeg("images/Jellyfish.jpg");
imagejpeg($img); 
imagedestroy($img);
*/

// Create a 300x100 image
$im = imagecreatetruecolor(300, 100);
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$black = imagecolorallocate($im, 0x00, 0x00, 0x00);

// Make the background red
imagefilledrectangle($im, 0, 0, 299, 99, $red);

// Path to our ttf font file
$font_file = './tahoma.ttf';

// Draw the text 'PHP Manual' using font size 13
imagefttext($im, 13, 0, 105, 55, $black, $font_file, 'PHP Manual');

// Output image to the browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
?> 