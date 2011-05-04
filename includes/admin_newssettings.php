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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM middlenews WHERE id='".quote_smart($_GET['id'])."'"));
		echo '<form action="http://'.scriptUrl.'/admin.php?p=updatenews" align="left" method="post">
		<table>
		<tr><td>
		Threadid: <input type="text" id="threadid" value="'.$row['threadid'].'" name="threadid" /></td></tr><tr><td>
		Use Thread: <input type="text" id="usethread" value="'.$row['usethread'].'" name="usethread" /></td></tr><tr><td>
		Title: <input type="text" id="title" value="'.$row['title'].'" name="title" /><br /></td></tr><tr><Td>
		Text: <br /> <textarea id="text" name="text">'.$row['text'].'</textarea></td></tr><tr><td>
		<input type="submit" name="settings" id="settings" value="Update" /></td></tr>
		
		</table>
		<input type="hidden" id="id" name="id" value="'.quote_smart($_GET['id']).'"/>
		</form>';
		}

} 


?>