<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS  . 'org' . DS . 'faabtech' . DS .
	'mvc' . DS . 'url' . DS . 'MVCUrlParser' . PHP_SUFFIX);
	
	
/**
 * The {@link MVCBootstrap} class loads/handles all MVC related things,
 * 	like searching for controllers, auto-loading models, etc.
 * 
 * @category Model-Controller-View 
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class MVCBootstrap extends Object {
	
	/**
	 * Initializes the {@link MVCBootstrap} class.
	 */
	public static function init() {
		$parser = self::getMvcUrlParser();
		$controller = self::searchControllers($parser->getControllerName());
		
		if ($controller == null) 
			throw new Exception("Default controller not found.");
		$actionName = $parser->getActionName() . "Action";
		$controller->$actionName();
	}
	
	/**
	 * Search for available controllers.
	 * 
	 * @return the availabe controller.
	 */
	private static function searchControllers($name) {
		$path = APP_FOLDER . DS . 'controllers' . DS;
		$iterator = new DirectoryIterator($path);
		
		foreach($iterator as $file) {
			$info = pathinfo($path . $file);
			$info2 = pathinfo($_SERVER['SCRIPT_FILENAME']);
			if ($info['extension'] != 'php') 
				continue;
			$name = $info['filename'];
			$search = $info2['filename'];
   			$end = strlen($name);
   			$start = $end - strlen("Controller"); 
			$check = substr($name, $start, $end);
			if ($check != "Controller") 
				continue;
			include($path . $file);	
			$cls = $info['filename'];
			
			if (!class_exists($cls))
				continue;
			$instance = new $cls();
			if (!property_exists($instance, 'aliases')) {
				if ($name == $cls)
					return new $cls();
			}
			// Split aliases.
			$aliases = explode('|', trim($instance->aliases));
			if (strpos(trim($instance->aliases), '|') === false) {
				if (strtolower($search) != strtolower(trim($instance->aliases))) 
					continue;
				else 
					return new $cls();
			}
			
			foreach($aliases as $alias) {
				if (strtolower($search) == $alias) 
					return new $cls();
			}
		}
		// TODO: return default controller.
		return null;
	}
	
	/**
	 * Get the {@link MVCUrlParser}.
	 * 
	 * @return the {@link MVCUrlParser} instance.
	 */
	public static function getMvcUrlParser() {
		$path = CLASSES_FOLDER . DS  . 'org' . DS . 'faabtech' . DS .
					'mvc' . DS . 'url' . DS . 'impl' . DS;
			
		$name = CoreConfiguration::getInstance()->mvc_urlparser;
		
		if ($name == null) 
			$name = "DefaultMVCUrlParser";
			
		$file = $path . $name . PHP_SUFFIX;
		
		if  (!file_exists($file) || !is_readable($file)) {
			$name = "DefaultMVCUrlParser";
			$file = $path . $name . PHP_SUFFIX;
		}
		
		include($file);
		
		if (!class_exists($name)){
			throw new Exception("MVCUrlParser class with the name " . $name . " not found.");
			return null;
		}
		
		return new $name();

	}
	
}














?>