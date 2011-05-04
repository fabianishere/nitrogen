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
		define('themePath', $path);
	
/*
 * Menu Settings
 */



	 $scriptUrl =  "http://". $_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']); 
	 echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>'. $pageTitle .'</title>
	<link href="'.$scriptUrl.$path.'/css/style.css" rel="stylesheet" type="text/css" />
	<link href="'.$scriptUrl.$path.'/css/default_menu_style.css" rel="stylesheet" type="text/css" />
		<link href="'.$scriptUrl.'/loginmodule.css" rel="stylesheet" type="text/css" />
	<link rel="SHORTCUT ICON" href="$favicon" />
	<script type="text/javascript" language="Javascript" src="'.$scriptUrl.$path.'/js/menu.js"></script>
		 <link href="'.$scriptUrl.$path.'/css/default.uni-form.css" title="Default Style" media="screen" rel="stylesheet"/>
       <link rel="stylesheet" type="text/css" href="'.$scriptUrl.$path.'/css/default_form_style.css" />
   <link rel="stylesheet" type="text/css" href="'.$scriptUrl.$path.'/css/news.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="'.$scriptUrl.$path.'/js/slider.js"></script>
<script type="text/javascript" src="'.$scriptUrl.$path.'/js/news.js"></script>
    <script src="'.$scriptUrl.$path.'/js/uni-form.jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="'.$scriptUrl.$path.'/js/shCore.js"></script>
	<script type="text/javascript" src="'.$scriptUrl.$path.'/js/shBrushJScript.js"></script>
	<link type="text/css" rel="stylesheet" href="'.$scriptUrl.$path.'/css/shCoreDefault.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
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
	
	
	echo '<div id="top-container"><div id="login-top">';
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
echo '<form id="loginFormTop" name="loginFormTop" method="post" class="uniForm" action="http://'.scriptUrl.'/login.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
      <td width="112"><b>Username</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
  
      <td><b>Password</b></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>

      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Login" /></td></tr>
  </table>
</form>';
}echo '</div></div>';


echo '
<div id="container">
<div id="menu-container">	<ul id="menu"><li style="padding: 0; margin-top: -10px;"><img src="'.$scriptUrl.$path.'/images/logo.png" /></li>
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

	}



echo '
</ul>';


echo '</div>
<div id="content">
<div id="slideshow">
  <div id="slidesContainer">';
  
  $newsresult = mysql_query("SELECT * FROM news");
  
  while ($newsrow = mysql_fetch_array($newsresult)) {
	  echo '
    <div class="slide" >
      <h2>'.$newsrow['title'].'</h2>
     <p>'.$newsrow['p1'].'</p> <p style="vertical-align: baseline;">'.$newsrow['p2']. '</p></div>';
	
  }
  
  echo '
  </div>
</div>
<div id="short-news"><div id="mbs4c837578ea7f9" class="mod_bannerslider" style="width:90%;height:12px;"><div class="bs_opacitylayer">  ';

$shortresult = mysql_query("SELECT * FROM shortnews");
	while ($shortrow = mysql_fetch_array($shortresult)) {
		$threadshortrow = mysql_fetch_array(mysql_query("SELECT * FROM threads WHERE threadid='".$shortrow['threadid']."' AND visible='0'"));
		if ($threadshortrow) {
		echo '
		 <div class="bs_contentdiv" style="position: relative; top: -30px; display: none; "><span class="smalltext"><b>Short News</b>: <a href="http://'.scriptUrl.'/threads/'.$shortrow['threadid'].'">'.$threadshortrow['title'].'</a></span></div>';
		}
	} echo '</div> 
	</div></div>
	    
    <script type="text/javascript"> 
		new ContentSlider("mbs4c837578ea7f9", "scroll_up", 3000, 0, 0);
	</script>
';
	
		 
 }

function template_main_below() {
	include('config.php');
	$headlinesresult = mysql_query("SELECT * FROM threads WHERE forumid='2' AND visible='0' ORDER BY absdate DESC LIMIT 0, 30");
	$newusersresult = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 0, 30");
	$newthreadsresult = mysql_query("SELECT * FROM threads WHERE visible='0' ORDER BY lastpostdate DESC LIMIT 0, 30");
echo '
<div class="row" ><div class="colom" style="overflow: hidden;"><h2>Last Discussions<img style="margin-bottom:-10px;margin-top: -15px;" align="right" src="http://'.scriptUrl.themePath.'/images/forums.png" /></h4><ul class="bottom-list">';
while ($threadrow = mysql_fetch_array($newthreadsresult)) {
	echo '<li><a href="http://'.scriptUrl.'/threads/'.$threadrow['threadid'].'">'.$threadrow['title'].'</a> ('.$threadrow['lastpostdate'].')</li>';
}
echo '
</ul></div>

<div class="colom" style="overflow: hidden;"><h2>New users<img style="margin-bottom:-10px;" align="right" src="http://'.scriptUrl.themePath.'/images/users.png" /></h4><ul class="bottom-list">';
while ($userrow = mysql_fetch_array($newusersresult)) {
	echo '<li><a href="http://'.scriptUrl.'/users/'.$userrow['id'].'">'.$userrow['username'].'</a> ('.$userrow['joindate'].')</li>';
}
echo '
</ul></div>


<div class="colom" style="overflow: hidden;"><h2>Headlines</h4><ul class="bottom-list">';
while ($headrow = mysql_fetch_array($headlinesresult)) {
	echo '<li><a href="http://'.scriptUrl.'/threads/'.$headrow['threadid'].'">'.$headrow['title'].'</a> ('.$headrow['dateline'].')</li>
';

}

echo '</ul></div></div>

<div id="text-content"><div id="sitefooter">'.themeCopyright.'';

if (isset($_SESSION['SESS_MEMBER_ID'])) {
$adminrow = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".$_SESSION['SESS_MEMBER_ID']."'"));
if (in_array($adminrow['usergroupid'], $adminRights)) {
	echo ' | <a href="http://'.scriptUrl.'/admin.php">Admin</a>';
}
}
echo '</div></div></div></div></body></html>';
}


?>