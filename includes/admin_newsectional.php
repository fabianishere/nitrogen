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

		echo '<form action="http://'.scriptUrl.'/admin.php?p=createnewsectional" align="left" method="post">
		<table>
		
		<tr><td>
		Userid: <input type="text" id="userid"  name="userid" /><br /></td></tr>
		<tr><td>
		Board Id: <input type="text" id="boardid"  name="boardid" /><br /></td></tr>
		
		

		<tr><td><input type="submit" name="settings" id="settings" value="Create" /></td></tr>
		

		</table>
		</form>';
		

} 


?>