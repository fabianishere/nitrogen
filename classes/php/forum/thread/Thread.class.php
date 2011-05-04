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
 
 class Thread
 {
	/*
	 * Variables
	 */
	private $threadId;
	
	private $threadRow;
	 
	 /*
	  * Constructor
	  */ 
	function __construct($thread) 
	{
			$this->threadId = $thread;
			$this->threadRow = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM threads WHERE threadid='".$thread."'");
	}
	
	/*
	 * Is null?
	 * @return <code>true</code> or <code>false</code>
	 */
	 function isNull() 
	 {
		 return $this->threadRow ? false : true;
	 }
	/*
	 * Is open?
	 * @return <code>true</code> or <code>false</code>
	 */
	 function isOpen() 
	 {
		 return $this->threadRow['open'] == 0 ? true : false;
	 }
	 /*
	 * Is visible?
	 * @return <code>true</code> or <code>false</code>
	 */
	 function isVisible() 
	 {
		 return $this->threadRow['visible'] == 0 ? true : false;
	 }
	/*
	 * Is sticky?
	 * @return <code>true</code> or <code>false</code>
	 */
	 function isSticky() 
	 {
		 return $this->threadRow['sticky'] == 0 ? false : true;
	 }
	/*
	 * Is aproved?
	 * @return <code>true</code> or <code>false</code>
	 */
	 function isAproved() 
	 {
		 return $this->threadRow['aproved'] == 0 ? false : true;
	 }
	 /* 
	  * Return the thread id
	  * @return the current threadid
	  */
	  function getThreadId() 
	  {
		  return $this->threadId;
	  }
	 
	 /*
	  * Get the title of the current thread
	  * <note>Title may contains HTML</note>
	  * @return the title
	  */
	  function getTitle() 
	  {
		  return $this->threadRow['title'];
	  }
	 
	 
	 /*
	  * Get prefix Id of a thread
	  * @return the prefix id
	  */
	  function getPrefixId() 
	  {
		  return $this->threadRow['prefixid'];
	  }
	 /*
	  * Get first post id of a thread
	  * @return the firstpostid
	  */
	  function getFirsPostId() 
	  {
		  return $this->threadRow['firstpostid'];
	  }
	 /*
	  * Get last post id of a thread
	  * @return the lastpostid
	  */
	  function getLastPostId() 
	  {
		  return $this->threadRow['lastpostid'];
	  }
	 /*
	  * Get last post  of a thread
	  * @return the lastpost
	  */
	  function getLastPost() 
	  {
		  return $this->threadRow['lastpost'];
	  }
	 /*
	  * Get forum id of a thread
	  * @return the forumid
	  */
	  function getForumId() 
	  {
		  return $this->threadRow['forumid'];
	  }
	 /*
	  * Get poll id of a thread
	  * @return the pollid
	  */
	  function getPollId() 
	  {
		  return $this->threadRow['pollid'];
	  }
	 /*
	  * Get replycount of a thread
	  * @return the replycount
	  */
	  function getReplyCount() 
	  {
		  return $this->threadRow['replycount'];
	  }
	 /*
	  * Get hiddencount of a thread
	  * @return the hiddencount
	  */
	  function getHiddenCount() 
	  {
		  return $this->threadRow['hiddencount'];
	  }
	 /*
	  * Get deletedcount of a thread
	  * @return the deletedcount
	  */
	  function getDeletedCount() 
	  {
		  return $this->threadRow['deletedcount'];
	  }
	 /*
	  * Get postusername of a thread
	  * @return the postusername
	  */
	  function getPostUsername() 
	  {
		  return $this->threadRow['postusername'];
	  }
	 /*
	  * Get postuserid of a thread
	  * @return the postuserid
	  */
	  function getPostUserId() 
	  {
		  return $this->threadRow['postuserid'];
	  }
	 /*
	  * Get lastposterid of a thread
	  * @return the postuserid
	  */
	  function getLastPosterId() 
	  {
		  return $this->threadRow['lastposterid'];
	  }
	 /*
	  * Get dateline of a thread
	  * @return the postuserid
	  */
	  function getDateline() 
	  {
		  return $this->threadRow['dateline'];
	  }
	 /*
	  * Get views of a thread
	  * @return the views
	  */
	  function getViews() 
	  {
		  return $this->threadRow['views'];
	  }
	 /*
	  * Get IconId of a thread
	  * @return the IconId
	  */
	  function getIconId() 
	  {
		  return $this->threadRow['iconid'];
	  }
	 /*
	  * Get notes of a thread
	  * @return the notes
	  */
	  function getNotes() 
	  {
		  return $this->threadRow['notes'];
	  }
	 /*
	  * Get votenum of a thread
	  * @return the votenum
	  */
	  function getVoteNum() 
	  {
		  return $this->threadRow['votenum'];
	  }
	  
	 /*
	  * Get votetotal of a thread
	  * @return the votetotal
	  */
	  function getVoteTotal() 
	  {
		  return $this->threadRow['votetotal'];
	  }
	   /*
	  * Get attach of a thread
	  * @return the attach
	  */
	  function getAttach() 
	  {
		  return $this->threadRow['attach'];
	  }
	 /*
	  * Get taglist of a thread
	  * @return the taglist
	  */
	  function getTagList() 
	  {
		  return $this->threadRow['taglist'];
	  }
	 /*
	  * Get keywords of a thread
	  * @return the keywords
	  */
	  function getKeywords() 
	  {
		  return $this->threadRow['keywords'];
	  }
	 /*
	  * Get lastpostdate of a thread
	  * @return the lastpostdate
	  */
	  function getLastPostDate() 
	  {
		  return $this->threadRow['lastpostdate'];
	  }
	  /*
	  * Get Absolute date of lastpost of a thread
	  * @return the absdate
	  */
	  function getAbsDate() 
	  {
		  return $this->threadRow['absdate'];
	  }
	 /*
	  * Get content of a thread
	  * @return the content
	  */
	  function getContent() 
	  {
		  return $this->threadRow['content'];
	  }
	  
	  
 }
 
 
 
 ?>