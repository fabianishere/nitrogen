<?php
if (!defined('FaabBB'))
	exit();
	
/**
 * This class is the core library loader. The {@link CoreLibraryLoader} class will
 * 	load the libraries from the lib folder and these will be interpreted and added to the PHP runtime.
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
	 		CoreLogger::severe("Failed to open library folder: " . CORE_LIBRARY_FOLDER);
	 		return;
	 	} 
	 	foreach($i as $file) {
			if ($file->isFile()) {
				CoreLogger::info("Found: " . $file . ".");
				$filePath = CORE_LIBRARY_FOLDER . DS . $file;
        		$info = pathinfo($filePath);
        		$extension = $info['extension'];
        		if ($extension != 'phar') {
        			CoreLogger::warning($file . " not a PHP library.");
        			continue;
        		}
        		CoreLogger::info("Loading PHP library: " . $file);
        		require_once($filePath);
        		try {
        			$files = new DirectoryIterator("phar://" . CORE_LIBRARY_FOLDER . DS . $file . DS);
        		} catch(Exception $e) {
        			CoreLogger::severe("File " . $file . " isn't a valid PHAR file.'");
        			continue;
        		}
        		foreach($files as $file2) {
        			if ($file2->isFile()) {
        				CoreLogger::info("Found: " . $file2 . ".");
        				$d = "phar://" . CORE_LIBRARY_FOLDER . DS . $file . DS . $file2;
        				$info = pathinfo($d);
        				$extension = $info['extension'];
        				if ($extension != 'php') {
        					CoreLogger::warning($file2 . " not a PHP file.");
        					continue;
        				}
        				require_once($d);
        				CoreLogger::info("Loaded: " . $file2);
        			}
        			
        		}
    			
 			}
	 	}
	 	
	 	CoreLogger::info("PHP libraries successfully loaded.");
	 }
	
}



?>