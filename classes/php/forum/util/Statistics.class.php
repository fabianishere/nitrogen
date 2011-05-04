<?php 
/** 
 * Copyright (c) 2011 FaabTech <faabtech.com>
 *
 * More information about FaabBB may be found on these websites:
 *    http://faabtech.com/faabbb
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

class Statistics {
	
	
  /**
   * Update the current users.
   * <note>All visitors will be added to the database at visit.</note>
   */
  static function updateUsers() {	
  	// Define some variables
	$timeoutseconds = 100;
	// Timestamp
	$timestamp = time(); 
	//Timeout
	$timeout = $timestamp-$timeoutseconds; 
	// The file
	$file =  $_SERVER['PHP_SELF'];
	$break = explode('/', $file);
	$file = htmlspecialchars(str_replace(".php", "", $break[count($break) - 1]), ENT_QUOTES); 
	// The url.
	$url = getUrl();
	


	// Is the user logged in?
	if (isLoggedIn()) 
			// Is the user already saved? No? add them to the database.
			if (!DatabaseManager::getArrayFromQuery("SELECT * FROM usersonline WHERE userid='".getUserId()."' AND ip='".$REMOTE_ADDR."'")) 
				// Run the query
				$insert = DatabaseManager::runQuery("INSERT INTO usersonline VALUES('$timestamp','".getUserId()."','".getUserName()."', '0', '".$REMOTE_ADDR."', '".$file."', '".$url.	"')"); 
			// Yes? then update it.
			else 
				// Run the query
				$insert = DatabaseManager::runQuery("UPDATE usersonline SET timestamp='$timestamp', self='".$file."', url='".$url."'  WHERE userid='".getUserId()."' AND username='".getUserName()."' AND ip='".$REMOTE_ADDR."'"); 
	// Is it a guest?		
	else 	
			// Is the guest already in the database? No? add them to the database.
			if (!DatabaseManager::getArrayFromQuery("SELECT * FROM usersonline WHERE ip='".$REMOTE_ADDR."' AND isguest='1'")) 
				// Run the query.
				$insert = DatabaseManager::runQuery("INSERT INTO usersonline VALUES('$timestamp','0','0', '1', '".$REMOTE_ADDR."', '".$file."', '".$url."')"); 
		 	// Yes? Update it.
			else 
				// Run the query/
				$insert = DatabaseManager::runQuery("UPDATE usersonline SET timestamp='$timestamp', self='".$file."', url='".htmlspecialchars($url, ENT_QUOTES)."' WHERE ip='".$REMOTE_ADDR."' AND isguest='1'"); 
	
	
  	// Succesfull?
	if(!($insert))
		// No? Die with the MySQL error. 
		themeDie(array('You have got a MySQL Error: '.DatabaseManager::getError()));
	

	// Now, delete the old users.
	$delete = mysql_query("DELETE FROM usersonline WHERE timestamp<$timeout"); 
	
	// Succesfull?
	if(!($delete)) 
		// No? Die with the MySQL error. 
		themeDie(array('You have got a MySQL Error: '.DatabaseManager::getError()));
	
	
  }
	
}





?>