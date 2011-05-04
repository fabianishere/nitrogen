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
		
		$result = mysql_query("SELECT * FROM section WHERE childof='0'");
		while($row = mysql_fetch_array($result)) {
		echo '<table border="0" width="100%" cellspacing="1" cellpadding="5" id="threads" >
		<tbody><tr>
				
				<td class="windowbg2">
					<a href="http://'.scriptUrl.'/board/'.$row['id'].'">'.$row['name'].' ('.$row['id'].')</a> - <a href="http://'.scriptUrl.'/admin.php?p=boardsettings&id='.$row['id'].'">Modify</a>
				</td>
				
				<td class="windowbg2">
				
				</td>
			</tr>
			
	
		</tbody>
		</table>';
		echo '<div style="border: 1px solid #ccc;">';
		$result2 = mysql_query("SELECT * FROM section WHERE childof='".$row['id']."'");
		while($row2 = mysql_fetch_array($result2)) {
		echo '<table border="0" width="95%" cellspacing="1" cellpadding="5" id="threads" style="margin-left: 5%; border: 1px solid #ccc; ">
		<tbody><tr>
				
				<td class="windowbg2">
					<a href="http://'.scriptUrl.'/board/'.$row2['id'].'">'.$row2['name'].' ('.$row2['id'].')</a> - <a href="http://'.scriptUrl.'/admin.php?p=boardsettings&id='.$row2['id'].'">Modify</a>
				</td>
				
				<td class="windowbg2">
				
				</td>
			</tr>
			
	
		</tbody>
		</table>';
		echo '<div>';
		$result3 = mysql_query("SELECT * FROM section WHERE childof='".$row2['id']."'");
		while($row3 = mysql_fetch_array($result3)) {
		echo '<table border="0" width="90%" cellspacing="1" cellpadding="5" id="threads" style="margin-left: 10%; border: 1px solid #ccc; ">
		<tbody><tr>
				
				<td class="windowbg2">
					<a href="http://'.scriptUrl.'/board/'.$row3['id'].'">'.$row3['name'].' ('.$row3['id'].')</a> - <a href="http://'.scriptUrl.'/admin.php?p=boardsettings&id='.$row3['id'].'">Modify</a>
				</td>
				
				<td class="windowbg2">
				
				</td>
			</tr>
			
	
		</tbody>
		</table>';
		
		$result4 = mysql_query("SELECT * FROM section WHERE childof='".$row3['id']."'");
		while($row4 = mysql_fetch_array($result4)) {
		echo '<table border="0" width="85%" cellspacing="1" cellpadding="5" id="threads" style="margin-left: 15%; border: 1px solid #ccc; ">
		<tbody><tr>
				
				<td class="windowbg2">
					<a href="http://'.scriptUrl.'/board/'.$row4['id'].'">'.$row4['name'].' ('.$row4['id'].')</a> - <a href="http://'.scriptUrl.'/admin.php?p=boardsettings&id='.$row4['id'].'">Modify</a>
				</td>
				
				<td class="windowbg2">
				
				</td>
			</tr>
			
	
		</tbody>
		</table>';
		}
		echo '</div>';
		}
		}
		echo '</div>';
		}
		
		echo '<a href="http://'.scriptUrl.'/admin.php?p=newboard">Create new Board</a>';
} 


?>