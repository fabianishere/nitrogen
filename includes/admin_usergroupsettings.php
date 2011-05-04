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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM usergroup WHERE id='".quote_smart($_GET['id'])."'"));
		echo '<form action="http://'.scriptUrl.'/admin.php?p=updateusergroup" align="left" method="post">
		
		
		Id: <input type="text" id="id" value="'.$row['id'].'" name="id" /><br />
		Name: <input type="text" id="name" value="'.$row['name'].'" name="name" /><br />
	
UT Changeable: <input type="text" id="usertitlechange" value="'.$row['usertitlechange'].'" name="usertitlechange" /><br />
Usertitle: <input type="text" id="usertitle" value="'.$row['usertitle'].'" name="usertitle" /><br />
		Html before: <br /><textarea name="htmlbefore">'.$row['htmlbefore'].'</textarea><br />
		Html after: <br /><textarea name="htmlafter">'.$row['htmlafter'].'</textarea><br />
		<input type="submit" name="settings" id="settings" value="Update" />
		<input type="hidden" id="usergroupid" name="usergroupid" value="'.quote_smart($_GET['id']).'"/>
		</form>';
		}

} 


?>