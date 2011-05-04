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
    include_once('config.php');

		//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {} else {
		
	/*
	 * The user mod mysql result
	 */
	$usermodresult = mysql_query("SELECT * FROM users WHERE id='". $_SESSION['SESS_MEMBER_ID']."'");

    /*
	 * The user mod mysql row
	 */
	$usermodrow = mysql_fetch_array($usermodresult);
	

	/*
	 * Is the user moderator?
	 */
	if ($usermodrow && in_array($usermodrow['usergroupid'], $modRights)) {
	
	
	/*
	 * Get the post variables
	 */
	$replyid = $_POST['replyid'];
	$userid = $_POST['userid'];
	$threadid = $_POST['threadid'];

	/*
	 * Get last reply -1
	 */
	 $num = mysql_num_rows(mysql_query("SELECT * FROM replies WHERE threadid='".$threadid."'"));
	 $row = mysqlRow("SELECT * FROM replies WHERE threadid='".$threadid."' LIMIT ".($num-1).", ".($num-1)."");
	/*
	 * The user mysql result
	 */	
	$userresult = mysql_query("SELECT * FROM users WHERE id='" .$userid."'");
	/*
	 * The user mysql row
	 */
	$userrow = mysql_fetch_array($userresult);
	/*
	 * The postcount of the user - 1
	 */
	$newposts = $userrow['posts'] - 1;
	/*
	 * The result of the thread
	 */
	$threadrow = mysqlArray("SELECT * FROM threads WHERE threadid='" .$threadid."'");

	/*
	 * The thread posts - 1
	 */
	$threadposts = $threadrow['replycount'] - 1;
	
	/*
	 * The Post result, Update the posts where id = userid
	 */
	$deletepostresult = mysql_query("UPDATE users SET posts='".$newposts."' WHERE id='".$userid."'");

    /*
	 * Change lastposter
	 */
	 
	$threadpostresult = mysql_query("UPDATE threads
SET replycount='".$threadposts ."', lastposterid ='".$row['userid']."', lastposter ='".$row['username']."'
WHERE threadid='".$threadid."'");

	
	/*
	 * Update the reply
	 */
	$result = mysql_query("UPDATE replies SET visible='1' WHERE postid='" .$replyid."'");

	//Check whether the query was successful or not
	if($userresult && $result && $deletepostresult && $threadresult) {
		header("location: http://".scriptUrl."/showthread.php?".$threadrow['threadid']."");
		exit();
	}else {
		die(mysql_error());
	}
	}
	}

?>
