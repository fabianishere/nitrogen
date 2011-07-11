<?php 
if (!defined('FaabBB'))
	exit();
/**
 * Abstract configuration class. 
 * 	Provides basic functionality but does not store any data.
 * @author Fabian M.
 */
abstract class Configuration extends Object {
	
	/**
	 * Remove all properties from the configuration.
	 */
	public abstract function clear();

	
	/**
	 * Get a object associated with the given configuration key
	 * @param key The configuration key to get.
	 * @return Object associated with the given configuration key.
	 */
	public abstract function get($key);
	
	
	
}


?>