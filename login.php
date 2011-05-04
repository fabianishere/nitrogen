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
	
	//Include database connection details
	include_once('includes.php');
	getStandardIncludes();
		include('checkuser.php');
		if (isset($_SESSION['SESS_MEMBER_ID']) == '') {
		
	
	if (isset($_POST['Submit']) == "Login" && isset($_POST['login']) != '' && isset($_POST['password']) != '') {
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = quote_smart(clean($_POST['login']));
	$password = quote_smart(clean($_POST['password']));
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: http://".scriptUrl."/loginfailed.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM users WHERE username='".$login."' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_USER_NAME'] = $member['username'];
			session_write_close();
			if (isset($_GET['linkback']) == "") {
			header("location: http://".scriptUrl."/index.php");
			} else {
				$linkback = $_GET['linkback'];
				$url =  "http://".scriptUrl . "/" . $linkback;
				
			header("location: $url ");
			}
			exit();
		} else {
			
			header("location: http://".scriptUrl."/loginfailed.php");
			
			exit();
		}
	}	else {
		die("Query failed");
	}
	
		} else {
		
		include ('includes/login-form.php');

	
		
	}
		}
?>