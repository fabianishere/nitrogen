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
 
 
	include_once('includes.php');
	getStandardIncludes();
	
 		
	loadTemplate('misc');
	
	main_above('Admin');
 

	if (isset($_SESSION['SESS_MEMBER_ID'])) {
	$result = mysql_query("SELECT * FROM users WHERE id='" .quote_smart($_SESSION['SESS_MEMBER_ID'])."'");
	$row = mysql_fetch_array($result);
	
 
	if ($row['usergroupid'] == 6) {
		echo '<div class="row"><div class="colom" style="padding: 0; margin: 0; width: 25%; height: auto; background: transparent;">';

		
	echo '	
<div class="article" style="margin: 0;">
	<div class="article-header">Menu</div>
	<div class="article-content" style="padding: 0;">
	<ul style="list-style:none; padding: 10px 0px 10px 10px; margin: 0; ">
		<li><a href="http://'.scriptUrl.'/admin.php">Home</a></li>
	<li><a href="http://'.scriptUrl.'/admin.php?p=settings">Settings</a></li>
	<li><a href="http://'.scriptUrl.'/admin.php?p=plugins">Plugins</a></li>
	<li><a href="http://'.scriptUrl.'/admin.php?p=boards">Boards</a></li>
	<li><a href="http://'.scriptUrl.'/admin.php?p=users">Users</a></li>
	<li><a href="http://'.scriptUrl.'/admin.php?p=usergroups">Usergroups</a></li>
	<li><a href="http://'.scriptUrl.'/admin.php?p=banlist">Ban list</a></li>
		<li><a href="http://'.scriptUrl.'/admin.php?p=sectional">Sectionals</a></li>
		<li><a href="http://'.scriptUrl.'/admin.php?p=slider">Slider</a></li>
		<li><a href="http://'.scriptUrl.'/admin.php?p=news">News</a></li>

	<ul>
	</div>
	</div></div>
	
	
	
	<div class="colom" style="padding: 0; margin: 0; width: 75%; height: auto; background: transparent;">
	
	<div class="article" style="margin: 0;">
	<div class="article-header">Content</div>
	<div class="article-content">';
		
		if (!isset($_GET['p'])) {
		echo '
	<div style="overflow: scrolled;">News</div>';

	
	} else {
	
		include('includes/admin_'.$_GET['p'].'.php');	
		__loadAdminFunction();
	}
	echo '	</div></div></div></div>
 ';

	} else {
		// When the user isn't an Admin.
		exit();	
	}
	
	}
	
	main_below();

	
	?>