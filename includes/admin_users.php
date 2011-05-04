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
	if (isset($_GET['page']) == "") { 
	$result = mysql_query("SELECT * FROM users ORDER BY username LIMIT 0, 20");
	} else {
		if ($_GET['page'] == 0) {
		$result = mysql_query("SELECT * FROM users ORDER BY username LIMIT 0, 20");
		} else {
				$x = $_GET['page'] * 20;
		$y = $_GET['page'] * 40;
		$result = mysql_query("SELECT * FROM users ORDER BY username LIMIT ".$x.", ".$y." ");
		}
	}
	
		echo '
		<table border="0" width="100%" cellspacing="1"  cellpadding="5" style="margin-top: 1px; background: url(images/menu_bg.gif) black; Color: white; Border: 1px solid #ccc; font-weight: bold;">
		<tbody><tr>';
		
				echo '
				
				<td class="windowbg2">
					<span class="smalltext">Username</span>


				</td>
				<td class="windowbg" valign="middle" align="center" style="width: 25%"><span class="smalltext">Posts</span></td>
				<td class="windowbg2" valign="middle" width="25%">
					<span class="smalltext">Joindate</span>
				</td>
			</tr>
			<tr>
	
		</tbody>
		</table>

		'; 
	while ($row = mysql_fetch_array($result)) {
		if ($row['infractions'] < 5 || $row['ipoints'] < 5) {
	
		echo '
	<table border="0" width="100%" cellspacing="1"  cellpadding="5" style="margin-top: 1px; background: #E2F4FF;">
		<tbody><tr>';
		
				echo '
				
				<td class="windowbg2">
					<b><a href="http://'.scriptUrl.'/users/'.$row['id'].'" name="b2">'.$row['username'].'</a> - (<a href="http://'.scriptUrl.'/admin.php?p=usersettings&id='.$row['id']. '">Modify</a>)

				</td>
				<td class="windowbg" valign="middle" align="center" style="width: 25%;"><span class="smalltext">
					'.$row['posts'].'
					
				</span></td>
				<td class="windowbg2" valign="middle" width="25%">
					<span class="smalltext">
							'.$row['joindate'].'
					</span>
				</td>
			</tr>
			<tr>
	
		</tbody>
		</table>
';
		}

		
	}
		$result2 = mysql_query("SELECT * FROM users");
	  $results = mysql_num_rows($result2);
	  $pages = ceil($results /20);
	  if (!isset($_GET['page'])) {
	  $page = 0;
	  } else {
		$page = $_GET['page'];
	  }
	   if($page > 0) {
      
      echo '[<a href="'.$_SERVER['PHP_SELF'].'?page='.($page-1).'"><<</a>]';
  }
  else{
      
      echo '[<<]';
  }
  
	for($i = 1; $i <= $pages; $i++)    {
		if (!isset($_GET['page'])) {
			$a = 0;
			
		} else {
			
			$a = $_GET['page'];
		}
		if (!($i - 1) == $a) {
      echo '[<a href="'.$_SERVER['PHP_SELF'].'?page='.($i-1).'">'.$i.'</a>]';
	} else {
		 echo '['.$i.']';
	}
    } 
	
	
  if(($page+1) <= ($results/20)) {
      
      echo '[<a href="'.$_SERVER['PHP_SELF'].'?page='.($page+1).'">>></a>]';
  }
  else{
      
      echo '[>>]';
  }
	
	
	
  
} 


?>