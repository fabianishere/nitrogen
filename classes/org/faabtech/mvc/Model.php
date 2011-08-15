<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS . 'php' . DS .
	'lang' . DS . 'Serializable' . PHP_SUFFIX);
	
/**
 * The {@link Model} interface actually represents a SQL result.
 * All the methods represents a SQL field..
 * 
 * @category Model-Controller-View 
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
interface Model extends Serializable {
	
}



?>