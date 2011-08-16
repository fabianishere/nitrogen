<?php
if (!defined('FaabBB'))
	exit();

/**
 * All instances of the {@link Class_} class represent classes and interfaces running
 * 	in this PHP application.
 * The {@link Class_} class provides easier reflection.
 *
 * @version Version 3.008 ALPHA
 * @copyright Copyright &copy; 2011, Oracle
 * @author Fabian M. 
 */
 class Class_ {
 	
 	/**
 	 * The PHP reflector instance.
 	 */
 	private $reflector;
 	
 	/**
 	 * Constructs a new Class instance.
 	 * @param name The class' name.
 	 */
 	public function __construct($name) {
 		$reflector = new ReflectionClass($name);
 		
 		if (!$reflector) {
 			throw new Exception("Error with constructing reflector.");
 		}
 	}
 	
 	
	/**
	 * Returns the Class object associated with the class or interface with the given string name.
	 * @param $name Fully qualified name of the desired class.
	 * @return Class object representing the desired class.
	 */
	public static function forName($name) {
		return new Class_($name);
	}


	/**
	 * Returns the name of the entity represented by this Class object, as a String.
	 * @return the name of the class or interface represented by this object.
	 */
	public function getName() {
		return $this->reflector->getShortName();
	}

	/**
	 * Creates a new instance of the class represented by this Class object. 
	 * @param $args Accepts a variable number of arguments which are passed to the class constructor.
	 * @return A new instance of this object.
	 */
	public function newInstance($args) {
		return $this->reflector->newInstance($args);
	}

	/**
	 * Determines if the specified Object is assignment-compatible with the object represented by this Class. This method is the dynamic equivalent of the PHP language <code>instanceof</code> operator.
	 * @param $obj The object to check
	 * @return <code>true<code> if <code>obj</code> is an instance of this class; <code>false</code> otherwise.
	 */
	public function isInstance($obj) {
		return $this->reflector->isInstance($obj);
	}

	/**
	 * Determines if the specified Class object represents an interface type.
	 * @return <code>true</code> if this object represents an interface; <code>false</code> otherwise.
	 */
	public function isInterface() {
		return $this->reflection->isInterface();
	}

	/**
	 * Determines if the specified Class object represents an class type.
	 * @return <code>true</code> if this object represents an class; <code>false</code> otherwise.
	 */
	public function isClass() {
		return !($this->isInterface());
	}


	/**
	 * Determines if the specified Class object is abstract.
	 * @return <code>true</code> if this object is abstract; <code>false</code> otherwise.
	 */
	public function isAbstract() {
		return $this->reflector->isAbstract();
	}

 	
 	
 }
	
?>