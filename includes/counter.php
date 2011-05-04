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
	include_once('connector.php');
	
	
	function getReplies($id) 
	{
		$count = 0;
		$result = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE id='".$id."'");
		while ($row = Database::getDatabaseManager()->getArrayFromResult($result))
		{
			$count += $row['posts'];
			$result2 = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE childof='".$id."'");
				while ($row2 = Database::getDatabaseManager()->getArrayFromResult($result2))
				{
					$count += getReplies($row2['id']);
				}	
		}
		return $count;
	}
	
	
	
	function getThreads($id)
	{
		$count = 0;
		$result = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE id='".$id."'");
		while ($row = Database::getDatabaseManager()->getArrayFromResult($result))
		{
			$count += $row['threads'];
			$result2 = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE childof='".$id."'");
				while ($row2 = Database::getDatabaseManager()->getArrayFromResult($result2))
				{
					$count += getReplies($row2['id']);
				}	
		}
		return $count;
	}
	
	function lastPost($id) {
	 	$dateline = array();
		$result = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE id='".$id."'");
		while ($row = Database::getDatabaseManager()->getArrayFromResult($result))
		{
			$dateline[$row['dateline']] = array('lastposter' => $row['lastposter'], 'lastposterid' =>  $row['lastposterid'], 'lastpost' =>  $row['lastpost'], 'lastpostid' =>  $row['lastpostid'], 'dateline' =>  $row['dateline']);
			$result2 = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE childof='".$id."'");
				while ($row2 = Database::getDatabaseManager()->getArrayFromResult($result2))
				{
					$dateline[$row2['dateline']] += lastPost($row2['id']);
				}	
		}
		return max($dateline);
	}
		


?>