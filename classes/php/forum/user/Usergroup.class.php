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

 	class Usergroup
	{
		/*
		 * Variables
		 */
		 private $row;
		 
		
		/*
		 * Constructor
		 * @param $id the section id
		 */
		 function __construct($id)
		 {
			 $this->row = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM usergroup WHERE id='".$id."'");
		 }
		 
		 /*
		  * Is null?
		  * @return <code>true</code> if the row is null else it is  <code>false</code>
		  */
		 function isNull()
		 {
			 return $this->row ? false : true;
		 }
		 
		 
		  /*
		  * Is null?
		  * @return <code>true</code> if the row is null else it is  <code>false</code>
		  */
		 function userTitleChange()
		 {
			 return $this->row['usertitlechange'] == 0 ? false : true;
		 }
		 /*
		  * Get the id
		  * @return the id
		  */
		 function getId()
		 {
			return $this->row['id']; 
		 }
		 
		 /*
		  * Get the name
		  * @return the name
		  */
		 function getName()
		 {
			return $this->row['name']; 
		 }
		 
		 /*
		  * Get the usertitle
		  * @return the usertitle
		  */
		 function getUserTitle()
		 {
			return $this->row['usertitle']; 
		 }
		 
		 	 /*
		  * Get htmlbefore
		  * @return the htmlbefore
		  */
		 function getHtmlBefore()
		 {
			return $this->row['htmlbefore']; 
		 }
		 /*
		  * Get htmlafter
		  * @return the htmlafter
		  */
		 function getHtmlAfter()
		 {
			return $this->row['htmlafter']; 
		 }
	}
	
?>