// JavaScript Document

var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}


function changePosition1() {

		document.getElementById('menu-container').style.position = 'relative';
	
		document.getElementById('change-position1').style.color = '#223c6d';
		document.getElementById('change-position2').style.color = '#4C6DA1';
}

function changePosition2() {

		document.getElementById('menu-container').style.position = 'fixed';
		document.getElementById('change-position1').style.color = '#4C6DA1';
		document.getElementById('change-position2').style.color = '#223c6d';
		
	
	
}