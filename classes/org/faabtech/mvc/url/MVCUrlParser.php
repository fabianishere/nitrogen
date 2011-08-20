<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS . 'php' . DS .
	'lang' . DS . 'Object' . PHP_SUFFIX);
	
/**
 * Blueprint for a {@link MVCUrlParser} which parses the current
 * 	url.
 * 
 * @category Model-Controller-View 
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class MVCUrlParser extends Object {

	
	/**
	 * Parse the controller's name out the url.
	 * 
	 * @return the controller's name.
	 */
	public abstract function getControllerName();
	
	/**
	 * Parse the action's name out of the url.
	 * 
	 * @return the action's name.
	 */
	public abstract function getActionName();
	
}



?>