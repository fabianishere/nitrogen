<?php
/** 
 * Copyright (c) 2011 FaabTech <faabtech.com>
 *
 * More information about FaabBB may be found on these websites:
 *    http://faabtech.com/faabbb
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 */ 

if (!defined("FaabBB"))
	exit();
	
/**
 * Class Object is the root of the class hierarchy. Every class has Object as a superclass.
 * @author Fabian M.
 */
class Class_ extends Object {
	
	/**
	 * The reflector of this class.
	 */
	private $reflector;
	
	/**
	 * Constructs a new Class_ instance.
	 * @param $class_name The name of the class.
	 */
	protected function __construct($class_name) {
		$reflector = new ReflectionClass($class_name);
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