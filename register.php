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
		include('config.php');
	if(isset($_SESSION['SESS_MEMBER_ID'])) {

 	loadTemplate('misc');
 	main_above('Register');

		
		
 	echo '
	<script type="text/javascript">function reloadCaptcha() {
		document.getElementById(\'imagereg\').src = document.getElementById(\'imagereg\').src  + \'#\';	
	}</script>
		<div class="article" style="margin-left:auto;
	margin-right: auto;width: 70%;">
	<div class="article-header">Register at '.siteName.'</div>
	<div class="article-content">';

echo 'You already logged in with '.$_SESSION['SESS_USER_NAME'].'.
</div>
	</div>
	';
	main_below();


		} else {
	if (isset($_POST['Submit']) == "Register") {
	
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
	$fname = quote_smart(clean($_POST['fname']));
	$lname = quote_smart(clean($_POST['lname']));
	$login = quote_smart(clean($_POST['login']));
	$password = quote_smart(clean($_POST['password']));
	$cpassword = quote_smart(clean($_POST['cpassword']));
	$email = quote_smart(clean($_POST['email']));
	$cemail = quote_smart(clean($_POST['cemail']));
	$captcha = quote_smart(clean($_POST['imagestamp']));
	
	
	
	

	
	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($cemail == '') {
		$errmsg_arr[] = 'Confirm email missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	if( strcmp($email, $cemail) != 0 ) {
		$errmsg_arr[] = 'Emails do not match';
		$errflag = true;
	}

	
		if (md5($captcha) != $_SESSION['randomnr2'])	{ 
		$errmsg_arr[] = 'Wrong Captcha';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM users WHERE username='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Username already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register.php");
		exit();
	}
$joindate = gmdate("d/m/Y");
$birthday = $_POST['birthday'] . '/' . $_POST['birthmonth'] . '/' . $_POST['birthyear'];
	//Create INSERT query
	$qry = "INSERT INTO users(firstname, lastname, username, password, joindate, usergroupid, email,birthday, displaygroupid) VALUES('$fname','$lname','$login','".md5($_POST['password'])."', '$joindate', '1', '$email', '".$birthday."', '1')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		
		header("location: register.php?p=done");
		exit();
	}else {
		die("Query failed");
	}
	} else if (isset($_GET['p']) ==  "done") {
		
		include('includes/register-success.php');
		
	} else {
		include('includes/register-form.php');
		$_SESSION['ERRMSG_ARR'] = '';
	
	}
	}
?>