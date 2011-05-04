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
 	include_once(dirname(__FILE__).'/usergroup.class.php');

class user 
{
	/*
	 * Variables
	 */
	 private $userId;
	 
	 private $userRow;
	
	/*
	 * Constructor
	 */
	 function __construct($userId) 
	 {
		 $this->userId = $userId;
		 $this->userRow = Database::getDatabaseManager()->getArrayFromQuery("SELECT * FROM users WHERE id='".$userId."'");
	 }
 	
	/*
	 * Get the userid
	 * @return userId
	 */
	 function getUserId() 
	 {
		return $this->userId; 
	 }
	 
	 /*
	  * Is null?
	  * @return <code>true</code> or <code>false</code>
	  */
	  function isNull()
	  {
		return $this->userRow ? false : true;
	  }
	 
	 /*
	  * Show birthday
	  * @return no, age or full birthday
	  */
	 function showBirthday()
	 {
		return $this->userRow['showbirthday'];
	 }
	 
	 /*
	  * Custom title
	  * @return <code>true</code> or <code>false</code>
	  */
	  function customTitle()
	  {
		  return $this->userRow['customtitle'] == 0 ? false : true;
	  }
	  
	  /*
	  * pm popup
	  * @return <code>true</code> or <code>false</code>
	  */
	  function pmPopup()
	  {
		  return $this->userRow['pmpopup'] == 0 ? false : true;
	  }
	  
	  /*
	  * threadedmode
	  * @return <code>true</code> or <code>false</code>
	  */
	  function threadedMode()
	  {
		  return $this->userRow['threadedMode'] == 0 ? false : true;
	  }
	  
	  /*
	  * autosubscribe
	  * @return <code>true</code> or <code>false</code>
	  */
	  function autoSubscribe()
	  {
		  return $this->userRow['autosubscribe'] == -1 ? false : true;
	  }
	  
	    
	  /*
	  * Bankpin
	  * @return <code>true</code> or <code>false</code>
	  */
	  function bankPin()
	  {
		  return $this->userRow['bankpin'] == 0 ? false : true;
	  }
	  
	   /*
	  * is Activated
	  * @return <code>true</code> or <code>false</code>
	  */
	  function isActivated()
	  {
		  return $this->userRow['activated'] ? false : true;
	  }
	  
	     /*
	  * email stamp
	  * @return <code>true</code> or <code>false</code>
	  */
	  function emailStamp()
	  {
		  return $this->userRow['emailstamp'] == 0 ? false : true;
	  }
	  
	  
	  
	
	/*
	 * Get the usergroupid
	 * @return usergroupid
	 */
	 function getUserGroupId() 
	 {	
	 	return $this->userRow['usergroupid'];
	 }
	 
	 
	/*
	 * Get the usergroup
	 * @return usergroup
	 */
	 function getUserGroup() 
	 {	
	 	return new Usergroup($this->getUserGroupId());
	 }
	 
	 /*
	 * Get the displaygroup
	 * @return displaygroup
	 */
	 function getDisplayGroup() 
	 {	
	 	return new Usergroup($this->getDisplayGroupId());
	 }
	  function getMemberGroupIds() 
	 {	
	 	return $this->userRow['membergroupids'];
	 }
	 
	  function getDisplayGroupId() 
	 {	
	 	return $this->userRow['displaygroupid'];
	 }
	 
	 function getUsername() 
	 {
		 return $this->userRow['username'];
	 }
	 
	 function getPassword() 
	 {
		 return $this->userRow['password'];
	 }
	 
	 function getPasswordDate() 
	 {
		 return $this->userRow['passworddate'];
	 }
	 
	 function getEmail() 
	 {
		 return $this->userRow['email'];
	 }
	 
	  function getFirstName() 
	 {
		 return $this->userRow['firstname'];
	 }
	 
	  function getLastName() 
	 {
		 return $this->userRow['lastname'];
	 }
	 
	  function getStyleId() 
	 {
		 return $this->userRow['styleid'];
	 }
	 
	  function getHomepage() 
	 {
		 return $this->userRow['homepage'];
	 }
	 
	  function getICQ() 
	 {
		 return $this->userRow['icq'];
	 }
	 
	  function getAim() 
	 {
		 return $this->userRow['aim'];
	 }
	 
	  function getYahoo() 
	 {
		 return $this->userRow['yahoo'];
	 }
	 
	  function getMSN() 
	 {
		 return $this->userRow['msn'];
	 }
	 
	  function getSkype() 
	 {
		 return $this->userRow['skype'];
	 }
	 
	 
	   function getJoindate() 
	 {
		 return $this->userRow['joindate'];
	 }
	 
	   function getDaysPrune() 
	 {
		 return $this->userRow['daysprune'];
	 }
	 
	   function getLastVisit() 
	 {
		 return $this->userRow['lastvisit'];
	 }
	 
	   function getLastActivity() 
	 {
		 return $this->userRow['lastactivity'];
	 }
	 
