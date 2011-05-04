<?php


/** 
 * Copyright (c) 2010 Fabian M <fabian.m@faabtech.com>
 *
 * More information about FaabBB may be found on these websites:
 *     http://faabtech.com/faabbb
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

class Page {
	
	/*
	 * XML
	 */
	private static $xml;
	
	private static $above;
	
	private static $below;
	
	/*
	 * Constructor
	 */
	 function __construct($xml) 
	 {
		 self::$xml = $xml;
		 $exp = explode('{forums: body}', $xml->parseBody());
		 self::$above = $exp[0];
		 self::$below = $exp[1];
		 
	 }
	/*
	 *
	 */
	function template_main_above($title) 
	{
		echo self::$above;
	}
	
	function template_main_below() 
	{
		echo self::$below;
	}
}
	
	


	
class XmlTemplateParser {
	
	/**
	 * Simple XML object
	 */
	 private static $_file;
	 
	 private static $_code;
	

	/**
	 * constructs the class
	 * @param $file the file
	 */
	function __construct($file) {
		 $function = new XmlPhpFunctions();
		
		 eval($function->addFunctions());
		if (file_exists($file)) {
    		self::$_file = $file;
		} else {
   			 //error("");
		}
	}
	/**
	 * Creates new Simplexml
	 * @return the simplexml
	 */
	function createXML() {
		return new XMLObject(file_get_contents(self::$_file));	
	}
 
	
	
	 
	 /**
	 * Get the body
	 * @return HTML
	 */
	 function parseBody() {
		 	ob_start();
		 	$body = self::createXML()->faabmod->getBody();
		 	preg_match_all("#<phpcode>(.*)</phpcode>#isU", $body, $match);
			foreach($match[0] as $a)
			{
				
			 	eval(substr($a, strpos($a, "<phpcode>") + 9, strrpos($a, "</phpcode>")  - 10));
				
				$output = ob_get_contents();
				$body = str_replace($a, $output, $body);
				
			}
			ob_end_clean(); 
			$body = self::parseVar($body);
			return $body;
		
	 }
	 
	 
	
	 
	 
	 /*
	  * Parse var
	  * @return the var value
	  */
	  function parseVar($str) {
		  	preg_match_all("#\\{var:(.+)\\}#isU", $str, $match);
			$i = 0;
			foreach($match[0] as $a) 
			{
				$str = preg_replace("#\\{var:(.+)\\}#isU", eval("return ".$match[1][$i]. ";"), $str);
				$i++;
			}  
		return $str;
	  }

	
}
	


 
 
 class XmlPhpFunctions {
	 
	  
	 private static $functions = array(
									  'function APIisLoggedIn() {
											if(!isset($_SESSION[\'SESS_MEMBER_ID\']) || (trim($_SESSION[\'SESS_MEMBER_ID\']) == \'\')) {
												return false;
											} else {
												return true;
											}
										}',
									  'function APIgetUserId() {
											if (isLoggedIn()) {
												return $_SESSION[\'SESS_MEMBER_ID\'];
											}
											return -1;
										  
									  }',
									  'function APIgetUserName() {
										 if (getUserId() != -1) {
											$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=\'".getUserId()."\'")); 
											return $row[\'username\'];
										 }
										 return "";
									  }',
									  '',
									  );
	 
	 
	 function  __construct(){}
	 
	 function addFunctions() {
		 $str = "";
		 foreach(self::$functions as $b) {
			 $str = $str . "\n" . $b;
		 }
		 
		 return $str;
		 
	 }
 }
 
 class XMLObject {
	 
		 /* 
		  * File body
		  */
		 private static $_body;
		 /*
		  * Tags
		  */
		  
		  private static $_ids;
		  private static $_ids2;
		  private static $_tags;

		  
	 	
	 	/*
		 * Constructor
		 */
		function __construct($body)
		{
		
			self::$_body = $body;
		
			preg_match_all('#<([A-Z][A-Z0-9]*)\b[^>]*>(.*?)</\1>#isU', self::$_body, $matches);
		 	$i = 0;
		 	foreach($matches[1] as $match)
			{
			 	self::$_tags[$match] = $matches[2][$i];
			 	$i++;
		 	}
			
		}
		
		/*
		 * get XMLElement
		 * @return XMLElement
		 */
		 function __get($name) 
		 { 
		 	if (isset(self::$_tags[$name]))
			{
				return new XMLElement($name, self::$_tags[$name]);
			} 
			
			return NULL;
		 }
		

			  
			  
 }
 
 
 class XMLElement {
	 
	 /*
	  * 
	  */
	  private static $_tagName;
	  private static $_body;
	  private static $_tags;
	  
	/*
	 * Constructor
	 */
	 function __construct($tagName, $body) 
	 {
		 self::$_tagName = $tagName;
		 self::$_body = $body;
		
		 preg_match_all('#<([A-Z][A-Z0-9]*)\b[^>]*>(.*?)</\1>#isU', self::$_body, $matches);
		 $i = 0;
		 foreach($matches[1] as $match)
		 {
			 if (!isset(self::$_tags[$match])) 
			 {
				
			 self::$_tags[$match] = $matches[2][$i];
			 } 
			 else if (isset(self::$_tags[$match]))
			 {
				
				 self::$_tags[$match][0] = self::$_tags[$match];
			 } 
			 else if (isset(self::$_tags[$match]) && isset(self::$_tags[$match][0]))
			 {
				
				 self::$_tags[$match][count(self::$_tags[$match])] = self::$_tags[$match];
			 }
			 $i++;
		 }
	 }
	 
	 /*
	  * Get parents
	  * @param parent name
	  * @return XMLObject
	  */
	  function __get($name) 
	  {
		  if (isset(self::$_tags[$name]))
		  {
			return new XMLElement($name, self::$_tags[$name]);
		  }
		  
		  return NULL;
	  }
	 
	 /*
	  * Get this
	  * @return this
	  */
	  function getXMLElement() 
	  {
			return $this;  
	  }
		
	 /*
	  * Get the body
	  * @return the body
	  */
	  function getBody()
	  {
		  $body = self::$_body;
		 
		return $body;   
	  }
	 
 }

 
 ?>