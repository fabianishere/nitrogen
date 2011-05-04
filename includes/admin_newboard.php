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

		echo '<form action="http://'.scriptUrl.'/admin.php?p=createnewboard" align="left" method="post">
		<table>
		<tr>
		<tr><td>
		Name: <input type="text" id="name"  name="name" /><br /></td></tr><tr>
		<td>Description:<br /> <textarea id="des" name="des"></textarea><br /></td></tr><tr>
		<td>Child Of: <select name="childof">
  <option value="0">Main</option>';
  $row2 = mysql_num_rows(mysql_query("SELECT * FROM section"));
  	for ($i = 0; $i < $row2 + 1; $i++) {
		$row3 = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE id='".$i."' "));
		
		if ($row3) {
		echo '<option value="'.$row3['id'].'">'. $row3['name'] .'</option>';
		} 
	}
  
  echo '
</select><br /></td></tr><tr><td>
Closed: <input type="text" id="closed"  name="closed" /><br /></td></tr><tr><td>
Rights: <input type="text" id="rights"  name="rights" /><br /></td></tr><tr><td>
		<input type="submit" name="settings" id="settings" value="Create" /></td></tr>
		
		</td>
		</table>
		</form>';
		

} 


?>