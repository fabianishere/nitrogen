<?php
namespace org\faabtech\examples;

if (!defined('FaabBB'))
	exit();

use php\lang\Object as Object;

/**
 * FaabBB example class.
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

?>