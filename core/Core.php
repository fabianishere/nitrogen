<?php 

// We define this constant, so Core classes can check that they are imported by the core.
define('FaabBB', true);

// We define this constants, so importing core classes is easier.
define('CORE_FOLDER', dirname(__FILE__));
define('PHP_SUFFIX', '.php');

// Define the directory seperator.
define('DS', DIRECTORY_SEPARATOR);

// Here we import the core classes.
include(CORE_FOLDER . DS . 'State' . PHP_SUFFIX);

/**
 * Represents the <code>core</code> of this webpage. The {@link Core} class will receive incomming requests and handle them.
 * The core will load the {@link Core} components and will check for errors. The {@link Core} class will never use
 * 	any files of the FaabBB class library, so the {@link Core} uses pre-defined functions, variables and classes that comes along 
 *	with the PHP function library that can be found at <a href="http://php.net/manual/en/funcref.php">http://php.net/manual/en/funcref.php</a>
 * The {@link Core} uses a static pattern which means there's only one {@link Core}. 
 * 
 * @category Core
 * @version Version 3.006 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Core {
	
	/**
	 * This variable contains the {@link State} we're in. 
	 */
	public static $STATE = State::INIT;
	
	/**
	 * Updates the current core state.
	 * 
	 * @param $state The state to update to.
	 */
	public static function checkpoint(State $state) {
		self::$STATE = $state;
	}
	 
	
	
	/**
	 * Initializes the {@link Core} for use.
	 * This method will load the <code>core</code> classes and components, define global constants, load the Command line interface
	 * 	and finally loads the FaabBB class library.
	 * This method should not be invoked by any classes. Ofcourse FaabBB will check this.
	 * 
	 * @since Version 3.006 ALPHA
	 */
	 public static function init() {	
	 	// TODO: Finish this.
	 }
	 
	 /**
	  * Invokes the {@link Controller}s, {@link Model}s, {@link View}s and the main method.
	  * After this process, FaabBB successfully loaded and the HTTP response is send.
	  * 
	  * @since Version 3.006 ALPHA
	  */
	  public static function invoke() {
	  	// TODO: Finish this.
	  }
	
	
}

// Initialize the Core after defining the Core class.
Core::init();
