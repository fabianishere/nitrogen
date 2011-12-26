<?php 
// Check if the core is already imported.
if (defined('FaabBB'))
	die;

// Prevent others from accessing core classes.
define('FaabBB', true);

// Constants for importing.
define('ROOT_FOLDER', dirname(__FILE__) . '/..');
define('LIB_FOLDER', ROOT_FOLDER . '/lib');
define('CORE_FOLDER', LIB_FOLDER . '/Core');
define('APP_FOLDER', ROOT_FOLDER . '/app');


/**
 * Autoloads classes of the FaabBB framework.
 * 
 * @param $class_name The class to autoload.
 */
spl_autoload_register(function($class_name) {
	$split = explode('\\', $class_name);
	$real_path = LIB_FOLDER . '/' . 
		str_replace('\\', '/', $class_name) . '.php';
	
	if (!file_exists($real_path)) {
		echo $real_path;
		throw new Exception("Trying to access class, but doesn't exists: " . $class_name);	
	}
	
	
	include_once($real_path);
});

use Core\Application as Application;
use Logging\Logger as Logger;


/**
 * The {@link Main} class is the main class of
 * 	the FaabBB framework and starts all tasks.
 *
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Main {
	
	/**
	 * The {@link Application} of this class.
	 */
	protected static $app = null;

	/**
	 * Initializes the {@link Main} class.
	 * 
	 * @since 3.010
	 */
	public static function init() {
		self::$app = Application::init();
		self::$app->configure();
	}
	

	/**
	 * Get or set the {@link Application} of this class.
	 * 
	 * @since 3.010
	 * @param $app The {@link Application} to set.
	 * @return The {@link Application} of this class.
	 *
	 * <note>If no arguments are given, the current value will be
	 *	returned.</note>
	 */
	public static function app($app = null) {
		if ($app == null)
			return self::$app;
		self::$app = $app;
		return self::$app;
	}
	
}

// Initialize the main class.
Main::init();

?>
