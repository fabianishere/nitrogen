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


	function __loadAdminFunction() {
		if (isset($_GET['id'])) {
			$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".quote_smart($_GET['id'])."'"));
		echo '<form action="http://'.scriptUrl.'/admin.php?p=updateuser" align="left" method="post">
		
		
		Username: <input type="text" id="username" value="'.$row['username'].'" name="username" /><br />
		Usergroup Id: <select name="usergroupid">
 ';
  	$result = mysql_query("SELECT * FROM usergroup");
		while($row3 = mysql_fetch_array($result)) {
		if ($row3) {
				if ($row['usergroupid'] == $row3['id']) {
					echo '<option selected value="'.$row3['id'].'">'. $row3['name'] .'</option>';
				} else {
				echo '<option value="'.$row3['id'].'">'. $row3['name'] .'</option>';
				}
		} 
	}
	
	
  
  echo '
  
</select><br />
		Displaygroup Id: <select name="displaygroupid">
 ';
  	$result2 = mysql_query("SELECT * FROM usergroup");
		while($row4 = mysql_fetch_array($result2)) {
		if ($row4) {
			if ($row4['id'] == $row['displaygroupid']) {
		echo '<option selected value="'.$row4['id'].'">'. $row4['name'] .'</option>';
			} else {
				echo '<option value="'.$row4['id'].'">'. $row4['name'] .'</option>';
			}
		} 
	}
	




echo '</select><br />
Email: <input type="text" id="email" value="'.$row['email'].'" name="email" /><br />
First name: <input type="text" id="firstname" value="'.$row['firstname'].'" name="firstname" /><br />
Last name: <input type="text" id="lastname" value="'.$row['lastname'].'" name="lastname" /><br />
Homepage: <input type="text" id="homepage" value="'.$row['homepage'].'" name="homepage" /><br />
ICQ: <input type="text" id="icq" value="'.$row['icq'].'" name="icq" /><br />
AIM: <input type="text" id="aim" value="'.$row['aim'].'" name="aim" /><br />
Yahoo: <input type="text" id="yahoo" value="'.$row['yahoo'].'" name="yahoo" /><br />
MSN: <input type="text" id="msn" value="'.$row['msn'].'" name="msn" /><br />
Skype: <input type="text" id="skype" value="'.$row['skype'].'" name="skype" /><br />
Usertitle: <input type="text" id="usertitle" value="'.$row['usertitle'].'" name="usertitle" /><br />
Joindate: <input type="text" id="joindate" value="'.$row['joindate'].'" name="joindate" /><br />
Posts: <input type="text" id="posts" value="'.$row['posts'].'" name="posts" /><br />
Reputation: <input type="text" id="reputation" value="'.$row['reputation'].'" name="reputation" /><br />
Infractions: <input type="text" id="infractions" value="'.$row['infractions'].'" name="infractions" /><br />
Warnings: <input type="text" id="warnings" value="'.$row['warnings'].'" name="warnings" /><br />
Htmlbefore: <br /><textarea name="htmlbefore">'.$row['htmlbefore'].'</textarea><br />
Htmlafter: <br /><textarea name="htmlafter">'.$row['htmlafter'].'</textarea><br />
Signature: <br /><textarea name="signature">'.$row['signature'].'</textarea><br />
		<input type="submit" name="settings" id="settings" value="Update" />
		<input type="hidden" id="boardid" name="userid" value="'.quote_smart($_GET['id']).'"/>
		</form>';
		}

} 


?>