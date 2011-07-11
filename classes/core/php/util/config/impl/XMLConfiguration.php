<?php 
if (!defined('FaabBB'))
	exit();

/**
 * A specialized hierarchical configuration class that is able to parse XML documents.
 * @author Fabian M.
 */
class XMLConfiguration extends Configuration {
	
	/**
	 * Array that contains all the properties.
	 */
	private $properties = array();
	
	/**
	 * Constructs a new XMLConfiguration instance.
	 * @param $file The file to interpret.
	 */
	public function __construct($file) {
		if (!($file instanceof File))
		    Core::terminate();
		if (!($file->exists()))
		    return;
		$xml = simplexml_load_file($file->getPath());
		$this->properties = $xml->config;
	}
	
	/** @Override */
	public function clear() {
		$properties = array();
	}
	
	/** @Override */
	public function get($key) {
		return $properties[$key];
	}
	
}


?>