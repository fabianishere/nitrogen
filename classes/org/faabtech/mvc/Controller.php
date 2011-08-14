<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS . 'php' . DS .
	'lang' . DS . 'Object' . PHP_SUFFIX);
	
/**
 * The {@link Controller} represent a FaabBB controller. 
 * This class provides a basic blue print for controllers.
 * 
 * @category Model-Controller-View
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Controller extends Object {
	
	/**
	 * The name of our current action.
	 */
	private $action = '';
	
	/**
	 * Custom aliases of this controller.
	 */
	private $aliases = '';
	
}
 




?>