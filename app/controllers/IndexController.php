<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS . 'org' . DS . 'faabtech' . DS .
	'mvc' . DS . 'Controller' . PHP_SUFFIX);
	
/**
 * The first written FaabBB {@link Controller}.
 * 
 * @category Examples
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class IndexController extends Controller {
	
	public $aliases = 'index';
	
	function defaultAction() {
		echo '!! Hello world !!';
	}
	
}



?>