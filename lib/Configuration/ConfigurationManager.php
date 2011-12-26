<?php 
namespace Configuration;

if (!defined('FaabBB'))
	die;
	
use \ArrayAccess as ArrayAccess;

use Configuration\ConfigurationException as ConfigurationException;
	
/**
 * The {@link ConfigurationManager} class is a blueprint for handling
 * 	configuration of (for instance) the {@link Application} instance.
 * If you initiate the {@link ConfigurationManager}, you'll get the default
 * 	{@link ConfigurationManager}.
 * 
 * @category configuration
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class ConfigurationManager implements ArrayAccess {
	
	/**
	 * The properties of this {@link ConfigurationManager}.
	 */
	protected $properties;
	
	/**
	 * Creates a new {@link ConfigurationManager} and
	 * 	loads the configuration into a map of properties.
	 * 
	 * @since 3.010
	 * @param $file The file to load.
	 */
	public function __construct($file) {
		// Does the configuration file exists?
		if (!file_exists($file)) {
			throw new ConfigurationException("File not found: " . $file);
		} else if (!is_readable($file)) {
			throw new ConfigurationException("Can't access file: " . $file);
		}
		// Parse ini file.
		$parsed = parse_ini_file($file);

		$this->properties = $parsed;
	}
	
	/** @Override */
	public function __get($name) {
		return $this->properties[$name];
	}
	
	/** @Override */
	public function __set($name, $value) {
		$this->properties[$name] = $value;
	}
	
	/** @Override */
	public function __isset($name) {
		return isset($this->properties[$name]);
	}

	/** @Override */
	public function __unset($name) {
		unset($this->properties[$name]);
	}
	
	/** @Override */
	public function offsetSet($name, $value) {
        $this->__set($name, $value);
	}

	/** @Override */
	public function offsetExists($name) {
        return $this->__isset($name);
	}

	/** @Override */
	public function offsetUnset($name) {
		$this->__unset($name);
    }

	/** @Override */
    public function offsetGet($name) {
       	return $this->__get($name);
    }
}

?>