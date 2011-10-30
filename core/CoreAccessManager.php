<?php
if (!defined('FaabBB'))
	exit();

/**
 * The {@link CoreAccessManager} allows non-core classes to communicate with
 * 	and invoke methods from core classes.
 * Core classes that implements the {@link NonCoreAccessible} interface can be invoked
 * 	using this manager. This is a simple example of how it should look like core-side.
 * <code>
 * class CoreClass implements NonCoreAccessible {
 * 		public static $function_access = array(
 * 			'hello_world'
 * 		);
 * 		public static $constructor_access = true;
 *
 * 		public static $variable_access = array(
 * 			'hello_var'
 * 		);
 *
 * 		public $hello_var = "YES"; // Can be accessed by non-core classes.
 *      public $var = "NO"; // Can't be accessed by non-core classes.
 *
 *      public function hello_world() {
 *             return $this->var; // Valid
 *      }
 * }
 * </code>
 *
 * Non-core-side:
 *
 * <code>
 * // This class represents the core class.
 * interface CoreClassAccess extends Object implements CoreAccess {
 *       public $core_class = "CoreClass";
 * }
 * </code>
 *
 * <code>
 * class Test extends Object {
 *       function test() {
 *       	$i = CoreAccessLoader::load('CoreClassAccess');
 *          $cls = new $i;
 *          echo $cls->hello_world();
 *       }
 * }
 * </code>
 */
class CoreAccessManager implements NonCoreAccessible {

	/**
	 * Name of property that contains all allowed variables.
	 */
	const VARIABLE_ACCESS = "variable_access";

	/**
	 * Array that contains reflectors.
	 */
	private static $reflectors = array();

	/**
	 * The class that requested a core class.
	 */
	private $cls = null;

	/**
	 * Initializes a new {@link CoreAccessManager} instance.
	 *
	 * @param $cls The class that requested a core class.
	 */
	public static function init($cls) {
		if (!class_exists($cls))
			throw new CoreException("Class " . $cls . " doesn't exists, but requested a" .
				" core class.");
		return new CoreAccessManager($cls);
	}

	/**
	 * Constructs a new {@link CoreAccessManager}.
	 *
	 * @param $cls The class that requested a core class.
	 */
	public function __construct($cls) {
		$this->cls = $cls;
	}

	/**
	 * Access a variable from a core class.
	 *
	 * @param $var_name The variable name.
	 * @param $class_name The core class name.
	 * @return the core class.
	 */
	public function accessVar($var_name, $class_name) {
		$accessible = $this->getAccessibleVariables($class_name);

		if (!in_array($accessible, $var_name))
			throw new CoreException($this->cls . " tries to access variable " . $var_name
				. " that can't be accessed.");
		$reflector = $this->getReflector($class_name);

		if ($reflector->hasProperty($var_name)) {
			throw new CoreException($this->cls . " tries to access variable " . $var_name
				. " that doesn't exists.");
		}

		$var = $reflector->getProperty($var_name);

		if (!$var->isStatic() || !$var->isPublic()) {
			throw new CoreException($this->cls . " tries to access variable " . $var_name
				. " that can't be accessed.");
		}

		return $var->getValue();
	}

	/**
	 * Returns a list with accessible variables.
	 *
	 * @param $class_name The core class name.
	 * @return a list with accessible variables.
	 */
	public function getAccessibleVariables($class_name) {
		$reflector = $this->getReflector($class_name);

		if (!$reflector->hasProperty(self::VARIABLE_ACCESS))
			return array();
		$property = $reflector->getProperty(self::VARIABLE_ACCESS);
		if (!$property->isStatic()) {
			CoreLogger::warning("Class " . $this->cls . " tries to access a variable " .
				"from a core class, but the array with accessible variable names isn't static.");
			return array();
		}
		if (!$property->isPublic()) {
			CoreLogger::warning("Class " . $this->cls . " tries to access a variable " .
				"from a core class, but the array with accessible variable names isn't public.");
			return array();
		}
		$val = $property->getValue();
		if (!is_array($val)) {
			CoreLogger::warning("Class " . $this->cls . " tries to access a variable " .
				"from a core class, but the accessible variable names variable isn't an array.");
			return array();
		}
		return $val;
	}


	/**
	 * Create a new reflector instance for the given class
	 * 	or return the exist one.
	 *
	 * @param $class_name The name of the class.
	 * @return the reflector of this class.
	 */
	private function getReflector($class_name) {
		// Does the class exists?
		if (!class_exists($class_name))
			throw new CoreException($cls . " requested a core class that " .
				"doesn't exists.");
		if (!isset(self::$reflectors[$class_name]))
			return self::$reflectors[$class_name] = new ReflectionClass($class_name);
		return self::$reflectors[$class_name];
	}

}


?>