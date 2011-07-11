<?php 
if (!defined('FaabBB'))
	exit();
	
/**
 * Represents a Uniform Resource Locator.
 * @see http://wikipedia.org/wiki/Uniform_Resource_Locator
 * @author Fabian M.
 */
class URL extends Object {
	
	/**
	 * The given url stored in a String.
	 */
	private $url;
	
	
	/**
	 * Creates a URL object from the String representation. 
	 * @param $url the String to parse as a URL.
	 */
	function __construct($url) {
		$this->url = $url;
		
	}
		
	/** @Override */
	function __toString() {
		return self::$url;
	}
	
	

}