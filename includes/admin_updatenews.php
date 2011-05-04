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
			$row = mysql_fetch_array(mysql_query("SELECT * FROM middlenews WHERE id='".quote_smart($_POST['id'])."'"));
			
			if ($_POST['threadid'] == "") {
				$threadid = $row['threadid'];	
			} else {
				$threadid = $_POST['threadid'];
			}
			
			
			if ($_POST['usethread'] == "") {
				$usethread = $row['usethread'];	
			} else {
				$usethread = $_POST['usethread'];
			}
				
			if ($_POST['title'] == "") {
				$title = $row['title'];	
			} else {
				$title = $_POST['title'];
			}
			if ($_POST['text'] == "") {
				$text = $row['text'];	
			} else {
				$text = $_POST['text'];
			
			}

	
			$result = mysql_query("UPDATE middlenews SET threadid='".$threadid."', usethread='".$usethread."', title='".$title."', text='".$text."' WHERE id='".quote_smart($_POST['id'])."'");
			
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=news");
				exit();
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		} else if (isset($_POST['delete'])) {
			$result = mysql_query("DELETE FROM middlenews WHERE id='".quote_smart($_POST['id'])."'");
			
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=news");
				exit();
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
		}

} 


?>