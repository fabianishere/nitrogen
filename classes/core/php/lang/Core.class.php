<?php 
/**
 * The core of this website.
 * @author Fabian M.
 */
class Core {
	
		/**
	 	 * The name of the main method we call.
	 	 */
		public static $MAIN_METHOD_NAME = 'main';
		
		/**
		 * Core folder.
		 */
		public static $CORE_FOLDER;
		
		/**
		 * Contains all imports.
		 */	
		private static $imports = array();
	
	   	/**
	     * Load the core.
	     */
	 	public static function loadCore() {
	 		define('FaabBB', true);
	 	
	 		

	 	}
	 
	 	
	 	/**
	 	 * Invoked when the core is ready.
	 	 */
	 	public static function coreReady() {
	 		$anno = new Annotation();
	 		echo $anno->getClass()->getName();
	 	}
	 	
	 
	
	 	/**
	 	 * Invoke the main class.
	 	 */
	 	public static function invoke() {
	 		self::$CORE_FOLDER = dirname(__FILE__) . '/../../';
			$base = basename($_SERVER['SCRIPT_FILENAME']);
			$main = substr($base, 0, strpos($base, '.'));
			if (!class_exists($main))
				self::terminate();
			$reflector = new ReflectionClass($main);
	 		//------------------------------\\
	 		// Load core components here.	\\
	 		//------------------------------\\
	 		self::importCoreClasses(self::$CORE_FOLDER);
			
			// // Error/Exception Handlers \\ \\
	 		set_error_handler("Core::errorHandler");
	 		set_exception_handler("Core::exceptionHandler");
	 		// \\ Error/Exception Handlers // \\
	 		if (!$reflector->hasMethod(self::$MAIN_METHOD_NAME))
				self::terminate();
			$reflector->getMethod(self::$MAIN_METHOD_NAME)->invokeArgs(null, array());
			self::coreReady();
	 	}
	 	
	 	
		
	 	/**
		 * Import an file.
		 * @param $import the import to add
		 */
		public static function importFile($import) {
	
			if (!file_exists(dirname(self::$file) . '/' .  $import))
				self::terminate();
			// Add to the array.
			self::$imports[ count(self::$imports) ] = $import;
			// Require it.
			require(dirname(self::$file) . '/' .  $import);
		}
		
		
		
  	  	/**
		 * Import a class.
		 * @param $import the import to add
		 */
		public static function import($import) {
			if ($import instanceof Package) {
				if (is_dir($import->path))
					self::terminate();
				require($import->getPath());
				return;
			}
			// Replace the dot to a slash
			$import = str_replace('.', '/', $import);
			
			// Replace the .php
			$import = str_replace('.php', '', $import);
	
			if (!file_exists(dirname(__FILE__) . '/../../' .  $import . '.class.php'))
				self::systemDie(array('File not found: '. dirname(__FILE__) . '/../../' .  $import . '.class.php'));
			// Add to the array.
			self::$imports[ count(self::$imports) ] = $import;
			// Require it.
			require(dirname(__FILE__) . '/../../../lib/' .  $import . '.class.php');
		}
		
		/**
		 * Import the core classes.
		 */
		private static function importCoreClasses($folder) {
			$results = array();

			$handler = opendir($folder);

			while ($file = readdir($handler)) {

				if ($file != "." && $file != "..") {
					if (is_dir($folder . $file))
						self::importCoreClasses($folder . $file);
					else if (is_file($folder . $file))
						self::importFile($folder . $file);
				}

			}
			closedir($handler);
		}   	
	 	/**
	 	 * Terminates the core.
	 	 */
	 	public static function terminate() {
	 		exit(); 
	 	}
	  
	 	
	 	/**
	 	 * Get the default package.
	 	 * @return the package.
	 	 */
	 	public static function getPackage() {
	 		return new Package(dirname(__FILE__) . '/../../../lib/');
	 	}	
	 	
	 	/**
	 	 * The core error handler.
	 	 */
		private static function errorHandler($errno, $errstr, $errfile, $errline) {
    		if (!(error_reporting() & $errno)) 
       			return;
    

   			switch ($errno) {
  				// TODO
    		}

    		return true;
		}
		
		/**
		 * The core exception handler.
		 */
		private static function exceptionHandler($exception) {
  			// TODO
		}

}

// Loads the core.
Core::loadCore();
