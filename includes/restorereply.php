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
 include('config.php');		
			
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
	 * The user mysql result
	 */	
	$userresult = mysql_query("SELECT * FROM users WHERE id='" .$userid."'");
	/*
	 * The user mysql row
	 */
	$userrow = mysql_fetch_array($userresult);
	/*
	 * The postcount of the user + 1
	 */
	$newposts = $userrow['posts'] + 1;
	/*
	 * The result of the thread
	 */
	$threadresult = mysql_query("SELECT * FROM threads WHERE threadid='" .$threadid."'");
	/*
	 * Thread row
	 */
	$threadrow = mysql_fetch_array($threadresult);
	/*
	 * The thread posts + 1
	 */
	$threadposts = $threadrow['replycount'] + 1;
	
	/*
	 * The Post result, Update the posts where id = userid
	 */
	$postresult = mysql_query("UPDATE users SET posts='".$newposts."' WHERE id='".$userid."'");

	/*
	 * TODO
	 */
	/*$threadpostresult = mysql_query("UPDATE threads
SET replycount='".$threadposts ."', lastposterid ='".$threadrow['lastuserpostid2']."', lastposter ='".$threadrow['lastuserpostname2']."'
WHERE threadid='".$threadid."'");*/

	/*
	 * Update the reply
	 */
     $result = mysql_query("UPDATE replies SET visible='0' WHERE postid='" .$replyid."'");

	//Check whether the query was successful or not
	if($userresult || $result || $threadpostresult || $postresult) {
		echo 'Done';
		exit();
	}else {
		die(mysql_error());
	}
	}
	}


?>