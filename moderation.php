<?php
/* 
 * Copyright (c) 2010 FaabTech <faabtech.com>
 *
 * More information about the FaabBB may be found on these websites:
 *    http://faabtech.com/apis
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 */	
 	include(dirname(__FILE__).'/includes.php');
	getStandardIncludes();
	include(includePath.'/config.php');
	
	if (!defined('FaabBB')) {
		die("Hacking..");
	}
 
 	switch($_GET['p']) {
		case 'addnews':
			addNews($_POST['threadid']);
		break;
		
		case 'deletenews':
			deleteNews($_POST['threadid']);
		break;
			
		case 'aprovethread':
			aproveThread($_POST['threadid']);
		break;
		
		case 'disaprovethread':
			disaproveThread($_POST['threadid']);
		break;
		
	}
	
 
	
	
	/*
	 * Get Moderator rights
	 */
	 function getModeratorRights() {
		return array(5,6); 
	 }
	 
	 /**
	  * Delete news
	  */
	 function deleteNews($threadid) {
		 if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
				$result = Database::getDatabaseManager()->runQuery("DELETE threads WHERE threadid='" .$threadid . "'");

				//Check whether the query was successful or not
				if($result) {
					header("Location: http://".scriptUrl."/threads/".$threadid."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact the administrator. '.Database::getDatabaseManager()->getError()));
				}
			}
		}
		
	}
	
	 /**
	  * Delete news
	  */
	 function addNews($threadid) {
		 if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
				$result = Database::getDatabaseManager()->runQuery("INSERT INTO threads(threadid) VALUES('" .$threadid."')");

				//Check whether the query was successful or not
				if($result) {
					header("Location: http://".scriptUrl."/threads/".$threadid."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact the administrator. '.Database::getDatabaseManager()->getError()));
				}
			}
		}
		
	}
		 
	
	
	/*
	 * Aproves a thread.
	 */
	function aproveThread($threadid) {
		if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
				$result = Database::getDatabaseManager()->runQuery("UPDATE threads SET aproved='1' WHERE threadid='" .$threadid."'");

				//Check whether the query was successful or not
				if($result) {
					echo $threadid;
					header("Location: http://".scriptUrl."/threads/".$threadid."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact the administrator. '.Database::getDatabaseManager()->getError()));
				}
			}
		}
		
	}
	/*
	 * Disaproves a thread.
	 */
	function disaproveThread($threadid) {
		if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
				$result = Database::getDatabaseManager()->runQuery("UPDATE threads SET aproved='0' WHERE threadid='" .$threadid."'");

				//Check whether the query was successful or not
				if($result) {
					header("Location: http://".scriptUrl."/threads/".$threadid."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact the administrator. '.Database::getDatabaseManager()->getError()));
				}
			}
		}
	}
	
	
	/*
	 * Delete a thread
	 */
	 function deleteThread($userid, $threadid, $forumid) {
		 if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
					$userrow = getUserArray();
					$newposts = $userrow['posts'] - 1;
					$threadrow = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM threads WHERE threadid='".$threadid."'");
					$sectionrow = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM section WHERE id='".$forumid."'");
	
					$deletepostresult = Database::getDatabaseManager()->runQuery("UPDATE users SET posts='".$newposts."' WHERE id='".$userid."'");


					$newthreads = $sectionrow['threads'] - 1 < 0 ? 0  : $sectionrow['threads'] - 1;
				
					$newposts2 = $sectionrow['posts'] - $threadrow['replycount'] < 0 ? 0 : $sectionrow['posts'] - $threadrow['replycount'];


	
					$result = Database::getDatabaseManager()->runQuery("UPDATE threads SET visible='1' WHERE threadid='" .$threadid."'");
					$result2 = Database::getDatabaseManager()->runQuery("UPDATE section SET threads='".$newthreads."', posts='".$newposts2."' WHERE id='" .$forumid."'");
					$result3 = Database::getDatabaseManager()->runQuery("SELECT * FROM replies WHERE threadid='".$threadid."'");
					$result4 = Database::getDatabaseManager()->runQuery("UPDATE replies SET visible='1' WHERE threadid='".$threadid."'");

					while ($row = mysql_fetch_array($result3)) {
							$userrow = mysqlArray("SELECT * FROM users WHERE id='".$row['userid']."'");
							$userresult = Database::getDatabaseManager()->runQuery("UPDATE users SET posts='".($userrow['posts']-1)."' WHERE id='".$userrow['id']."'");
	
					}

			//Check whether the query was successful or not
				if($result) {
					header("Location: http://".scriptUrl."/threads/".$threadid."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact the administrator. '.Database::getDatabaseManager()->getError()));
				}
			}
		}
	 }
	 /*
	  * Restore a thread
	  */
	 function restoreThread($userid, $threadid, $forumid) {
		 	 if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
					$userrow = getUserArray();
					$newposts = $userrow['posts'] + 1;
					$threadrow = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM threads WHERE threadid='".$threadid."'");
					$sectionrow = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM section WHERE id='".$forumid."'");
	
					$deletepostresult = Database::getDatabaseManager()->runQuery("UPDATE users SET posts='".$newposts."' WHERE id='".$userid."'");


					$newthreads = $sectionrow['threads'] + 1;
				
					$newposts2 = $sectionrow['posts'] + $threadrow['replycount'];


	
					$result = Database::getDatabaseManager()->runQuery("UPDATE threads SET visible='1' WHERE threadid='" .$threadid."'");
					$result2 = Database::getDatabaseManager()->runQuery("UPDATE section SET threads='".$newthreads."', posts='".$newposts2."' WHERE id='" .$forumid."'");
					$result3 = Database::getDatabaseManager()->runQuery("SELECT * FROM replies WHERE threadid='".$threadid."'");
					$result4 = Database::getDatabaseManager()->runQuery("UPDATE replies SET visible='1' WHERE threadid='".$threadid."'");

					while ($row = mysql_fetch_array($result3)) {
							$userrow = mysqlArray("SELECT * FROM users WHERE id='".$row['userid']."'");
							$userresult = Database::getDatabaseManager()->runQuery("UPDATE users SET posts='".($userrow['posts']+1)."' WHERE id='".$userrow['id']."'");
	
					}

			//Check whether the query was successful or not
				if($result) {
					header("Location: http://".scriptUrl."/threads/".$threadid."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact the administrator. '.Database::getDatabaseManager()->getError()));
				}
			}
		}
	 }
	 
	 /*
	  * Delete a reply
	  */
	  function deleteReply($userid, $threadid, $forumid) {
			if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
					
	
	/*
	 * The user mysql result
	 */	
			$userresult = Database::getDatabaseManager()->runQuery("SELECT * FROM users WHERE id='" .$userid."'");
	/*
	 * The user mysql row
	 */
			$userrow = Database::getDatabaseManager()->getArrayFromResult($userresult);
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
			$deletepostresult = Database::getDatabaseManager()->runQuery("UPDATE users SET posts='".$newposts."' WHERE id='".$userid."'");



	
			   /*
	 			* Update the reply
	 			*/
				$result = Database::getDatabaseManager()->runQuery("UPDATE replies SET visible='1' WHERE postid='" .$replyid."'");

			 	$row = mysqlRow("SELECT * FROM replies WHERE threadid='".$threadid."' AND visible='0'");
	 /*
	  * Change lastposter
	  */
	 
			   $threadpostresult = Database::getDatabaseManager()->runQuery("UPDATE threads SET replycount='".$threadposts ."', lastposterid ='".$row['userid']."', lastposter ='".$row['username']."' WHERE threadid='".$threadid."'");

					//Check whether the query was successful or not
				if($userresult && $result && $deletepostresult && $threadresult) {
					header("location: http://".scriptUrl."/showthread.php?".$threadrow['threadid']."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact an Administrator. '.Database::getDatabaseManager()->getError()));
				}

			}
		}
	 }
	 
	  /*
	  * Delete a reply
	  */
	  function restoreReply($userid, $threadid, $forumid) {
			if (isLoggedIn()) {
			if (in_array(getUserGroupId(), getModeratorRights())) {
					
	
	/*
	 * The user mysql result
	 */	
			$userresult = Database::getDatabaseManager()->runQuery("SELECT * FROM users WHERE id='" .$userid."'");
	/*
	 * The user mysql row
	 */
			$userrow = Database::getDatabaseManager()->getArrayFromResult($userresult);
	/*
	 * The postcount of the user - 1
	 */
			$newposts = $userrow['posts'] + 1;
	/*
	 * The result of the thread
	 */
			$threadrow = mysqlArray("SELECT * FROM threads WHERE threadid='" .$threadid."'");

	/*
	 * The thread posts - 1
	 */
			$threadposts = $threadrow['replycount'] + 1;
	
	/*
	 * The Post result, Update the posts where id = userid
	 */
			$deletepostresult = Database::getDatabaseManager()->runQuery("UPDATE users SET posts='".$newposts."' WHERE id='".$userid."'");



	
			   /*
	 			* Update the reply
	 			*/
				$result = Database::getDatabaseManager()->runQuery("UPDATE replies SET visible='0' WHERE postid='" .$replyid."'");

			 	$row = mysqlRow("SELECT * FROM replies WHERE threadid='".$threadid."' AND visible='0'");
	 /*
	  * Change lastposter
	  */
	 
			   $threadpostresult = Database::getDatabaseManager()->runQuery("UPDATE threads SET replycount='".$threadposts ."', lastposterid ='".$row['userid']."', lastposter ='".$row['username']."' WHERE threadid='".$threadid."'");

					//Check whether the query was successful or not
				if($userresult && $result && $deletepostresult && $threadresult) {
					header("location: http://".scriptUrl."/showthread.php?".$threadrow['threadid']."");
					exit();
				} else {
					themeDie(array('You have got a SQL error, try to contact an Administrator. '.Database::getDatabaseManager()->getError()));
				}

			}
		}
	 }
	 
	 /*
	  * Locks a thread
	  */
	  function lockThread($threadid) {
		  
		  if (isLoggedIn()) {
				if (in_array(getUserGroupId(), getModeratorRights())) {
		  			 $result = Database::getDatabaseManager()->runQuery("UPDATE threads SET open='1' WHERE threadid='" .$threadid."'");

					//Check whether the query was successful or not
			   		 if($result) {
						header("Location: http://".scriptUrl."/threads/".$threadid."");
						exit();
					} else {
						themeDie(array('You have got a SQL error, try to contact an Administrator. '.Database::getDatabaseManager()->getError()));
				    } 
				}
	  }
	  }
	 /*
	  * Locks a thread
	  */
	  function unlockThread($threadid) {
		  
		  if (isLoggedIn()) {
				if (in_array(getUserGroupId(), getModeratorRights())) {
		  			 $result = Database::getDatabaseManager()->runQuery("UPDATE threads SET open='0' WHERE threadid='" .$threadid."'");

					//Check whether the query was successful or not
			   		 if($result) {
						header("Location: http://".scriptUrl."/threads/".$threadid."");
						exit();
					} else {
						themeDie(array('You have got a SQL error, try to contact an Administrator. '.Database::getDatabaseManager()->getError()));
				    } 
				}
	  }
	  }
	
		 /*
	  * Sticky
	  */
	  function stickyThread($threadid) {
		  
		  if (isLoggedIn()) {
				if (in_array(getUserGroupId(), getModeratorRights())) {
		  			 $result = Database::getDatabaseManager()->runQuery("UPDATE threads SET sticky='1' WHERE threadid='" .$threadid."'");

					//Check whether the query was successful or not
			   		 if($result) {
						header("Location: http://".scriptUrl."/threads/".$threadid."");
						exit();
					} else {
						themeDie(array('You have got a SQL error, try to contact an Administrator. '.Database::getDatabaseManager()->getError()));
				    } 
				}
	  }
	  }	
	  	
		 /*
	  * unSticky
	  */
	  function unstickyThread($threadid) {
		  
		  if (isLoggedIn()) {
				if (in_array(getUserGroupId(), getModeratorRights())) {
		  			 $result = Database::getDatabaseManager()->runQuery("UPDATE threads SET sticky='0' WHERE threadid='" .$threadid."'");

					//Check whether the query was successful or not
			   		 if($result) {
						header("Location: http://".scriptUrl."/threads/".$threadid."");
						exit();
					} else {
						themeDie(array('You have got a SQL error, try to contact an Administrator. '.Database::getDatabaseManager()->getError()));
				    } 
				}
	  }
	  }	
?>