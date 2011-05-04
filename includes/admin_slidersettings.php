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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM news WHERE id='".quote_smart($_GET['id'])."'"));
		echo '<form action="http://'.scriptUrl.'/admin.php?p=updateslider" align="left" method="post">
		
		
		
		Title: <input type="text" id="name" value="'.$row['title'].'" name="name" /><br />
		Paragraph 1: <br /><textarea name="p1">'.$row['p1'].'</textarea><br />
		Paragraph 2: <br /><textarea name="p2">'.$row['p2'].'</textarea><br />
		<input type="submit" name="settings" id="settings" value="Update" />
		<input type="hidden" id="sliderid" name="sliderid" value="'.quote_smart($_GET['id']).'"/>
		</form>';
		}

} 


?>