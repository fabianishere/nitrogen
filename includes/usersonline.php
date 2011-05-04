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
 



 $server = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST']  : (isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME']);
    if(isset($_SERVER['SCRIPT_URI']) && !defined('URI'))
    {
        $current_uri = $_SERVER['SCRIPT_URI'];
    }
    else if(isset($_SERVER['REQUEST_URI']) || isset($_SERVER['HTTP_X_REWRITE_URL']))
    {
        if(isset($_SERVER['SCRIPT_URL']))
        {
            $uri = $_SERVER['SCRIPT_URL'];
        }
        else
        {
            $server_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['HTTP_X_REWRITE_URL'];
            $uri = (strpos($server_uri, '?') !== false ? substr($server_uri, 0, strpos($server_uri, '?')) : $server_uri);
        }
        $current_uri = 'http://'.$server.$uri;
    }
    else
    {
        die('Can not populate the server uri from the $_SERVER super global.');
    }
	define('SERVER_PAGE_URI', $current_uri);  
	
	

function getUsers() {

$timeoutseconds = 100;

$timestamp = time(); 

$timeout = $timestamp-$timeoutseconds; 

$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
$file =  $_SERVER['PHP_SELF'];
$break = Explode('/', $file);
$file = htmlspecialchars(filter(str_replace(".php", "", $break[count($break) - 1])), ENT_QUOTES); 


$url = SERVER_PAGE_URI;



//insert the values
if (isset($_SESSION['SESS_MEMBER_ID'])) { 
if (!mysql_fetch_array(mysql_query("SELECT * FROM usersonline WHERE userid='".$_SESSION['SESS_MEMBER_ID']."' AND ip='".$REMOTE_ADDR."'"))) {
$insert = mysql_query("INSERT INTO usersonline VALUES

('$timestamp','".$_SESSION['SESS_MEMBER_ID']."','".$_SESSION['SESS_USER_NAME']."', '0', '".$REMOTE_ADDR."', '".$file."', '".$url."')"); 
} else {
	$insert = mysql_query("UPDATE usersonline SET timestamp='$timestamp', self='".$file."', url='".$url."'  WHERE userid='".$_SESSION['SESS_MEMBER_ID']."' AND username='".$_SESSION['SESS_USER_NAME']."' AND ip='".$REMOTE_ADDR."'"); 
}
} else {
	if (!mysql_fetch_array(mysql_query("SELECT * FROM usersonline WHERE ip='".$REMOTE_ADDR."' AND isguest='1'"))) {
	$insert = mysql_query("INSERT INTO usersonline VALUES

('$timestamp','0','0', '1', '".$REMOTE_ADDR."', '".$file."', '".$url."')"); 
	} else {
		$insert = mysql_query("UPDATE usersonline SET timestamp='$timestamp', self='".$file."', url='".$url."' WHERE ip='".$REMOTE_ADDR."' AND isguest='1'"); 
	}
	
}

if(!($insert)) { 
	echo mysql_error();
	exit();
} 



//delete values when they leave

$delete = mysql_query("DELETE FROM usersonline WHERE timestamp<$timeout"); 

if(!($delete)) { 
	echo mysql_error();
	exit();
} 




}


function filter($str) {
	$str = str_replace("showthread", "Viewing thread", $str);	
	$str = str_replace("showprofile", "Viewing profile", $str);	
		$str = str_replace("showforum", "Viewing Forum", $str);	
		$str = str_replace("showonlineusers", "Viewing 'Who's online?'", $str);	
		return $str;
}


?>



