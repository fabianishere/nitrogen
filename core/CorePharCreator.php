<?php
if (!defined('FaabBB'))
	exit();
	
/**
 * Utilitie to create PHP archives.
 * 
 * @category Core Library creation.
 * @version Version 3.007 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M. 
 */
class CorePharCreator {
	
	/**
	 * The directory we build from.
	 */
	private $dir;
	
	/**
	 * Constructs a new CorePharCreator.
	 * 
	 * @param $dir The directory we build from.
	 */
	public function __construct($dir) {
		$this->dir = $dir;
	}
	
	/**
	 * Start building the Phar archive.
	 * 
	 * @param $name The name of the phar file.
	 */
	public function build($name) {
		try {
			$p = new Phar(CORE_LIBRARY_FOLDER . DS . $name . '.phar');
			$p->startBuffering();
		} catch(Exception $e) {
			CoreLogger::severe("Error with creating Phar file: " . $e->getMessage());
		 
		}
	}
	
}

?>