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
 

	
 	class Section
	{
		/**
		 * Variables
		 */
		 private $row;
		 
		
		/**
		 * Constructor
		 * @param $id the section id
		 */
		 function __construct($id)
		 {
			 $this->row = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM section WHERE id='".$id."'");
		 }
		 
		 /**
		  * Does this forum contain any posts
		  * @return <code>true</code> if the forum contain any post, otherwise <code>false</code>
		  */
		 function containPosts() {
		 	return (boolean) Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM threads WHERE visible = '0' AND forumid = '".$this->getId()."'");
		 }
		 
		 /**
		  * Create a Forum not found exception
		  * @param $message the message.
		  */
		 function forumNotFound($message) {
		 	echo $message;
		 	TemplateManager::main_below();
		 	die;
		 }
		 /**
		  * Is null?
		  * @return <code>true</code> if the row is null else it is  <code>false</code>
		  */
		 function isNull()
		 {
			 return $this->row ? false : true;
		 }
		 
		  /**
		  * Is closed?
		  * @return <code>true</code> if the section is closed else it is  <code>false</code>
		  */
		 function isClosed()
		 {
			 return $this->row['closed'] == 0 ? false : true;
		 }
		 
		 /**
		  * Is visible?
		  * @return <code>true</code> if the section is visible else it is  <code>false</code>
		  */
		 function isVisible()
		 {
			 return $this->row['visible'] == 1 ? false : true;
		 }
		 
		 /** 
		  * is visible for
		  * @return an array with rights
		  */
		 function isVisibleFor()
		 {
			 $rights = array();
			 foreach(explode(';', $this->row['visiblefor']) as $right) 
			 {
				if ($right == "")
					continue;
				$rights[count($rights + 1)] = $right;
			 }
			 return $rights;
		 }
		 /** 
		  * Get the name
		  * @return the name
		  */
		 function getName()
		 {
			return $this->row['name']; 
		 }
		 
	 
	 	 /** 
		  * Get the id
		  * @return the id
		  */
		 function getId()
		 {
			return $this->row['id']; 
		 }
		 /** 
		  * Get the description
		  * @return the description
		  */
		 function getDescription()
		 {
			return $this->row['description']; 
		 }
		 
		 /** 
		  * Get the childOf
		  * @return the childOf
		  */
		 function childOfId()
		 {
			return $this->row['childof']; 
		 }
		 
		 	 
		 /** 
		  * Get the childOf
		  * @return the childOf
		  */
		 function childOf()
		 {
			return new Section($this->row['childof']); 
		 }
		 
		 
		 
	 	 /** 
		  * rights to post.
		  * @return an array with rights
		  */
		 function getRights()
		 {
			 $rights = array();
			 foreach(explode(';', $this->row['rightss']) as $right) 
			 {
				if ($right == "")
					continue;
				$rights[count($rights + 1)] = $right;
			 }
			 return $rights;
		 }
		 
		 /** 
		  * get posts
		  * @return the posts
		  */
		 function getPosts()
		 {
			return $this->row['posts'] < 0 ? 0 : ( $this->row['posts'] + $this->getThreadCount() ); 
		 }
		 
		 /** 
		  * get threads
		  * @return the threads
		  */
		 function getThreadCount()
		 {
			return $this->row['threads'] < 0 ? 0 : $this->row['threads']; 
		 }
		
		 /** 
		  * Get the last poster
		  * @return the lastposter
		  */
		 function getLastPoster()
		 {
			return $this->row['lastposter']; 
		 }
		 
		 /** 
		  * Get the last post user
		  * @return the last post user
		  */
		 function getLastPostUser()
		 {
			return new User($this->getLastPosterId()); 
		 }
		 
		 
		 /** 
		  * Get the last poster id
		  * @return the lastposter id
		  */
		 function getLastPosterId()
		 {
			return $this->row['lastposterid']; 
		 }
		 /** 
		  * Get the last post id
		  * @return the lastpost id
		  */
		 function getLastPostId()
		 {
			return $this->row['lastpostid']; 
		 }
		 
		 /** 
		  * Get the last post title
		  * @return the lastpost 
		  */
		 function getLastPostTitle()
		 {
			return $this->row['lastpost']; 
		 }
		 
	 	 /** 
		  * Get the last post 
		  * @return the lastpost 
		  */
		 function getLastPost()
		 {
			return new Thread($this->getLastPostId()); 
		 }
		 
		 /** 
		  * Get the dateline
		  * @return the dateline
		  */
		 function getDateline()
		 {
			return $this->row['dateline']; 
		 }
		 
		 /**
		  * Get the threads
		  * @return an array with threads
		  */
		 function getThreads()
		 {
			$result = Database::getDatabaseManager()->runQuery("SELECT * FROM threads WHERE forumid='".$this->getId()."'");
			$threads = array();
		 	while($row = Database::getDatabaseManager()->getArrayFromResult($result))
			{
				$threads[count($threads) + 1] = new Thread($row['threadid']);
			}
			return $threads;
		 }
		 
		 /**
		  * Get the childs
		  * @return an array with childs		  
		  */
		 function getChilds()
		 {
			$result = Database::getDatabaseManager()->runQuery("SELECT * FROM section WHERE childof='".$this->getId()."'");
			$childs = array();
		 	while($row = Database::getDatabaseManager()->getArrayFromResult($result))
			{
				$childs[count($childs)] = new Section($row['id']);
			}
			return $childs;
		 }
		 
		 /**
		  * Have sectionals?
		  * @return <code>true</code> if the section has sectionals, otherwise <code>false</code>
		  */
		 function haveSectionals()
		 {
			 return Database::getDatabaseManager()->runQuery("SELECT * FROM sectionals WHERE boardid='".$this->getId()."'") == NULL ? false : true;
		 }
		 /**
		  * Get the sectionals
		  * @return array with sectionals
		  */
		 function getSectionals()
		 {
			$result = Database::getDatabaseManager()->runQuery("SELECT * FROM sectionals WHERE boardid='".$this->getId()."'");
			$sectionals = array();
		 	while($row = Database::getDatabaseManager()->getArrayFromResult($result))
			{
				if ($row == NULL)
					continue;
				$sectionals[count($sectionals)] = new User($row['userid']);
			}
			return $sectionals;
		 }
		 
		 
		 /**
		  * List sub-forums
		  */
		 function listSubForums() {
		 	
		 }
		 
	}
	
	