<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />





<title>Butterfly Puzzle</title>



<script language="javascript"> 

function toggle() {

	var ele = document.getElementById("toggleText");

	var text = document.getElementById("displayText");

	if(ele.style.display == "block") {

    		ele.style.display = "none";

		text.innerHTML = "show";

		text.style.background="red";

  	}

	else {text.style.background

		ele.style.display = "block";

		text.innerHTML = "hide";

		text.style.background="blue";

	}

} 

</script>



</head>



<body>



<a id="displayText" href="javascript:toggle();">show</a> <== click Here

<div id="toggleText" style="display: none"><h1>peek-a-boo</h1></div>



<?php



create_grid(); 



?>





<script language="javascript" src="tileFuncs.js"></script>



<script language="javascript">

	var tile1 = new jsTile("tile1_1", 1, 2, 3, 4);

	var tile2 = new jsTile("tile1_2", -1, -2, -3, -4);

	var tile3 = new jsTile("tile2_1", 1, 2, 3, 4);

	var tile4 = new jsTile("tile2_2", -1, -2, -3, -4);



	var tiles = new Array(tile1, tile2, tile3, tile4);

	tiles[0].setColor("left", "purple");

	tiles[1].setColor("right", "yellow");

	tiles[2].setColor("bottom", "green");

	tiles[3].setColor("top", "pink");

</script>

</body>

</html>



<?php

/* ----------------------------- create_tile() ----------------------------- */





class tile

{

	var $name;

	var $centerBoxId;



	function init($id)

	{

	$this->name=$id;

	$this->centerBoxId = $id . "_center";

	$this->leftBoxId = $id . "_left";

	$this->rightBoxId = $id . "_right";

	$this->topBoxId = $id . "_top";

	$this->bottomBoxId = $id . "_bottom";

	}

	

	function create_tile($id)

	{

	

		

	?>

	

		<table id="$id" width="50px" border="1">

		<tr>

			<td></td>

			<td id="<?php echo $this->topBoxId ?>" align=center>Top</td>

			<td></td>

		</tr>

		<tr>

			<td id="<?php echo $this->leftBoxId ?>" align=center>Left</td>

			<td id="<?php echo $this->centerBoxId ?>" align=center><h2><?php echo $id; ?></h2> </td>

			<td id="<?php echo $this->rightBoxId ?>" align=center>Right</td>

		</tr>

		<tr>

			<td></td>

			<td id="<?php echo $this->bottomBoxId ?>" align=center>Bottom</td>

			<td></td>

		</tr>

		</table>

	

	<?php

	

	} // end create_tile()

	

	

} // end class tile





/* ----------------------------- create_grid() ----------------------------- */

function create_grid()

{



	?>

	<table border="1">

	<?php



	for ($i=1; $i<=3; $i++)

	  {

	  echo "<tr>";

	  for ($j=1; $j<=3; $j++)

		  {

		  echo "<td>";

		  $tile_id = "tile" . $i . "_" . $j;

		  $foo = new tile();

		  $foo->init($tile_id);

		  $foo->create_tile($tile_id);

		  echo "</td>";

		  

		  }

	  echo "</tr>";

	  }

	

	?>

</table>

	<?php

} // end create_grid



?>





