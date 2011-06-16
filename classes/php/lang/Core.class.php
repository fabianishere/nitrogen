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
	    * Load the System
	    */
	 	static function loadSystem() {
	 		
	 		//Define FaabBB
	 		define('FaabBB', true);
	 		//Include Path
	 		define('includePath', dirname(self::$file));
	 		
	 		
	 		/**
			 * Package
			 */
			self::registerClass('php.lang.Package');


			/**
			 * Utils
			 */
		
			self::registerClass(self::getPackage()->php->lang->StringUtils);
	
			/** 
			 * Misc
			 */
			self::registerClass(self::getPackage()->php->util->Misc);
			
			/**
			 * Print Stream
			 */
			self::registerClass(self::getPackage()->php->io->PrintStream);
			
			/**
			 * Default Print Stream
			 */
			self::registerClass(self::getPackage()->php->io->DefaultPrintStream);
			
			/**
			 * Annotations
			 */
			self::registerClass(self::getPackage()->php->util->annot->Override);
			
			/**
			 * Load plugins
			 */
			Plugins::loadPlugins();
		
			
	

	 	}
	 
	 	
	 	/**
	 	 * Invoked when the system is ready.
	 	 */
	 	static function systemReady() {
	 		

	 	}
	 	
	 
	 	
	   /**
	    * Startup the system.
	    * @param $class The class itself.
	    * @param $title The title of this page.
	    * @param $file 	
	    */
	 	static function startup($class, $title, $file) {
	 		// The system is already loaded, so skip it.
	 		if (defined("FaabBB")) 
	 			return;
	 		if (!$class instanceof Page) 
	 			self::systemDie(array('The page must be an instance of the page class.'));
	 		// Start the session
	 		session_start();
	 		//Set the file
	 		self::$file = $file;
	 		//Load the System
	 		self::loadSystem();
	 		// Load the class
	 		// After loading.
	 		self::systemReady();
	 		// Startup the page.
	 		$class->main();
	 	}
	 	
		
		/**
		 * Get the url which contains the current file.
		 * @return the scripturl.
		 */
		static function getScriptUrl() {
			return "http://" . $_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']);
		}
	
   	   /**
		* Register an import.
		* @param $import the import to add
		*/
		static function registerImport($import) {
	
			if (!file_exists(dirname(self::$file) . '/' .  $import))
				self::systemDie(array('File not found '.dirname(self::$file) . '/' .  $import));
			// Add to the array.
			self::$imports[ count(self::$imports) ] = $import;
			// Require it.
			require(dirname(self::$file) . '/' .  $import);
		}
		
		
		
  	   /**
		* Register Classs
		* @param $import the import to add
		*/
		static function registerClass($import) {
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
	 	static function terminate() {
	 		exit();
	 	}
	 
	 	
	 	/**
	 	 * Get the default package.
	 	 * @return the package.
	 	 */
	 	static function getPackage() {
	 		return new Package(dirname(self::getFile()) . '/classes');
	 	}
	 	

	
		
		
}