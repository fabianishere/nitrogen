 <?php
 
 
 /*
 *   Copyright (C) 2010 Faab234 (FaabDesign)
 *
 *   This program is free software: you can redistribute it and/or modify
 * 	 it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 */
 	createPage("UserCP");
 
 	echo '
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" /> 
	<script type="text/javascript" language="Javascript" src="js/menu.js"></script>
	<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
	    <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	';
	
  	endHead();
	
	
  	createBody("
			   ");
	
	/*
	 * content-container
	 */ 
	echo ' 
	<div class="content-container">';
	
	/*
	 * Header-top
	 */ 
	 echo '
	
	 ';
	
	/*
	 * Menu
	 */ 
	showMenu();

	/*
	 * Content Area
	 */ 
	echo '
	<div class="container"> 
	<div id="content">
	
		<div class="article" style="margin-left:auto;
	margin-right: auto;">
	<div id="article-header">UserCP</div>
	<div id="article-content"><form method="post" action="usercp.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Usertitle:</b></td>
      <td width="188"><input name="txt" type="text" class="textfield"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Change" /></td>
    </tr>
  </table><input type="hidden" name="login" value="'. $_SESSION['SESS_USER_NAME'].'" />
</form></div>
	</div>
	';
	showFooter();
	echo '
	</div>
	';
	 
	/*
	 * end Content Container
	 */ 
	echo '
	</div>
	'; 
	
	endPage();
	

	
	?>