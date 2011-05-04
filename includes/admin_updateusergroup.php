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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM usergroup WHERE id='".quote_smart($_POST['usergroupid'])."'"));
			
			if ($_POST['id'] == "") {
				$id = $row['id'];	
			} else {
				$id = $_POST['id'];
			}
			
			
			if ($_POST['name'] == "") {
				$name = $row['name'];	
			} else {
				$name = $_POST['name'];
			}
				
			if ($_POST['usertitlechange'] == "") {
				$usertitlechange = $row['usertitlechange'];	
			} else {
				$usertitlechange = $_POST['usertitlechange'];
			}
			if ($_POST['usertitle'] == "") {
				$usertitle = $row['usertitle'];	
			} else {
				$usertitle = $_POST['usertitle'];
			}
			if ($_POST['htmlbefore'] == "") {
				$htmlbefore = $row['htmlbefore'];	
			} else {
				$htmlbefore = $_POST['htmlbefore'];
			}
			if ($_POST['htmlafter'] == "") {
				$htmlafter = $row['htmlafter'];
			} else {
				$htmlafter = $_POST['htmlafter'];
			}
		
		
			$result = mysql_query("UPDATE usergroup SET id='".$id."', name='".$name."', usertitlechange='".$usertitlechange."', usertitle='".$usertitle."', htmlbefore='".$htmlbefore."', htmlafter='".$htmlafter."' WHERE id='".quote_smart($_POST['boardid'])."'");
			
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=usergroups");
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		}

} 


?>