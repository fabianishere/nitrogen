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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE id='".quote_smart($_POST['boardid'])."'"));
			
			if ($_POST['name'] == "") {
				$name = $row['name'];	
			} else {
				$name = $_POST['name'];
			}
			
			
			if ($_POST['des'] == "") {
				$des = $row['description'];	
			} else {
				$des = $_POST['des'];
			}
				
			if ($_POST['childof'] == "") {
				$childof = $row['childof'];	
			} else {
				$childof = $_POST['childof'];
			}
			if ($_POST['closed'] == "") {
				$closed = $row['closed'];	
			} else {
				$closed = $_POST['closed'];
			}
			if ($_POST['rights'] == "") {
				$rights = $row['rights'];	
			} else {
				$rights = $_POST['rights'];
			}
		
		
			$result = mysql_query("UPDATE section SET name='".$name."', description='".$des."', childof='".$childof."', closed='".$closed."', rights='".$rights."' WHERE id='".quote_smart($_POST['boardid'])."'");
			
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=boards");
				exit();
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		} else if (isset($_POST['delete'])) {
			$result = mysql_query("DELETE FROM section WHERE id='".quote_smart($_POST['boardid'])."'");
			
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