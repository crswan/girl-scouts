<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Wendy's PHP samples</title>

</head>

 

<body>



<table width="100%" border="1">



<?php

echo $_SERVER['HTTP_USER_AGENT'];







$arr = array(1, 2, 3, 4);

foreach ($arr as &$value) {

    $value = $value * 2;

}

// $arr is now array(2, 4, 6, 8)

unset($value); // break the reference with the last element





// dump out POST array 

echo "<h2>POST</h2>";

echo "<br>length of POST array is " . sizeof($_POST)

	. "<ol>" ;

foreach ($_POST as $key => $value) {   echo "<li>" . $key." - ".$value."";}

echo "</ol>";



// dump out REQUEST array 

echo "<h2>REQUEST</h2>";

echo "<br>length of REQUEST array is " . sizeof($_REQUEST)

	. "<ol>" ;

foreach ($_REQUEST as $key => $value) {   echo "<li>" . $key." - ".$value."";}

echo "</ol>";



// dump out server array 

echo "<h2>Server</h2>";

echo "<br>length of server array is " . sizeof($_SERVER)

	. "<ol>" ;

foreach ($_SERVER as $key => $value) {   echo "<li>" . $key." - ".$value."";}

echo "</ol>";



//



echo "<h2>Dump _SERVER with print_r</h2>";

print_r($_SERVER); 



echo "<h2>Dump _SERVER with var_dump</h2>";

var_dump($_SERVER);





// dump out server array 

echo "<h2>Hi there</h2>";

echo "<br>length of files array is " . sizeof($_FILES)

	. "<ol>" ;

foreach ($_FILES as $value) {   echo "<li>" . $value."";}





echo "</ol>";

?>



<?php

if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {

?>

<h3>strpos() must have returned non-false</h3>

<p>You are using Internet Explorer</p>

<?php

} else {

?>

<h3>strpos() must have returned false</h3>

<p>You are not using Internet Explorer</p>



<?php

}

?> 

</h2>



<form action="test.php" method="post">

 <p>Your name: <input type="text" name="name" /></p>

 <p>Your age: <input type="text" name="age" /></p>

 <p><input type="submit" /></p>

</form>



Hi <?php echo htmlspecialchars($_POST['name']); ?>.

You are <?php echo (int)$_POST['age']; ?> years old. 







</body>

</html>

