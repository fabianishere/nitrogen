<?php
/* 
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
 	
class Pagination 
{
	static function getThreadPagination($thread)
	{
		$num = mysql_num_rows(mysql_query("SELECT * FROM replies WHERE threadid='".$thread->getThreadId()."' AND visible='0'"));
		$pages = ceil($num / 10);
	 	if (!isset($_GET['page'])) {
	  		$page = 0;
	 	} 
		else
		{
			$page = $_GET['page'];
	  	}
	  	if($page > 0) {
     	 echo '[<a href="http://'.$_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']).'/threads/'.$_GET['id'].'/page/'.($page-1).'"><<</a>]';
  		}
  		else
		{
      
      		echo '[<<]';
  		}
  
		for($i = 1; $i <= $pages; $i++)    {
			if (!isset($_GET['page'])) 
			{
			$a = 0;
			}
			else
			{
			
				$a = $_GET['page'];
			}
			if (!($i - 1) == $a)
			{
      			echo '[<a href="http://'.$_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']).'/threads/'.$_GET['id'].'/page/'.($i-1).'">'.$i.'</a>]';
			} 
			else 
			{
				 echo '['.$i.']';
			}
    	} 
	
	
  		if(($page+1) <= ($num / 10))
		{
      
      		echo '[<a href="http://'.$_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']).'/threads/'.$_GET['id'].'/page/'.($page+1).'">>></a>]';
  		}
  		else
		{
      
     		 echo '[>>]';
  		}
	}
	
	static function getLimit($get) 
	{
		if (!isset($_GET[$get]) || $_GET[$get] == "") 
			return "0, 10";
		
		return $_GET[$get] * 10 . ', ' . $_GET[$get] * 20;
		
	}
	 

}
 
 
 ?>