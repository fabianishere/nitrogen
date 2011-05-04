<?php
/* 
 * Copyright (c) 2010 FaabTech <faabtech.com>
 *
 * More information about the FaabBB may be found on these websites:
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
 
 
 class Reply 
 {
	 /*
	  * Variables
	  */
	  
	 //Id thats given to the reply
	 private $replyId;
	 
	 private $replyRow;
	 
	/*
	 * Constructor
	 */
	 function __construct($replyId)
	 {
		 $this->replyId = $replyId;
		 $this->replyRow = mysqlArray("SELECT * FROM replies WHERE postid='".$replyId."'");
	 }
	 
	 function allowSmilie()
	 {
		return $this->replyRow['allowsmilie'] == 0 ? true : false; 
	 }
	 
	 
	 function attach()
	 {
		return $this->replyRow['allowsmilie'] == 0 ? false : true; 
	 }
	 
	 
	 function infraction()
	 {
		return $this->replyRow['allowsmilie'] == 0 ? false : true; 
	 }
	 
	 function showSignature()
	 {
		return $this->replyRow['showsignature'] == 0 ? true : false; 
	 }
	 
	 /*
	  * Is null?
	  * @return <code>true</code> or <code>false</code>
	  */
	  function isNull()
	  {
		return $this->replyRow ? false : true;  
	  }
	 
	  
	   /*
	  * Is visible?
	  * @return <code>true</code> or <code>false</code>
	  */
	  function isVisible()
	  {
		return $this->replyRow['visible'] == 0 ? true : false;  
	  }
	  
	  function getPostId()
	  {
		return $this->replyId;  
	  }
	  
	  function getThreadId()
	  {
		return $this->replyRow['threadid'];  
	  }
	  
	   function getParentId()
	  {
		return $this->replyRow['parentid'];  
	  }
	  
	    function getUsername()
	  {
		return $this->replyRow['username'];  
	  }
	  
	    function getUserId()
	  {
		return $this->replyRow['userid'];  
	  }
	  
	   function getUser()
	  {
		return new User($this->getUserId());  
	  }
	  
	    function getTitle()
	  {
		return $this->replyRow['title'];  
	  }
	  
	    function getDateline()
	  {
		return $this->replyRow['dateline'];  
	  }
	  
	    function getPageText()
	  {
		return $this->replyRow['pagetext'];  
	  }
	  
	    function getIpAddress()
	  {
		return $this->replyRow['ipaddress'];  
	  }
	  
	    function getIconId()
	  {
		return $this->replyRow['iconid'];  
	  }
	  
	  
	    function getReportThreadId()
	  {
		return $this->replyRow['reportthreadid'];  
	  }
	
	  
	 
	 
 }