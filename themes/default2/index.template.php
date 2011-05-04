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
 
 



 function template_main_above($pageTitle, $path) {
	 
	 $scriptUrl =  "http://". $_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']); 
	 echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>'. $pageTitle .'</title>
	<link href="'.$scriptUrl.$path.'/css/default_style.css" rel="stylesheet" type="text/css" />
	<link href="'.$scriptUrl.$path.'/css/default_menu_style.css" rel="stylesheet" type="text/css" />
		<link href="'.$scriptUrl.$path.'/css/default_forum_style.css" rel="stylesheet" type="text/css" />
		<link href="'.$scriptUrl.'/loginmodule.css" rel="stylesheet" type="text/css" />
	<link rel="SHORTCUT ICON" href="$favicon" />
	<script type="text/javascript" language="Javascript" src="'.$scriptUrl.$path.'/js/menu.js"></script>
		 <link href="'.$scriptUrl.$path.'/css/default.uni-form.css" title="Default Style" media="screen" rel="stylesheet"/>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script src="'.$scriptUrl.$path.'/js/uni-form.jquery.js" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(document).ready(function() {
        $(".browse a").click(function() {
          $("link").attr("href",$(this).attr(\'rel\'));
          return false;
        });
      });
    </script>';
	getMetaTags();
	echo '</head><body>
	
	';
	
	include_once('config/menuconfig.php');
	include_once('connector.php');
	/*
	 * Menu
	 */ 
	echo '
	<div id="menu-container">
	<ul id="menu">
<li><a href="'. $scriptUrl . '/index.php">Home</a></li>
<li><a href="'. $scriptUrl . '/forum.php">Forum</a></li>
';
	/*
	 * Community Menu
	 */
	if ($communityMenuresult) {
	if ($communityMenuForGuests == false) {
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
	} else {
		echo '<li><a href="#" 
        onmouseover="mopen(\'m2\')" 
        onmouseout="mclosetime()">Community</a>
        <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
			';
			
		while ($communityMenuArray = mysql_fetch_array($communityMenuresult)) { 
		echo '
        <a href="'. $scriptUrl . $communityMenuArray['link'] .'">' . $communityMenuArray['name'] .'</a>';
		} 
		
		
		echo '
  
 
        </div>
    </li>';
	} 
	} else {
		echo '<li><a href="#" 
        onmouseover="mopen(\'m3\')" 
        onmouseout="mclosetime()">Community</a>
        <div id="m3" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
			';
		while ($communityMenuArray2 = mysql_fetch_array($communityMenuresult)) { 
		echo '
        <a href="'. $scriptUrl . $communityMenuArray2['link'] .'">' . $communityMenuArray2['name'] .'</a>';
		} 
		
		echo '
  
 
        </div>
    </li>';
	}

	}
	
	
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		echo ' 	<li  style="float: right; margin-right: 5px;"><a  href="'.$scriptUrl.'/login.php">Login</a></li>
				<li  style="float: right; margin-right: 5px;"><a  href="'.$scriptUrl.'/register.php">Register</a></li>';
	} else {
				echo '<li  style="float: right; margin-right: 5px;"><a href="'. $scriptUrl . '/logout.php">Logout</a></li><li  style="float: right; margin-right: 5px;"><a href="'. $scriptUrl . '/usercp.php">UserCP</a></li>
		
				';
				 $pmresult = mysql_query("SELECT * FROM pm WHERE touserid='".$_SESSION['SESS_MEMBER_ID']."' AND unreaded='0'");
			 $pmrow = mysql_fetch_array($pmresult);
			 $pmnum = mysql_num_rows($pmresult);
			 
				echo '<li style="float: right; margin-right: 5px;'; 
				
				echo'">Welcome <a onClick="mopen(\'m4\')" 
        onmouseout="mclosetime()" href="#">'.$_SESSION['SESS_USER_NAME'].'</a>'; 
		
		if ($pmrow) {
				echo '!';	
				}
		echo '<div id="m4" style="width: auto;" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()"><a href="http://'.scriptUrl.'/users/'.$_SESSION['SESS_MEMBER_ID'].'">View Profile</a>
			 ';
			
			 if ($pmrow) {
				 echo '<a href="http://'.scriptUrl.'/showinbox.php">'.$pmnum.' Unreaded PM(s)</a>';
			 } else {
				echo '<a href="http://'.scriptUrl.'/showinbox.php">Show Inbox</a>'; 
			 }
			 echo '</div></li>';

	}echo  '	<li style="float: right; margin-right: 5px;"><a onclick="changePosition1()" id="change-position1" href="#" style="color: rgb(76, 109, 161); ">Relative</a> / <a onclick="changePosition2()" style="color: rgb(34, 60, 109); " id="change-position2" href="#">Fixed</a></li>';



echo '
</ul></div>';
echo '<div id="top-bar" style="height: 200px;"></div>';

	echo '<div class="container"> ';
	
		 
 }

function template_main_below() {
echo '</body></html>';
}


?>