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



class XMLParser {
	
	/**
	 * File
	 */
	private $file;
	
	/**
	 * Marks
	 */
	private $marks = array();
	
	/**
	 * XML
	 */
	private $xml;
	
	/**
	 * Array with given vars
	 */
	private $vars = array();
	
	/**
	 * The contents
	 */
	public $contents = '';
	
	
	
	
	/**
	 * Add variables
	 * @param $vars array with variables.
	 */
	function addVariables($vars) {
		foreach($vars as $varname => $varvalue) {
			$this->vars[$varname] = $varvalue;
		}
		
	}
	
	/**
	 * Get mark
	 * @param $mark the mark name
	 * @return the body
	 */
	function getMark($mark) {
		return isset($this->marks[$mark]) ? $this->marks[$mark] : NULL;
	}
	
	/**
	 * As XML
	 * @return a xml String
	 */
	function asXML() {
		$str = $this->getXML()->asXML();
		// Replace specialchars
		$str = preg_replace('#\<specialchar\b[^>]* code=\"(.+)\"/>#isU', '&$1;', $str);
		// Return
		return $str;
	}
	
	/**
	 * Remove the given mark
	 * @param $name the name of the mark
	 * @return the new String
	 */
	function removeMark($name) {
		// Match
		return $this->replaceMark($name, '');
	}
	
	/**
	 * Replace the given mark
	 * @param $name the name of the mark
	 * @param $replacement the replacement
	 * @return the new String
	 */
	function replaceMark($name, $replacement) {
		// Match
		return XMLParser::loadString(preg_replace('/{start_mark:( |)'.$name.'}(.*){end_mark:( |)'.$name.'}/s', $replacement, preg_replace('/{start_mark:'.$name.'}(.*){end_mark:'.$name.'}/s', $replacement, $this->asXML())), $this->vars);
	}
	
	
	/**
	 * Filter a XML File
	 * @param $str the string
	 * @return the filtered string
	 */
	function filter($str) {
	

		
		// Match
		preg_match_all('/{start_mark:(.+)}(.*){end_mark:\1}/s', $str, $matches);
		// Count
		$i = 0;
		// Foreach loop
		foreach($matches[1] as $match) {
			$name = str_replace(' ', '', $match);
			$this->marks[$name] = $matches[2][$i];
			$str = str_replace($matches[0][$i], '', $str);
			$i++;
		}
		// Match
		preg_match_all('#\\{var:(.+)\\}#isU', $str, $matches);
		foreach($matches[1] as $match) {
				$name = str_replace(' ', '', $match);
				if (!isset($this->vars[(string) $name]))  {
					$error_handler = set_error_handler('self::evalErrorHandler');
					$eval = eval("return " . $match . ";");
					restore_error_handler();
					if ($error_handler) {
						continue; 
					}
					$str = str_replace('{var:'.$match.'}', $eval, $str);
				} else if (isset($this->vars[(string) $name]))
					$str = str_replace('{var:'.$match.'}', $this->vars[$name], $str);
				
		}
		

		return $str;
	}
	
	/**
	 * Load file
	 * @param $file the file to load
	 * @return the xmlparser instance
	 */
	static function loadFile($file) {
		$xml = new XMLParser(); 
		$xml->file = $file;
		$xml->contents = FileUtils::getContents($file);
		return $xml;
		
	}
	
	/**
	 * Load string
	 * @param str the string
	 * @return the xmlparser instance
	 */
	static function loadString($str, $vars) {
		$xml = new XMLParser(); 
		$xml->contents = $str;
		$xml->addVariables($vars);
		$xml->getXML();
		return $xml;
	}	 
	/**
	 * Get the xml
	 * @return the xml
	 */
	 function getXML() {
	 	libxml_use_internal_errors(false);
		$this->xml = simplexml_load_string($this->filter($this->contents));
		$errors = array();
		if (!$this->xml) {
   			foreach(libxml_get_errors() as $error) 
   				$errors[count($errors) + 1] = $error->message;
   			System::systemDie($errors);
		}
		return $this->xml; 
	 }
	 
	 /**
	  * Get the file
	  * @return file
	  */
	 function getFile() {
	 	return $this->file;
	 }
	 
	 
	 /**
	  * Eval error handler
	  */
	private static function evalErrorHandler($errno, $errstr, $errfile, $errline) {
	
     	if (!(error_reporting() & $errno)) 
       		 return;
   		
    	/* Don't execute PHP internal error handler */
    	return true;
	}

	 
}

 ?>