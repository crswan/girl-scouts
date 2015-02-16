<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>

h1 {
	font:16px Verdana, Arial, Helvetica, sans-serif;
	color: black;
	font-weight:bold;
}

p, li {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	color:#000;
}
</style>
<title>Image Collection Demo</title>
</head>

<body>

<h1>This demo will take a sample folder of images (displayed below) and smush them into a little collage.</h12>
<form action="smush.php" method="get">
	<blockquote>
	<p>Whaddaya wanna call your collage? <input name="collectionName" type="text" value="My Pictures" size="15" maxlength="15" /></p>
    <p>Grid size? <select name="gridSize">
      <option value="2">2x2</option>
      <option value="3" selected>3x3</option>
      <option value="4">4x4</option>
      <option value="5">5x5</option>
    </select>
    <input type="submit" value="Smush!" />
    </p>
    </blockquote>
</form>
<hr />

<?php
	$imageDir = "images";
	$fileList = scandir($imageDir, 1); // use descending order to make it easier to skip . and ..
	$numTiles = count($fileList) - 2;  // skip . and ..
?>

    <h1>Notes about the demo:</h1>
    <ul>
    <li>The Smush button just resizes them without regard to their aspect ratio-- yucky.
    </li> 
    <li>It doesn't store the collage anywhere, it just generates it on the fly.</li> 
    <li>Snoopy is from my hometown of Santa Rosa California.</li> 
	</ul>
	<h1>Here are the <?php echo $numTiles; ?> files in the "<?php echo $imageDir; ?>" directory. </h1>
    <p>
<?php
	for ( $i = 0; $i < $numTiles; $i++ )
		echo ('<img src="' . $imageDir . "/" . $fileList[$i] . '"  /> ' . $fileList[$i] . '<br />');
?>
	</p>
</body>
</html>
