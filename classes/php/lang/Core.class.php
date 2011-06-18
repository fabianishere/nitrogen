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
		 * Contains all imports.
		 */	
		private static $imports = array();
	
	   	/**
	     * Load the core.
	     */
	 	public static function loadCore() {
	 		//Define FaabBB
	 		define('FaabBB', true);
	 	
	 		/**
			 * Package
			 */
			self::import('php.lang.Package');


			/**
			 * Utils
			 */
		
			self::import(self::getPackage()->php->lang->StringUtils);
	
			/** 
			 * Misc
			 */
			self::import(self::getPackage()->php->util->Misc);
			
			/**
			 * Print Stream
			 */
			self::import(self::getPackage()->php->io->PrintStream);
			
			/**
			 * Default Print Stream
			 */
			self::import(self::getPackage()->php->io->DefaultPrintStream);
			
			/**
			 * Annotations
			 */
			self::import(self::getPackage()->php->util->annot->Annotation);
			self::import(self::getPackage()->php->util->annot->Override);

	 	}
	 
	 	
	 	/**
	 	 * Invoked when the core is ready.
	 	 */
	 	public static function coreReady() {
	 		

	 	}
	 	
	 
	 	
	   /**
	    * Startup the core.
	    */
	 	public static function startup() {
	 		// The system is already loaded, so skip it.
	 		if (defined("FaabBB")) 
	 			return;
	 		// Start the session
	 		session_start();
	 		//Load the System
	 		self::loadCore();
	 	}
	 	
	 	/**
	 	 * Invoke the main class.
	 	 */
	 	public static function invoke() {
			$base = basename($_SERVER['SCRIPT_FILENAME']);
			$main = substr($base, 0, strpos($base, '.'));
			if (!class_exists($main))
				self::terminate();
			$reflector = new ReflectionClass($main);
	 		//------------------------------\\
	 		// Load core components here.	\\
	 		//------------------------------\\
	 		if (!$reflector->hasMethod(self::$MAIN_METHOD_NAME))
				self::terminate();
			$reflector->getMethod(self::$MAIN_METHOD_NAME)->invokeArgs(null, array());
	 	}
	 	
	 	
		
		/**
		 * Get the url which contains the current file.
		 * @return the scripturl.
		 */
		public static function getScriptUrl() {
			return "http://" . $_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']);
		}
	
   	   /**
		* Import an file.
		* @param $import the import to add
		*/
		public static function importFile($import) {
	
			if (!file_exists(dirname(self::$file) . '/' .  $import))
				self::systemDie(array('File not found '.dirname(self::$file) . '/' .  $import));
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
					self::systemDie(array('File ' . $import->path . ' is directory.'));
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
			require(dirname(__FILE__) . '/../../' .  $import . '.class.php');
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
	 		return new Package(dirname($_SERVER['SCRIPT_FILENAME']) . '/classes');
	 	}	

}

// Loads the core.
Core::loadCore();
