<?php
if (!defined('FaabBB'))
	exit();

include_once(CLASSES_FOLDER . DS . 'php' . DS .
	'lang' . DS . 'Object' . PHP_SUFFIX);	
	
/**
 * FaabBB core example class.
 *
 * @category Examples
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
 class HelloWorld extends Object {
 	
 	public static function main($args) {
 		echo '!! Hello World !!';	
 	}
 	
 }