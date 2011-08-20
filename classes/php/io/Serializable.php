<?php
if (!defined('FaabBB'))
	exit();
	
	
/**
 * Serializability of a class is enabled by the class implementing the php.io.Serializable interface. 
 * Classes that do not implement this interface will not have any of their state 
 * 	serialized or deserialized. 
 * All subtypes of a serializable class are themselves serializable. 
 * The serialization interface has no methods or fields and serves only to identify the 
 * 	semantics of being serializable.
 * 
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, Oracle
 * @author Fabian M. 
 */
interface Serializable {
	
}