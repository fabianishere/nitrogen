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
 
 include_once(includePath.'/classes/section.class.php');
 function getForums($id)
 {
	$board = new Section($id);
	$link = "";
	if ($board->childOfId() > 0)
		$link .= getForums($board->childOfId());
	
	$link .= ' &raquo; <a href="http://'.scriptUrl.'/board/'.$board->getId().'">'.$board->getName().'</a>';
	return $link;
	
 }
 
 function getNavigation($forumid) 
 {
	 $link = getForums($forumid);
	 
	 return '<a href="http://'.scriptUrl.'/index.php">'.siteName.'</a>' . ' &raquo; <a href="http://'.scriptUrl.'/forum.php">Forum</a> ' . $link; 
 }



?>