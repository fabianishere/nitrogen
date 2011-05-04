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

include('includes/bbcodeparser.php');
	function __loadAdminFunction() {
		if (isset($_POST['settings'])) {
			$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='".quote_smart($_POST['userid'])."'"));
			
			if ($_POST['username'] == "") {
				$username = $row['username'];	
			} else {
				$username = parse($_POST['username']);
			}
			
			
			if ($_POST['usergroupid'] == "") {
				$usergroupid = $row['usergroupid'];	
			} else {
				$usergroupid = $_POST['usergroupid'];
			}
				
			if ($_POST['displaygroupid'] == "") {
				$displaygroupid = $row['displaygroupid'];	
			} else {
				$displaygroupid = $_POST['displaygroupid'];
			}
			if ($_POST['email'] == "") {
				$email = $row['email'];	
			} else {
				$email = $_POST['email'];
			}
			if ($_POST['firstname'] == "") {
				$firstname = $row['firstname'];	
			} else {
				$firstname = $_POST['firstname'];
			}
		if ($_POST['lastname'] == "") {
				$lastname = $row['lastname'];	
			} else {
				$lastname = $_POST['lastname'];
			}
			if ($_POST['homepage'] == "") {
				$homepage = $row['homepage'];	
			} else {
				$homepage = $_POST['homepage'];
			}
			if ($_POST['icq'] == "") {
				$icq = $row['icq'];	
			} else {
				$icq = $_POST['icq'];
			}
			
				if ($_POST['aim'] == "") {
				$aim = $row['aim'];	
			} else {
				$aim = $_POST['aim'];
			}
		
			if ($_POST['yahoo'] == "") {
				$yahoo = $row['yahoo'];	
			} else {
				$yahoo = $_POST['yahoo'];
			}
		
			if ($_POST['msn'] == "") {
				$msn = $row['msn'];	
			} else {
				$msn = $_POST['msn'];
			}
			
			//
			
			if ($_POST['skype'] == "") {
				$skype = $row['skype'];	
			} else {
				$skype = $_POST['skype'];
			}
			if ($_POST['usertitle'] == "") {
				$usertitle = $row['usertitle'];	
			} else {
				$usertitle = parseBB($_POST['usertitle']);
			}
			if ($_POST['joindate'] == "") {
				$joindate = $row['joindate'];	
			} else {
				$joindate = $_POST['joindate'];
			}
			if ($_POST['posts'] == "") {
				$posts = $row['posts'];	
			} else {
				$posts = $_POST['posts'];
			}
			if ($_POST['reputation'] == "") {
				$reputation = $row['reputation'];	
			} else {
				$reputation = $_POST['reputation'];
			}
			if ($_POST['infractions'] == "") {
				$infractions = $row['infractions'];	
			} else {
				$infractions = $_POST['infractions'];
			}
			if ($_POST['warnings'] == "") {
				$warnings = $row['warnings'];	
			} else {
				$warnings = $_POST['warnings'];
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
		
		if ($_POST['signature'] == "") {
				$signature = $row['signature'];	
			} else {
				$signature = $_POST['signature'];
			}
			$result = mysql_query("UPDATE users SET username='".$username."', usergroupid='".$usergroupid."', displaygroupid='".$displaygroupid."', email='".$email."', firstname='".$firstname."', lastname='".$lastname."', homepage='".$homepage."', icq='".$icq."', aim='".$aim."', yahoo='".$yahoo."', msn='".$msn."', skype='".$skype."', usertitle='".$usertitle."', joindate='".$joindate."', posts='".$posts."', reputation='".$reputation."', infractions='".$infractions."', warnings='".$warnings."', htmlbefore='".$htmlbefore."', htmlafter='".$htmlafter."', signature='".$signature."' WHERE id='".quote_smart($_POST['userid'])."'");
			
		
			if ($result) {
				header("Location: http://".scriptUrl."/admin.php?p=users");
				exit();
			} else {
				echo 'Mysql Error: '.mysql_error(); 	
				exit();
			}
			
		}

} 


?>