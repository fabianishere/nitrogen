<?php
// Check if the Core is already imported.
if (defined('FaabBB'))
	exit();

// We define this constant, so Core classes can check that they are imported by the core.
define('FaabBB', true);

// Other constants.
define('FaabBB_VERSION', '3.009 ALPHA');
define('PHP_VERSION_NEEDED', '5.3.0');

define('PHP_SUFFIX', '.php');
define('INI_SUFFIX', '.ini');

// Define the directory seperator.
define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__FILE__)  . DS .  '..');
define('CORE_FOLDER', ROOT . DS . 'core');
define('CORE_LIBRARY_FOLDER', CORE_FOLDER . DS . 'lib');
define('CLASSES_FOLDER', ROOT . DS . 'classes' . DS);
define('APP_FOLDER', ROOT . DS . 'app' . DS);
define('DATA_FOLDER', ROOT . DS . 'data');
define('RESOURCES_FOLDER', ROOT . DS . 'res');
define('CONFIGURATION_FOLDER', DATA_FOLDER . DS . 'config');
define('LOGS_FOLDER', DATA_FOLDER . DS . 'logs');
define('CORE_LOG_FILE', LOGS_FOLDER . DS . 'core.log'
	. PHP_SUFFIX);
define('ERROR_HANDLING_METHOD', "CoreErrorHandler::onError");
define('EXCEPTION_HANDLING_METHOD', "CoreErrorHandler::onException");
define('SHUTDOWN_HANDLING_METHOD', "CoreErrorHandler::onShutdown");
define('DEBUG', 2);

// Here we import the core classes.
include_once(CORE_FOLDER . DS . 'Configuration' . PHP_SUFFIX);
include_once(CORE_FOLDER . DS . 'CoreState' . PHP_SUFFIX);
include_once(CORE_FOLDER . DS . 'Logger' . PHP_SUFFIX);
include_once(CORE_FOLDER . DS . 'CoreException' . PHP_SUFFIX);
include_once(CORE_FOLDER . DS . 'ErrorHandler' . PHP_SUFFIX);


