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


$links = array(
			   'index' => 'index.php',
			   'forum' => 'forum.php',
			   'thread' => 'theads/',
			   'user' => 'users/',
			   'inbox' => 'inbox/',
			   'board' => 'board/',
			   'createthread' => 'createthread.php',
			   'addnews' => 'addnews.php',
			   'admin' => 'admin.php',
			   'aprovethread' => 'aprovethread.php',
			   'banuser' => 'banuser.php',
			   'checkuser' => 'checkuser.php',
			   'config' => 'config.php',
			   'deletepm' => 'deletepm.php',
			   'deletethread' => 'deletethread.php',
			   'deletereply' => 'deletereply.php',
			   'deletevm' => 'deletevm.php',
			   'editreply' => 'editreply.php',
			   'editthread' => 'editthread.php',
			   'lockthread' => 'lockthread.php',
			   'login' => 'login.php',
			   'loginfailed' => 'loginfailed.php',
			   'logout' => 'logout.php',
			   'memberlist' => 'memberlist.php',
			   'postpm' => 'postpm.php',
			   'postreply' => 'postreply.php',
			   'postthread' => 'postthread.php',
			   'postvisitormessage' => 'postvisitormessage.php',
			   'register' => 'register.php',
			   'showforum' => 'showforum.php',
			   'showgroups' => 'showgroups.php',
			   'showinbox' => 'showinbox.php',
			   'showonlineusers' => 'showonlineusers.php',
			   'showpm' => 'showpm.php',
			   'showprofile' => 'showprofile.php',
			   'showthread' => 'showthread.php',
			   'stickythread' => 'stickythread.php',
			   'updatereply' => 'updatereply.php',
			   'updatesignature' => 'updatesignature.php',
			   'updateusertitle' => 'updateusertitle.php',
			   'usercp' => 'usercp.php',
			   'captcha' => 'includes/captcha.php',
			   'avatar' => 'includes/avatar.php',
			   );

	function getLink($name) {
		if(isset($links[$name])) {
			return "http://".scriptUrl."/".$links[$name];				
		} else {
				return "#";			
		}
		
	}



?>