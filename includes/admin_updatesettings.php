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
		if ($_POST['sitename'] == "" && !$_POST['addthis']  == "") {
				$sitename = siteName;	
				$addthis = $_POST['addthis'];	
			} else if (!$_POST['sitename'] == "" && $_POST['addthis'] == "") {
				$sitename = $_POST['sitename'];		
				$addthis  = AddThis;	
				
			} else if ($_POST['sitename'] == "" && $_POST['addthis'] == "") {
				header("Location: http://".scriptUrl."/admin.php?p=settings");
				exit();
			} else {
				$sitename = $_POST['sitename'];	
				$addthis = $_POST['addthis'];	
				
			}
		
			$result = mysql_query("UPDATE settings SET siteName='".$sitename."', AddThis='".$addthis."'");
			
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=settings");
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		}

} 


?>