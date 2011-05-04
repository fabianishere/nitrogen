<?php
/** 
 * Copyright (c) 2010 FaabTech <faabtech.com>
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
 	include_once(dirname(__FILE__).'/../DatabaseManager.class.php');
 
 	class MySQL implements DatabaseManager  {
		
		/**
		 * Get the mysql error
		 * @return the mysql error.
		 */
		function getError() {
			return mysql_error();	
		}
		/**
		 * Get a mysql row
		 * @param $query the query
		 * @return the array
		 */
		function getRowFromQuery($query)
		{
			return mysql_fetch_row(self::runQuery($query));
		}
		
		/**
		 * Get a mysql row
		 * @param $result the result
		 * @return the array
		 */
		function getRowFromResult($result)
		{
			return mysql_fetch_row($result);
		}
	 	
		/**
		 * Runs an query.
		 * @param $query the query
		 * @return the result.
		 */
		function runQuery($query) 
		{
			return mysql_query($query);
		}
	 
	 	/**
		 * Get the array
		 * @param $query the query
		 * @return the array
		 */
	 	function getArrayFromQuery($query) 
		{
			return mysql_fetch_array(self::runQuery($query));
		}
		
		
	 	/**
		 * Get the array
		 * @param $result the result
		 * @return the array
		 */
	 	function getArrayFromResult($result) 
		{
			return mysql_fetch_array($result);
		}
		
		/**
		 * Count the rows
		 * @param $query the query
		 * @return the rows
		 */
		function numRowsFromQuery($query)
		{
			return mysql_num_rows(self::runQuery($query));
		}
		
		
		/**
		 * Count the rows
		 * @param $result the result
		 * @return the rows
		 */
		function numRowsFromResult($result)
		{
			return mysql_num_rows($result);
		}
		
		/**
		 * Create a MySQL connection
		 * @param $host the host
		 * @param $user the username
		 * @param $pass the password
		 */
		function create($host, $user, $pass) {
			return mysql_connect($host, $user, $pass);
		}
		
		/**
		 * Select the MySQL Db
		 * @param $db the database
		 */
		function setDatabase($db) {
			return mysql_select_db($db);
		}
	}
	
?>