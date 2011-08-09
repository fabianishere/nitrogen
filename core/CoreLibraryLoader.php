<?php
if (!defined('FaabBB'))
	exit();
	
/**
 * This class represents the core library loader. The {@link CoreLibraryLoader} class will
 * 	load the libraries from the lib folder and these will be interpreted, syntax checked and 
 * 	finally add it to the PHP runtime.
 * 
 * @category Core Library loading
 * @version Version 3.007 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M. 
 */
class CoreLibraryLoader {
	
	/**
	 * Initializes the {@link CoreLibraryLoader} by listing 
	 * 	the files in the lib folder, checking them, loading them,
	 * 	syntax checking them and importing them.
	 */
	 public static function init() {
	 	$i = new DirectoryIterator(CORE_LIBRARY_FOLDER);
	 	
	 	if ($i == null) {
	 		CoreLogger::severe("Failed to open core library folder: " . CORE_LIBRARY_FOLDER);
	 		return;
	 	} 
	 	foreach($i as $file) {
			if ($file->isFile()) {
				CoreLogger::info("Found: " . $file . ".");
        		$info = pathinfo(CORE_LIBRARY_FOLDER . DS . $file);
        		$extension = $info['extension'];
        		if ($extension != 'plib') {
        			CoreLogger::warning($file . " not a PHP library.");
        			continue;
        		}
        		CoreLogger::info("Found PHP library: " . $file);
        		include_once(CORE_LIBRARY_FOLDER . DS . $file);
    			CoreLogger::severe("Successfully loaded PHP file " . $file);
 			}
	 	}
	 	
	 	CoreLogger::info("Core libraries successfully loaded.");
	 }
	
}



?>