/**
 * Represents the <code>core</code> of FaabBB.
 * The core will load the {@link Core} components and will check for errors. The {@link Core} class
 * 	will never use any files of the FaabBB class library, so the {@link Core} uses
 * 	pre-defined functions, variables and classes that comes along with the PHP function library
 * 	that can be found at <a href="http://php.net/manual/en/funcref.php">http://php.net/manual/en/funcref.php</a> or
 * 	classes from the Core library.
 *
 * @category Core
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Core {

	/**
	 * This variable contains the {@link State} we're in.
	 */
	public static $STATE = CoreState::INIT;

	/**
	 * Updates the current core state.
	 *
	 * @param $state The state to update to.
	 */
	public static function checkpoint($state) {
		self::$STATE = $state;
	}



	/**
	 * Initializes the {@link Core} for use.
	 * This method will load the <code>core</code> libraries and components, define global constants,
	 * 	load the Command line interface and finally loads the FaabBB class library.
	 * This method should not be invoked by any classes. Ofcourse FaabBB will check this.
	 *
	 * @since Version 3.006 ALPHA
	 */
	 public static function init() {
	 	if (self::$STATE != CoreState::INIT) {
	 		// Method invoked when Core is already initialized.
	 		CoreLogger::warning("Core::init() invoked when Core is already initialized.");
	 		return;
	 	}
	 	CoreLogger::info("Loading FaabBB " . FaabBB_VERSION);
	 	CoreLogger::info("Checking PHP version..");
	 	// Compare PHP version with the required one.
	 	if (version_compare(PHP_VERSION, PHP_VERSION_NEEDED) >= 0) {
	 		CoreLogger::fine("PHP version is " . PHP_VERSION . ". Fine..");
	 	} else {
	 		CoreLogger::severe("PHP version must be higher than " . PHP_VERSION_NEEDED . " Yours is " . PHP_VERSION);
	 		exit();
	 	}
	 	CoreLogger::info("Changing error reporting level.");
	 	// Prevent all errors if we are in de production mode.
	 	error_reporting((DEBUG == 2 ? -1 : 0));
	 	CoreLogger::info("Initializing CoreErrorHandler.");
	 	// Load Error handler.
	 	CoreErrorHandler::init();
	 	// Check the HTTP request.
	 	self::checkRequest();
	 	CoreLogger::info("Initializing configuration loader.");
	 	// Load configuration.
	 	CoreConfiguration::getInstance()->init();


	 	// Set the state to CoreState::INVOKE.
	 	self::checkpoint(CoreState::INVOKE);
	 }

	/**
	 * Check and fix the HTTP request.
	 */
	private static function checkRequest() {
		// Copyright (c) Drupal
		if (!isset($_SERVER['HTTP_REFERER'])) {
    			$_SERVER['HTTP_REFERER'] = '';
  		}
  		if (!isset($_SERVER['SERVER_PROTOCOL']) || ($_SERVER['SERVER_PROTOCOL'] != 'HTTP/1.0' && $_SERVER['SERVER_PROTOCOL'] != 'HTTP/1.1')) {
    			$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.0';
  		}
  		if (isset($_SERVER['HTTP_HOST'])) {
    			// As HTTP_HOST is user input, ensure it only contains characters allowed
    			// in hostnames. See RFC 952 (and RFC 2181).
    			// $_SERVER['HTTP_HOST'] is lowercased here per specifications.
   			$_SERVER['HTTP_HOST'] = strtolower($_SERVER['HTTP_HOST']);
    			if (!preg_match('/^\[?(?:[a-zA-Z0-9-:\]_]+\.?)+$/', $_SERVER['HTTP_HOST'])) {
      				// HTTP_HOST is invalid, e.g. if containing slashes it may be an attack.
      				header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
     	 			exit;
    			}
  		} else {
			// Some pre-HTTP/1.1 clients will not send a Host header. Ensure the key is
   			// defined for E_ALL compliance.
    			$_SERVER['HTTP_HOST'] = '';
  		}

	}

	/**
	 * Get the main class to invoke.
	 *
	 * @return the main class.
	 */
	private static function resolveMainClass() {
		// File that the configuration gave use.
		$file = self::resolveFile();
		// Some people may forget to define a main class in the configuration, so we check it.
		if ($file == null || empty($file))
	 		throw new CoreException("Could not resolve main class, no one defined in configuration.");

		$aFile = CLASSES_FOLDER . DS . $file . PHP_SUFFIX;

		// Is the file readable?
		if (!is_readable($aFile))
			throw new CoreException("Main class isn't readable.");

		// Include main class.
		include_once($aFile);

		// Get the namespace of this class.
		$namespace = str_replace('/', '\\', $file);

		// Get reflector.
		try {
			$reflector = new ReflectionClass($namespace);
		} catch(Exception $e) {
			throw new CoreException("Class does not exists: " . $namespace);
		}
		return $reflector;
	}
	/**
	 * The {@link Core#invoke} method will read, parse
	 * 	and invoke.
	 * When the command <code>FaabBB</code> is used
	 * 	without any options. The core will execute
	 * 	normally.
	 * Otherwise a custom command will be invoked.
	 *
	 * @since Version 3.006 ALPHA
	 */
	 public static function invoke() {
	  	// Can not invoke.. Core state is wrong.
	  	if (self::$STATE != CoreState::INVOKE) {
	 		CoreLogger::warning("State invalid.");
	 		return;
	 	}

	 	$reflector = self::resolveMainClass();

	 	if (!$reflector->hasMethod('main'))
	 		throw new CoreException("Main method not found for class " . $reflector->getName());

	 	$reflector->getMethod('main')->invoke(null, null);

	  	self::checkpoint(CoreState::SUCCESS);
	  }

	  /**
	   * Resolve the file given through the command line.
	   *
	   * @return the file found.
	   */
	  private static function resolveFile() {
	  	// PHP didn't even gave us the arguments. :-(
	  	if (!isset($_SERVER['argv'])) {
	  		// Then return from the configuration.
	  		return CoreConfiguration::getInstance()->faabbb;
	  	}
	  	// Get arguments.
	  	$args = $_SERVER['argv'];
	  	// Does index 1 of the arguments array exists?
	  	if (!isset($args[1])) {
	  		// Return from configuration if there aren't any arguments.
	  		// This may happen when you're using a webserver.
	  		return CoreConfiguration::getInstance()->faabbb;
	  	}
	  	$file = null;
	  	// Loop through all arguments.
	  	foreach($args as $arg) {
	  		// If argument starts with '-', then it's an option.
	  		// Otherwise we want it.
	  		if (substr($arg, 0, 1) != '-') {
	  			$file = $arg;
	  		}
	  	}
	  	return $file;
	  }


}

// Initialize the Core after defining the Core class.
Core::init();

// Define autoloader.
/**
 * Autoload not imported classes.
 *
 * @param $class_name The name of the class to auto import.
 */
function __autoload($class_name) {
	// We can't include a class that's already included. So we check it ;-)
	if (!class_exists($class_name)) {
		// We aren't using namespaces? Ok, then use php.lang.$class_name
		if (strpos($class_name, '\\') === false)
			$path = CLASSES_FOLDER . DS . 'php' . DS . 'lang' .
				DS . $class_name . PHP_SUFFIX;
		// We are using namespaces.
		else
			$path = CLASSES_FOLDER . str_replace('\\', '/', $class_name) . PHP_SUFFIX;
		// O NOES, the file doesn't exists. We should throw an exception.
		if (!file_exists($path))
			throw new CoreException("File not found: " . $path . ". Failed to import.");

		include_once($path);
	}
}

