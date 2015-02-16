// JavaScript Document







var circle = {

  radius : 9,

  getArea : function()

  {

    return (this.radius * this.radius) * Math.PI;

  }

};



function setColor (side, color)

{

	id = this.name + "_" + side;

	

	var text = document.getElementById(id);

	text.style.background=color;

}

	

function jsTile(id, side1, side2, side3, side4)

{

	this.name=id;

	this.centerBoxId = id + "_center";

	var sides = new Array(side1, side2, side3, side4);

	this.setColor = setColor;

}