	  function getLastPost() 
	 {
		 return $this->userRow['lastactivity'];
	 }
	 
	   function getLastPostId() 
	 {
		 return $this->userRow['lastpostid'];
	 }
	 
	   function getPosts() 
	 {
		 return $this->userRow['posts'];
	 }
	 
	   function getReputation() 
	 {
		 return $this->userRow['reputation'];
	 }
	 
	   function getReputationLevel() 
	 {
		 return $this->userRow['reputationlevel'];
	 }
	 
	   function getTimezoneOffset() 
	 {
		 return $this->userRow['timezoneoffset'];
	 }
	 
	  function getAvatarId() 
	 {
		 return $this->userRow['avatarid'];
	 }
	 
	  function getAvatarRevision() 
	 {
		 return $this->userRow['avatar'];
	 }
	 
	  function getProfilePicRevision() 
	 {
		 return $this->userRow['profilepicrevision'];
	 }
	 
	 function getSignPicRevision() 
	 {
		 return $this->userRow['signpicrevision'];
	 }
	 
	 function getOptions() 
	 {
		 return $this->userRow['options'];
	 }
	  
	 function getBirthday() 
	 {
		 return $this->userRow['birthday'];
	 }
	 
	 function getBirthdaySearch() 
	 {
		 return $this->userRow['birthday_search'];
	 }
	  
	  
	 function getMaxPosts() 
	 {
		 return $this->userRow['maxposts'];
	 }  
	 
	 function getStartOfWeek() 
	 {
		 return $this->userRow['startofweek'];
	 }
	  
	 function getIpAddress() 
	 {
		 return $this->userRow['ipaddress'];
	 }
	 
	 function getReferrerId() 
	 {
		 return $this->userRow['referrerid'];
	 }
	 
	 function getLanguageId() 
	 {
		 return $this->userRow['languageid'];
	 }
	  
	

	 function getPmTotal() 
	 {
		 return $this->userRow['pmtotal'];
	 }
	 
	 function getPmUnread() 
	 {
		 return $this->userRow['pmunread'];
	 }
	 
	 function getSalt() 
	 {
		 return $this->userRow['salt'];
	 }
	 
	 function getIpPoints() 
	 {
		 return $this->userRow['ippoints'];
	 }
	 
	 function getInfractions() 
	 {
		 return $this->userRow['infractions'];
	 }
	 
	 function getWarnings() 
	 {
		 return $this->userRow['warnings'];
	 }
	 
	 function getInfractionGroupIds() 
	 {
		 return $this->userRow['infractiongroupids'];
	 }
	 
	 function getInfractionGroupId() 
	 {
		 return $this->userRow['infractiongroupid'];
	 }
	 
	 function getAdminOptions() 
	 {
		 return $this->userRow['adminoptions'];
	 }
	 
	 
	 function getProfileVisits() 
	 {
		 return $this->userRow['profilevisits'];
	 }
	 
	 function getFriendCount() 
	 {
		 return $this->userRow['friendcount'];
	 }
	 
	 function getFriendReqCount() 
	 {
		 return $this->userRow['friendreqcount'];
	 }
	 
	 function getVmUnreadCount() 
	 {
		 return $this->userRow['vmunreadcount'];
	 }
	 
	 function getVmModeratedCount() 
	 {
		 return $this->userRow['vmmoderatedcount'];
	 }
	 
	 function getSocGroupInviteCount() 
	 {
		 return $this->userRow['socgroupinvitecount'];
	 }
	 
	 function getSocGroupReqCount() 
	 {
		 return $this->userRow['socgroupreqcount'];
	 }
	 
	  function getPcUnreadCount() 
	 {
		 return $this->userRow['pcunreadcount'];
	 }
	 
	 function getPcModeratedCount() 
	 {
		 return $this->userRow['pcmoderatedcount'];
	 }
	 
	  function getGmModeratedCount() 
	 {
		 return $this->userRow['gmmoderatedcount'];
	 }
	 
	 function getAssetPostHash() 
	 {
		 return $this->userRow['assetposthash'];
	 }
	 
	 
	 
	 function getHtmlBefore() 
	 {
		 return $this->userRow['htmlbefore'];
	 }
	 
	  function getHtmlAfter() 
	 {
		 return $this->userRow['htmlafter'];
	 }
	 
	  function getSignature() 
	 {
		 return $this->userRow['signature'];
	 }
	 
	  function getOldUserGroupId() 
	 {
		 return $this->userRow['oldusergroupid'];
	 }
	 
	 
	 /**
	  * Is it his birthday?
	  * @return <code>true</code> if it is his birthday, otherwise <code>false</code>
	  */
	 function birthday() {
		$date = explode("/", $this->getB);
		if (!$this->getBirthday() == "") 
			return $date[0] . '/' . $date[1] == gmdate("d/m") ? true : false;
		else 
			return false;
			
		
	 }
	 
	 
}