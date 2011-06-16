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
 * The whole site is working on this system.
 * @author Fabian M.
 */
class System {
	
	   /**
	    * The template
	    * <note>Default value is 'index'.</note>
	    */
		private static $template = "index";
	
	   /**
	    * File
	    */
		public static $file = '';
	   /**
		* Imports array
		*/
		private static $imports = array(); 
	   /**
	   	* Data
	    */
		public static $_DATA = array(
											'DB_HOST' => 'localhost',
											'DB_USER' => 'root',
											'DB_PASS' => '',
											'DB_DATABASE' => 'Faabdesign',
											'ARTICLE_LAYOUT' => 'article_layout.xml',
											'FORUM_BOARD_LAYOUT' => 'forum_board_layout.xml',
											'HTML_LAYOUT' => 'html_layout.xml'
											);
	   /**
		* PrintStream
		*/
	   static $out = NULL;
		
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
	 		 * SQL
	 		 */
	 		// Import database.class
			self::registerClass(self::getPackage()->php->sql->Database);
			// Import MySQL.class
			self::registerClass(self::getPackage()->php->sql->impl->MySQL);
			//Set the DatabaseManager
	 		Database::setDatabaseManager(new MySQL());
	 		// Startup the SQL
	 		self::startupSQL();

	
			/**
			 * Plugin
			 */
			self::registerClass(self::getPackage()->php->plugin->Plugin);
	
			/**
			 * Utils
			 */
		
			self::registerClass(self::getPackage()->php->lang->StringUtils);
	
			/** 
			 * Misc
			 */
			self::registerClass(self::getPackage()->php->util->Misc);
	
	 		/**
	  		 * XMLparser
	  		 */
			self::registerClass(self::getPackage()->php->util->xml->XMLParser);
	
			/** 
			 * TemplateManager
	 		 */
			self::registerClass(self::getPackage()->php->template->TemplateManager);
			
			/**
			 * Print Stream
			 */
			self::registerClass(self::getPackage()->php->io->PrintStream);
			
			/**
			 * Default Print Stream
			 */
			self::registerClass(self::getPackage()->php->io->DefaultPrintStream);
			
			/**
			 * XMLUtils
			 */
			self::registerClass(self::getPackage()->php->util->xml->XMLUtils);
			
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
	 	 * Add System Data
	 	 * @param $name the name
	 	 * @param $value the value
	 	 */
	 	static function addData($name, $value) {
	 		self::$_DATA[$name] = $value;
	 	}
	 	
	 	/**
	 	 * on System ready
	 	 */
	 	static function systemReady() {
	 		
	 		/**
	 		 * Set the out variable
	 		 */
	 		self::$out = new DefaultPrintStream();
	 		
	 		/**
			 * Parse Plugins
			 */
			Plugins::parse();
	 	}
	 	
	 
	 	
	   /**
	    * Startup the system.
	    * @param $class the class.
	    * @param $title the title.
	    * @param $file the file
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
	 		$class->load();
	 		// Load the template.
	 		TemplateManager::loadTemplate(self::getTemplate());
	 		// After loading.
	 		self::systemReady();
	 		//Start template
			TemplateManager::main_above($title);
	 		// Startup the page.
	 		$class->main();
	 		// End the template
	 		TemplateManager::main_below();
	 	}
	 	
	 	/**
	 	 * Secure
	 	 * @param $str the data
	 	 * @return secure
	 	 */
	 	public static function secure($str) {
	 		return $str;
	 	}
	 	
	 	/**
	 	 * Get sitename
	 	 * @return sitename
	 	 */
		static function getSiteName() {
			return "FaabTech";
		}
		
		/**
		 * Get file
		 * @return the File
		 */
		static function getFile() {
			return self::$file;
		}
		
		/**
		 * Get sources directory
		 * @return sources Directory
		 */
		static function getSources() {
			return dirname(self::getFile()) . "/sources";
		}
		
		/**
		 * Get scripturl
		 * @return the scripturl
		 */
		static function getScriptUrl() {
			return "http://" . $_SERVER['HTTP_HOST'] . str_replace("/" . substr(strrchr($_SERVER['PHP_SELF'], "/"), 1), "",$_SERVER['PHP_SELF']);
		}
	
   	   /**
		* Register Import
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
		 * Get the classes
		 * @return returns an array with the path of ever classs
		 */
		public function getClasses() {
			return self::$classes;
		}
		
		
	
   		
	
  		 /**
 		  * Die with message.
 		  * @param errors array with errors.
 		  */
		 static function systemDie($errors) {
		 		echo 'Error(s) in ' . get_called_class() . '.class:<br /> <ul>';
 				foreach($errors as $error) 
					echo '<li>'.$error.'</li>';
		
				echo '</ul>';
				exit();
	 	}	
	 	
	 	/**
	 	 * Exit the System
	 	 */
	 	static function systemExit() {
	 		exit();
	 	}
	 	
	 	/**
	 	 * Get the template
	 	 * @return the template
	 	 */
	 	static function getTemplate() {
	 		return self::$template;
	 	}
	 	
		/**
	 	 * Set the template
	 	 * @param $template the template to be set.
	 	 */
	 	static function setTemplate($template) {
	 		self::$template = $template;
	 	}
	 	
	 	/**
	 	 * Get the default package.
	 	 * @return the package.
	 	 */
	 	static function getPackage() {
	 		return new Package(dirname(self::getFile()) . '/classes');
	 	}
	 	
	 	/**
	 	 * SQL startup
	 	 * Startup the SQL 
	 	 */ 
	 	static function startupSQL() {
	 		$link = Database::getDatabaseManager()->create(self::$_DATA['DB_HOST'], self::$_DATA['DB_USER'], self::$_DATA['DB_PASS']);
	 		if (!$link) 
	 			self::systemDie(array('Error with connecting to the database.'));
	 			
	 		$db = Database::getDatabaseManager()->setDatabase(self::$_DATA['DB_DATABASE']);
	 		if (!$db)
	 			self::systemDie(array('Unable to select the database.'));
	 	}
	 	

	
		
		
}