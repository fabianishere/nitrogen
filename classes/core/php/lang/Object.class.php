<?php
if (!defined("FaabBB"))
	exit();
	
/**
 * Class Object is the root of the class hierarchy. Every class has Object as a superclass.
 * @author Fabian M.
 */
class Object {
	
	public function __construct() {}
	
	/**
	 * Returns the runtime class of an object.
	 * @return the object of type Class that represents the runtime class of the object.
	 */
	public final function getClass() {
		return new Class_($this);
	}
	
	/**
	 * Returns a string representation of the object.
	 * @return a string representation of the object.
	 */
	public function __toString() {
		return "TODO";
	}
	
}

?>