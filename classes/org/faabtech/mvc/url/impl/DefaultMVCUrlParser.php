<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS  . 'org' . DS . 'faabtech' . DS .
	'mvc' . DS . 'url' . DS . 'MVCUrlParser' . PHP_SUFFIX);
	
/**
 * The {@link DefaultMvcUrlParser} is the default MVC url parser.
 * The {@link DefaultMvcUrlParser} uses this pattern:
 * 	$webroot/$controllerName.php?action=$actionName
 */
class DefaultMVCUrlParser extends MVCUrlParser {
	
	/** @Override */
	public function getControllerName() {
		$info = pathinfo($_SERVER['PHP_SELF']);
		
		return ucfirst($info['filename']);
	}
	
	/** @Override */
	public function getActionName() {
		return lcfirst(isset($_GET['action']) ? stripslashes($_GET['action']) 
			: "default");
	}
}





?>