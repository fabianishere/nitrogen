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
		if (isset($_POST['settings'])) {
		
			
			if ($_POST['name'] == "") { echo 'Enter a Name'; exit();
			
			} else {
				$name = $_POST['name'];
			}
			
			
			if ($_POST['des'] == "") { 
			
			$des = "";
			} else {
				$des = $_POST['des'];
			}
				
			if ($_POST['childof'] == "") { echo 'Fill in the childof field'; exit();
					
			} else {
				$childof = $_POST['childof'];
			}
			if ($_POST['closed'] == "") {
				$closed = 0;
				
			} else {
				$closed = $_POST['closed'];
			}
			if ($_POST['rights'] == "") {$rights = 0;
				
			} else {
				$rights = $_POST['rights'];
			}
		
			$lastid = mysql_fetch_array(mysql_query("SELECT * FROM section ORDER BY id DESC"));
			
			if ($lastid['id'] == 0) {
					$id = $lastid['id'] + 1;	
			} else {
					$id = $lastid['id'] + 1;
			}
			$name = htmlspecialchars($name, ENT_QUOTES);
			$des = htmlspecialchars($des, ENT_QUOTES);
			$childof = htmlspecialchars($childof, ENT_QUOTES);
			$closed = htmlspecialchars($closed, ENT_QUOTES);
			$rights = htmlspecialchars($rights, ENT_QUOTES);
			$result = mysql_query("INSERT INTO section(id, name, description, childof, closed, rights) VALUES('".$id."', '".$name."', '".$des."','".$childof."','".$closed."','".$rights."')");
			
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=boards");
				exit();
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		} 
		

} 


?>