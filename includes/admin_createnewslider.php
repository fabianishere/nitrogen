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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM news WHERE id='".quote_smart($_POST['sliderid'])."'"));
			
			
			
			if ($_POST['title'] == "") {
				echo 'Fill in the fields';
				exit();
				} else {
				$title = $_POST['title'];
			}
				
			if ($_POST['p1'] == "") {
			echo 'Fill in the fields';
				exit();
			} else {
				$p1 = $_POST['p1'];
			}
			if ($_POST['p2'] == "") {
				echo 'Fill in the fields';
				exit();
			} else {
				$p2 = $_POST['p2'];
			}
		
		
		
			$result = mysql_query("UPDATE slider SET title='".$title."', p1='".$p1."', p2='".$p2."' WHERE id='".quote_smart($_POST['boardid'])."'");
			
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=usergroups");
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		}

} 


?>