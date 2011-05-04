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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE id='".quote_smart($_GET['id'])."'"));
		echo '<form action="http://'.scriptUrl.'/admin.php?p=updateboard" align="left" method="post">
		<table>
		<tr>
		<tr><td>
		Name: <input type="text" id="name" value="'.$row['name'].'" name="name" /><br /></td></tr><tr>
		<td>Description:<br /> <textarea id="des" name="des">'.$row['description'].'</textarea><br /></td></tr><tr>
		<td>Child Of: <select name="childof">
  <option value="0">Main</option>';
  $row2 = mysql_num_rows(mysql_query("SELECT * FROM section"));
  	for ($i = 0; $i < $row2 + 1; $i++) {
		$row3 = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE id='".$i."' AND NOT id='".quote_smart($_GET['id'])."' "));
			
		if ($row3) {
			if ($row3['id'] == $row['childof']) {
				echo '<option selected value="'.$row3['id'].'">'. $row3['name'] .'</option>';
			} else {
		echo '<option value="'.$row3['id'].'">'. $row3['name'] .'</option>';
			}
		} 
	}
  
  echo '
</select><br /></td></tr><tr><td>
Closed: <input type="text" id="closed" value="'.$row['closed'].'" name="closed" /><br /></td></tr><tr><td>
Rights: <input type="text" id="rights" value="'.$row['rights'].'" name="rights" /><br /></td></tr><tr><td>
		<input type="submit" name="settings" id="settings" value="Update" />
		<input type="submit" name="delete" id="delete" value="Delete" /></td></tr>
		
		</td>
		</table>
		<input type="hidden" id="boardid" name="boardid" value="'.quote_smart($_GET['id']).'"/>
		</form>';
		}

} 


?>