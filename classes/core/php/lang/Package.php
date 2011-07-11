<?php
if (!defined('FaabBB'))
	exit();
	
/**
 * Represents a package, used for importing. 
 * @author Fabian M.
 */
class Package {
	
	
	/**
	 * The absolute path of this package.
	 */
	private $path = '';
	


	
	/**
	 * Constructs a new package.
	 * @param $path The path of this package.
	 * @param $str  A String representation of this Package.
	 */
	function __construct($path) {
		$this->path = $path;
	}
	
	/**
	 * Get a file in the package.
	 * @param $name the name of this file.
	 * @return a new package instance.
	 */
	function __get($name) {
		if ($name == "path")
			return;
		$file = $this->path . '/' . $name;
		// Does the file exists?
		if (!file_exists($file . '.php') && !file_exists($file)) {
			Core::terminate();
		}
		
		$file = file_exists($file . '.php') ? $file . '.php' : $file;
		
		return new Package($file);
	}
	
	/**
	 * Returns the path of the file.
	 * @return the path.
	 */
	function getPath() {
		return $this->path;
	}
	
}